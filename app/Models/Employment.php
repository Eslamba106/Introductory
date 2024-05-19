<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employment extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description' , 'slug' , 'image', 'features', 'count' , 'category', 'status'] ;

    public function getImageUrlAttribute()
    {
        return asset('storage/' . $this->image);
    }

}
