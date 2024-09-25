<?php

namespace Modules\UrlShortenerSystem\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\UrlShortenerSystem\Database\factories\UrlClickInfoFactory;

class UrlClickInfo extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['url_id', 'ip'];
    
}
