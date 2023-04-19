<?php

namespace App\Models\SalaSituacional;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Mapa extends Model
{
    protected  $table = 'asuss_rnv.data';

    public function mapa_total_vacuna(){
        return DB::table('asuss_rnv.data')
            ->select( 'departamento',
                DB::raw("SUM(if(proveedor = 'SPUTNIK-V', 1, 0)) AS 'sputnik'"),
                DB::raw("SUM(if(proveedor = 'SINOPHARM', 1, 0)) AS 'sinopharm'"),
                DB::raw("SUM(if(proveedor = 'ASTRAZENECA', 1, 0)) AS 'astrazeneca'")
            )
            ->groupBy('departamento')
            ->get();
    }

    public function mapa_total(){
        return DB::table('asuss_rnv.data')
            ->select( 'departamento',
                DB::raw("COUNT(id) AS 'total'")
            )
            ->groupBy('departamento')
            ->get();
    }

    public function tabla_total_primera_dosis(){
        return DB::table('asuss_rnv.data')
            ->select( 'institucion',
                DB::raw("SUM(if(departamento = 'BENI', 1, 0)) AS 'beni'"),
                DB::raw("SUM(if(departamento = 'CHUQUISACA', 1, 0)) AS 'chuquisaca'"),
                DB::raw("SUM(if(departamento = 'COCHABAMBA', 1, 0)) AS 'cochabamba'"),
                DB::raw("SUM(if(departamento = 'LA PAZ', 1, 0)) AS 'lapaz'"),
                DB::raw("SUM(if(departamento = 'ORURO', 1, 0)) AS 'oruro'"),
                DB::raw("SUM(if(departamento = 'PANDO', 1, 0)) AS 'pando'"),
                DB::raw("SUM(if(departamento = 'POTOSI', 1, 0)) AS 'potosi'"),
                DB::raw("SUM(if(departamento = 'SANTA CRUZ', 1, 0)) AS 'santacruz'"),
                DB::raw("SUM(if(departamento = 'TARIJA', 1, 0)) AS 'tarija'"),
            )
            ->where('nro_dosis','=','1ra. DOSIS')
            ->groupBy('institucion')
            ->get();
    }

    public function tabla_total_segunda_dosis(){
        return DB::table('asuss_rnv.data')
            ->select( 'institucion',
                DB::raw("SUM(if(departamento = 'BENI', 1, 0)) AS 'beni'"),
                DB::raw("SUM(if(departamento = 'CHUQUISACA', 1, 0)) AS 'chuquisaca'"),
                DB::raw("SUM(if(departamento = 'COCHABAMBA', 1, 0)) AS 'cochabamba'"),
                DB::raw("SUM(if(departamento = 'LA PAZ', 1, 0)) AS 'lapaz'"),
                DB::raw("SUM(if(departamento = 'ORURO', 1, 0)) AS 'oruro'"),
                DB::raw("SUM(if(departamento = 'PANDO', 1, 0)) AS 'pando'"),
                DB::raw("SUM(if(departamento = 'POTOSI', 1, 0)) AS 'potosi'"),
                DB::raw("SUM(if(departamento = 'SANTA CRUZ', 1, 0)) AS 'santacruz'"),
                DB::raw("SUM(if(departamento = 'TARIJA', 1, 0)) AS 'tarija'"),
            )
            ->where('nro_dosis','=','2da DOSIS')
            ->groupBy('institucion')
            ->get();
    }

    public function tabla_beni(){
        return DB::table('asuss_rnv.data')
            ->select( 'institucion',
                DB::raw("SUM(if(proveedor = 'SPUTNIK-V' AND nro_dosis = '1ra. Dosis', 1, 0)) AS 'sputnik1'"),
                DB::raw("SUM(if(proveedor = 'SPUTNIK-V' AND nro_dosis = '2da Dosis', 1, 0)) AS 'sputnik2'"),
                DB::raw("SUM(if(proveedor = 'SINOPHARM' AND nro_dosis = '1ra. Dosis', 1, 0)) AS 'sinopharm1'"),
                DB::raw("SUM(if(proveedor = 'SINOPHARM' AND nro_dosis = '2da Dosis', 1, 0)) AS 'sinopharm2'"),
                DB::raw("SUM(if(proveedor = 'ASTRAZENECA' AND nro_dosis = '1ra. Dosis', 1, 0)) AS 'astrazeneca1'"),
                DB::raw("SUM(if(proveedor = 'ASTRAZENECA' AND nro_dosis = '2da Dosis', 1, 0)) AS 'astrazeneca2'"),
                DB::raw("SUM(if(proveedor = 'PFIZER' AND nro_dosis = '1ra. Dosis', 1, 0)) AS 'pfizer1'"),
                DB::raw("SUM(if(proveedor = 'PFIZER' AND nro_dosis = '2da Dosis', 1, 0)) AS 'pfizer2'")
            )
            ->where('departamento','=','BENI')
            ->groupBy('institucion')
            ->get();
    }

