<?php

namespace Modules\DynamicFormCreation\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\DynamicFormCreation\Database\factories\FormTemplateFactory;

class FormTemplate extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'title',
        'category_id',
        'description',
        'deleted_at'
    ];


    public function category() {
        return $this->belongsTo(Category::class);
    }
    public function fields() {
        return $this->hasMany(Field::class);
    }
    

}
