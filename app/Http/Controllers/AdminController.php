<?php

namespace App\Http\Controllers;

use App\Admin\Pengumuman;
use App\Admin\SettGeneral;
use App\Admin\SettMail;
use App\Archivement;
use App\CatNews;
use App\Contact;
use App\Employee;
use App\Event;
use App\EventCat;
use App\Feature;
use App\Gallery;
use App\History;
use App\News;
use App\NewsComment;
use App\NewsVisit;
use App\PageBuilder;
use App\Pemilik;
use App\Pengguna\Notification;
use App\Ppdb\Gelombang;
use App\Ppdb\Ppdb;
use App\SettPpdb;
use App\SettWebsite;
use App\Slider;
use App\Subcriber;
use App\User;
use App\WebAbout;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

// Administrator Controller Meliputi Segala Aktivitas
// Admin, Guru, Pengurus Keuangan & Perpustakaan 

class AdminController extends Controller
{
    

    public function dashboard()
    {
        $page =     "Dashboard Page";
        $data = [
            'totalregistration'     => Ppdb::all(),
            'ppdbaccept'            => Ppdb::where('status','diterima')->get(),
            'ppdbreject'            => Ppdb::where('status','ditolak')->get(),
            'totalgelombang'        => Gelombang::all(),
            'totalnews'             => News::all(),
            'totalevent'            => Event::all(),
            'totalemployee'         => Employee::all(),
            'ppdbuser'              => User::where('type_account','ppdb')->get(),
            'ppdbmont'              => Ppdb::whereMonth('created_at',date('m'))->whereYear('created_at',date('Y'))->get(),
            'ppdbweek'              => Ppdb::select(DB::raw("(COUNT(*)) as count"),DB::raw("DAYNAME(created_at) as dayname"))
                                        ->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                                        ->whereYear('created_at', date('Y'))
                                        ->groupBy('dayname')
                                        ->get(),
            'ppdbyear'              => Ppdb::whereYear('created_at',date('Y'))->get(),
            'ppdbnew'               => Ppdb::orderBy('id','desc')->limit(5)->get(),
        ];

        return view('backend.page.dashboard', compact('page','data'));
    }

    public function settingsGeneral($param1 = '', $param2 = '')
    {

        if ($param1 == 'ppdb') {
            $data = SettPpdb::findOrFail(1);
            return view('backend.settings.ppdb', ['page' => 'Pengaturan PPDB'], compact('data'));
        }

        if ($param1 == 'general') {
            $page =     "Pengaturan General";
            $data =     SettGeneral::first();

            $color = [
                'Putih' => 'white',
                'Cyan'  => 'cyan',
                'Hitam' => 'black',
                'Purple' => 'purple',
                'orange' => 'orange',
                'Hijau' => 'green',
                'Merah'   => 'red'
            ];
            return view('backend.settings.general', compact('page', 'data', 'color'));
        }

        if ($param1 == 'system') {
            $page =     "Pengaturan System";
            return view('backend.settings.system', compact('page'));
        }

        // if ($param1 == 'attendance') {
        //     $page =     "Pengaturan Absensi";
        //     return view('backend.settings.attendance', compact('page'));
        // }

        if ($param1 == 'ppdb') {
            $page =     "Pengaturan PPDB";
            return view('backend.settings.ppdb', compact('page'));
        }

        // if ($param1 == 'salary') {
        //     $page =     "Pengaturan Pengajihan";
        //     return view('backend.settings.salary', compact('page'));
        // }

        // if ($param1 == 'spp') {
        //     $page =     "Pengaturan Pembayaran SPP";
        //     return view('backend.settings.spp', compact('page'));
        // }

        if ($param1 == 'website') {
            $data =     SettWebsite::first();
            $page =     "Pengaturan Website Sekolah";
            return view('backend.settings.website', compact('page', 'data'));
        }

        if ($param1 == 'mailing') {
            $data =     SettMail::first();
            return view('backend.settings.mailing', ['page' => 'Pengaturan Email'], compact('data'));
        }
    }