    public function tabla_chuquisaca(){
        return DB::table('asuss_rnv.data')
            ->select( 'institucion',
                DB::raw("SUM(if(proveedor = 'SPUTNIK-V' AND nro_dosis = '1ra. Dosis', 1, 0)) AS 'sputnik1'"),
                DB::raw("SUM(if(proveedor = 'SPUTNIK-V' AND nro_dosis = '2da Dosis', 1, 0)) AS 'sputnik2'"),
                DB::raw("SUM(if(proveedor = 'SINOPHARM' AND nro_dosis = '1ra. Dosis', 1, 0)) AS 'sinopharm1'"),
                DB::raw("SUM(if(proveedor = 'SINOPHARM' AND nro_dosis = '2da Dosis', 1, 0)) AS 'sinopharm2'"),
                DB::raw("SUM(if(proveedor = 'ASTRAZENECA' AND nro_dosis = '1ra. Dosis', 1, 0)) AS 'astrazeneca1'"),
                DB::raw("SUM(if(proveedor = 'ASTRAZENECA' AND nro_dosis = '2da Dosis', 1, 0)) AS 'astrazeneca2'"),
                DB::raw("SUM(if(proveedor = 'PFIZER' AND nro_dosis = '1ra. Dosis', 1, 0)) AS 'pfizer1'"),
                DB::raw("SUM(if(proveedor = 'PFIZER' AND nro_dosis = '2da Dosis', 1, 0)) AS 'pfizer2'")
            )
            ->where('departamento','=','CHUQUISACA')
            ->groupBy('institucion')
            ->get();
    }

    public function tabla_cochabamba(){
        return DB::table('asuss_rnv.data')
            ->select( 'institucion',
                DB::raw("SUM(if(proveedor = 'SPUTNIK-V' AND nro_dosis = '1ra. Dosis', 1, 0)) AS 'sputnik1'"),
                DB::raw("SUM(if(proveedor = 'SPUTNIK-V' AND nro_dosis = '2da Dosis', 1, 0)) AS 'sputnik2'"),
                DB::raw("SUM(if(proveedor = 'SINOPHARM' AND nro_dosis = '1ra. Dosis', 1, 0)) AS 'sinopharm1'"),
                DB::raw("SUM(if(proveedor = 'SINOPHARM' AND nro_dosis = '2da Dosis', 1, 0)) AS 'sinopharm2'"),
                DB::raw("SUM(if(proveedor = 'ASTRAZENECA' AND nro_dosis = '1ra. Dosis', 1, 0)) AS 'astrazeneca1'"),
                DB::raw("SUM(if(proveedor = 'ASTRAZENECA' AND nro_dosis = '2da Dosis', 1, 0)) AS 'astrazeneca2'"),
                DB::raw("SUM(if(proveedor = 'PFIZER' AND nro_dosis = '1ra. Dosis', 1, 0)) AS 'pfizer1'"),
                DB::raw("SUM(if(proveedor = 'PFIZER' AND nro_dosis = '2da Dosis', 1, 0)) AS 'pfizer2'")
            )
            ->where('departamento','=','COCHABAMBA')
            ->groupBy('institucion')
            ->get();
    }

