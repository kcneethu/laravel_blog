<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use App\Scopes\IsApprovedScope;
use App\Models\Category;
use App\Models\Media;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Blog extends Model
{
    use HasFactory;
    use SoftDeletes;

     /**
     * Default primary key
     *
     * @var string
     */
    protected $primaryKey = 'blog_id';
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'slug','user_id','title','caption' ,'content', 'category_id','is_approved'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'published_at'
    ];

    /**
     * The "booting" method of the model.
     */
    protected static function boot(): void
    {
        parent::boot();
        
        static::addGlobalScope(new IsApprovedScope);

        static::creating(function ($model) {
            $model->user_id= Auth::user()->id;
        });
        
    }

    /**
     * Return the blog's category
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id','cat_id');
    }

    /**
     * Return the blog's media
     */
    public function media()
    {
        return $this->hasMany(Media::class,'img_blog_id');
    }

    /**
     * Return the blog's first media
     */
    public function first_media() {
        return $this->hasMany(Media::class,'img_blog_id')->limit(1);
    }

    /**
     * Return the blog's comments
     */
    public function comments()
    {
        return $this->hasMany(Comment::class,'cmnt_blog_id');
    }
}
