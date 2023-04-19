<?php

namespace App\Models\SalaSituacional;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class General extends Model
{
    protected $guarded = [];


    public function grafico_rhd($fecha)
    {
        return DB::table('asuss_rhd.camas_departamento_totales as c')
            ->select(
                DB::raw('group_concat(c.departamento) as departamento'),
                DB::raw('group_concat(c.camas_habilitadas_uti) as camas_habilitadas_uti'),
                DB::raw('group_concat(c.hospitalizados_uti) as hospitalizados_uti'),
                DB::raw('group_concat(c.camas_disponibles_uti) as camas_disponibles_uti'))
            ->where('c.fecha', '=', $fecha)
            ->orderBy('c.departamento')
            ->first();
    }

    public function grafico_banco_oxigeno($fecha)
    {
        return DB::table('banco_oxigeno_reporte_departamento_totales as b')
            ->select(
                DB::raw('group_concat(b.departamento) as departamento'),
                DB::raw('group_concat(b.tubos_llenos_6) as tubos_llenos_6'),
                DB::raw('group_concat(b.tubos_vacios_6) as tubos_vacios_6'),
                DB::raw('group_concat(b.tubos_totales_6) as tubos_totales_6'),
                DB::raw('group_concat(b.tubos_llenos_8) as tubos_llenos_8'),
                DB::raw('group_concat(b.tubos_vacios_8) as tubos_vacios_8'),
                DB::raw('group_concat(b.tubos_totales_8) as tubos_totales_8'))
            ->where('b.fecha', '=', $fecha)
            ->orderBy('b.departamento')
            ->first();
    }

    public function grafico_sive()
    {
        return DB::table('asuss_sive.grafico_nacional as g')
            ->select(
                DB::raw('group_concat(g.semana_epidemiologica) as semana_epidemiologica'),
                DB::raw('group_concat(g.positivo) as positivo'),
                DB::raw('group_concat(g.descartado) as descartado'))
            ->first();
    }

    public function grafico_rhd_utis()
    {
        return DB::table('asuss_rhd.grafico_utis as g')
            ->select(
                DB::raw('group_concat(g.fecha) as fecha'),
                DB::raw('group_concat(g.camas_uti_disponibles) as camas_uti_disponibles'),
                DB::raw('group_concat(g.camas_uti_ocupadas) as camas_uti_ocupadas'))
            ->first();
    }

    public function grafico_rnve()
    {
        return DB::table('asuss_rnv.grafico_nacional as g')
            ->select(
                DB::raw('group_concat(g.nombre) as nombre'),
                DB::raw('group_concat(g.nacional) as nacional'))
            ->first();
    }

    public function grafico_sive_positivos()
    {
        return DB::table('asuss_sive.grafico_positivos as g')
            ->select(
                DB::raw('group_concat(g.semana_epidemiologica) as semana_epidemiologica'),
                DB::raw('group_concat(g.recuperado) as recuperado'),
                DB::raw('group_concat(g.fallecido) as fallecido'),
                DB::raw('group_concat(g.activo) as activo'))
            ->first();
    }



}
