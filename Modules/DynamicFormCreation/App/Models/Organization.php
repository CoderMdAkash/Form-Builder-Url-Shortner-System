<?php

namespace Modules\DynamicFormCreation\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\DynamicFormCreation\Database\factories\OrganizationFactory;

class Organization extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'deleted_at'
    ];

    public function categorioes() {
        return $this->hasMany(Category::class);
    }
    
}