    public function insertSett(Request $request, $param1 = '', $param2 = '')
    {
        if ($param1 == 'ppdb') {
            $this->validate($request, [
                'file_pendaftaran'  => 'mimes:docx,pdf',
                'logo_ppdb'         => 'mimes:png,jpg,jpeg,webp',
                'background_image'  => 'mimes:png,jpg,jpeg',
                'mading'            => 'required',
                'forum'             => 'required',
                'offline'           => 'required',
                'cs'                => 'required'
            ]);

            $data                   = SettPpdb::findOrFail(1);
            $data->mading           = $request->mading;
            $data->forum            = $request->forum;
            $data->offline          = $request->offline;
            $data->cs          = $request->cs;

            if ($request->hasFile('file_pendaftaran')) {
                $data->file_pendaftaran = $this->uploadImage($request, 'file_pendaftaran', 'uploads/ppdb/');
            }

            if ($request->hasFile('logo_ppdb')) {
                $data->logo_ppdb = $this->uploadImage($request, 'logo_ppdb', 'uploads/ppdb/');
            }



            if ($request->hasFile('background_image')) {
                $data->background_image = $this->uploadImage($request, 'background_image', 'uploads/ppdb/');
            }

            return $this->simpanData($data);
        }

        if ($param1 == 'mailing') {
            $this->validate($request, [
                'email'     => 'required',
                'logo'      => 'mimes:png,jpg,jpeg',
                'banner'    => 'mimes:png,jpg,jpeg'
            ]);

            $data                   = SettMail::findOrFail(1);
            $data->ppdb_admin       = $request->ppdb_admin;
            $data->ppdb_user        = $request->ppdb_user;
            $data->penerimaan       = $request->penerimaan;
            $data->penolakan        = $request->penolakan;
            $data->balasan_forum    = $request->balasan_forum;
            $data->subcribe         = $request->subcribe;
            $data->contact          = $request->contact;
            $data->komentar         = $request->komentar;
            $data->email            = $request->email;

            if ($request->logo) {
                $data->logo         = $this->uploadImage($request, 'logo', 'setting');
            }

            if ($request->banner) {
                $data->banner         = $this->uploadImage($request, 'banner', 'setting');
            }

            return $this->simpanData($data);
        }

        if ($param1 == 'website') {
            $this->validate($request, [
                'theme'             => 'required',
                'teacher_appear'    => 'required',
                'facility_appear'   => 'required',
                'gallery_appear'    => 'required',
                'activity_appear'   => 'required',
                'prestation_appear' => 'required',
                'contact_appear'    => 'required',
                'about_appear'      => 'required',
                'news_appear'       => 'required',
                'subject_appear'    => 'required',
                'extra_appear'      => 'required',
                'website_logo'      => 'mimes:jpg,jpeg,png',
                'dark_logo'         => 'mimes:jpg,jpeg,png',
                'footer_text'       => 'required',
                'copy_right'        => 'required',
                'meta_tittle'       => 'required',
                'meta_keyword'      => 'required',
                'meta_description'  => 'required'
            ]);

            if ($request->facebook) {
                $facebook   = $request->facebook;
            } else {
                $facebook   = '';
            }

            if ($request->twitter) {
                $twitter   = $request->twitter;
            } else {
                $twitter   = '';
            }

            if ($request->instagram) {
                $instagram   = $request->instagram;
            } else {
                $instagram   = '';
            }

            $data   = SettWebsite::first();
            if ($request->hasFile('website_logo')) {
                $logo = $request->file('website_logo')->store('uploads/website/logo/');
            } else {
                $logo = $data->website_logo;
            }

            if ($request->hasFile('dark_logo')) {
                $dark = $request->file('dark_logo')->store('uploads/website/logo/');
            } else {
                $dark = $data->dark_logo;
            }

            if ($request->school_address) {
                $address = $request->school_address;
            } else {
                $address = '';
            }

            if ($request->school_phone) {
                $phone  = $request->school_phone;
            } else {
                $phone  = '';
            }

            if ($request->school_email) {
                $email  = $request->school_email;
            } else {
                $email  = '';
            }


            SettWebsite::first()->update([
                'theme'             => $request->theme,
                'teacher_appear'    => $request->teacher_appear,
                'facility_appear'   => $request->facility_appear,
                'gallery_appear'    => $request->gallery_appear,
                'activity_appear'   => $request->activity_appear,
                'prestation_appear' => $request->prestation_appear,
                'contact_appear'    => $request->contact_appear,
                'about_appear'      => $request->about_appear,
                'news_appear'       => $request->news_appear,
                'subject_appear'    => $request->subject_appear,
                'extra_appear'      => $request->extra_appear,
                'website_logo'      => $logo,
                'dark_logo'         => $dark,
                'footer_text'       => $request->footer_text,
                'copy_right'        => $request->copy_right,
                'meta_tittle'       => $request->meta_tittle,
                'meta_keyword'      => $request->meta_keyword,
                'meta_description'  => $request->meta_description,
                'facebook'          => $facebook,
                'twitter'           => $twitter,
                'instagram'         => $instagram,
                'school_address'    => $address,
                'school_phone'      => $phone,
                'school_email'      => $email
            ]);

            return back()->with(['flash' => 'Pengaturan Website Berhasil diperbaharui']);
        }

        if ($param1 == 'general_system') {
            $this->validate($request, [
                'school_name'   => 'required|max:200',
                'website_on'    => 'required|max:10',
                'ppdb_on'       => 'required|max:10',
                'must_verify'   => 'required|max:10',
                'layout_dark'   => 'required|max:10',
                'sidebar_custom' => 'required|max:10',
                'color_custom'  => 'required|max:10',
                'admin_logo'    => 'mimes:jpg,jpeg,png'
            ]);

            $data               = SettGeneral::findOrFail(1);
            if ($request->hasFile('admin_logo')) {
                $data->admin_logo = $request->file('admin_logo')->store('uploads/website/logo/');
            } else {
                $data->admin_logo = $data->admin_logo;
            }

            $data->school_name      = $request->school_name;
            $data->website_on       = $request->website_on;
            $data->ppdb_on          = $request->ppdb_on;
            $data->must_verify      = $request->must_verify;
            $data->layout_dark      = $request->layout_dark;
            $data->sidebar_custom   = $request->sidebar_custom;
            $data->color_custom     = $request->color_custom;
            if ($request->menu_custom) {
                $data->menu_custom  = $request->menu_custom;
            } else {
                $data->menu_custom  = '';
            }
            if ($data->save()) {
                return back()->with(['flash' => 'Data berhasil disimpan']);
            } else {
                return back()->with(['gagal' => 'Terjadi kesalahan tidak diketahui']);
            }
        }
    }

