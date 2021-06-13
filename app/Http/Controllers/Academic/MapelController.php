<?php

namespace App\Http\Controllers\Academic;

use App\Academik\Extrakulikuler;
use App\Http\Controllers\Controller;
use App\Mapel;
use App\Teacher;
use Illuminate\Http\Request;

class MapelController extends Controller
{
    public function admin_mapel()
    {
        $page       = "Data Mata Pelajaran";
        $data       = Mapel::where($this->activation_content(), '1')->paginate(10);
        $teac       = Teacher::all();
        return view('backend.academic.mapel', compact('page', 'data', 'teac'));
    }

    public function insert_mapel(Request $request)
    {
        $this->validate($request, [
            'mapel_code'        => 'required',
            'mapel_name'        => 'required',
            'teacher_id'        => 'required',
            'mapel_image'       => 'mimes:jpg,jpeg,png'
        ]);

        $mapel                  = new Mapel;
        $mapel->mapel_code      = $request->mapel_code;
        $mapel->mapel_name      = $request->mapel_name;
        $mapel->teacher_id      = $request->teacher_id;
        $mapel->featured        = $request->featured;
        $mapel->status          = $request->status;

        if ($request->hasFile('mapel_image')) {
            $mapel->mapel_image = $request->file('mapel_image')->store('uploads/academic/mapel');
        }

        if ($mapel->save()) {
            return back()->with(['flash' => 'Data berhasil disimpan']);
        } else {
            return back()->with(['gagal' => 'Terjadi kesalahan']);
        }
    }

    public function update_mapel(Request $request)
    {
        $this->validate($request, [
            'mapel_code'        => 'required',
            'mapel_name'        => 'required',
            'teacher_id'        => 'required',
            'mapel_image'       => 'mimes:jpg,jpeg,png'
        ]);

        $mapel                  = Mapel::findOrFail($request->id);
        $mapel->mapel_code      = $request->mapel_code;
        $mapel->mapel_name      = $request->mapel_name;
        $mapel->teacher_id      = $request->teacher_id;
        $mapel->featured        = $request->featured;
        $mapel->status          = $request->status;

        if ($request->hasFile('mapel_image')) {
            $mapel->mapel_image = $request->file('mapel_image')->store('uploads/academic/mapel');
        } else {
            $mapel->mapel_image = $mapel->mapel_image;
        }

        if ($mapel->save()) {
            return back()->with(['flash' => 'Data berhasil disimpan']);
        } else {
            return back()->with(['gagal' => 'Terjadi kesalahan']);
        }
    }

    public function soft_delete($id)
    {
        $mapel          = Mapel::findOrFail($id);
        $mapel->status  = 0;
        if ($mapel->save()) {
            return back()->with(['flash' => 'Data berhasil dihapus']);
        } else {
            return back()->with(['gagal' => 'Terjadi kesalahan']);
        }
    }

    public function admin_extra()
    {
        $page       = "Data Extrakulikuler";
        $data       = Extrakulikuler::all();
        return view('backend.academic.extra', compact('page', 'data'));
    }

    public function addExtra()
    {
        $page       = "Tambah Extrakulikuler";
        $data       = Teacher::all();
        return view('backend.academic.addExtra', compact('page', 'data'));
    }

    public function updateExtra($id)
    {
        $page       = "Update Extrakulikuler";
        $data       = Teacher::all();
        $update     = Extrakulikuler::where('id', $id)->first();
        return view('backend.academic.updateExtra', compact('page', 'data', 'update'));
    }

    public function insert_extra(Request $request)
    {
        $this->validate($request, [
            'teacher_id'        => 'required',
            'extra_name'        => 'required',
            'extra_image'       => 'mimes:jpg,jpeg,png'
        ]);

        $extra                  = new Extrakulikuler;
        $extra->teacher_id      = $request->teacher_id;
        $extra->status          = $request->status;
        $extra->extra_name      = $request->extra_name;
        if ($request->extra_note) {
            $extra->extra_note  = $request->extra_note;
        }

        if ($request->hasFile('extra_image')) {
            $extra->extra_image = $request->file('extra_image')->store('uploads/academic/extra');
        }
        if ($extra->save()) {
            return back()->with(['flash' => 'Data Extrakulikuler berhasi ditambahkan']);
        } else {
            return back()->with(['gagal' => 'Terjadi kesalahan']);
        }
    }

    public function update_extra(Request $request)
    {
        $this->validate($request, [
            'teacher_id'        => 'required',
            'extra_name'        => 'required',
            'extra_image'       => 'mimes:jpg,jpeg,png'
        ]);

        $extra                  = Extrakulikuler::findOrFail($request->id);
        $extra->teacher_id      = $request->teacher_id;
        $extra->status          = $request->status;
        $extra->extra_name      = $request->extra_name;
        if ($request->extra_note) {
            $extra->extra_note  = $request->extra_note;
        }

        if ($request->hasFile('extra_image')) {
            $extra->extra_image = $request->file('extra_image')->store('uploads/academic/extra');
        } else {
            $extra->extra_image = $request->extra_image;
        }
        if ($extra->save()) {
            return back()->with(['flash' => 'Data Extrakulikuler berhasi ditambahkan']);
        } else {
            return back()->with(['gagal' => 'Terjadi kesalahan']);
        }
    }

    public function extra_delete($id)
    {
        $extra = Extrakulikuler::findOrFail($id);
        if (Extrakulikuler::destroy($id)) {
            return back()->with(['flash' => 'Data berhasil dihapus']);
        } else {
            return back()->with(['gagal' => 'terjadi kesalahan tidak diketahui']);
        }
    }

    
}
