<?php

namespace App\Models\SalaSituacional;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Reporte extends Model
{
    protected $guarded = [];

    /*Gráfico Sive*/
    public function grafico(){
        return DB::table('asuss_sive.grafico as g')
            ->select(
                DB::raw('group_concat(g.beni) as beni'),
                DB::raw('group_concat(g.chuquisaca) as chuquisaca'),
                DB::raw('group_concat(g.cochabamba) as cochabamba'),
                DB::raw('group_concat(g.tarija) as tarija'),
                DB::raw('group_concat(g.lapaz) as lapaz'),
                DB::raw('group_concat(g.oruro) as oruro'),
                DB::raw('group_concat(g.pando) as pando'),
                DB::raw('group_concat(g.potosi) as potosi'),
                DB::raw('group_concat(g.santacruz) as santacruz'))
            ->first();
    }

    public function categoria(){
        return DB::table('asuss_sive.catalogo_semana_epidemiologica as c')
            ->select(DB::raw('group_concat(c.nombre) as res'))
            ->first();

    }
    /* Fin Gráfico Sive */

    /* Covid Positivos Nacional */
    public function covid_positivos_nacional(){
        return DB::table('asuss_sive.catalogo_semana_epidemiologica as cse')
            ->leftJoin('asuss_sive.data as d','d.semana_epidemiologica_resultado','=','cse.id')
            ->select('cse.nombre',
                DB::raw('count(d.id) as cantidad'))
            ->where('d.estado','=','POSITIVO')
            ->groupBy('cse.nombre')
            ->orderBy('cse.nombre','desc')
            ->limit('2')
            ->get();
    }

    public function covid_positivos_lapaz(){
        return DB::table('asuss_sive.catalogo_semana_epidemiologica as cse')
            ->leftJoin('asuss_sive.data as d','d.semana_epidemiologica_resultado','=','cse.id')
            ->select('cse.nombre',
                DB::raw('count(d.id) as cantidad'))
            ->where('d.estado','=','POSITIVO')
            ->where('d.departamento','=','La Paz')
            ->groupBy('cse.nombre')
            ->orderBy('cse.nombre','desc')
            ->limit('2')
            ->get();
    }

    public function covid_positivos_cbba(){
        return DB::table('asuss_sive.catalogo_semana_epidemiologica as cse')
            ->leftJoin('asuss_sive.data as d','d.semana_epidemiologica_resultado','=','cse.id')
            ->select('cse.nombre',
                DB::raw('count(d.id) as cantidad'))
            ->where('d.estado','=','POSITIVO')
            ->where('d.departamento','=','Cochabamba')
            ->groupBy('cse.nombre')
            ->orderBy('cse.nombre','desc')
            ->limit('2')
            ->get();
    }

    public function covid_positivos_departamento(){
        return DB::table('asuss_sive.reporte_mae_sive')
            ->select('*')
            ->get();
    }

    public function ultima_semana_epidemiologica(){
        return DB::table('asuss_sive.catalogo_semana_epidemiologica')
            ->select('nombre as semana')
            ->orderBy('nombre','desc')
            ->first();
    }

    public function covid_camas_uti(){
        return DB::table('reporte_mae_camas')
            ->select('*')
            ->get();
    }

    public function covid_tubos_oxigeno(){
        return DB::table('reporte_mae_oxigeno')
            ->select('*')
            ->get();
    }

    public function resumen_sive1(){
        return DB::table('asuss_sive.resumen_totales1')
            ->select( '*')
            ->first();
    }

    public function resumen_sive2(){
        return DB::table('asuss_sive.resumen_totales2')
            ->select( '*')
            ->first();
    }

    public function resumen_vacunas_ente(){
        return DB::table('asuss_rnv.resumen_vacunas_ente')
            ->select('*')
            ->get();
    }

    public function resumen_vacunas_depto(){
        return DB::table('asuss_rnv.resumen_vacunas_depto')
            ->select('*')
            ->get();
    }

}
