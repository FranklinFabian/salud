<?php

namespace App\Models\SalaSituacional;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Item extends Model
{
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
}
