<?php

namespace App\Http\Controllers;

use App\Admin\Pengumuman;
use App\Admin\SettGeneral;
use App\Ppdb\Beasiswa;
use App\Ppdb\Guide;
use App\Ppdb\OtherInfo;
use App\Ppdb\Ppdb;
use App\Ppdb\TahunAjaran;
use App\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
// use Illuminate\Foundation\Auth\Activity;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // Authentic

    public function setVerify()
    {
        $sett       = SettGeneral::first();
        if ($sett->must_verify == '1') {
            return $this->middleware(['ppdb', 'verified']);
        } else {
            return $this->middleware('ppdb');
        }
    }
    public function masuk()
    {
        return view('backend.page.login', ['page' => 'Login Sebagai Admin']);
    }

    // Announcement
    public function announcement()
    {
        $data   = Pengumuman::orderBy('id', 'desc')->paginate(20);
        return view('backend.announcement.index', ['page' => 'Pengumuman Sekolah'], compact('data'));
    }

    public function add_announcement()
    {
        return view('backend.announcement.add', ['page' => 'Tambah Pengumuman']);
    }


    // Attribut
    public function activation_content()
    {
        return 'status';
    }

    public  function author_publishing()
    {
        return 'user_id';
    }

    public function content_title()
    {
        return 'title';
    }

    // PPDB Page
    public function petunjuk()
    {
        $data   = Guide::where('type', 'ppdb')->paginate(10);
        return view('backend.ppdb.guide', ['page' => 'Petunjuk Pendaftaran'], compact('data'));
    }

    public function detail_petunjuk($id)
    {
        $data   = Guide::where('id', $id)->first();
        return view('backend.ppdb.detail_guide', ['page' => 'Detail Petunjuk Pendaftaran'], compact('data'));
    }

    public function daftar_beasiswa(Request $request)
    {
        $data   = Beasiswa::orderBy('id', 'DESC')->paginate(10);
        if ($request->search != null) {
            $data   = Beasiswa::where('title', 'like', '%' . $request->search . '%')->orderBy('id', 'DESC')->paginate(10);
        }
        return view('backend.ppdb.beasiswa', ['page' => 'Daftar Beasiswa'], compact('data'));
    }

    public function tambah_beasiswa()
    {
        $data   = TahunAjaran::orderBy('id', 'desc')->get();
        return view('backend.ppdb.add_beasiswa', ['page' => 'Tambah Beasiswa'], compact('data'));
    }

    public function edit_beasiswa($id)
    {
        $data   = Beasiswa::where('id', $id)->first();
        $tahun   = TahunAjaran::orderBy('id', 'desc')->get();
        return view('backend.ppdb.update_beasiswa', ['page' => 'Edit Beasiswa'], compact('data', 'tahun'));
    }

    public function info_lainnya()
    {
        $data   = OtherInfo::orderBy('id', 'desc')->paginate(10);
        return view('backend.ppdb.other_info', ['page' => 'Info Lainnya'], compact('data'));
    }

    public function detail_info($id)
    {
        $data   = OtherInfo::where('id', $id)->first();
        return view('backend.ppdb.detail_info', ['page' => 'Detail Info Detail'], compact('data'));
    }

    public function tambah_info_lainnya()
    {
        $data   = OtherInfo::orderBy('id', 'desc')->get();
        return view('backend.ppdb.add_other', ['page' => 'Tambah Info Lainnya'], compact('data'));
    }

    public function update_other_info($id)
    {
        $data   = OtherInfo::where('id', $id)->first();
        return view('backend.ppdb.update_other', ['page' => 'Edit Info Lainnya'], compact('data'));
    }

    public function ubah_password(Request $request)
    {
        $this->validate($request, [
            'password'      => 'required|min:6|max:12',
            'confirm' => 'required|min:6|max:12'
        ]);

        if ($request->password != $request->confirm) {
            return back()->with(['gagal' => 'Konfirmasi Password Harus sama']);
        }

        $account                = User::findOrFail(Auth()->user()->id);
        // $this->createActivity(Activity::passAct(), Auth()->user()->id, '3');
        $account->password      = bcrypt($request->password);
        return $this->simpanData($account);
    }

    public function simpanData($data)
    {
        if ($data->save()) {
            return back()->with(['flash' => 'Berhasil']);
        } else {
            return back()->with(['flash' => 'Terjadi kesalahan']);
        }
    }

    public function uploadImage(Request $request, $name, $path)
    {
        if ($request->hasFile($name)) {
            return $request->file($name)->store('uploads/' . $path . '/');
        }
    }

    public function deleteData($data, $id)
    {
        if ($data->delete($id)) {
            return back()->with(['flash' => 'Berhasil']);
        } else {
            return back()->with(['gagal' => 'Terjadi kesalahan']);
        }
    }

    // public function activityUser($condition, $identity)
    // {
    //     if ($condition == Activity::profileAct()) {
    //         $data   = User::findOrFail(Auth()->user()->id);
    //         return $this->profileActivity($data);
    //     }

    //     if ($condition == Activity::descAct()) {
    //         $data   = User::findOrFail(Auth()->user()->id);
    //         return $this->descripsiActivity($data);
    //     }

    //     if ($condition == Activity::passAct()) {
    //         $data   = User::findOrFail(Auth()->user()->id);
    //         return $this->passwordActivity($data);
    //     }

    //     if ($condition == Activity::themeAct()) {
    //         $data   = User::findOrFail(Auth()->user()->id);
    //         return $this->themeActivity($data);
    //     }

    //     if ($condition == Activity::regPpdb()) {
    //         return $this->ppdbRegActivity();
    //     }

    //     if ($condition == Activity::madingAct()) {
    //         return $this->madingActivity();
    //     }

    //     if ($condition == Activity::addForumAct()) {
    //         return $this->addForumActivity();
    //     }

    //     if ($condition == Activity::addReplyAct()) {
    //         return $this->addReplyActivity();
    //     }
    // }
}
