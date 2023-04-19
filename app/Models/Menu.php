<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Menu extends Model
{
    protected $guarded = [];

    public function getMenu ($id){
        return DB::table('users_module as um')
            ->leftJoin('users as u', 'u.id', '=', 'um.id_user')
            ->leftJoin('module as m', 'm.id', '=', 'um.id_module')
            ->where('um.id_user','=',$id)
            ->where('m.estado','=','Activo')
            ->select('m.*')
            ->get();
    }


    public function getSubMenu ($id, $userid){
        return DB::table('users_submodule as us')
            ->leftJoin('submodule as sm', 'sm.id', '=', 'us.id_submodule')
            ->where('sm.id_module','=',$id)
            ->where('us.id_user','=',$userid)
            ->where('sm.estado','=','Activo')
            ->select('sm.*')
            ->get();
    }

}
