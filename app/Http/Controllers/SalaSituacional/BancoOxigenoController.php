<?php

namespace App\Http\Controllers\SalaSituacional;

use App\Http\Controllers\Controller;
use App\Models\CatalogoDepartamento;
use App\Models\SalaSituacional\BancoOxigeno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class BancoOxigenoController extends Controller
{

    public function __construct()
    {
        $this->middleware(['role:sala_situacional']);
    }

    public function index(Request $request)
    {
        $fecha_actual = date("Y-m-d");

        if(date('w', strtotime($fecha_actual)) == 1 ) {
            $fecha = date("Y-m-d",strtotime($fecha_actual."- 3 days"));
            //Domingo
        } elseif( date('w', strtotime($fecha_actual)) == 0) {
            $fecha = date("Y-m-d",strtotime($fecha_actual."- 2 days"));
            // Martes, Miercoles, Jueves, Viernes y Sabado
        } else {
            $fecha = date("Y-m-d",strtotime($fecha_actual."- 1 days"));
        }

        $data['fecha'] = $fecha;

        $data['departamentos'] = CatalogoDepartamento::all();
        return view::make('pages.salasituacional.item.bancooxigeno.index')->with($data);
    }

    public function grafico($id_departamento, $fecha){
        $item = new BancoOxigeno();
        $serie = $item->grafico($id_departamento, $fecha);

        $categoria = $item->categoria($id_departamento, $fecha);

        $data['categoria'] = explode(',',$categoria->res);

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



}
