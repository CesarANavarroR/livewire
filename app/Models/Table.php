<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use HasFactory;

    public function getRouteKeyName()
    {
        return "slug";
    }

    public function orders(){
        return $this->belongsToMany('App\Models\Order');
    }
}