    public function tabla_lapaz(){
        return DB::table('asuss_rnv.data')
            ->select( 'institucion',
                DB::raw("SUM(if(proveedor = 'SPUTNIK-V' AND nro_dosis = '1ra. Dosis', 1, 0)) AS 'sputnik1'"),
                DB::raw("SUM(if(proveedor = 'SPUTNIK-V' AND nro_dosis = '2da Dosis', 1, 0)) AS 'sputnik2'"),
                DB::raw("SUM(if(proveedor = 'SINOPHARM' AND nro_dosis = '1ra. Dosis', 1, 0)) AS 'sinopharm1'"),
                DB::raw("SUM(if(proveedor = 'SINOPHARM' AND nro_dosis = '2da Dosis', 1, 0)) AS 'sinopharm2'"),
                DB::raw("SUM(if(proveedor = 'ASTRAZENECA' AND nro_dosis = '1ra. Dosis', 1, 0)) AS 'astrazeneca1'"),
                DB::raw("SUM(if(proveedor = 'ASTRAZENECA' AND nro_dosis = '2da Dosis', 1, 0)) AS 'astrazeneca2'"),
                DB::raw("SUM(if(proveedor = 'PFIZER' AND nro_dosis = '1ra. Dosis', 1, 0)) AS 'pfizer1'"),
                DB::raw("SUM(if(proveedor = 'PFIZER' AND nro_dosis = '2da Dosis', 1, 0)) AS 'pfizer2'")
            )
            ->where('departamento','=','LA PAZ')
            ->groupBy('institucion')
            ->get();
    }

    public function tabla_oruro(){
        return DB::table('asuss_rnv.data')
            ->select( 'institucion',
                DB::raw("SUM(if(proveedor = 'SPUTNIK-V' AND nro_dosis = '1ra. Dosis', 1, 0)) AS 'sputnik1'"),
                DB::raw("SUM(if(proveedor = 'SPUTNIK-V' AND nro_dosis = '2da Dosis', 1, 0)) AS 'sputnik2'"),
                DB::raw("SUM(if(proveedor = 'SINOPHARM' AND nro_dosis = '1ra. Dosis', 1, 0)) AS 'sinopharm1'"),
                DB::raw("SUM(if(proveedor = 'SINOPHARM' AND nro_dosis = '2da Dosis', 1, 0)) AS 'sinopharm2'"),
                DB::raw("SUM(if(proveedor = 'ASTRAZENECA' AND nro_dosis = '1ra. Dosis', 1, 0)) AS 'astrazeneca1'"),
                DB::raw("SUM(if(proveedor = 'ASTRAZENECA' AND nro_dosis = '2da Dosis', 1, 0)) AS 'astrazeneca2'"),
                DB::raw("SUM(if(proveedor = 'PFIZER' AND nro_dosis = '1ra. Dosis', 1, 0)) AS 'pfizer1'"),
                DB::raw("SUM(if(proveedor = 'PFIZER' AND nro_dosis = '2da Dosis', 1, 0)) AS 'pfizer2'")
            )
            ->where('departamento','=','ORURO')
            ->groupBy('institucion')
            ->get();
    }

    public function tabla_pando(){
        return DB::table('asuss_rnv.data')
            ->select( 'institucion',
                DB::raw("SUM(if(proveedor = 'SPUTNIK-V' AND nro_dosis = '1ra. Dosis', 1, 0)) AS 'sputnik1'"),
                DB::raw("SUM(if(proveedor = 'SPUTNIK-V' AND nro_dosis = '2da Dosis', 1, 0)) AS 'sputnik2'"),
                DB::raw("SUM(if(proveedor = 'SINOPHARM' AND nro_dosis = '1ra. Dosis', 1, 0)) AS 'sinopharm1'"),
                DB::raw("SUM(if(proveedor = 'SINOPHARM' AND nro_dosis = '2da Dosis', 1, 0)) AS 'sinopharm2'"),
                DB::raw("SUM(if(proveedor = 'ASTRAZENECA' AND nro_dosis = '1ra. Dosis', 1, 0)) AS 'astrazeneca1'"),
                DB::raw("SUM(if(proveedor = 'ASTRAZENECA' AND nro_dosis = '2da Dosis', 1, 0)) AS 'astrazeneca2'"),
                DB::raw("SUM(if(proveedor = 'PFIZER' AND nro_dosis = '1ra. Dosis', 1, 0)) AS 'pfizer1'"),
                DB::raw("SUM(if(proveedor = 'PFIZER' AND nro_dosis = '2da Dosis', 1, 0)) AS 'pfizer2'")
            )
            ->where('departamento','=','PANDO')
            ->groupBy('institucion')
            ->get();
    }

