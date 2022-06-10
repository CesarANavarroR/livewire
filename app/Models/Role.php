<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name'
    ];

    public static function created($request)
    {
        $role = new Role;
        $role->name = $request['name'];
        $role->save();
    }

    public function users(){ 
        return $this->belongsToMany('App\Models\User');
    }
}
