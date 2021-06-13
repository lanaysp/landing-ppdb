<?php

namespace App\Http\Controllers\Teacher;

use App\Employee;
use App\Http\Controllers\Controller;
use App\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function admin_list()
    { 
        $page       = "Data Guru Sekolah";
        $data       = Teacher::orderBy('id', 'desc')->where('teacher_status', '1')->paginate(20);
        return view('backend.master.teacher', compact('page', 'data'));
    }

    public function add_teacher()
    {
        $page       = "Tambah Guru sekolah";
        $empl       = Employee::all();
        return view('backend.master.add_teacher', compact('page', 'empl'));
    }

    public function insert_teacher(Request $request)
    {
        $this->validate($request, [
            'employee_id'       => 'required',
            'teacher_mode'      => 'required',
            'email'             => 'required',
            'password'          => 'required',
            'teacher_image'     => 'mimes:jpg,jpeg,png'
        ]);

        $teacher                = new Teacher;
        $teacher->employee_id   = $request->employee_id;
        $teacher->email         = $request->email;
        $teacher->password      = bcrypt($request->password);
        $teacher->teacher_mode  = $request->teacher_mode;
        $teacher->teacher_status    = 1;
        if ($request->teacher_experience) {
            $teacher->teacher_experience    = $request->teacher_experience;
        }

        if ($request->teacher_about) {
            $teacher->teacher_about     = $request->teacher_about;
        }

        if ($request->qualification) {
            $teacher->qualification     = $request->qualification;
        }

        if ($request->hasFile('teacher_image')) {
            $teacher->teacher_image = $request->file('teacher_image')->store('uploads/guru/');
        }

        if ($request->hasFile('document_resume')) {
            $teacher->document_resume = $request->file('document_resume')->store('uploads/guru/');
        }

        if ($teacher->save()) {
            return back()->with(['flash' => 'Data Guru berhasil di ditambahkan']);
        } else {
            return back()->with(['gagal' => 'terjadi kesalahan tidak diketahui']);
        }
    }

    public function update_teacher($id)
    {
        $page       = "Edit Data Guru";
        $empl       = Employee::all();
        $data       = Teacher::where('id', $id)->first();
        return view('backend.master.update_teacher', compact('page', 'data', 'empl'));
    }

    public function edit_teacher(Request $request)
    {
        $this->validate($request, [
            'employee_id'       => 'required',
            'teacher_mode'      => 'required',
            'email'             => 'required',
            'password'          => 'required',
            'teacher_image'     => 'mimes:jpg,jpeg,png'
        ]);

        $teacher                = Teacher::findOrFail($request->id);
        $teacher->employee_id   = $request->employee_id;
        $teacher->email         = $request->email;
        $teacher->password      = bcrypt($request->password);
        $teacher->teacher_mode  = $request->teacher_mode;
        $teacher->teacher_status    = 1;
        if ($request->teacher_experience) {
            $teacher->teacher_experience    = $request->teacher_experience;
        }

        if ($request->teacher_about) {
            $teacher->teacher_about     = $request->teacher_about;
        }

        if ($request->qualification) {
            $teacher->qualification     = $request->qualification;
        }

        if ($request->hasFile('teacher_image')) {
            $teacher->teacher_image = $request->file('teacher_image')->store('uploads/guru/');
        } else {
            $teacher->teacher_image = $teacher->teacher_image;
        }

        if ($request->hasFile('document_resume')) {
            $teacher->document_resume = $request->file('document_resume')->store('uploads/guru/');
        } else {
            $teacher->document_resume =  $teacher->document_resume;
        }

        if ($teacher->save()) {
            return back()->with(['flash' => 'Data Guru berhasil di ditambahkan']);
        } else {
            return back()->with(['gagal' => 'terjadi kesalahan tidak diketahui']);
        }
    }

    public function soft_delete($id)
    {
        $teacher                   = Teacher::findOrFail($id);
        $teacher->teacher_status   = 0;
        if ($teacher->save()) {
            return back()->with(['flash' => 'Data Guru berhasil di arshipkan']);
        } else {
            return back()->with(['gagal' => 'terjadi kesalahan tidak diketahui']);
        }
    }
}
