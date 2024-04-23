<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artical extends Model
{
    use HasFactory;

    protected $fillable = [ 'slug', 'title', 'writer', 'content', 'image', 'tags', 'status' ,'artical_id'];

    public function department(){
        $this->belongsTo(Blog::class);
    }
}
