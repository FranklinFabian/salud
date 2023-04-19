<?php

namespace App\Http\Controllers\SalaSituacional;

use App\Http\Controllers\Controller;
use App\Models\CatalogoDepartamento;
use App\Models\SalaSituacional\General;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class GeneralController extends Controller
{

    public function __construct()
    {
        $this->middleware(['role:sala_situacional']);
    }

    public function index(Request $request)
    {
        $data['departamentos'] = CatalogoDepartamento::all();

        $fecha_actual = date("Y-m-d");
            //Lunes o Martes
        if(date('w', strtotime($fecha_actual)) == 1 || date('w', strtotime($fecha_actual)) == 2 ) {
            $fecha = date("Y-m-d",strtotime($fecha_actual."- 4 days"));
            //Domingo
        } elseif( date('w', strtotime($fecha_actual)) == 0) {
            $fecha = date("Y-m-d",strtotime($fecha_actual."- 3 days"));
            //Miercoles, Jueves, Viernes y Sabado
        } else {
            $fecha = date("Y-m-d",strtotime($fecha_actual."- 2 days"));
        }

        $data['fecha_rhd'] = $fecha;

        if(date('w', strtotime($fecha_actual)) == 1 ) {
            $fecha = date("Y-m-d",strtotime($fecha_actual."- 3 days"));
            //Domingo
        } elseif( date('w', strtotime($fecha_actual)) == 0) {
            $fecha = date("Y-m-d",strtotime($fecha_actual."- 2 days"));
            // Martes, Miercoles, Jueves, Viernes y Sabado
        } else {
            $fecha = date("Y-m-d",strtotime($fecha_actual."- 1 days"));
        }

        $data['fecha_banco_oxigeno'] = $fecha;


        return view::make('pages.salasituacional.item.general.index')->with('data', $data);
    }


    public function grafico_rhd(){
        $item = new General();

        $fecha_actual = date("Y-m-d");
        //Lunes o Martes
        if(date('w', strtotime($fecha_actual)) == 1 || date('w', strtotime($fecha_actual)) == 2 ) {
            $fecha = date("Y-m-d",strtotime($fecha_actual."- 4 days"));
            //Domingo
        } elseif( date('w', strtotime($fecha_actual)) == 0) {
            $fecha = date("Y-m-d",strtotime($fecha_actual."- 3 days"));
            //Miercoles, Jueves, Viernes y Sabado
        } else {
            $fecha = date("Y-m-d",strtotime($fecha_actual."- 2 days"));
        }

        $serie = $item->grafico_rhd($fecha);
        $data['categoria'] = explode(',',$serie->departamento);

        $data['serie'][0]['name'] = 'Camas Habilitadas UTI';
        $data['serie'][0]['data'] = explode(',',$serie->camas_habilitadas_uti);

        $data['serie'][1]['name'] = 'Camas Ocupadas UTI';
        $data['serie'][1]['data'] = explode(',',$serie->hospitalizados_uti);

        $data['serie'][2]['name'] = 'Camas Disponibles UTI';
        $data['serie'][2]['data'] = explode(',',$serie->camas_disponibles_uti);

        return response()->json($data);
    }

    public function grafico_banco_oxigeno(){
        $item = new General();

        $fecha_actual = date("Y-m-d");
            //Lunes
        if(date('w', strtotime($fecha_actual)) == 1 ) {
            $fecha = date("Y-m-d",strtotime($fecha_actual."- 3 days"));
            //Domingo
        } elseif( date('w', strtotime($fecha_actual)) == 0) {
            $fecha = date("Y-m-d",strtotime($fecha_actual."- 2 days"));
            // Martes, Miercoles, Jueves, Viernes y Sabado
        } else {
            $fecha = date("Y-m-d",strtotime($fecha_actual."- 1 days"));
        }

        $serie = $item->grafico_banco_oxigeno($fecha);
        $data['categoria'] = explode(',',$serie->departamento);

        $data['serie'][0]['name'] = 'Tubos Totales de 6 m3';
        $data['serie'][0]['data'] = explode(',',$serie->tubos_totales_6);

        $data['serie'][1]['name'] = 'Tubos Llenos de 6 m3';
        $data['serie'][1]['data'] = explode(',',$serie->tubos_llenos_6);

        $data['serie'][2]['name'] = 'Tubos vacios de 6 m3';
        $data['serie'][2]['data'] = explode(',',$serie->tubos_vacios_6);

        $data['serie'][3]['name'] = 'Tubos Totales de 8 m3';
        $data['serie'][3]['data'] = explode(',',$serie->tubos_totales_8);

        $data['serie'][4]['name'] = 'Tubos Llenos de 8 m3';
        $data['serie'][4]['data'] = explode(',',$serie->tubos_llenos_8);

        $data['serie'][5]['name'] = 'Tubos vacios de 8 m3';
        $data['serie'][5]['data'] = explode(',',$serie->tubos_vacios_8);

        return response()->json($data);
    }

    public function grafico_sive(){
        $item = new General();

        $serie = $item->grafico_sive();
        $data['categoria'] = explode(',',$serie->semana_epidemiologica);

        $data['serie'][0]['name'] = 'Positivos';
        $data['serie'][0]['data'] = explode(',',$serie->positivo);

        $data['serie'][1]['name'] = 'Descartados';
        $data['serie'][1]['data'] = explode(',',$serie->descartado);

        return response()->json($data);
    }

    public function grafico_rnve(){
        $item = new General();

        $serie = $item->grafico_rnve();
        $data['categoria'] = explode(',',$serie->nombre);
        $data['serie'] = explode(',',$serie->nacional);
        return response()->json($data)->setEncodingOptions(JSON_NUMERIC_CHECK);
    }

    public function grafico_rhd_utis(){
        $item = new General();

        $serie = $item->grafico_rhd_utis();
        $data['categoria'] = explode(',',$serie->fecha);

        $data['serie'][0]['name'] = 'Camas UTI Disponibles';
        $data['serie'][0]['data'] = explode(',',$serie->camas_uti_disponibles);
        $data['serie'][1]['name'] = 'Camas UTI Ocupadas';
        $data['serie'][1]['data'] = explode(',',$serie->camas_uti_ocupadas);

        return response()->json($data);
    }

    public function grafico_sive_positivos(){
        $item = new General();

        $serie = $item->grafico_sive_positivos();
        $data['categoria'] = explode(',',$serie->semana_epidemiologica);

        $data['serie'][0]['name'] = 'Recuperados';
        $data['serie'][0]['data'] = explode(',',$serie->recuperado);
        $data['serie'][1]['name'] = 'Fallecidos';
        $data['serie'][1]['data'] = explode(',',$serie->fallecido);
        $data['serie'][2]['name'] = 'Activos';
        $data['serie'][2]['data'] = explode(',',$serie->activo);

        return response()->json($data);
    }

}
