<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    /**
     * Default primary key
     *
     * @var string
     */
    protected $primaryKey = 'cmnt_id';
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'slug','cmnt_blog_id','cmnt_created_by','cmnt_content'
    ];

    /**
     * Return the commented user
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'cmnt_created_by','id');
    }
}
