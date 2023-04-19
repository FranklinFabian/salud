<?php

namespace App\Models\SalaSituacional;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Sive extends Model
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



}
