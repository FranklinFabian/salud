<?php

namespace App\Models\Administracion;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function dataTables(){
        return DB::table('users as u')
            //->leftJoin('covid_catalogo_establecimiento as cce', 'cce.id', '=', 'ci.id_establecimiento')
            ->select('u.*')
            //DB::raw('DATE_FORMAT( ci.fecha, "%d-%m-%Y") as fecha_formateada'),
            //'cce.nombre as establecimiento')
            //->where('ci.id_usuario','=',$id)
            ->orderBy('u.id', 'DESC');
    }
}
