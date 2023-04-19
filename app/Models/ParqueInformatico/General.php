<?php

namespace App\Models\Rhd;

use App\Models\CatalogoEstablecimiento;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class General extends Model
{
    protected $guarded = [];

    protected  $table = 'users';

    public function verificarFichaDuplicada($id){
        return DB::table('rhd_item')
            ->whereDate('fecha', '=' , date('Y-m-d'))
            ->where('id_establecimiento', '=', $id)
            //->where('id_usuario', '=', $id_usuario)
            ->count();
    }

    public function cat_establecimiento()
    {
        return $this->belongsTo(CatalogoEstablecimiento::class, 'id_establecimiento');
    }

    public function get_establecimiento($id){
        return DB::table('catalogo_establecimiento as ce')
            ->leftJoin('catalogo_municipio as cm', 'cm.id', '=', 'ce.id_municipio')
            ->leftJoin('catalogo_departamento as cd', 'cd.id', '=', 'cm.id_departamento')
            ->where('cd.id', '=', $id)
            ->select('ce.id','ce.nombre')
            ->get();
    }

}
