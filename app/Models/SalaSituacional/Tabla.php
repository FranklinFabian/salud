<?php

namespace App\Models\SalaSituacional;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Tabla extends Model
{
    protected $guarded = [];

    public function grafico_totales_ente()
    {
        return DB::table('asuss_rnv.grafico_totales_ente as g')
            ->select('*')
            ->get();
    }

    public function camas_tubos_disponibles($fecha){
        return DB::table('camas_tubos_disponibles as ctd')
            ->select('*')
            ->where('ctd.fecha','=',$fecha)
            ->get();
    }

}
