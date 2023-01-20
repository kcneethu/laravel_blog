<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Blog;

class Media extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'img_blog_id','img_name','img_path'
    ];

    /**
     * Return the media's blog
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Blog::class, 'img_blog_id','blog_id');
    }
}
