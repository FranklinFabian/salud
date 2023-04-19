<?php

namespace App\Models\SalaSituacional;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Rnv extends Model
{
    protected $guarded = [];

    public function grafico($id_departamento){
        return DB::table('asuss_rnv.grafico as g')
            ->select(
                DB::raw('group_concat(g.sputnik_1d) as sp1'),
                DB::raw('group_concat(g.sputnik_2d) as sp2'),
                DB::raw('group_concat(g.sinopharm_1d) as si1'),
                DB::raw('group_concat(g.sinopharm_2d) as si2'),
                DB::raw('group_concat(g.astrazeneca_1d) as as1'),
                DB::raw('group_concat(g.astrazeneca_2d) as as2'),
                DB::raw('group_concat(g.pfizer_1d) as pf1'),
                DB::raw('group_concat(g.pfizer_2d) as pf2'))
            ->where('g.departamento','=', $id_departamento)
            ->first();
    }


    public function categoria($id_departamento){
        return DB::table('asuss_rnv.grafico as g')
            ->select(
                DB::raw('group_concat(ce.descripcion) as res')
            )
            ->leftJoin('asuss_salud.catalogo_entidad as ce', 'ce.id', '=', 'g.id')
            ->where('g.departamento', '=', $id_departamento)
            ->first();

    }



}
