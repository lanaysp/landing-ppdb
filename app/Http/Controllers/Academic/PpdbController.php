<?php

namespace App\Http\Controllers\Academic;

use App\Admin\SettGeneral;
use App\Admin\SettMail;
use App\Employee;
use App\Http\Controllers\Controller;
use App\MadingBoard;
use App\Mail\PpdbAdmin;
use App\Mail\PpdbTerima;
use App\Mail\PpdbTolak;
use App\Pengguna\Forum;
use App\Pengguna\ReplyForum;
use App\Ppdb\Beasiswa;
use App\Ppdb\CustomerService;
use App\Ppdb\Gelombang;
use App\Ppdb\Ppdb;
use App\Ppdb\TahunAjaran;
use App\SettPpdb;
use App\SettWebsite;
use App\User;
use Illuminate\Foundation\Auth\AdminPpdb;
use Illuminate\Foundation\Auth\Pemberitahuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PpdbController extends Controller
{
    public function __construct()
    {
        $this->middleware('administrator');
    }

    use AdminPpdb, Pemberitahuan;

    // PPDB Master 
    public function guide()
    {
        return $this->petunjuk();
    }

    public function detail_guide($id)
    {
        return $this->detail_petunjuk($id);
    }

    public function beasiswa_list(Request $request)
    {
        return $this->daftar_beasiswa($request);
    }

    public function add_beasiswa()
    {
        return $this->tambah_beasiswa();
    }

    public function update_beasiswa($id)
    {
        return $this->edit_beasiswa($id);
    }

    public function other_info_list()
    {
        return $this->info_lainnya();
    }

    public function add_other_info()
    {
        return $this->tambah_info_lainnya();
    }

    public function update_other_info($id)
    {
        return $this->edit_info_lainnya($id);
    }

    public function other_info_detail($id)
    {
        return $this->detail_info($id);
    }

    public function admin_tahun_ajaran()
    {
        $page   = "Penerimaan Tahun Ajaran Baru";
        $data   = TahunAjaran::orderBy('tahun_ajaran', 'desc')->get();
        return view('backend.ppdb.tahun_ajaran', compact('page', 'data'));
    }

    public function add_tahun_ajaran(Request $request)
    {
        $this->validate($request, [
            'tahun_ajaran'      => 'required',
        ]);
        $ajaran                     = new TahunAjaran;
        $ajaran->nama_tahunajaran   = $request->nama_tahunajaran;
        $ajaran->tahun_ajaran       = $request->tahun_ajaran;
        if ($request->nama_angkatan) {
            $ajaran->nama_angkatan  = $request->nama_angkatan;
        }
        return $this->simpanData($ajaran);
    }

    public function update_tahun_ajaran(Request $request)
    {
        $this->validate($request, [
            'tahun_ajaran'      => 'required',
        ]);
        $ajaran                     = TahunAjaran::findOrFail($request->id);
        $ajaran->nama_tahunajaran   = $request->nama_tahunajaran;
        $ajaran->tahun_ajaran       = $request->tahun_ajaran;
        if ($request->nama_angkatan) {
            $ajaran->nama_angkatan  = $request->nama_angkatan;
        }

        return $this->simpanData($ajaran);
    }

    public function deleteTahunAjaran($id)
    {
        $data   = TahunAjaran::findOrFail($id);
        return $this->deleteData($data, $id);
    }

    public function TahunActivation($id)
    {

        $tahun  = TahunAjaran::findOrFail($id);

        if ($tahun->status == 1) {
            $tahun->status  = 0;
            return $this->simpanData($tahun);
        }

        $check  = TahunAjaran::where('status', '1')->first();
        if ($check != null) {
            $data   = TahunAjaran::findOrFail($check->id);
            $data->status = 0;
            $data->save();
        }


        $tahun->status = 1;
        return $this->simpanData($tahun);
    }



    public function info_gelombang()
    {
        $page       = "Gelombang Pendaftaran PPDB";
        $data       = Gelombang::orderBy('id', 'desc')->get();
        $tahun      = TahunAjaran::orderBy('id', 'desc')->get();
        return view('backend.ppdb.gelombang', compact('page', 'data', 'tahun'));
    }

    public function gelombangBy($code)
    {
        $page       = "Gelombang Pendaftaran";
        $data       = Gelombang::where('tahun_ajaran_id', $code)->orderBy('id', 'desc')->get();
        return view('backend.ppdb.byTahun', compact('page', 'data'));
    }

    public function add_gelombang(Request $request)
    {
        $this->validate($request, [
            'tahun_ajaran_id'       => 'required',
            'nama_gelombang'        => 'required',
            'tanggal_akhir'         => 'required',
            'mulai_tanggal'         => 'required'
        ]);

        $gelombang                  = new Gelombang;
        $gelombang->tahun_ajaran_id = $request->tahun_ajaran_id;
        $gelombang->nama_gelombang  = $request->nama_gelombang;
        $gelombang->tanggal_akhir   = $request->tanggal_akhir;
        $gelombang->mulai_tanggal   = $request->mulai_tanggal;
        return $this->simpanData($gelombang);
    }

    public function update_gelombang(Request $request)
    {
        $this->validate($request, [
            'tahun_ajaran_id'       => 'required',
            'nama_gelombang'        => 'required',
            'tanggal_akhir'         => 'required',
            'mulai_tanggal'         => 'required'
        ]);

        $gelombang                  = Gelombang::findOrFail($request->id);
        $gelombang->tahun_ajaran_id = $request->tahun_ajaran_id;
        $gelombang->nama_gelombang  = $request->nama_gelombang;
        $gelombang->tanggal_akhir   = $request->tanggal_akhir;
        $gelombang->mulai_tanggal   = $request->mulai_tanggal;
        return $this->simpanData($gelombang);
    }

    public function deleteGelombang($id)
    {
        $data   = Gelombang::findOrFail($id);
        return $this->deleteData($data, $id);
    }

    public function customer_service()
    {
        $data       = CustomerService::all();
        $pengguna   = User::where('employee_id', '!=', null)->get();
        return view('backend.settings.cs', ['page' => 'Customer Service'], compact('data', 'pengguna'));
    }

    public function add_cs(Request $request)
    {
        $this->validate($request, [
            $this->activation_content()       => 'required|max:3',
            'phone'         => 'required|max:14',
            'sapaan'        => 'max:200'
        ]);

        $cs                 = new CustomerService;
        $cs->user_id        = $request->user_id;
        $cs->status         = 1;
        $cs->phone          = $request->phone;
        if ($request->sapaan) {
            $cs->sapaan     = $request->sapaan;
        }

        return $this->simpanData($cs);
    }

    public function update_cs(Request $request)
    {
        $this->validate($request, [
            $this->activation_content()       => 'required|max:3',
            'phone'         => 'required|max:14',
            'sapaan'        => 'max:200'
        ]);

        $cs                 = CustomerService::findOrFail($request->id);
        $cs->user_id        = $request->user_id;
        $cs->status         = 1;
        $cs->phone          = $request->phone;
        if ($request->sapaan) {
            $cs->sapaan     = $request->sapaan;
        }
        return $this->simpanData($cs);
    }

    public function delete_cs($id)
    {
        if (CustomerService::destroy($id)) {
            return back()->with(['flash' => 'Customer Service berhasil dihapus']);
        } else {
            return back()->with(['gagal' => 'Terjadi kesalahan yang tidak diketahui']);
        }
    }

    public function regByGelombang($id)
    {
        $data   = Gelombang::findOrFail(decrypt($id));
        return view('backend.ppdb.reg_gelombang', ['page' => 'Pendaftar By Gelombang'], compact('data'));
    }

    public function regOnline(Request $request)
    {
        $data   = Ppdb::orderBy('id', 'desc')->where('type', '1')->paginate(30);

        if ($request->start_date != null && $request->end_date != null || $request->tahun != null) {

            $this->validate($request, [
                'start_date'        => 'required',
                'end_date'          => 'required',
            ]);

            $data   = Ppdb::whereBetween('created_at', [
                $request->start_date . ' 00:00:00',
                $request->end_date . ' 23:59:59'
            ])->orderBy('id', $request->order)->where('type', '1')->paginate(30);
            $data->appends([
                'start_date'        => $request->start_date,
                'end_date'          => $request->end_date,
                'order'             => $request->order
            ]);

            if ($request->gelombang != null) {

                $data   = Ppdb::whereBetween('created_at', [
                    $request->start_date . ' 00:00:00',
                    $request->end_date . ' 23:59:59'
                ])->orderBy('id', $request->order)
                    ->where('type', '1')
                    ->where('gelombang_id', $request->gelombang)
                    ->paginate(30);
                $data->appends([
                    'start_date'        => $request->start_date,
                    'end_date'          => $request->end_date,
                    'tahun'             => $request->tahun,
                    'gelombang'         => $request->gelombang,
                    'order'             => $request->order,
                ]);
            }
        }
        $attribut   = [
            'tahun'     => TahunAjaran::orderBy('id', 'desc')->get(),
        ];
        return view('backend.ppdb.reg_online', ['page' => 'Pendaftar PPDB Online'], compact('data', 'attribut'));
    }

    public function gelombangChoose($id)
    {
        $data       = Gelombang::where('tahun_ajaran_id', $id)->get();
        $hasil      = "<option value=''> - Pilih Tahun - </option>";
        foreach ($data as $value) {
            $hasil .= "<option value='" . $value->id . "'> " . $value->nama_gelombang . " </option>";
        }
        return $hasil;
    }

    public function regOffline(Request $request)
    {
        $data   = Ppdb::orderBy('id', 'desc')->where('type', '2')->paginate(30);


        if ($request->start_date != null && $request->end_date != null || $request->tahun != null) {

            $this->validate($request, [
                'start_date'        => 'required',
                'end_date'          => 'required',
            ]);

            $data   = Ppdb::whereBetween('created_at', [
                $request->start_date . ' 00:00:00',
                $request->end_date . ' 23:59:59'
            ])->orderBy('id', $request->order)->where('type', '2')->paginate(30);
            $data->appends([
                'start_date'        => $request->start_date,
                'end_date'          => $request->end_date,
                'order'             => $request->order
            ]);

            if ($request->gelombang != null) {

                $data   = Ppdb::whereBetween('created_at', [
                    $request->start_date . ' 00:00:00',
                    $request->end_date . ' 23:59:59'
                ])->orderBy('id', $request->order)
                    ->where('type', '2')
                    ->where('gelombang_id', $request->gelombang)
                    ->paginate(30);
                $data->appends([
                    'start_date'        => $request->start_date,
                    'end_date'          => $request->end_date,
                    'tahun'             => $request->tahun,
                    'gelombang'         => $request->gelombang,
                    'order'             => $request->order,
                ]);
            }
        }
        $attribut   = [
            'tahun'     => TahunAjaran::orderBy('id', 'desc')->get(),
        ];
        return view('backend.ppdb.reg_offline', ['page' => 'Pendaftar PPDB Offline'], compact('data', 'attribut'));
    }

    public function regDiterima(Request $request)
    {
        $data   = Ppdb::orderBy('id', 'desc')->where('status', 'diterima')->paginate(30);


        if ($request->start_date != null && $request->end_date != null || $request->tahun != null) {

            $this->validate($request, [
                'start_date'        => 'required',
                'end_date'          => 'required',
            ]);

            $data   = Ppdb::whereBetween('created_at', [
                $request->start_date . ' 00:00:00',
                $request->end_date . ' 23:59:59'
            ])->orderBy('id', $request->order)->where('status', 'diterima')->paginate(30);
            $data->appends([
                'start_date'        => $request->start_date,
                'end_date'          => $request->end_date,
                'order'             => $request->order
            ]);

            if ($request->gelombang != null) {

                $data   = Ppdb::whereBetween('created_at', [
                    $request->start_date . ' 00:00:00',
                    $request->end_date . ' 23:59:59'
                ])->orderBy('id', $request->order)
                    ->where('type', '2')
                    ->where('gelombang_id', $request->gelombang)
                    ->paginate(30);
                $data->appends([
                    'start_date'        => $request->start_date,
                    'end_date'          => $request->end_date,
                    'tahun'             => $request->tahun,
                    'gelombang'         => $request->gelombang,
                    'order'             => $request->order,
                ]);
            }
        }
        $attribut   = [
            'tahun'     => TahunAjaran::orderBy('id', 'desc')->get(),
        ];
        return view('backend.ppdb.reg_terima', ['page' => 'Peserta Diterima'], compact('data', 'attribut'));
    }


    public function regPending()
    {
        $data   = Ppdb::orderBy('id', 'desc')->where('status', 'pending')->get();
        return view('backend.ppdb.reg_pending', ['page' => 'Peserta Pending'], compact('data'));
    }

    public  function tidakDiterima(Request $request)
    {
        $data   = Ppdb::orderBy('id', 'desc')->where('status', 'ditolak')->paginate(30);


        if ($request->start_date != null && $request->end_date != null || $request->tahun != null) {

            $this->validate($request, [
                'start_date'        => 'required',
                'end_date'          => 'required',
            ]);

            $data   = Ppdb::whereBetween('created_at', [
                $request->start_date . ' 00:00:00',
                $request->end_date . ' 23:59:59'
            ])->orderBy('id', $request->order)->where('status', 'ditolak')->paginate(30);
            $data->appends([
                'start_date'        => $request->start_date,
                'end_date'          => $request->end_date,
                'order'             => $request->order
            ]);

            if ($request->gelombang != null) {

                $data   = Ppdb::whereBetween('created_at', [
                    $request->start_date . ' 00:00:00',
                    $request->end_date . ' 23:59:59'
                ])->orderBy('id', $request->order)
                    ->where('type', '2')
                    ->where('gelombang_id', $request->gelombang)
                    ->paginate(30);
                $data->appends([
                    'start_date'        => $request->start_date,
                    'end_date'          => $request->end_date,
                    'tahun'             => $request->tahun,
                    'gelombang'         => $request->gelombang,
                    'order'             => $request->order,
                ]);
            }
        }
        $attribut   = [
            'tahun'     => TahunAjaran::orderBy('id', 'desc')->get(),
        ];
        return view('backend.ppdb.reg_tidaklulus', ['page' => 'Peserta Tidak Lulus'], compact('data', 'attribut'));
    }




    public function detailPpdb($id)
    {
        $data   = Ppdb::findOrFail(decrypt($id));
        return view('backend.ppdb.detail', ['page' => 'Detail Pendaftaran PPDB'], compact('data'));
    }

    public function cardPpdb($id)
    {
        $data       = Ppdb::findOrFail(decrypt($id));
        $sett       = SettWebsite::first();
        $setts      = SettPpdb::first();
        return view('user.ppdb.registration.card', ['page' => 'Kartu Pendaftaran Peserta PPDB'], compact('data', 'sett', 'setts'));
    }

    public function pdfCard($id)
    {
        $data       = Ppdb::where('id', decrypt($id))->first();
        $sett       = SettWebsite::first();
        return view('user.ppdb.registration.pdf', ['page' => 'Formulir Peserta PPDB'], compact('data', 'sett'));
    }

    public function addPpdb()
    {
        $data    = [
            'tahun' => TahunAjaran::orderBy('id', 'desc')->get(),
            'beasiswa' => Beasiswa::all(),
            'user'  => User::where('type_account', 'ppdb')->get(),
            'agama' => [
                'Islam'     => 'Islam',
                'Kristen'   => 'Kristen',
                'Katolik'   => 'Katolik',
                'Buddha'    => 'Buddha',
                'Hindu'     => 'Hindu',
                'Sunda Buhun / Wiwitan' => 'Sunda Buhun / Wiwitan',
                'Kapitayan' => 'Kapitayan',
                'Agama Kepercayaan' => 'Agama Kepercayaan'
            ],
            'kendaraan'     => [
                'Sepeda Motor'  => 'Sepeda Motor',
                'Sepeda'        => 'Sepeda',
                'Mobil Pribadi' => 'Mobil Pribadi',
                'Antar Jemput'  => 'Antar Jemput',
                'Transportasi Umum' => 'Transportasi Umum',
                'Jet Pribadi'   => 'Jet Pribadi',
                'Jalan Kaki'    => 'Jalan Kaki',
                'Lainnya'       => 'Lainnya'
            ],
            'pendidikan'    => [
                'PAUD'          => 'PAUD',
                'SD'            => 'SD',
                'SMP'           => 'SMP',
                'SMK'           => 'SMK',
                'D3'            => 'D3',
                'S1'            => 'S1',
                'S2'            => 'S2',
                'S3'            => 'S3'
            ]
        ];

        return view('backend.ppdb.add_ppdb', ['page' => 'Tambah PPDB'], compact('data'));
    }

    public function updatePpdb($id)
    {
        $data    = [
            'tahun' => TahunAjaran::orderBy('id', 'desc')->get(),
            'beasiswa' => Beasiswa::all(),
            'user'  => User::where('type_account', 'ppdb')->get(),
            'ini'   => Ppdb::findOrFail(decrypt($id)),
            'agama' => [
                'Islam'     => 'Islam',
                'Kristen'   => 'Kristen',
                'Katolik'   => 'Katolik',
                'Buddha'    => 'Buddha',
                'Hindu'     => 'Hindu',
                'Sunda Buhun / Wiwitan' => 'Sunda Buhun / Wiwitan',
                'Kapitayan' => 'Kapitayan',
                'Agama Kepercayaan' => 'Agama Kepercayaan'
            ],
            'kendaraan'     => [
                'Sepeda Motor'  => 'Sepeda Motor',
                'Sepeda'        => 'Sepeda',
                'Mobil Pribadi' => 'Mobil Pribadi',
                'Antar Jemput'  => 'Antar Jemput',
                'Transportasi Umum' => 'Transportasi Umum',
                'Jet Pribadi'   => 'Jet Pribadi',
                'Jalan Kaki'    => 'Jalan Kaki',
                'Lainnya'       => 'Lainnya'
            ],
            'pendidikan'    => [
                'PAUD'          => 'PAUD',
                'SD'            => 'SD',
                'SMP'           => 'SMP',
                'SMK'           => 'SMK',
                'D3'            => 'D3',
                'S1'            => 'S1',
                'S2'            => 'S2',
                'S3'            => 'S3'
            ]
        ];

        return view('backend.ppdb.update_ppdb', ['page' => 'Update PPDB'], compact('data'));
    }

    public function insert_ppdb(Request $request, $condition)
    {
        $this->validate($request, [
            'nama_lengkap'      => 'required|max:200',
            'jenis_kelamin'     => 'required|max:10',

            'tanggal_lahir'     => 'required',
            'tempat_lahir'      => 'required',
            'agama'             => 'required',
            'alamat_asal'       => 'required',
            'alamat_tinggal'    => 'required',
            'no_phone'          => 'required',
            'photo'             => 'mimes:jpg,jpeg,png',
            'akta_kelahiran'    => 'mimes:jpg,jpeg,png',
            'kartu_keluarga'    => 'mimes:jpg,jpeg,png',
            'kps_kks'           => 'mimes:jpg,jpeg,png',
            'ijazah_sekolah'    => 'mimes:jpg,jpeg,png',
            'gelombang'         => 'required'
        ]);


        if ($condition == 'create') {

            $this->validate($request, [
                'nik'               => 'required|max:100|unique:ppdbs,nik'
            ]);
            $ppdb                   = new Ppdb;
        }

        if ($condition == 'update') {
            $this->validate($request, [
                'nik'               => 'required|max:100'
            ]);
            $ppdb                   = Ppdb::findOrFail($request->id);
        }

        $ppdb->gelombang_id     = $request->gelombang;
        $ppdb->type             = '2';
        $ppdb->nama_lengkap     = $request->nama_lengkap;
        $ppdb->jenis_kelamin    = $request->jenis_kelamin;
        $ppdb->nik              = $request->nik;
        $ppdb->tanggal_lahir    = $request->tanggal_lahir;
        $ppdb->tempat_lahir     = $request->tempat_lahir;
        $ppdb->agama            = $request->agama;
        $ppdb->alamat_asal      = $request->alamat_asal;
        $ppdb->alamat_tinggal   = $request->alamat_tinggal;
        $ppdb->no_phone         = $request->no_phone;

        if ($request->no_kps) {
            $ppdb->no_kps       = $request->no_kps;
        }

        if ($request->user_id) {
            $ppdb->user_id      = $request->user_id;
           
        }

        if ($request->beasiswa) {
            $ppdb->beasiswa_id      = $request->beasiswa;
        }

        if ($request->transportasi_sekolah) {
            $ppdb->transportasi_sekolah = $request->transportasi_sekolah;
        }

        if ($request->nama_ayah) {
            $ppdb->nama_ayah            = $request->nama_ayah;
        }

        if ($request->nama_ibu) {
            $ppdb->nama_ibu             = $request->nama_ibu;
        }

        if ($request->tanggal_lahir_ayah) {
            $ppdb->tanggal_lahir_ayah   = $request->tanggal_lahir_ayah;
        }

        if ($request->tanggal_lahir_ibu) {
            $ppdb->tanggal_lahir_ibu    = $request->tanggal_lahir_ibu;
        }

        if ($request->pendidikan_ayah) {
            $ppdb->pendidikan_ayah      = $request->pendidikan_ayah;
        }

        if ($request->pendidikan_ibu) {
            $ppdb->pendidikan_ibu       = $request->pendidikan_ibu;
        }

        if ($request->pekerjaan_ayah) {
            $ppdb->pekerjaan_ayah       = $request->pekerjaan_ayah;
        }

        if ($request->pekerjaan_ibu) {
            $ppdb->pekerjaan_ibu        = $request->pekerjaan_ibu;
        }

        if ($request->alamat_tinggal_ortu) {
            $ppdb->alamat_tinggal_ortu  = $request->alamat_tinggal_ortu;
        }

        if ($request->penghasilan_ayah) {
            $ppdb->penghasilan_ayah     = $request->penghasilan_ayah;
        }

        if ($request->penghasilan_ibu) {
            $ppdb->penghasilan_ibu      = $request->penghasilan_ibu;
        }

        if ($request->keterangan_ayah) {
            $ppdb->keterangan_ayah      = $request->keterangan_ayah;
        }

        if ($request->keterangan_ibu) {
            $ppdb->keterangan_ibu       = $request->keterangan_ibu;
        }

        if ($request->tinggi_badan) {
            $ppdb->tinggi_badan         = $request->tinggi_badan;
        }

        if ($request->berat_badan) {
            $ppdb->berat_badan          = $request->berat_badan;
        }

        if ($request->jakar_kesekolah) {
            $ppdb->jakar_kesekolah      = $request->jakar_kesekolah;
        }

        if ($request->anak_ke) {
            $ppdb->anak_ke              = $request->anak_ke;
        }

        if ($request->jumlah_saudara) {
            $ppdb->jumlah_saudara       = $request->jumlah_saudara;
        }

        if ($request->hasFile('photo')) {
            $ppdb->photo = $request->file('photo')->store('uploads/ppdb/document/');
        }

        if ($request->hasFile('akta_kelahiran')) {
            $ppdb->akta_kelahiran = $request->file('akta_kelahiran')->store('uploads/ppdb/document/');
        }

        if ($request->hasFile('kartu_keluarga')) {
            $ppdb->kartu_keluarga = $request->file('kartu_keluarga')->store('uploads/ppdb/document/');
        }

        if ($request->hasFile('kps_kks')) {
            $ppdb->kps_kks = $request->file('kps_kks')->store('uploads/ppdb/document/');
        }

        if ($request->hasFile('ijazah_sekolah')) {
            $ppdb->kps_kks = $request->file('ijazah_sekolah')->store('uploads/ppdb/document/');
        }

        if ($request->alasan_memilik_sekolah) {
            $ppdb->alasan_memilik_sekolah   = $request->alasan_memilik_sekolah;
        }

        if ($request->hal_diketahui) {
            $ppdb->hal_diketahui           = $request->hal_diketahui;
        }

        $ppdb->status                   =   'pending';
        $ppdb->save();
        if ($condition == 'create') {
            if ($request->user_id) {
                $pengguna               = User::findOrFail($request->user_id);
                $mailing                = SettMail::first();
                $general                = SettGeneral::first();
                Mail::to($pengguna->email)->send(new PpdbAdmin($ppdb, $mailing, $general));
                
            }
        }
        $request->user_id ? Pemberitahuan::sendHasil($ppdb, $request->user_id, 'registrasi_ppdb') : '';
        return back()->with(['flash' => 'Berhasil disimpan']);
    }

    public function deletePpdb($id)
    {
        $data   = Ppdb::findOrFail(decrypt($id));
        return $this->deleteData($data, decrypt($id));
    }

    public function ppdbAction($param1, $param2)
    {

        $data = Ppdb::findOrFail(decrypt($param2));
        if ($param1 == 'pilih') {
            $data->status = 'diterima';

            $mailing                = SettMail::first();
            if ($mailing->penerimaan == '1' && $data->user_id != null) {
                $general                = SettGeneral::first();
                Mail::to($data->pendaftar->email)->send(new PpdbTerima($data, $mailing, $general));
                
            }
            $data->user_id != null ? Pemberitahuan::sendHasil($data, $data->user_id, 'penerimaan') : '';
            return $this->simpanData($data);
        }

        if ($param1 == 'tolak') {
            $data->status = 'ditolak';

            $mailing                = SettMail::first();
            if ($mailing->penolakan == '1' && $data->user_id != null) {
                $general                = SettGeneral::first();
                Mail::to($data->pendaftar->email)->send(new PpdbTolak($data, $mailing, $general));
                
            }
            $data->user_id != null ? Pemberitahuan::sendHasil($data, $data->user_id, 'penolakan') : '';
            return $this->simpanData($data);
        }
    }

    public function mading()
    {
        $data   = MadingBoard::orderBy('id', 'desc')->paginate(20);
        return view('backend.ppdb.mading', ['page' => 'PPDB Mading'], compact('data'));
    }

    public function createMading(Request $request, $condition)
    {
        $this->validate($request, [
            'title'     => 'required',
            'label'     => 'required',
            'description' => 'required'
        ]);

        if ($condition == 'create') {
            $data       = new MadingBoard;
        }

        if ($condition == 'update') {
            $data       = MadingBoard::findOrFail($request->id);
        }

        $data->user_id = Auth()->user()->id;
        $data->label    = $request->label;
        $data->status   = '1';
        $data->title    = $request->title;
        $data->description = $request->description;
        return $this->simpanData($data);
    }

    public function deleteMading($id)
    {
        if (MadingBoard::destroy(decrypt($id))) {
            return back()->with(['flash' => 'Berhasil dihapus']);
        } else {
            return back()->with(['gagal' => 'Terjadi kesalahan tidak diketahui']);
        }
    }

    public function forum()
    {
        $data   = Forum::orderBy('id', 'desc')->paginate(20);
        return view('backend.ppdb.forum', ['page' => 'Forum PPDB Sekolah'], compact('data'));
    }

    public function forumDetail($id)
    {
        $data   = Forum::findOrFail(decrypt($id));
        return view('backend.ppdb.detailForum', ['page' => 'Detail Forum PPDB Sekolah'], compact('data'));
    }

    public function replyForum(Request $request)
    {
        $this->validate($request, [
            'forum_id'      => 'required',
            'description'   => 'required',
        ]);

        $data               = new ReplyForum;
        $data->user_id      = Auth()->user()->id;
        $data->forum_id     = $request->forum_id;
        $data->description  = $request->description;
        return $this->simpanData($data);
    }

    public function deleteForum($id)
    {
        $data   = Forum::findOrFail(decrypt($id));
        return $this->deleteData($data, decrypt($id));
    }

    public function deleteReply($id)
    {
        if (ReplyForum::destroy(decrypt($id))) {
            return back()->with(['flash' => 'Berhasil dihapus']);
        } else {
            return back()->with(['gagal' => 'Terjadi kesalahan tidak diketahui']);
        }
    }
}
