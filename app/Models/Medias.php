<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class Medias extends Model
{
    use HasFactory;


    protected $table = 'medias';
    protected $appends = ['url'];

    protected $fillable = [
        'name',
        'original_name',
        'mime_type',
        'path',
        'collection',
        'disk',
        'post_id'
    ];

    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }
}
