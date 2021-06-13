<?php

namespace App\Document;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    public function template()
    {
        return $this->belongsTo(TemplateDocument::class,'template_document_id')->withTrashed();
    }

    public function tanda()
    {
        return $this->belongsTo(TandaTangan::class,'tanda_tangan_id')->withTrashed();
    }

    public function category()
    {
        return $this->belongsTo(DocumentCategory::class,'document_category_id')->withTrashed();
    }
}
