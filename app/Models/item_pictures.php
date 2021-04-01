<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class item_pictures extends Model
{
    protected $table = "item_pictures";
    use HasFactory;
    public function item()
    {
        # code...
         return $this->belongsTo(item::class,"item_pictures");
    }
}
