<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artical extends Model
{
    use HasFactory;

    protected $fillable = [ 'slug', 'title', 'writer', 'writer_type', 'content', 'image', 'tags', 'status' ,'blog_id'];

    public function department(){
        return $this->belongsTo(Blog::class ,  'blog_id' );
    }
    public function getImageUrlAttribute()
    {
        return asset('storage/' . $this->image);
    }
    public function articalWriter(){
        return $this->belongsTo(User::class , 'writer');
    }
}
