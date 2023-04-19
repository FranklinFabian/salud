<?php

namespace App\Http\Controllers\SalaSituacional;

use App\Http\Controllers\Controller;
use App\Models\CatalogoDepartamento;
use App\Models\SalaSituacional\Rhd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class RhdController extends Controller
{

    public function __construct()
    {
        $this->middleware(['role:sala_situacional']);
    }

    public function index(Request $request)
    {

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

        $data['fecha'] = $fecha;


        $data['departamentos'] = CatalogoDepartamento::all();
        return view::make('pages.salasituacional.item.rhd.index')->with($data);
    }


    public function grafico($id_departamento, $fecha){
        $item = new Rhd();

        $serie = $item->grafico($id_departamento, $fecha);

        $categoria = $item->categoria($id_departamento, $fecha);

        $data['categoria'] = explode(',',$categoria->res);

        $data['serie'][0]['name'] = 'Camas Habilitadas Internación';
        $data['serie'][0]['data'] = explode(',',$serie->camas_habilitadas_internacion);

        $data['serie'][1]['name'] = 'Hospitalizados Internación';
        $data['serie'][1]['data'] = explode(',',$serie->hospitalizados_internacion);

        $data['serie'][2]['name'] = 'Camas Disponibles Internación';
        $data['serie'][2]['data'] = explode(',',$serie->camas_disponibles_internacion);


        $data['serie'][3]['name'] = 'Camas Habilitadas UTI';
        $data['serie'][3]['data'] = explode(',',$serie->camas_habilitadas_uti);

        $data['serie'][4]['name'] = 'Hospitalizados UTI';
        $data['serie'][4]['data'] = explode(',',$serie->hospitalizados_uti);

        $data['serie'][5]['name'] = 'Camas Disponibles UTI';
        $data['serie'][5]['data'] = explode(',',$serie->camas_disponibles_uti);


        $data['serie'][6]['name'] = 'Camas Habilitadas UCI';
        $data['serie'][6]['data'] = explode(',',$serie->camas_habilitadas_uci);

        $data['serie'][7]['name'] = 'Hospitalizados en UCI';
        $data['serie'][7]['data'] = explode(',',$serie->hospitalizados_uci);

        $data['serie'][8]['name'] = 'Camas Disponibles UCI';
        $data['serie'][8]['data'] = explode(',',$serie->camas_disponibles_uci);

        return response()->json($data);
    }



}
