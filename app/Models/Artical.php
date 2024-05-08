<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artical extends Model
{
    use HasFactory;

    protected $fillable = [ 'slug', 'title', 'writer', 'writer_type', 'content', 'image', 'tags', 'status' ,'blog_id'];

    public function department(){
        $this->belongsTo(Blog::class ,  'blog_id' , 'id');
    }
    public function getImageUrlAttribute()
    {
        return asset('storage/' . $this->image);
    }
}