    public function cms($param1 = '', $param2 = '', Request $request)
    {

        if ($param1 == 'slider') {
            $page   = 'Slider Website';
            $data   = Slider::all();
            return view('backend.cms.slider', compact('page', 'data'));
        }

        if ($param1 == 'feature') {
            $page =     "Keunggulan Sekolah";
            $data =     Feature::all();
            return view('backend.cms.feature', compact('page', 'data'));
        }

        if ($param1 == 'vission') {
            $page =     "Visi Misi Sekolah";
            $data =     WebAbout::first();
            return view('backend.cms.vission', compact('page', 'data'));
        }

        if ($param1 == 'about') {
            $page =     "Tentang Sekolah";
            $data =     WebAbout::first();
            return view('backend.cms.about', compact('page', 'data'));
        }

        if ($param1 == 'archivement') {
            $page =     "Prestasi Sekolah";
            $data =     Archivement::paginate(10);
            return view('backend.cms.archivement', compact('page', 'data'));
        }

        if ($param1 == 'history') {
            $page =     "Sejarah Sekolah";
            $data =     History::paginate(10);
            return view('backend.cms.history', compact('page', 'data'));
        }

        if ($param1 == 'catnews') {
            $page =     "Kategori Berita";
            $data =     CatNews::paginate(30);
            return view('backend.cms.catnews', compact('page', 'data'));
        }

        if ($param1 == 'news') {
            $page =     "List Berita";
            $data       = News::orderBy('id', 'DESC')->paginate(20);

            if ($request->search != null) {
                $data   = News::where('news_title', 'like', '%' . $request->search . '%')->orderBy('id', 'DESC')->paginate(4);
                $data->appends([
                    'search'    => $request->search,
                ]);
            }
            return view('backend.cms.news', compact('page', 'data'));
        }


        if ($param1 == 'addNews') {
            $cate =     CatNews::all();
            $page =     "Tambah Berita";
            return view('backend.cms.addnews', compact('page', 'cate'));
        }

        if ($param1 == 'updateNews') {
            $cate =     CatNews::all();
            $data =     News::where('id', $param2)->first();
            $page =     "Update Berita";
            return view('backend.cms.updatenews', compact('page', 'data', 'cate'));
        }

        if ($param1 == 'detailNews') {
            $data =     News::where('id', $param2)->first();
            $comment    = NewsComment::where('news_id', $param2)->paginate(10);
            return view('backend.cms.detailnews', ['page' => 'Detail & Analytic Berita'], compact('data', 'comment'));
        }

        if ($param1 == 'gallery') {
            $page =     "Gallery Sekolah";
            $data =     Gallery::all();
            return view('backend.cms.gallery', compact('page', 'data'));
        }

        if ($param1 == 'catevents') {
            $page =     "Kategori Kegiatan";
            $data =     EventCat::all();
            return view('backend.cms.catevents', compact('page', 'data'));
        }

        if ($param1 == 'events') {
            $page =     "Daftar Kegiatan";
            $data =     Event::orderBy('id', 'DESC')->paginate(20);

            if ($request->search != null) {
                $data   = Event::where('event_title', 'like', '%' . $request->search . '%')->orderBy('id', 'DESC')->paginate(10);
                $data->appends([
                    'search'    => $request->search,
                ]);
            }
            return view('backend.cms.events', compact('page', 'data'));
        }

        if ($param1 == 'addEvents') {
            $page =     "Tambah Kegiatan";
            $data =     EventCat::all();
            return view('backend.cms.eventsAdd', compact('page', 'data'));
        }

        if ($param1 == 'updateEvents') {
            $page =     "Edit Kegiatan";
            $data =     Event::where('id', $param2)->first();
            $cate =     EventCat::all();
            return view('backend.cms.eventUpdate', compact('page', 'data', 'cate'));
        }

        if ($param1 == 'contact') {
            $page =     "Kontak Masuk";
            $data =     Contact::orderBy('id', 'DESC')->paginate(30);
            return view('backend.cms.contact', compact('page', 'data'));
        }

        if ($param1 == 'contactDetail') {
            $data       = Contact::findOrFail($param2);
            Contact::findOrFail($param2)->update(array('status' => 1));
            return view('backend.cms.contactDetail', ['page' => 'Detail Pesan'], compact('data'));
        }

        if ($param1 == 'contactDelete') {
            $data       = Contact::findOrFail($param2);
            return $this->deleteData($data, $param2);
        }

        if ($param1 == 'pageBuilder') {
            $page =     "Laman Builder";
            $data =     PageBuilder::orderBy('id', 'desc')->get();
            return view('backend.cms.pagebuilder', compact('page', 'data'));
        }

        if ($param1 == 'addPage') {
            $page       = "Tambah Laman";
            return view('backend.cms.addPage', compact('page'));
        }

        if ($param1 == 'updatePage') {
            $page       = "Update Laman";
            $data       = PageBuilder::where('id', $param2)->first();
            return view('backend.cms.updatePage', compact('page', 'data'));
        }

        if ($param1 == 'delete-page') {
            if (PageBuilder::destroy($param2)) {
                return back()->with(['flash' => 'Laman Berhasil dihapus']);
            } else {
                return back()->with(['gagal' => 'Terjadi kesalahan yang tidak diketahui']);
            }
        }

        if ($param1 == 'ContactReader') {
            Contact::where('status', '0')->update(array('status' => 1));
            return back()->with(['flash' => 'Berhasil Menandai sebagai telah di baca']);
        }

        if ($param1 == 'subcriber') {
            $data   = Subcriber::orderBy('id', 'desc')->get();
            return view('backend.cms.subcribe', ['page' => 'Daftar Subcriber'], compact('data'));
        }

        if ($param1 == 'deleteSubcriber') {
            $data   = Subcriber::findOrFail(decrypt($param2));
            return $this->deleteData($data, decrypt($param2));
        }
    }

