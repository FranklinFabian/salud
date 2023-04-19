<?php

namespace App\Models\Rhd;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Item extends Model
{
    public function dataTables($id){
        return DB::table('rhd_item as ri')
            ->leftJoin('catalogo_establecimiento as ce', 'ce.id', '=', 'ri.id_establecimiento')
            ->select('ri.*',
            DB::raw('DATE_FORMAT( ri.fecha, "%d-%m-%Y") as fecha_formateada'),
            'ce.nombre as establecimiento')
            ->where('ri.id_usuario','=',$id)
            ->orderBy('ri.id', 'DESC');
    }

    public function ficha_general($id){
        return DB::table('rhd_item as ri')
            ->leftJoin('users as u', 'u.id', '=', 'ri.id_usuario')
            ->leftJoin('catalogo_establecimiento as ces', 'ces.id', '=', 'ri.id_establecimiento')
            ->leftJoin('catalogo_entidad as cen', 'cen.id', '=', 'ces.id_entidad')
            ->leftJoin('catalogo_municipio as cm', 'cm.id', '=', 'ces.id_municipio')
            ->leftJoin('catalogo_departamento as cd', 'cd.id', '=', 'cm.id_departamento')
            ->leftJoin('rhd_atencion_paciente as rap', 'rap.id_item', '=', 'ri.id')
            ->leftJoin('rhd_insumo_disponible as rid', 'rid.id_item', '=', 'ri.id')
            ->where('ri.id','=',$id)
            ->select('ri.codigo as codigo',
                'ri.estado as estado',
                'u.name as nombre',
                'u.email as email',
                'ces.nombre as establecimiento',
                'cen.nombre as entidad',
                'cm.nombre as municipio',
                'cd.nombre as departamento',
                'cen.nombre as ente_gestor',
                'rap.*',
                'rid.*',
                DB::raw('DATE_FORMAT( ri.fecha, "%d-%m-%Y") as fecha_formateada')
            )->first();
    }
}