    public function tabla_potosi(){
        return DB::table('asuss_rnv.data')
            ->select( 'institucion',
                DB::raw("SUM(if(proveedor = 'SPUTNIK-V' AND nro_dosis = '1ra. Dosis', 1, 0)) AS 'sputnik1'"),
                DB::raw("SUM(if(proveedor = 'SPUTNIK-V' AND nro_dosis = '2da Dosis', 1, 0)) AS 'sputnik2'"),
                DB::raw("SUM(if(proveedor = 'SINOPHARM' AND nro_dosis = '1ra. Dosis', 1, 0)) AS 'sinopharm1'"),
                DB::raw("SUM(if(proveedor = 'SINOPHARM' AND nro_dosis = '2da Dosis', 1, 0)) AS 'sinopharm2'"),
                DB::raw("SUM(if(proveedor = 'ASTRAZENECA' AND nro_dosis = '1ra. Dosis', 1, 0)) AS 'astrazeneca1'"),
                DB::raw("SUM(if(proveedor = 'ASTRAZENECA' AND nro_dosis = '2da Dosis', 1, 0)) AS 'astrazeneca2'"),
                DB::raw("SUM(if(proveedor = 'PFIZER' AND nro_dosis = '1ra. Dosis', 1, 0)) AS 'pfizer1'"),
                DB::raw("SUM(if(proveedor = 'PFIZER' AND nro_dosis = '2da Dosis', 1, 0)) AS 'pfizer2'")
            )
            ->where('departamento','=','POTOSI')
            ->groupBy('institucion')
            ->get();
    }

    public function tabla_santacruz(){
        return DB::table('asuss_rnv.data')
            ->select( 'institucion',
                DB::raw("SUM(if(proveedor = 'SPUTNIK-V' AND nro_dosis = '1ra. Dosis', 1, 0)) AS 'sputnik1'"),
                DB::raw("SUM(if(proveedor = 'SPUTNIK-V' AND nro_dosis = '2da Dosis', 1, 0)) AS 'sputnik2'"),
                DB::raw("SUM(if(proveedor = 'SINOPHARM' AND nro_dosis = '1ra. Dosis', 1, 0)) AS 'sinopharm1'"),
                DB::raw("SUM(if(proveedor = 'SINOPHARM' AND nro_dosis = '2da Dosis', 1, 0)) AS 'sinopharm2'"),
                DB::raw("SUM(if(proveedor = 'ASTRAZENECA' AND nro_dosis = '1ra. Dosis', 1, 0)) AS 'astrazeneca1'"),
                DB::raw("SUM(if(proveedor = 'ASTRAZENECA' AND nro_dosis = '2da Dosis', 1, 0)) AS 'astrazeneca2'"),
                DB::raw("SUM(if(proveedor = 'PFIZER' AND nro_dosis = '1ra. Dosis', 1, 0)) AS 'pfizer1'"),
                DB::raw("SUM(if(proveedor = 'PFIZER' AND nro_dosis = '2da Dosis', 1, 0)) AS 'pfizer2'")
            )
            ->where('departamento','=','SANTA CRUZ')
            ->groupBy('institucion')
            ->get();
    }

    public function tabla_tarija(){
        return DB::table('asuss_rnv.data')
            ->select( 'institucion',
                DB::raw("SUM(if(proveedor = 'SPUTNIK-V' AND nro_dosis = '1ra. Dosis', 1, 0)) AS 'sputnik1'"),
                DB::raw("SUM(if(proveedor = 'SPUTNIK-V' AND nro_dosis = '2da Dosis', 1, 0)) AS 'sputnik2'"),
                DB::raw("SUM(if(proveedor = 'SINOPHARM' AND nro_dosis = '1ra. Dosis', 1, 0)) AS 'sinopharm1'"),
                DB::raw("SUM(if(proveedor = 'SINOPHARM' AND nro_dosis = '2da Dosis', 1, 0)) AS 'sinopharm2'"),
                DB::raw("SUM(if(proveedor = 'ASTRAZENECA' AND nro_dosis = '1ra. Dosis', 1, 0)) AS 'astrazeneca1'"),
                DB::raw("SUM(if(proveedor = 'ASTRAZENECA' AND nro_dosis = '2da Dosis', 1, 0)) AS 'astrazeneca2'"),
                DB::raw("SUM(if(proveedor = 'PFIZER' AND nro_dosis = '1ra. Dosis', 1, 0)) AS 'pfizer1'"),
                DB::raw("SUM(if(proveedor = 'PFIZER' AND nro_dosis = '2da Dosis', 1, 0)) AS 'pfizer2'")
            )
            ->where('departamento','=','TARIJA')
            ->groupBy('institucion')
            ->get();
    }



}
