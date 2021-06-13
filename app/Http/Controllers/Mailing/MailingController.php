<?php

namespace App\Http\Controllers\Mailing;

use App\Admin\SettGeneral;
use App\Contact;
use App\Http\Controllers\Controller;
use App\Mail\KirimPesan;
use App\Mailing\Mailing;
use App\Subcriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailingController extends Controller
{
    public function index()
    {
        $data   = Mailing::orderBy('id', 'desc')->get();
        return view('backend.mailing.index', ['page' => 'Email Keluar'], compact('data'));
    }

    public function add()
    {
        return view('backend.mailing.add', ['page' => 'Kirim Pesan']);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'email'     => 'required',
            'image'     => 'mimes:png,jpg,jpeg',
            'description' => 'required',
            'title'     => 'required'
        ]);

        $data           = new Mailing;
        $data->title    = $request->title;
        $data->email    = $request->email;
        $data->image    = $this->uploadImage($request, 'image', 'mail');
        $data->file    = $this->uploadImage($request, 'file', 'mail');
        $data->description = $request->description;
        $data->save();

        $general = SettGeneral::first();
        Mail::to($request->email)->send(new KirimPesan($data, $general));
        return back()->with(['flash' => 'Berhasil mengirim pesan']);
    }

    public function getEmail($condition)
    {
        if ($condition == 'subcribe') {
            $email  = Subcriber::all();
            $data = "<option value=''> - Pilih Email - </option>";
            foreach ($email as $value) {
                $data .= "<option value='" . $value->email . "'> " . $value->email . " </option>";
            }
            return $data;
        }

        if ($condition == 'contact') {
            $email = Contact::groupBy('contact_email')->get();
            $data = "<option value=''> - Pilih Email - </option>";
            foreach ($email as $value) {
                $data .= "<option value='" . $value->contact_email . "'> " . $value->contact_email . " </option>";
            }
            return $data;
        }
    }

    public function detail($id)
    {
        $mailing    = Mailing::findOrFail(decrypt($id));
        $general    = SettGeneral::first();
        return view('mail.mailing', compact('mailing', 'general'));
    }
}
