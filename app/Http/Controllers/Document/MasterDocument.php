<?php

namespace App\Http\Controllers\Document;

use App\Admin\SettGeneral;
use App\Document\DocumentCategory;
use App\Document\TandaTangan;
use App\Document\TemplateDocument;
use App\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MasterDocument extends Controller
{
    public function tandaTangan()
    {
        $data   = TandaTangan::all();
        $empl   = Employee::orderBy('id', 'desc')->get();
        return view('backend.document.tanda', ['page' => 'Tanda Tangan'], compact('data', 'empl'));
    }

    public function createTanda(Request $request, $condition)
    {
        $this->validate($request, [
            'employee_id'   => 'required',
            'image'         => 'mimes:png,jpg,jpeg',
        ]);

        if ($condition == 'create') {
            $data = new TandaTangan;
            $data->image    = $this->uploadImage($request, 'image', 'tandatangan');
        } else {
            $data = TandaTangan::findOrFail($request->id);
            $request->image ? $data->image = $this->uploadImage($request, 'image', 'tandatangan') : null;
        }

        $data->employee_id  = $request->employee_id;
        return $this->simpanData($data);
    }

    public function deleteTanda($id)
    {
        $data   = TandaTangan::findOrFail($id);
        return $this->deleteData($data, $id);
    }

    public function category()
    {
        $data   = DocumentCategory::all();
        return view('backend.document.category', ['page' => 'Category Document'], compact('data'));
    }

    public function createCategory(Request $request, $condition)
    {
        $this->validate($request, [
            'name'      => 'required'
        ]);

        $condition == 'create' ? $data = new DocumentCategory : $data = DocumentCategory::findOrFail($request->id);
        $data->name     = $request->name;
        return $this->simpanData($data);
    }

    public function deleteCategory($id)
    {
        $data   = DocumentCategory::findOrFail($id);
        return $this->deleteData($data, $id);
    }

    public function template()
    {
        $data   = TemplateDocument::all();
        $sett   = SettGeneral::first();
        return view('backend.document.template', ['page' => 'Document Template'], compact('data', 'sett'));
    }

    public function createTemplate(Request $request, $condition)
    {
        $this->validate($request, [
            'school_name'       => 'required',
            'school_address'    => 'required',
            'logo'              => 'mimes:png,jpg,jpeg',
            'background'        => 'mimes:png,jpg,jpeg',
            'template_name'     => 'required'
        ]);

        if ($condition == 'create') {
            $data       = new TemplateDocument;
            $data->school_logo = $this->uploadImage($request, 'school_logo', 'template');
            $data->background = $this->uploadImage($request, 'background', 'background');
        } else {
            $data       = TemplateDocument::findOrFail($request->id);
            $request->school_logo ? $data->school_logo = $this->uploadImage($request, 'school_logo', 'template') : null;
            $request->background ? $data->background = $this->uploadImage($request, 'background', 'background') : null;
        }

        $data->school_name      = $request->school_name;
        $data->school_address   = $request->school_address;
        $data->template_name    = $request->template_name;
        
        if ($request->footer_text) {
            $data->footer_text  = $request->footer_text;
        }

        return $this->simpanData($data);
    }

    public function templateDetail($id)
    {
        $data   = TemplateDocument::findOrFail($id);
        return view('backend.document.detail', ['page' => 'Preview Document Template'], compact('data'));
    }

    public function deleteTemplate($id)
    {
        $data   = TemplateDocument::findOrFail($id);
        return $this->deleteData($data, $id);
    }
}
