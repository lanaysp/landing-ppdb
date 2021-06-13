<?php

namespace App\Http\Controllers\Pengguna;

use App\Admin\Pengumuman;
use App\Admin\SettGeneral;
use App\Admin\SettMail;
use App\Http\Controllers\Controller;
use App\MadingBoard;
use App\Mail\ForumMail;
use App\Pengguna\DetailPengguna;
use App\Pengguna\Forum;
use App\Pengguna\Notification;
use App\Pengguna\ReplyForum;
use App\Pengguna\UserActivity;
use App\Pengguna\UserSettingsTheme;
use App\Ppdb\Beasiswa;
use App\Ppdb\Gelombang;
use App\Ppdb\Guide;
use App\Ppdb\OtherInfo;
use App\Ppdb\Ppdb;
use App\Ppdb\TahunAjaran;
use App\SettPpdb;
use App\SettWebsite;
use App\User;
use Barryvdh\DomPDF\Facade as PDF;
// use Illuminate\Foundation\Auth\Activity;
// use Illuminate\Foundation\Auth\Pemberitahuan;
use Illuminate\Foundation\Auth\UsersPpdb;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PpdbController extends Controller
{
    // Activity

    use UsersPpdb;

    // public function __construct()
    // {
    //     return $this->setVerify();
    // }



    // Ppdb Application
    public function ppdb_kanal()
    {
        return $this->dashboard();
    }

    public function my_profile()
    {
        return $this->profile_view();
    }

    public function change_profile(Request $request)
    {
        $this->validate($request, [
            'first_name'    => 'required|alpha',
            'phone'         => 'required',
            'image'         => 'mimes:jpg,jpeg,png',
        ]);

        $user               = User::findOrFail(Auth()->user()->id);
        $user->first_name   = $request->first_name;
        $user->phone        = $request->phone;

        if ($request->middle_name) {
            $user->middle_name  = $request->middle_name;
        }

        if ($request->last_name) {
            $user->last_name    = $request->last_name;
        }

        if ($request->hasFile('image')) {
            $user->image = $this->uploadImage($request, 'image', 'uploads/ppdb/user/');
        }

        // $this->createActivity(Activity::profileAct(), Auth()->user()->id, '1');
        return $this->simpanData($user);
    }

    // Information
    public function ppdb_mading()
    {
        $data       = MadingBoard::where($this->activation_content(), '1')->paginate(20);
        return view('user.ppdb.mading', ['page' => 'Mading Board'], compact('data'));
    }



    public function store_mading(Request $request)
    {
        $this->validate($request, [
            $this->content_title()      => 'required|min:5|max:100',
            'description'               => 'required|min:100',
        ]);

        $mading                         = new MadingBoard;
        $mading->status                 = 1;
        $mading->user_id                = Auth()->user()->id;
        $mading->title                  = $request->title;
        $mading->description            = $request->description;
        $mading->label                  = $request->label;
        $mading->type_mading            = '1';

        // $this->createActivity(Activity::madingAct(), Auth()->user()->id, '6');
        return $this->simpanData($mading);
    }

    public function update_mading(Request $request)
    {
        $this->validate($request, [
            $this->content_title()      => 'required|min:5|max:100',
            'description'               => 'required|min:100',
        ]);

        $mading                         = MadingBoard::where('user_id', Auth()->user()->id)->where('id', decrypt($request->id))->first();
        $mading->status                 = 1;
        $mading->user_id                = Auth()->user()->id;
        $mading->title                  = $request->title;
        $mading->description            = $request->description;
        $mading->type_mading            = '1';

        return $this->simpanData($mading);
    }

    public function ppdb_delete($id)
    {
        $mading     = MadingBoard::where('id', $id)->where('user_id', Auth()->user()->id)->first();
        if ($mading == null) {
            '';
        } else {
            if (MadingBoard::destroy($id)) {
                echo '';
            } else {
                echo '';
            }
        }
    }

    public function pengumuman_ppdb()
    {
        $data   = Pengumuman::where('type_announcement', '1')->where($this->activation_content(), '1')->orderBy('id', 'desc')->get();
        return view('user.ppdb.info.announcement', ['page' => 'Pengumuman Dari Pihak Sekolah'], compact('data'));
    }

    public function gelombang()
    {
        return $this->gelombang_view();
    }

    public function gelombang_view()
    {

        $guide      = Guide::all();
        $data       = TahunAjaran::where('status', '1')->first();
        if ($data == null) {
            return back()->with(['gagal' => 'Pendaftaran Belum Dibuka Kembali']);
        }
        return view('user.ppdb.info.gelombang', ['page' => 'Informasi Gelombang Pendaftaran'], compact('data', 'guide'));
    }

    public function info_lainnya()
    {
        return $this->other_information();
    }

    public function other_information()
    {
        $data       = OtherInfo::where($this->activation_content(), '1')->paginate(10);
        return view('user.ppdb.info.other', ['page'  => 'Informasi Lainnya'], compact('data'));
    }

    public function info_beasiswa()
    {
        return $this->beasiswa_info();
    }

    public function beasiswa_info()
    {
        $data       = Beasiswa::where($this->activation_content(), '1')->paginate(10);
        return view('user.ppdb.info.beasiswa', ['page' => 'Informasi Beasiswa'], compact('data'));
    }

    public function beasiswa_detail($id)
    {
        return $this->detail_beasiswa($id);
    }

    public function detail_beasiswa($id)
    {
        $data       = Beasiswa::where('id', $id)->first();
        $guide      = Guide::all();
        $other      = Beasiswa::where($this->activation_content(), '1')->limit(10)->get();
        if ($data->status == 0) {
            return back()->with(['gagal' => 'Maaf, Sepertinya Data Beasiswa Sudah Tidak Aktif']);
        } else {
            return view('user.ppdb.info.beasiswa_detail', ['page' => 'Detail Beasiswa'], compact('data', 'guide', 'other'));
        }
    }

    // Registration
    public function reg_ppdb()
    {
        return $this->ppdb_reg();
    }

    public function ppdb_reg()
    {
        $data       = Ppdb::where($this->author_publishing(), Auth()->user()->id)->get();
        return view('user.ppdb.reg.list', ['page' => 'List Pendaftaran Saya'], compact('data'));
    }

    public function reg_add()
    {
        return $this->add_reg();
    }

    public function add_reg()
    {
        if (Auth()->user()->role == 0) {
            $check      = Ppdb::where($this->author_publishing(), Auth()->user()->id)->get();
            if (count($check) < 0) {
                $for_add            = date('Y') + 1;
                $get_tahun          = TahunAjaran::where('tahun_ajaran', date('Y') . ' - ' . $for_add)->first();
                $get_gelombang      = Gelombang::where('tahun_ajaran_id', $get_tahun->id)->where('tanggal_akhir >', date('Y-m-d'))->get();
                return view('user.ppdb.reg.add', ['page' => 'Daftar Sekolah'], compact('get_gelombang', 'get_tahun'));
            } else {
                return back()->with(['gagal' => 'Maaf, Anda Login Sebagai Siswa yang hanya dapat mendaftar sekali']);
            }
        } elseif (Auth()->user()->role == 1) {
            $for_add            = date('Y') + 1;
            $get_tahun          = TahunAjaran::where('tahun_ajaran', date('Y') . ' - ' . $for_add)->first();
            $get_gelombang      = Gelombang::where('tahun_ajaran_id', $get_tahun->id)->where('tanggal_akhir >', date('Y-m-d'))->get();
            return view('user.ppdb.reg.add', ['page' => 'Daftar Sekolah'], compact('get_gelombang', 'get_tahun'));
        }
    }

    public function list_pendaftar()
    {
        $data       = TahunAjaran::where('status', '1')->first();
        if ($data == null) {
            return back()->with(['gagal' => 'Pendaftaran Belum Dibuka Kembali']);
        }
        return view('user.ppdb.registration.pendaftar', ['page' => 'Pendaftar'], compact('data'));
    }


    public function hasil_view()
    {
    }

    public function my_registration()
    {
        $data       = Auth()->user()->ppdb_registration;
        return view('user.ppdb.registration.index', ['page' => 'List Ppdb Saya'], compact('data'));
    }

    public function register_online($id)
    {
        return $this->reg_view($id);
    }

    public function reg_view($id)
    {
        $check_type             = Ppdb::where($this->author_publishing(), Auth()->user()->id)->get();
        if (count($check_type) > 0 && Auth()->user()->role == 2) {
            return back()->with(['gagal' => 'Maaf, Anda Daftar Serta Login Sebagai Siswa, Dimana Hanya dapat mendaftarkan Ppdb Sekali Saja']);
        }

        $gelombang  = Gelombang::findOrFail(decrypt($id));
        if ($gelombang == null) {
            return back()->with(['gagal' => 'Maaf, Sepertinya Pendaftaran Online Sudah Ditutup, Silahkan Mencoba Mendaftar Secara Offline dengan mendatangi sekolah']);
        }

        $sett       = SettWebsite::first();
        return view('user.ppdb.registration.registration', ['page' => 'Pendaftaran Online'], compact('gelombang', 'sett'));
    }

    public function detail_registration($id)
    {
        $data       = Ppdb::where('id', $id)->first();
        $sett       = SettWebsite::first();
        return view('user.ppdb.registration.detail_registration', ['page' => 'Detail Pendaftaran'], compact('data', 'sett'));
    }

    public function cetak_pdf($id)
    {
        $data       = Ppdb::where('id', decrypt($id))->first();
        $sett       = SettWebsite::first();
        return view('user.ppdb.registration.pdf', ['page' => 'Formulir Peserta PPDB'], compact('data', 'sett'));
    }

    public function kartuPendaftaran($id)
    {
        $data       = Ppdb::findOrFail(decrypt($id));
        $sett       = SettWebsite::first();
        $setts      = SettPpdb::first();
        return view('user.ppdb.registration.card', ['page' => 'Kartu Pendaftaran Peserta PPDB'], compact('data', 'sett', 'setts'));
    }

    public function unduh_registration()
    {
        $sett       = SettWebsite::first();
        $pdf        = PDF::loadview('user.ppdb.registration.form', ['page' => 'Formulir PPDB'], compact('sett'));
        return $pdf->stream();
    }

    public function kartu_peserta($id, $name)
    {
        $data       = Ppdb::where('id', $id)->first();
        $sett       = SettPpdb::first();
        return view('user.ppdb.registration.kartu_peserta', ['page' => 'Kartu Peserta PPDB'], compact('data', 'sett'));
    }


    // Social
    public function beranda_social()
    {
        return view('user.ppdb.social.beranda', ['page' => 'Beranda Ppdb']);
    }

    // function Attributs
    protected function dashboard()
    {
        $forum = Forum::orderBy('id', 'desc')->limit(5)->get();
        $pengumuman = Pengumuman::orderBy('id', 'desc')->limit(5)->get();
        return view('user.ppdb.beranda', ['page'      => 'Dashboard'], compact('forum', 'pengumuman'));
    }

    protected function profile_view()
    {
        $data = DetailPengguna::where('user_id', Auth()->user()->id)->first();
        if ($data == null) {
            $about  = '';
        } else {
            $about  = $data;
        }

        if (Auth()->user()->type_account == 'ppdb') {

            return view('user.ppdb.profile', ['page' => 'Profile Saya'], compact('about'));
        } else {
            return view('user.profile', ['page' => 'Profile Saya'], compact('about'));
        }
    }

    public function change_detail(Request $request)
    {
        $this->validate($request, [
            'province'      => 'required',
            'city'          => 'required',
        ]);

        $data       = DetailPengguna::where('user_id', Auth()->user()->id)->first();
        if ($data == null) {
            $detail     = new DetailPengguna;
        } else {
            $detail     = DetailPengguna::findOrFail($data->id);
        }

        $detail->province   = $request->province;
        $detail->city       = $request->city;
        $detail->user_id    = Auth()->user()->id;

        if ($request->address_detail) {
            $detail->address_detail     = $request->address_detail;
        }

        if ($request->detail_pengguna) {
            $detail->detail_pengguna    = $request->detail_pengguna;
        }

        if ($request->hasFile('cover_image')) {
            $detail->cover_image = $this->uploadImage($request, 'cover_image', 'uploads/ppdb/user/');
        }
        // $this->createActivity(Activity::descAct(), Auth()->user()->id, '2');
        return $this->simpanData($detail);
    }

    public function UserSetting()
    {
        $data   = UserSettingsTheme::where('user_id', Auth()->user()->id)->first();
        if ($data == null) {
            $about  = '';
        } else {
            $about  = $data;
        }

        $insert     = [
            'theme_color' => array(
                'Biru Dongker'  => '1',
                'Biru Langit'   => '2',
                'Hijau Muda'    => '3',
                'Orange'        => '4',
                'Biru'          => '5',
            ),

            'theme_style'    =>   array(
                'Light'     => '1',
                'Dark'      => '2',
                'Semi Dark' => '3',
            ),

            'theme_menu'    => array(
                'horizontal' => '1',
                'vertikal menu' => '2'
            )
        ];

        return view('user.ppdb.setting', ['page' => 'Pengaturan Tampilan'], compact('about', 'insert'));
    }

    public function changeSetting(Request $request)
    {
        $this->validate($request, [
            'theme_color'       => 'required',
            'theme_style'       => 'required',
            'theme_menu'        => 'required',
        ]);

        $data   = UserSettingsTheme::where('user_id', Auth()->user()->id)->first();
        if ($data == null) {
            $detail = new UserSettingsTheme;
        } else {
            $detail  = UserSettingsTheme::findOrFail($data->id);
        }

        $detail->user_id        = Auth()->user()->id;
        $detail->theme_color    = $request->theme_color;
        $detail->theme_style    = $request->theme_style;
        $detail->theme_menu     = $request->theme_menu;

        // $this->createActivity(Activity::themeAct(), Auth()->user()->id, '4');
        return $this->simpanData($detail);
    }

    public function logActivity()
    {
        $data   = UserActivity::where('user_id', Auth()->user()->id)->get();
        return view('user.ppdb.log', ['page' => 'Aktivitas Saya'], compact('data'));
    }

    public function hasil_ppdb()
    {
        $data       = TahunAjaran::where('status', '1')->first();
        if ($data == null) {
            return back()->with(['gagal' => 'Pendaftaran Belum Dibuka Kembali']);
        }
        return view('user.ppdb.info.hasilPpdb', ['page' => 'Pendaftar'], compact('data'));
    }

    public function forum(Request $request)
    {
        $data   = Forum::orderBy('id', 'desc')->paginate(10);
        if ($request->search != null) {
            $data   = Forum::where('title', 'like', '%' . $request->search . '%')->orderBy('id', 'DESC')->paginate(10);
            $data->appends([
                'search' => $request->search,
            ]);
        }
        return view('user.ppdb.social.forum', ['page' => 'Forum Pendaftaran Sekolah'], compact('data'));
    }

    public function createForum(Request $request)
    {
        $this->validate($request, [
            'title'     => 'required',
            'description' => 'required'
        ]);

        $data           = new Forum;
        $data->title    = $request->title;
        $data->description = $request->description;
        $data->user_id  = Auth()->user()->id;
        // $this->createActivity(Activity::addForumAct(), Auth()->user()->id, '7');
        return $this->simpanData($data);
    }

    public function updateForum(Request $request)
    {
        $this->validate($request, [
            'title'     => 'required',
            'description' => 'required'
        ]);

        $data           = Forum::findOrFail(decrypt($request->id));
        $data->title    = $request->title;
        $data->description = $request->description;
        $data->user_id  = Auth()->user()->id;
        return $this->simpanData($data);
    }

    public function detailForum($id)
    {
        $data   = Forum::findOrFail(decrypt($id));
        $baru   = Forum::orderBy('id', 'desc')->limit(10)->get();
        return view('user.ppdb.social.detail', ['page' => 'Detail Forum Pendaftaran Sekolah'], compact('data', 'baru'));
    }

    public function replyForum(Request $request)
    {
        $this->validate($request, [
            'description'       => 'required',
        ]);

        $data           = new ReplyForum;
        $data->user_id  = Auth()->user()->id;
        $data->description = $request->description;
        $data->forum_id     = decrypt($request->forum_id);
        // $this->createActivity(Activity::addReplyAct(), Auth()->user()->id, '8');
        $data->save();

        $mailing    = SettMail::first();
        $general    = SettGeneral::first();
        $mailing->balasan_forum == '1' ? Mail::to($data->forum_induk->pengguna->email)->send(new ForumMail($data, $mailing, $general)) : null;
        Pemberitahuan::sendNotif($request, $data->forum_induk->user_id, 'balasan_forum');
        return back()->with(['flash' => 'balasan berhasil di publish']);
    }

    public function pemberitahuan()
    {
        $data   = Notification::where('user_id', Auth()->user()->id)->get();
        return view('user.ppdb.notification', ['page' => 'Pemberitahuan'], compact('data'));
    }

    public function markAsRead()
    {
        Notification::where('user_id', Auth()->user()->id)->where('status', '0')->update(array('status' => 1));
        return back()->with(['flash' => 'Semua Pemberitahuan telah ditandai telah dibaca']);
    }
}
