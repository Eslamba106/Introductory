<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Knowledge extends Model
{
    use HasFactory;

    protected $fillable = [ 'title', 'content', 'image', 'slug', 'tags', 'views', 'knowledge_category_id', 'created_at', 'updated_at' ];

    public function getImageUrlAttribute()
    {
        return asset('storage/' . $this->image);
    }
}
