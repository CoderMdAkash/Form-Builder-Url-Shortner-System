<?php

namespace Modules\DynamicFormCreation\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\DynamicFormCreation\Database\factories\FieldFactory;

class Field extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['name','form_template_id', 'label', 'type', 'options', 'order','deleted_at'];

    public function formTemplate() {
        return $this->belongsTo(FormTemplate::class);
    }

    
}
