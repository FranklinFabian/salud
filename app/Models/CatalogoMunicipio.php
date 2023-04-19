<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CatalogoMunicipio extends Model
{
    protected $guarded = [];

    protected  $table = 'catalogo_municipio';

    public function cat_departamento()
    {
        return $this->belongsTo(CatalogoDepartamento::class, 'id_departamento');
    }

}
