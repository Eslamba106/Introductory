<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'content', 'image','slug', 'tags', 'writer', 'writer_type', 'news_category_id', 'status', 'created_at', 'updated_at'
    ];

    public function newsCategory(){
        return $this->belongsTo(NewsCategory::class );
    }
    public function writerName(){
        return $this->belongsTo(User::class , 'writer');
    }
    public function getImageUrlAttribute()
    {
        return asset('storage/' . $this->image);
    }

}
