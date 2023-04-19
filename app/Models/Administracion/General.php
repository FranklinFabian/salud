<?php

namespace App\Models\Administracion;

use Illuminate\Database\Eloquent\Model;

class General extends Model
{
    protected $guarded = [];

    protected  $table = 'users';

    /*public function dataTables(){
        return DB::table('modules as m')
            //->leftJoin('covid_catalogo_establecimiento as cce', 'cce.id', '=', 'ci.id_establecimiento')
            ->select('m.*')
                //DB::raw('DATE_FORMAT( ci.fecha, "%d-%m-%Y") as fecha_formateada'),
                //'cce.nombre as establecimiento')
            //->where('ci.id_usuario','=',$id)
            ->orderBy('m.id', 'DESC');
    }*/

}
