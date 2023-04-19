<?php

namespace App\Models\SalaSituacional;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Score extends Model
{
    protected $guarded = [];

    public function score_vacunados()
    {
        return DB::table('asuss_rnv.score_vacunados')
            ->select('*')
            ->limit('3')
            ->get();
    }

    public function score_capacidad_instalada()
    {
        return DB::table('asuss_rhd.score_capacidad_instalada')
            ->select('*')
            ->limit('3')
            ->get();
    }

    public function score_casos_covid()
    {
        return DB::table('asuss_sive.score_casos_covid')
            ->select('*')
            ->limit('3')
            ->get();
    }

    public function score_oxigeno_disponible()
    {
        return DB::table('asuss_salud.score_oxigeno_disponible')
            ->select('*')
            ->limit('3')
            ->get();
    }



}
