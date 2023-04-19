<?php

namespace App\Http\Controllers\SalaSituacional;

use App\Http\Controllers\Controller;
use App\Models\SalaSituacional\Reporte;

class ReporteController extends Controller
{
    public function __construct() {
        $this->middleware(['role:sala_situacional']);
    }

    public function resumenpdf()
    {
        $item = new Reporte();

        /**/
        $ultima = 0;
        $penultima = 0;
        foreach ( $covid_positivos_departamento = $item->covid_positivos_departamento() as $res){
            $ultima = $ultima + $res->ultima;
            $penultima = $penultima + $res->penultima;
        }
        $data['covid_positivos_nacional']['ultima'] = $ultima;
        $data['covid_positivos_nacional']['penultima'] = $penultima;
        $data['covid_positivos_nacional']['cambio'] = abs(round((($penultima - $ultima)/$penultima)*100,2));
        $data['covid_positivos_departamento'] = $covid_positivos_departamento;
        $data['ultima_semana_epidemiologica'] = $item->ultima_semana_epidemiologica()->semana;

        /**/

        /**/
        $total_camas_habilitadas_compra = 0;
        $total_camas_ocupadas_compra  = 0;
        $total_camas_uti_habilitadas = 0;
        $total_camas_uti_ocupadas = 0;
        foreach($camas_uti = $item->covid_camas_uti() as $res_uti){
            $total_camas_uti_habilitadas = $total_camas_uti_habilitadas + $res_uti->total_camas_uti_habilitadas;
            $total_camas_uti_ocupadas = $total_camas_uti_ocupadas + $res_uti->total_camas_uti_ocupadas;
            $total_camas_habilitadas_compra = $total_camas_habilitadas_compra + $res_uti->total_camas_habilitadas_compra;
            $total_camas_ocupadas_compra = $total_camas_ocupadas_compra + $res_uti->total_camas_ocupadas_compra;
        }


        $data['camas_uti'] = $camas_uti;
        $data['total_camas_habilitadas_compra'] = $total_camas_habilitadas_compra;
        $data['total_camas_ocupadas_compra'] = $total_camas_ocupadas_compra;
        $data['total_camas_uti_habilitadas'] = $total_camas_uti_habilitadas;
        $data['total_camas_uti_ocupadas'] = $total_camas_uti_ocupadas;
        /**/

        /**/

        $total_tubos_totales = 0;
        $total_tubos_vacios = 0;
        foreach($camas_uti = $item->covid_tubos_oxigeno() as $res_oxigeno){
            $total_tubos_totales = $total_tubos_totales + $res_oxigeno->tubos_llenos + $res_oxigeno->tubos_vacios;
            $total_tubos_vacios = $total_tubos_vacios + $res_oxigeno->tubos_vacios;
        }

        $data['tubos_oxigeno'] = $item->covid_tubos_oxigeno();
        $data['total_tubos_totales'] = $total_tubos_totales;
        $data['total_tubos_vacios'] = $total_tubos_vacios;

        /**/

        $data['resumen_sive1'] = $item->resumen_sive1();
        $data['resumen_sive2'] = $item->resumen_sive2();


        $data['resumen_vacunas_ente'] = $item->resumen_vacunas_ente();
        $data['resumen_vacunas_depto'] = $item->resumen_vacunas_depto();


        //dd($data);


        $pdf = \PDF::loadView('pages.salasituacional.item.reporte.ficha', $data);
        $pdfName= 'reporte' . date('d-m-Y').'.pdf';
        return $pdf->stream($pdfName);
    }

}
