<?php

namespace App\Models\SalaSituacional;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BancoOxigeno extends Model
{
    protected $guarded = [];

    public function grafico($id_departamento, $fecha){
        return DB::table('banco_oxigeno_reporte_ente_departamento as b')
            ->select(
                DB::raw('group_concat(b.tubos_llenos_6) as tubos_llenos_6'),
                DB::raw('group_concat(b.tubos_vacios_6) as tubos_vacios_6'),
                DB::raw('group_concat(b.tubos_totales_6) as tubos_totales_6'),
                DB::raw('group_concat(b.tubos_llenos_8) as tubos_llenos_8'),
                DB::raw('group_concat(b.tubos_vacios_8) as tubos_vacios_8'),
                DB::raw('group_concat(b.tubos_totales_8) as tubos_totales_8'))
            ->where('b.id_departamento','=', $id_departamento)
            ->where('b.fecha', '=', $fecha)
            ->first();
    }

    public function categoria($id_departamento, $fecha){
        return DB::table('banco_oxigeno_reporte_ente_departamento as b')
            ->select(
                DB::raw('group_concat(b.ente_gestor) as res')
            )
            ->where('b.id_departamento', '=', $id_departamento)
            ->where('b.fecha', '=', $fecha)
            ->first();

    }

}
