<?php

namespace App\Http\Controllers\Pengguna;

use App\Admin\SettGeneral;
use App\Http\Controllers\Controller;
use App\Ppdb\PpdbMeet;
use App\SettWebsite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MeetingRoomController extends Controller
{
    // Admin function in meet
    public function list()
    {
        $data = PpdbMeet::orderBy('id', 'desc')->get();
        return view('backend.meet.ppdb', ['page' => 'Daftar Jadwal Meeting PPDB'], compact('data'));
    }

    public function calendar()
    {
        $data = PpdbMeet::orderBy('id', 'desc')->get();
        $sett   = SettWebsite::first();
        return view('backend.meet.calendar', ['page' => 'Kalendar Jadwal Meeting PPDB'], compact('data', 'sett'));
    }

    public function add()
    {
        return view('backend.meet.add', ['page' => 'Tambah Jadwal Meeting']);
    }

    public function edit($id)
    {
        $data = PpdbMeet::findOrFail(decrypt($id));
        return view('backend.meet.edit', ['page' => 'Edit Jadwal Meeting'], compact('data'));
    }

    public function delete($id)
    {
        $data = PpdbMeet::findOrFail(decrypt($id));
        return $this->deleteData($data, decrypt($id));
    }

    public function detail($id)
    {
        $data   = PpdbMeet::findOrFail(decrypt($id));
        $sett   = SettGeneral::first();
        return view('backend.meet.detail', ['page' => 'Detail Meeting'], compact('data', 'sett'));
    }

    public function storePpdb(Request $request, $condition)
    {
        $this->validate($request, [
            'title'     => 'required',
            'date'      => 'required',
            'description'   => 'required',
            'image'     => 'mimes:png,jpg,jpeg'
        ]);

        $condition == 'create' ? $data = new PpdbMeet : $data = PpdbMeet::findOrFail($request->id);
        $request->image ? $data->image  = $this->uploadImage($request, 'image', 'meeting') : null;
        $condition == 'create' ? $data->kode = substr(strtolower(preg_replace("/[^a-zA-Z0-9]/", "-", rand())), 0, 15) : null;
        $data->title = $request->title;
        $data->date     = $request->date;
        $data->description = $request->description;
        return $this->simpanData($data);
    }

    public function calendarMeetApi()
    {
        $data   = array();

        $response = array();
        $getdata = PpdbMeet::all();
        foreach ($getdata as $calendar) {

            $isiCalendar = array(
                'title'   => $calendar->title,
                'start'     => $calendar->date,
                'url'    => ".modal-" . $calendar->id,
            );

            array_push($data, $isiCalendar);
        }


        return $data;
    }

    public function calendarMeetApiUser()
    {
        $data   = array();

        $getdata = PpdbMeet::all();
        foreach ($getdata as $calendar) {

            $isiCalendar = array(
                'id'            =>  encrypt($calendar->id),
                'title'         => $calendar->title,
                'start'         => substr($calendar->date, 0, 10),
                'color'         => '#a7f4ec',
                'description'   => substr($calendar->description, 0, 100) . '... <b>Selengkapnya</b>',
                'image'         => my_asset($calendar->image),
            );

            array_push($data, $isiCalendar);
        }


        return $data;
    }

    public function start($id)
    {
        $data   = PpdbMeet::findOrFail(decrypt($id));

        if ($data->status != 'selesai') {
            $data->status = 'dimulai';
            $data->save();

            $sett   = SettWebsite::first();
            $identity = [
                'name'      => Auth()->user()->employee->first_name . ' ' . Auth()->user()->employee->middle_name . ' ' . Auth()->user()->employee->last_name,
                'photo'     => my_asset(Auth()->user()->employee->photo),
            ];
            return view('backend.meet.starting', ['page' => 'Meeting Dimulai'], compact('data', 'identity', 'sett'));
        }
        
        return back()->with(['gagal' => 'Maaf, Nampaknya Meeting Sudah Ditandai selesai']);
    }

    // End Meet
    public function endMeet($id)
    {
        $data = PpdbMeet::findOrFail(decrypt($id));
        $data->status = 'selesai';
        $data->save();
        return redirect()->route('ppdb.meet.list');
    }


    // Pengguna Function In Meet

    public function penggunaStartJoin($id)
    {
        $get = PpdbMeet::findOrFail(decrypt($id));
        if ($get->status == 'dimulai') {
            $data   = PpdbMeet::findOrFail(decrypt($id));
            $sett   = SettWebsite::first();
            $identity = [
                'name'      => Auth()->user()->first_name . ' ' . Auth()->user()->middle_name . ' ' . Auth()->user()->last_name,
                'photo'     => my_asset(Auth()->user()->image),
            ];
            return view('backend.meet.starting', ['page' => 'Meeting Dimulai'], compact('data', 'identity', 'sett'));
        }

        if ($get->status == 'selesai') {
            return back()->with(['gagal' => 'Maaf, Meeting ini telah selesai']);
        }

        return $this->waiting($id);
    }

    public function userCalendar()
    {
        return view('user.ppdb.meeting.calendar', ['page' => 'Kalendar Meeting Ppdb']);
    }

    public function waiting($id)
    {
        $data  = PpdbMeet::findOrFail(decrypt($id));
        $sett   = SettGeneral::first();
        return view('backend.meet.detail', ['page' => 'Detail Meeting'], compact('data', 'sett'));
    }

    public function userStart()
    {
    }
}
