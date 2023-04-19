<?php

namespace App\Http\Controllers\SalaSituacional;

use App\Http\Controllers\Controller;
use App\Models\SalaSituacional\Tabla;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class TablaController extends Controller
{

    public function __construct()
    {
        $this->middleware(['role:sala_situacional']);
    }

    public function index(Request $request)
    {
        $item = new Tabla();


        $fecha_actual = date("Y-m-d");

        $fecha = date("Y-m-d",strtotime($fecha_actual."- 1 days"));

        $data['fecha'] = $fecha;
        $data['totales_rnve'] = $item->grafico_totales_ente();
        $data['camas_tubos_disponibles'] = $item->camas_tubos_disponibles($fecha);
        return view::make('pages.salasituacional.item.tabla.index')->with($data);
    }

}
