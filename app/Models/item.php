<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class item extends Model
{
    use HasFactory;


    public function color()
    {
       return $this->belongsToMany(color::class,"color_item");
    }
    public function category()
    {
       return $this->belongsToMany(category::class,"category_item");
    }
    public function pictures()
    {
       
       return $this->hasMany(item_pictures::class);
    }
 
}