    // Announcement
    public function pengumuman()
    {
        return $this->announcement();
    }

    public function add_pengumuman()
    {
        return $this->add_announcement();
    }

    public function update_pengumuman($id)
    {
        $data   = Pengumuman::where('id', $id)->first();
        return view('backend.announcement.update', ['page' => 'Edit Pengumuman'], compact('data'));
    }

    public function insert_pengumuman(Request $request)
    {
        $this->validate($request, [
            'announcement_title'    => 'required',
            'type_announcement'     => 'required',
            'image'                 => 'mimes:png,jpg,jpeg',
            $this->activation_content()                => 'required',
        ]);

        $announcement                       = new Pengumuman;
        $announcement->announcement_title   = $request->announcement_title;
        $announcement->type_announcement    = $request->type_announcement;
        $announcement->status               = $request->status;
        if ($request->description) {
            $announcement->description      = $request->description;
        }
        if ($request->hasFile('image')) {
            $announcement->image = $request->file('image')->store('uploads/pengumuman/');
        } else {
            $announcement->image        = 'uploads/pengumuman/default.jpg';
        }

        if ($announcement->save()) {
            return back()->with(['flash' => 'Pengumuman berhasil ditambahkan']);
        } else {
            return back()->with(['gagal' => 'Terjadi kesalahan tidak diketahui']);
        }
    }

