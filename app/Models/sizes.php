<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sizes extends Model
{
    protected $table = "sizes";

    public function item()
    {
        # code...
        return  $this->belongsToMany(item::class,"item_sizes");
    }
    use HasFactory;
}
