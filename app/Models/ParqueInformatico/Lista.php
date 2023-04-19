<?php

namespace App\Models\ParqueInformatico;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Lista extends Model
{
    protected $guarded = [];

    protected  $table = 'parque_informatico_item';

    public function dataTables(){
        return DB::table('parque_informatico_item as pii')
            ->leftJoin('parque_informatico_catalogo_modelo as picmo', 'picmo.id', '=', 'pii.id_modelo')
            ->leftJoin('parque_informatico_catalogo_marca as picma', 'picma.id', '=', 'picmo.id_marca')
            ->select('pii.*',
                'picma.nombre as marca',
                'picmo.nombre as modelo')
                //DB::raw('DATE_FORMAT( ci.fecha, "%d-%m-%Y") as fecha_formateada'),
                //'cce.nombre as establecimiento')
            //->where('ci.id_usuario','=',$id)
            ->orderBy('pii.id', 'DESC');
    }

}