    public function ubah_pengumuman(Request $request)
    {
        $this->validate($request, [
            'announcement_title'    => 'required',
            'type_announcement'     => 'required',
            'image'                 => 'mimes:png,jpg,jpeg',
            $this->activation_content()                => 'required',
        ]);

        $announcement                       = Pengumuman::findOrFail($request->id);
        $announcement->announcement_title   = $request->announcement_title;
        $announcement->type_announcement    = $request->type_announcement;
        $announcement->status               = $request->status;
        if ($request->description) {
            $announcement->description      = $request->description;
        }
        if ($request->hasFile('image')) {
            $announcement->image = $request->file('image')->store('uploads/pengumuman/');
        } else {
            $announcement->image        = $announcement->image;
        }

        if ($announcement->save()) {
            return back()->with(['flash' => 'Pengumuman berhasil diperbaharui']);
        } else {
            return back()->with(['gagal' => 'Terjadi kesalahan tidak diketahui']);
        }
    }

    public function del_announcement($id)
    {
        if (Pengumuman::destroy($id)) {
            return back()->with(['flash' => 'Pengumuman berhasil dihapus']);
        } else {
            return back()->with(['gagal' => 'Terjadi kesalahan tidak diketahui']);
        }
    }

    public function my_profile()
    {
        return view('backend.users.my_account', ['page' => 'My Profile']);
    }

    public function notification()
    {
        $data   = Notification::where('role', 'administrator')->where('status', '0')->get();
        return view('backend.page.notification', ['page' => 'Pemberitahuan'], compact('data'));
    }

    public function tandaiTelahdibaca()
    {
        Notification::where('role', 'administrator')->where('status', '0')->update(array('status' => 1));
        return back()->with(['flash' => 'Berhasil Menandai sebagai telah di baca']);
    }

    public function createLicense(Request $request)
    {
        $this->validate($request, [
            'no_invoice'        => 'required',
            'license'           => 'required',
        ]);

        $data                   = Pemilik::findOrFail(1);
        $data->no_invoice       = $request->no_invoice;
        $data->license          = $request->license;
        $data->save();
        return redirect()->route('dashboard');
    }
}
