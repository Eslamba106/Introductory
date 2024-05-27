<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'webname_en', 'webname_ar', 'description_en', 'description_ar', 'logo', 'created_at', 'updated_at' , 'parent_id'
    ];

    public function getImageUrlAttribute()
    {
        // if (!$this->image) {
        //     return "https://images.unsplash.com/photo-1505740420928-5e560c06d30e?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D";
        // }
        // if (Str::startsWith($this->image, ['http://', 'https://'])) {
        //     return $this->image;
        // }

        return asset('storage/' . $this->logo);
    }
}
