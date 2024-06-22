<?php

namespace App\Models;

use App\Infrastructure\Traits\HasFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Ad extends Model
{
    use HasFactory, HasFilter, SoftDeletes;

    protected $table = 'ads';


    protected $fillable = [
        'title',
        'image',
        'link',
        'slug',
        'is_active',

    ];


    public function getImageUrlAttribute(): ?string
    {
        if ($this->image) {
            return Storage::url($this->image);
        }
        return null;
    }

    public static function getAdImage($name) {
        $ad =  Ad::where('slug', $name)->where('is_active', 1)->first();
        if ($ad != null)
            return Storage::url($ad->image);
        else
            return null;
    }

    public static function getDetail($name) {
        $ad = Ad::where('slug', $name)->where('is_active', 1)->first();
        if ($ad != null)
        return $ad->link;
        else
        return null;
    }

}
