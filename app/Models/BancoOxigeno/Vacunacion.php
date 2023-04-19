<?php

namespace App\Models\BancoOxigeno;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Vacunacion extends Model
{
    protected $guarded = [];

    protected  $table = 'bancooxigeno_vacunacion';

    public function dataTables($id){
        return DB::table('bancooxigeno_vacunacion as bv')
            ->leftJoin('bancooxigeno_catalogo_vacuna as bcv', 'bcv.id', '=', 'bv.id_vacuna')
            ->leftJoin('bancooxigeno_catalogo_dosis as bcd', 'bcd.id', '=', 'bv.id_dosis')
            ->select('bv.*',
            'bcv.nombre as vacuna',
            'bcd.nombre as dosis')
            ->where('bv.id_item','=',$id)
            ->orderBy('bv.id', 'DESC');
    }

}
