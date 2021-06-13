<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Pengguna\DetailPengguna;
use App\Pengguna\UserActivity;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function admin()
    {

        $page   = "Admin List";
        $data   = User::where('employee_id', '!=', null)->get();
        $empl   = Employee::all();
        return view('backend.users.admin', compact('page', 'data', 'empl'));
    }

    public function insertAdm(Request $request)
    {
        $this->validate($request, [
            'email'         => 'required',
            'password'      => 'required',
            'role'          => 'required',
            'employee_id'   => 'required',
        ]);


        $check = User::where('email', $request->email)
            ->orWhere('employee_id', $request->employee_id)
            ->get();
        if (count($check) == 0) {
            $user               = new User;
            $user->email        = $request->email;
            $user->role         = $request->role;
            $user->employee_id  = $request->employee_id;
            $user->password     = bcrypt($request->password);
            $user->type_account = 'administrator';
            $user->markEmailAsVerified();
            $user->save();
            return back()->with(['flash' => 'Data Admin Berhasil ditambahkan']);
        } else {
            return back()->with(['gagal' => 'Email atau Employee Sudah terdaftar sebelumnya']);
        }
    }

    public function updateAdm(Request $request)
    {
        $this->validate($request, [
            'email'         => 'required',
            'password'      => 'required',
            'role'          => 'required',
            'employee_id'   => 'required'
        ]);

        $user               = User::findOrFail($request->id);
        $user->email        = $request->email;
        $user->role         = $request->role;
        $user->employee_id  = $request->employee_id;
        $user->password     = bcrypt($request->password);
        $user->type_account = 'administrator';
        $user->save();
        return back()->with(['flash' => 'Data Admin Berhasil Perbaharui']);
    }

    public function deleteAdm($id)
    {
        $data   = User::findOrFail($id);
        return $this->deleteData($data, $id);
    }

    public function profile()
    {
        $data   = Employee::where('id', Auth()->user()->id)->first();
        return view('backend.users.profile', ['page' => 'My Profile'], compact('data'));
    }

    public function update_profile()
    {
        $data   = Employee::where('id', Auth()->user()->id)->first();
        return view('backend.users.profile_update', ['page' => 'Update Profile'], compact('data'));
    }

    public function change_profile(Request $request)
    {
        $this->validate($request, [
            'first_name'        => 'required',
            'ktp'               => 'mimes:jpg,jpeg,png',
            'ponsel'            => 'required',
            'jk'                => 'required',
            'username'          => 'required',
            'nik'               => 'required',
            'kk'                => 'required',
            'photo'             => 'mimes:jpg,jpeg,png',
        ]);

        $employee               = Employee::findOrFail($request->id);
        $employee->first_name   = $request->first_name;
        $employee->ponsel       = $request->ponsel;
        $employee->username     = $request->username;
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

        if ($employee->save()) {
            return back()->with(['flash' => 'Data Profile berhasil diperbaharui']);
        } else {
            return back()->with(['gagal' => 'Terjadi kesalahan tidak diketahui']);
        }
    }

    public function userPpdbDetail($id)
    {
        $data   = User::findOrFail(decrypt($id));
        $other  = DetailPengguna::where('user_id', decrypt($id))->first();
        if ($other == null) {
            $other = '';
        } else {
            $other = DetailPengguna::findOrFail($other->id);
        }
        $activity   = UserActivity::orderBy('id', 'desc')->limit(10)->get();
        return view('backend.users.ppdb_detail', ['page' => 'Pengguna PPDB'], compact('data', 'other', 'activity'));
    }

    public function updateUserPpdb(Request $request)
    {
        $this->validate($request, [
            'first_name'        => 'required',
            'email'             => 'required',
            'phone'             => 'required',
            'password'          => 'required'
        ]);

        if ($request->password != $request->password_confirmation) {
            return back()->with(['gagal' => 'Konfirmasi Password harus sama']);
        }

        $data                   = User::findOrFail($request->id);
        $data->first_name       = $request->first_name;
        $data->email            = $request->email;
        $data->phone            = $request->phone;
        $data->password         = encrypt($request->password);

        if ($request->last_name) {
            $data->last_name    = $request->last_name;
        }

        if ($request->middle_name) {
            $data->middle_name  = $request->middle_name;
        }

        return $this->simpanData($data);
    }

    public function userPpdb()
    {
        $data   = User::orderBy('id', 'desc')->where('type_account', 'ppdb')->get();
        return view('backend.users.ppdb', ['page' => 'Pengguna PPDB'], compact('data'));
    }

    public function update_password(Request $request)
    {
        return $this->ubah_password($request);
    }

    public function UsersController(Request $request)
    {
        $data       = UserActivity::orderBy('id', 'desc')->paginate(30);
        $user       = User::where('type_account', 'ppdb')->orderBy('id', 'desc')->get();
        if ($request->start_date != null || $request->pengguna != null || $request->end_date != null) {
            $this->validate($request, [
                'start_date'        => 'required',
                'end_date'          => 'required',
            ]);

            $data   = UserActivity::whereBetween('created_at', [
                $request->start_date . ' 00:00:00',
                $request->end_date . ' 23:59:59'
            ])->orderBy('id', $request->order)->paginate(30);
            $data->appends([
                'start_date'        => $request->start_date,
                'end_date'          => $request->end_date,
                'order'             => $request->order
            ]);

            if ($request->pengguna) {
                $data   = UserActivity::whereBetween('created_at', [
                    $request->start_date . ' 00:00:00',
                    $request->end_date . ' 23:59:59'
                ])->where('user_id', $request->pengguna)->orderBy('id', $request->order)->paginate(30);
                $data->appends([
                    'start_date'        => $request->start_date,
                    'end_date'          => $request->end_date,
                    'pengguna'          => $request->pengguna,
                    'order'             => $request->order
                ]);
            }
        }

        return view('backend.users.log', ['page' => 'Log Activity Pengguna PPDB'], compact('data','user'));
    }
}
