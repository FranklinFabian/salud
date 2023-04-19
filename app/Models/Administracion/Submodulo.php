<?php

namespace App\Models\Administracion;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Submodulo extends Model
{
    protected $guarded = [];

    protected  $table = 'submodule';

    public function dataTables(){
        return DB::table('submodule as m')
            //->leftJoin('covid_catalogo_establecimiento as cce', 'cce.id', '=', 'ci.id_establecimiento')
            ->select('m.*')
                //DB::raw('DATE_FORMAT( ci.fecha, "%d-%m-%Y") as fecha_formateada'),
                //'cce.nombre as establecimiento')
            //->where('ci.id_usuario','=',$id)
            ->orderBy('m.id', 'DESC');
    }

}
