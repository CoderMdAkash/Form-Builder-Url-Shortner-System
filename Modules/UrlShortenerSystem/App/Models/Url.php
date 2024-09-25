<?php

namespace Modules\UrlShortenerSystem\App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\UrlShortenerSystem\Database\factories\UrlFactory;

class Url extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['title', 'original_url', 'shortened_url', 'user_id', 'click_count'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function visitors(){
        return $this->hasMany(UrlClickInfo::class);
    }
    
}
