<?php

namespace App\Models\SalaSituacional;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Rhd extends Model
{
    protected $guarded = [];


    public function grafico($id_departamento, $fecha){
        return DB::table('asuss_rhd.camas_departamento as c')
            ->select(
                DB::raw('group_concat(c.camas_habilitadas_internacion) as camas_habilitadas_internacion'),
                DB::raw('group_concat(c.hospitalizados_internacion) as hospitalizados_internacion'),
                DB::raw('group_concat(c.camas_disponibles_internacion) as camas_disponibles_internacion'),

                DB::raw('group_concat(c.camas_habilitadas_uti) as camas_habilitadas_uti'),
                DB::raw('group_concat(c.hospitalizados_uti) as hospitalizados_uti'),
                DB::raw('group_concat(c.camas_disponibles_uti) as camas_disponibles_uti'),

                DB::raw('group_concat(c.camas_habilitadas_uci) as camas_habilitadas_uci'),
                DB::raw('group_concat(c.hospitalizados_uci) as hospitalizados_uci'),
                DB::raw('group_concat(c.camas_disponibles_uci) as camas_disponibles_uci'))
            ->where('c.id_departamento','=', $id_departamento)
            ->where('c.fecha', '=', $fecha)
            ->first();
    }

    public function categoria($id_departamento, $fecha){
        return DB::table('asuss_rhd.camas_departamento as c')
            ->select(
                DB::raw('group_concat(c.descripcion) as res')
                )
            ->where('c.id_departamento', '=', $id_departamento)
            ->where('c.fecha', '=', $fecha)
            ->first();

    }

}
