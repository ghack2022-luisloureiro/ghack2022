<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;


    public function item()
    {
        return $this->belongsToMany(\App\Models\Item::class);
    }

}
