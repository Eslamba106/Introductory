<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'content', 'image', 'tags', 'writer', 'writer_type', 'news_category_id', 'status', 'created_at', 'updated_at'
    ];

    public function newsCategory(){
        $this->belongsTo(NewsCategory::class );
    }
}
