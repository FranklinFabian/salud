<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CatalogoEstablecimiento extends Model
{
    protected $guarded = [];

    protected  $table = 'catalogo_establecimiento';

    public function cat_municipio()
    {
        return $this->belongsTo(CatalogoMunicipio::class, 'id_municipio');
    }


}
