<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class color extends Model
{
    use HasFactory;

    
    public function item()
    {
        # code...
        return  $this->belongsToMany(item::class,"color_item");
    }
}
