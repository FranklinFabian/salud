<?php

namespace App\Models\BancoOxigeno;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Item extends Model
{

    protected $guarded = [];

    protected  $table = 'bancooxigeno_item';

    public function dataTables($id){
        return DB::table('bancooxigeno_item as bi')
            ->leftJoin('catalogo_establecimiento as ce', 'ce.id', '=', 'bi.id_establecimiento')
            ->select('bi.*',
            DB::raw('DATE_FORMAT( bi.fecha, "%d-%m-%Y") as fecha_formateada'),
            'ce.nombre as establecimiento')
            ->where('bi.id_usuario','=',$id)
            ->orderBy('bi.id', 'DESC');
    }

    public function ficha_general($id){
        return DB::table('bancooxigeno_item as bi')
            ->leftJoin('users as u', 'u.id', '=', 'bi.id_usuario')
            ->leftJoin('catalogo_establecimiento as ces', 'ces.id', '=', 'bi.id_establecimiento')
            ->leftJoin('catalogo_entidad as cen', 'cen.id', '=', 'ces.id_entidad')
            ->leftJoin('catalogo_departamento as cd', 'cd.id', '=', 'ces.id_departamento')
            ->leftJoin('bancooxigeno_generacion as bg', 'bg.id_item', '=', 'bi.id')
            ->where('bi.id','=',$id)
            ->select('bi.codigo as codigo',
                'bi.estado as estado',
                'u.name as nombre',
                'u.email as email',
                'ces.nombre as establecimiento',
                'cen.nombre as entidad',
                'cd.nombre as departamento',
                'cen.nombre as ente_gestor',
                'bg.*',
                DB::raw('DATE_FORMAT( bi.fecha, "%d-%m-%Y") as fecha_formateada')
            )->first();
    }

    public function vacunacion($id){
        return DB::table('bancooxigeno_vacunacion as bov')
            ->leftJoin('bancooxigeno_catalogo_dosis as bcd', 'bcd.id', '=', 'bov.id_dosis')
            ->leftJoin('bancooxigeno_catalogo_vacuna as bcv', 'bcv.id', '=', 'bov.id_vacuna')
            ->where('bov.id_item','=',$id)
            ->select('bov.*',
                'bcd.nombre as dosis',
                'bcv.nombre as vacuna'
            )->get();
    }
}
