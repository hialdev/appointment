<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $table = "menus";
    protected $fillable = ['menu','icon','url'];

    public function role(){
        return $this->belongsToMany(Role::class,'menu_roles','menus_id','roles_id');
    }
}
