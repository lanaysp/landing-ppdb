<?php

namespace App\Http\Controllers;

use App\Department;
use App\Designation;
use App\Employee;
use App\EmployeeAbout;
use App\EmployeeEducation;
use App\EmployeeExperience;
use App\EmployeeGallery;
use App\EmployeeSkill;
use App\EmployeeSosmed;
use App\Fasilitas;
use App\Gallery;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class MasterController extends Controller
{
    public function department()
    {
        $page           = "Department";
        $data           = Department::all();
        return view('backend.master.department', compact('data', 'page'));
    }

    public function insertDepartment(Request $request)
    {

        $this->validate($request, [
            'department_name'   => 'required',
        ]);

        $department = new Department;
        $department->department_name    = $request->department_name;
        $department->pemilik_id         = '1';

        $department->save();
        return back()->with(['flash' => 'Penambahan Department Berhasil']);
    }

    public function updateDepartment(Request $request)
    {
        $this->validate($request, [
            'department_name'   => 'required',
        ]);

        $department = Department::findOrFail($request->id);
        $department->department_name    = $request->department_name;

        $department->save();
        return back()->with(['flash' => 'Perubahan Department Berhasil']);
    }

    public function deleteDepartment($id)
    {
        $department = Department::findOrFail($id);

        $chek = Department::where('id', $id)->first();
        if (count($chek->Designation) == 0) {
            Department::destroy($id);
            return back()->with(['flash' => 'Department Berhasil dihapus']);
        } else {
            return back()->with(['gagal' => 'Maaf, Data ini tidak dapat dihapus karena masih memiliki data turunan']);
        }
    }

    public function designation()
    {
        $page   = "Designation";
        $part   = Department::all();
        $data   = Designation::all();
        return view('backend.master.designation', compact('page', 'part', 'data'));
    }

    public function insertDesignation(Request $request)
    {
        $this->validate($request, [
            'department_id' => 'required',
            'designation_name'  => 'required',
        ]);

        $designation = new Designation;
        $designation->designation_name  = $request->designation_name;
        $designation->department_id     = $request->department_id;
        $designation->save();
        return back()->with(['flash' => 'Penambahan Designation Berhasil']);
    }

    public function updateDesignation(Request $request)
    {
        $this->validate($request, [
            'department_id' => 'required',
            'designation_name'  => 'required',
        ]);

        $designation = Designation::findOrFail($request->id);
        $designation->designation_name  = $request->designation_name;
        $designation->department_id     = $request->department_id;
        $designation->save();
        return back()->with(['flash' => 'Perubahan Designation Berhasil']);
    }

    public function deleteDesignation($id)
    {
        $designation = Designation::findOrFail($id);
        $check = Designation::where('id', $id)->first();
        if (count($check->Employee) == 0) {
            Designation::destroy($id);
            return back()->with(['flash' => 'Designation Berhasil Dihapus']);
        } else {
            return back()->with(['gagal' => 'Maaf, Data ini tidak dapat dihapus karena masih memiliki data turunan']);
        }
    }

    public function employee()
    {
        $page           = "List Pegawai";
        $data           = Employee::orderBy('first_name', 'desc')->get();
      
        return view('backend.master.employee', compact('page', 'data'));
    }

    public function employeeBy($id)
    {
        $page           = "List Pegawai Berdasarkan Designation";
        $data           = Employee::where('designation_id', $id)->orderBy('first_name', 'desc')->get();
        return view('backend.master.employeeby', compact('page', 'data'));
    }

    public function addPegawai()
    {
        $page           = "Tambah Pegawai";
        $part           = Designation::all();
        $dual           = Department::all();
        return view('backend.master.addemployee', compact('page', 'part', 'dual'));
    }

    public function choosedesignation($id)
    { 
        $designation = Designation::where('department_id', $id)->get();
        // HTML tag option for view in employee page
        $data = "<option value=''> - Choose Designation - </option>";
        foreach ($designation as $value) {
            $data .= "<option value='" . $value->id . "'> " . $value->designation_name . " </option>";
        }
        return $data;
    }

    public function editEmployee($id)
    {
        $page           = "Update Pegawai";
        $part           = Designation::all();
        $dual           = Department::all();
        $data           = Employee::where('id', $id)->first();
        return view('backend.master.editemployee', compact('page', 'part', 'dual', 'data'));
    }

    public function insertEmployee(Request $request)
    {
        $this->validate($request, [
            'first_name'        => 'required',
            'salary'            => 'required',
            'ktp'               => 'mimes:jpg,jpeg,png',
            'ponsel'            => 'required',
            'jk'                => 'required',
            'username'          => 'required',
            'nik'               => 'required',
            'kk'                => 'required',
            'photo'             => 'mimes:jpg,jpeg,png',
            'designation_id'    => 'required',
        ]);

        $employee               = new Employee;
        $employee->first_name   = $request->first_name;
        $employee->salary       = $request->salary;
        $employee->ponsel       = $request->ponsel;
        $employee->username     = $request->username;
        $employee->designation_id   = $request->designation_id;
        $employee->nik          = $request->nik;
        $employee->kk           = $request->kk;
        $employee->jk           = $request->jk;

        if ($request->last_name) {
            $employee->last_name    = $request->last_name;
        }

        if ($request->ttl) {
            $employee->ttl          = $request->ttl;
        }

        if ($request->alamat) {
            $employee->alamat       = $request->alamat;
        }

        if ($request->middle_name) {
            $employee->middle_name  = $request->middle_name;
        }

        if ($request->hasFile('ktp')) {
            $employee->ktp = $request->file('ktp')->store('uploads/document/');
        }

        if ($request->hasFile('photo')) {
            $employee->photo = $request->file('photo')->store('uploads/pegawai/');
        }

        $q1 = Employee::where('ponsel', $request->ponsel)->get();
        $q2 = Employee::where('nik', $request->nik)->get();
        if (count($q1) == 0) {
            if (count($q2) == 0) {
                $employee->save();
                return back()->with(['flash' => 'Penambahan Data Pegawai Berhasil Dilakukan']);
            } else {
                return Redirect::back()->with(['gagal' => 'Maaf, Nik Yang Anda Masukkan Sudah ada yang menggunakan']);
            }
        } else {
            return Redirect::back()->with(['gagal' => 'Maaf, Nomor Ponsel ini sudah ada yang menggunakan']);
        }
    }

    public function updateEmployee(Request $request)
    {
        $this->validate($request, [
            'first_name'        => 'required',
            'salary'            => 'required',
            'ktp'               => 'mimes:jpg,jpeg,png',
            'ponsel'            => 'required',
            'jk'                => 'required',
            'username'          => 'required',
            'nik'               => 'required',
            'kk'                => 'required',
            'photo'             => 'mimes:jpg,jpeg,png',
            'designation_id'    => 'required',
        ]);

        $employee               = Employee::findOrFail($request->id);
        $employee->first_name   = $request->first_name;
        $employee->salary       = $request->salary;
        $employee->ponsel       = $request->ponsel;
        $employee->username     = $request->username;
        $employee->designation_id   = $request->designation_id;
        $employee->nik          = $request->nik;
        $employee->kk           = $request->kk;
        $employee->jk           = $request->jk;

        if ($request->last_name) {
            $employee->last_name    = $request->last_name;
        }

        if ($request->ttl) {
            $employee->ttl          = $request->ttl;
        }

        if ($request->alamat) {
            $employee->alamat       = $request->alamat;
        }

        if ($request->middle_name) {
            $employee->middle_name  = $request->middle_name;
        }

        $data       = Employee::where('id', $request->id)->first();
        if ($request->hasFile('ktp')) {
            $employee->ktp = $request->file('ktp')->store('uploads/document/');
        } else {
            $employee->ktp = $data->ktp;
        }

        if ($request->hasFile('photo')) {
            $employee->photo = $request->file('photo')->store('uploads/pegawai/');
        } else {
            $employee->photo = $data->photo;
        }

        $employee->save();
        return back()->with(['flash' => 'Penambahan Data Pegawai Berhasil Dilakukan']);
    }

    public function employeeDetail($id, $any)
    {
        $page       = "Detail Pegawai";
        $data       = Employee::where('id', $id)->first();
        return view('backend.master.detailEmployee', compact('page', 'data'));
    }

    public function crudEmployeeDetail(Request $request, $param1 = '', $param2 = '')
    {
        if ($param1 == 'insertSosmed') {
            $this->validate($request, [
                'nama_sosmed'       => 'required',
                'link_url'          => 'required',
            ]);

            $sosmed                     = new EmployeeSosmed;
            $sosmed->employee_id        = $request->employee_id;
            $sosmed->nama_sosmed        = $request->nama_sosmed;
            $sosmed->link_url           = $request->link_url;
            $sosmed->save();
            return redirect($_SERVER['HTTP_REFERER'])->with(['flash' => 'Social Media Berhasil ditambahkan']);
        }

        if ($param1 == 'updateSosmed') {
            $this->validate($request, [
                'nama_sosmed'       => 'required',
                'link_url'          => 'required',
            ]);

            $sosmed                     = EmployeeSosmed::findOrFail($request->id);
            $sosmed->nama_sosmed        = $request->nama_sosmed;
            $sosmed->link_url           = $request->link_url;
            $sosmed->save();
            return redirect($_SERVER['HTTP_REFERER'])->with(['flash' => 'Social Media Berhasil diperbaharui']);
        }

        if ($param1 == 'deleteSosmed') {
            $data   = EmployeeSosmed::findOrFail($param2);
            EmployeeSosmed::destroy($param2);
            return redirect($_SERVER['HTTP_REFERER'])->with(['flash' => 'Social Media Berhasil dihapus']);
        }

        if ($param1 == 'insertSkill') {
            $this->validate($request, [
                'skill_name'        => 'required',
                'persentase'        => 'required',
            ]);

            $skill                  = new EmployeeSkill;
            $skill->employee_id     = $request->employee_id;
            $skill->skill_name      = $request->skill_name;
            $skill->persentase      = $request->persentase;
            $skill->save();
            return redirect($_SERVER['HTTP_REFERER'])->with(['flash' => 'Skill Berhasil ditambahkan']);
        }

        if ($param1 == 'updateSkill') {
            $this->validate($request, [
                'skill_name'        => 'required',
                'persentase'        => 'required',
            ]);

            $skill                  = EmployeeSkill::findOrFail($request->id);
            $skill->skill_name      = $request->skill_name;
            $skill->persentase      = $request->persentase;
            $skill->save();
            return redirect($_SERVER['HTTP_REFERER'])->with(['flash' => 'Skill Berhasil diperbaharui']);
        }

        if ($param1 == 'deleteSkill') {
            EmployeeSkill::findOrFail($param2);
            EmployeeSkill::destroy($param2);
            return redirect($_SERVER['HTTP_REFERER'])->with(['flash' => 'Skill Berhasil dihapus']);
        }

        if ($param1 == 'updateAbout') {
            $this->validate($request, [
                'description'       => 'required'
            ]);

            $about                  = EmployeeAbout::findOrFail($request->id);
            $about->description     = $request->description;
            $about->save();
            return redirect($_SERVER['HTTP_REFERER'])->with(['flash' => 'Data Berhasil Diperbaharui']);
        }

        if ($param1 == 'insertAbout') {
            $this->validate($request, [
                'description'       => 'required'
            ]);

            $about                  = new EmployeeAbout;
            $about->description     = $request->description;
            $about->employee_id     = $request->employee_id;
            $about->save();
            return redirect($_SERVER['HTTP_REFERER'])->with(['flash' => 'Data Berhasil Ditambahkan']);
        }

        if ($param1 == 'insertEducation') {
            $this->validate($request, [
                'school_name'       => 'required',
            ]);

            $education              = new EmployeeEducation;
            $education->school_name = $request->school_name;
            $education->employee_id = $request->employee_id;
            if ($request->tahun_masuk) {
                $education->tahun_masuk = $request->tahun_masuk;
            }

            if ($request->tahun_lulus) {
                $education->tahun_lulus = $request->tahun_lulus;
            }

            if ($request->keterangan) {
                $education->keterangan  = $request->keterangan;
            }

            $education->save();
            return redirect($_SERVER['HTTP_REFERER'])->with(['flash' => 'Data Berhasil Ditambahkan']);
        }

        if ($param1 == 'updateEducation') {
            $this->validate($request, [
                'school_name'       => 'required',
            ]);

            $education              = EmployeeEducation::findOrFail($request->id);
            $education->school_name = $request->school_name;
            if ($request->tahun_masuk) {
                $education->tahun_masuk = $request->tahun_masuk;
            }

            if ($request->tahun_lulus) {
                $education->tahun_lulus = $request->tahun_lulus;
            }

            if ($request->keterangan) {
                $education->keterangan  = $request->keterangan;
            }

            $education->save();
            return redirect($_SERVER['HTTP_REFERER'])->with(['flash' => 'Data Berhasil Diperbaharui']);
        }

        if ($param1 == 'deleteEducation') {
            EmployeeEducation::destroy($param2);
            return redirect($_SERVER['HTTP_REFERER'])->with(['flash' => 'Data Berhasil Dihapus']);
        }

        if ($param1 == 'insertExperience') {
            $this->validate($request, [
                'date'      => 'required',
                'place'     => 'required',
            ]);

            $experience         = new EmployeeExperience;
            $experience->employee_id        = $request->employee_id;
            $experience->date               = $request->date;
            $experience->place              = $request->place;

            if ($request->detail) {
                $experience->detail         = $request->detail;
            }

            $experience->save();
            return redirect($_SERVER['HTTP_REFERER'])->with(['flash' => 'Data Berhasil ditambahkan']);
        }

        if ($param1 == 'updateExperience') {
            $this->validate($request, [
                'date'      => 'required',
                'place'     => 'required',
            ]);

            $experience         = EmployeeExperience::findOrFail($request->id);
            $experience->date               = $request->date;
            $experience->place              = $request->place;

            if ($request->detail) {
                $experience->detail         = $request->detail;
            }

            $experience->save();
            return redirect($_SERVER['HTTP_REFERER'])->with(['flash' => 'Data Berhasil diperbaharui']);
        }

        if ($param1 == 'deleteExperience') {
            EmployeeExperience::destroy($param2);
            return redirect($_SERVER['HTTP_REFERER'])->with(['flash' => 'Data Berhasil dihapus']);
        }

        if ($param1 == 'insertGallery') {
            $this->validate($request, [
                'employee_id'       => 'required',
                'gallery_caption'   => 'required',
                'gallery_image'     => 'mimes:jpg,jpeg,png',
            ]);

            $gallery                = new EmployeeGallery;
            $gallery->employee_id   = $request->employee_id;

            if ($request->hasFile('gallery_image')) {
                $gallery->gallery_image = $request->file('gallery_image')->store('uploads/pegawai/gallery/');
            }

            if ($request->gallery_caption) {
                $gallery->gallery_caption        = $request->gallery_caption;
            }

            $gallery->save();
            return redirect($_SERVER['HTTP_REFERER'])->with(['flash' => 'Data Gallery berhasil ditambahkan']);
        }

        if ($param1 == 'deleteGallery') {
            $this->validate($request, [
                'id'        => 'required'
            ]);

            EmployeeGallery::destroy($request->id);
            return redirect($_SERVER['HTTP_REFERER'])->with(['flash' => 'Data Gallery berhasil dihapus']);
        }
    }

    public function deleteEmployee($id)
    {
        $data       = Employee::where('id', $id)->first();
        $user       = User::where('employee_id', $id)->get();
        if (count($user) == 0) {
            Employee::destroy($id);
            return back()->with(['flash' => 'Data pegawai berhasil di hapus']);
        } else {
            return back()->with(['gagal' => 'Maaf, Sepertinya terdapat data pengguna yang ter-integrasi dengan data pegawai ini']);
        }
    }

    public function fasilitas()
    {
        $page           = "Data Fasilitas Sekolah";
        $data           = Fasilitas::all();
        return view('backend.master.fasilitas', compact('page', 'data'));
    }

    public function add_fasilitas(Request $request)
    {
        $this->validate($request, [
            'facility_name'     => 'required',
            'facility_image'    => 'mimes:jpg,jpeg,png',
        ]);

        $fasilitas                      = new Fasilitas;
        $fasilitas->facility_name       = $request->facility_name;

        if ($request->deskripsi) {
            $fasilitas->deskripsi       = $request->deskripsi;
        }

        if ($request->hasFile('facility_image')) {
            $fasilitas->facility_image = $request->file('facility_image')->store('uploads/fasilitas/');
        }

        if ($fasilitas->save()) {
            return back()->with(['flash' => 'Data Fasilitas Berhasil ditambahkan']);
        } else {
            return back()->with(['gagal' => 'terjadi kesalahan tidak diketahui']);
        }
    }

    public function edit_fasilitas(Request $request)
    {
        $this->validate($request, [
            'facility_name'     => 'required',
            'facility_image'    => 'mimes:jpg,jpeg,png',
        ]);

        $fasilitas                      = Fasilitas::findOrFail($request->id);
        $fasilitas->facility_name       = $request->facility_name;

        if ($request->deskripsi) {
            $fasilitas->deskripsi       = $request->deskripsi;
        }

        if ($request->hasFile('facility_image')) {
            $fasilitas->facility_image = $request->file('facility_image')->store('uploads/fasilitas/');
        } else {
            $fasilitas->facility_image = $fasilitas->facility_image;
        }

        if ($fasilitas->save()) {
            return back()->with(['flash' => 'Data Fasilitas Berhasil diperbaharui']);
        } else {
            return back()->with(['gagal' => 'terjadi kesalahan tidak diketahui']);
        }
    }

    public function delete_fasilitas($id)
    {
        $fasilitas      = Fasilitas::findOrFail($id);
        if (Fasilitas::destroy($id)) {
            return back()->with(['flash' => 'Data Fasilitas Berhasil dihapus']);
        } else {
            return back()->with(['gagal' => 'terjadi kesalahan tidak diketahui']);
        }
    }
}
