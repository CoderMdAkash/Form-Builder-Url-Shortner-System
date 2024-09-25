<?php

namespace Modules\DynamicFormCreation\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\DynamicFormCreation\Database\factories\CategoryFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    use HasFactory;
    use SoftDeletes;


    protected $fillable = [
        'name',
        'description',
        'organization_id',
        'deleted_at'
    ];



    public function formTemplates() {
        return $this->hasMany(FormTemplate::class);
    }

    public function organization() {
        return $this->belongsTo(Organization::class);
    }

}
