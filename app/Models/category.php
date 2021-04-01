<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
   
    use HasFactory;
    protected $table = "category";
    public function item()
    {
        # code...
         return $this->belongsToMany(item::class,"category_item");
    }
}
