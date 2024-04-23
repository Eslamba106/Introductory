<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListSetting extends Model
{
    use HasFactory;

    protected $fillable = [ 'facebook', 'x', 'linked_in', 'instagram', 'phone', 'email'];

    // public function getImageUrlAttribute()
    // {
    //     return asset('storage/' . $this->logo);
    // }
}
