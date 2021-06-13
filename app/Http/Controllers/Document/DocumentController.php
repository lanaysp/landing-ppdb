<?php

namespace App\Http\Controllers\Document;

use App\Document\Document;
use App\Document\DocumentCategory;
use App\Document\TandaTangan;
use App\Document\TemplateDocument;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PhpParser\Comment\Doc;

class DocumentController extends Controller
{
    public function index()
    {
        $data   = Document::orderBy('id', 'desc')->get();
        return view('backend.document.index', ['page' => 'Document & Surat'], compact('data'));
    }

    public function add()
    {
        $data   = [
            'tanda'     => TandaTangan::all(),
            'category'  => DocumentCategory::all(),
            'template'  => TemplateDocument::all()
        ];
        return view('backend.document.add', ['page' => 'Buat Document'], compact('data'));
    }

    public function update($id)
    {
        $data   = [
            'tanda'     => TandaTangan::all(),
            'category'  => DocumentCategory::all(),
            'template'  => TemplateDocument::all(),
            'ini'       => Document::findOrFail($id)
        ];
        return view('backend.document.update', ['page' => 'Buat Document'], compact('data'));
    }

    public function store(Request $request, $condition)
    {
        $this->validate($request, [
            'tanda_tangan_id'       => 'required',
            'document_category_id'  => 'required',
            'template_document_id'  => 'required',
            'image'                 => 'mimes:jpg,png,jpeg',
            'title'                 => 'required'
        ]);

        if ($condition == 'create') {
            $data                       = new Document;
            $data->image                = $this->uploadImage($request, 'image', 'document');
        } else {
            $data                       = Document::findOrFail($request->id);
            $request->image ? $data->image = $this->uploadImage($request, 'image', 'document') : null;
        }
        $data->title                = $request->title;
        $data->tanda_tangan_id      = $request->tanda_tangan_id;
        $data->template_document_id = $request->template_document_id;
        $data->document_category_id = $request->document_category_id;
        $data->description          = $request->description;

        $request->qr_code ? $data->qr_code = $request->qr_code : null;
        return $this->simpanData($data);
    }

    public function detail($id)
    {
        $data   = Document::findOrFail(decrypt($id));
        return view('backend.document.detailDoc', ['page' => 'Detail Document'], compact('data'));
    }

    public function delete($id)
    {
        $data   = Document::findOrFail($id);
        return $this->deleteData($data, $id);
    }
}
