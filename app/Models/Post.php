<?php

namespace App\Models;

use App\Infrastructure\Traits\HasFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Post extends Model implements HasMedia
{
    use HasFactory, HasFilter, SoftDeletes, InteractsWithMedia;

    protected $table = 'posts';


    protected $fillable = [
        'title',
        'content',
        'excerpt',
        'type',
        'meta_link',
        'meta_description',
        'slug',
        'facebook',
        'twitter',
        'LinkedIn',
        'instagram',
        'portfolio_type',
        'icon',
        'image', 'logo_image',
        'is_top_news',
        'is_featured_post',
        'is_breaking_news',
        'is_trending_news',
        'is_top_rated',
        'news_type'

    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(600);
    }


    public function getImageUrlAttribute(): ?string
    {
        if ($this->image) {
            // Generate the full URL of the image
            return Storage::url($this->image);
        }
        return null;
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
