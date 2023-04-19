<?php

namespace App\Models\BancoOxigeno;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class GeneracionOxigeno extends Model
{
    protected $guarded = [];

    protected  $table = 'bancooxigeno_generacion';

    public function registro_actual($id_item)
    {
        return DB::table('bancooxigeno_generacion as bi')
            ->select('*')
            ->where('bi.id_item','=',$id_item)
            ->first();
    }


    public function ultimo_registro($id_usuario, $id_establecimiento)
    {
        return DB::table('bancooxigeno_generacion as bg')
            ->leftJoin('bancooxigeno_item as bi', 'bi.id','=','bg.id_item')
            ->select('bg.generador_oxigeno',
                'bg.generador_capacidad_produccion'
                )
            ->where('bi.id_usuario','=',$id_usuario)
            ->where('bi.id_establecimiento','=',$id_establecimiento)
            ->orderBy('bi.fecha','desc')
            ->first();
    }

    public function item()
    {
        return $this->belongsTo(Item::class, 'id_item');
    }

}
