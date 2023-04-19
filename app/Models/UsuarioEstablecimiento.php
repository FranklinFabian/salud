<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsuarioEstablecimiento extends Model
{
    protected $guarded = [];

    protected  $table = 'usuario_establecimiento';

    public function cat_establecimiento()
    {
        return $this->belongsTo(CatalogoEstablecimiento::class, 'id_establecimiento');
    }

}
