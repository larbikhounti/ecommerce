<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class item_pictures extends Model
{
    protected $table = "item_pictures";
    protected $fillable = ['item_id','image_path'];
    use HasFactory;
    public function item()
    {
        # code...
         return $this->belongsTo(item::class);
    }
}
