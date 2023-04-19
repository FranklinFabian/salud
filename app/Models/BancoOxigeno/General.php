<?php

namespace App\Models\BancoOxigeno;

use App\Models\CatalogoEstablecimiento;
use App\Models\UsuarioEstablecimiento;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class General extends Model
{
    protected $guarded = [];

    protected  $table = 'bancooxigeno_item';

    public function verificarFichaDuplicada($id){
        return DB::table('bancooxigeno_item as bi')
            ->whereDate('bi.fecha', '=' , date('Y-m-d'))
            ->where('bi.id_establecimiento', '=', $id)
            ->count();
    }

    public function establecimientoFiltrado($id){
        return DB::table('catalogo_establecimiento as ce')
            ->leftJoin('usuario_establecimiento as ue', 'ue.id_establecimiento', '=', 'ce.id')
            ->where('ue.id_usuario', '=', $id)
            ->select('ce.id','ce.nombre')
            ->get();
    }

}
