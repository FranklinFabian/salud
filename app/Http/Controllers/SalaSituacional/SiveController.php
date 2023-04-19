<?php

namespace App\Http\Controllers\SalaSituacional;

use App\Http\Controllers\Controller;
use App\Models\CatalogoDepartamento;
use App\Models\SalaSituacional\Sive;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class SiveController extends Controller
{

    public function __construct()
    {
        $this->middleware(['role:sala_situacional']);
    }

    public function index(Request $request)
    {
        $data['departamentos'] = CatalogoDepartamento::all();
        return view::make('pages.salasituacional.item.sive.index')->with('data', $data);
    }

    public function grafico(){
        $item = new Sive();
        $serie = $item->grafico();

        $categoria = $item->categoria();

        $data['categoria'] = explode(',',$categoria->res);

        $data['serie'][0]['name'] = 'Beni';
        $data['serie'][0]['data'] = explode(',',$serie->beni);

        $data['serie'][1]['name'] = 'Chuquisaca';
        $data['serie'][1]['data'] = explode(',',$serie->chuquisaca);

        $data['serie'][2]['name'] = 'Cochabamba';
        $data['serie'][2]['data'] = explode(',',$serie->cochabamba);


        $data['serie'][3]['name'] = 'La Paz';
        $data['serie'][3]['data'] = explode(',',$serie->lapaz);

        $data['serie'][4]['name'] = 'Oruro';
        $data['serie'][4]['data'] = explode(',',$serie->oruro);

        $data['serie'][5]['name'] = 'Pando';
        $data['serie'][5]['data'] = explode(',',$serie->pando);


        $data['serie'][6]['name'] = 'Santa Cruz';
        $data['serie'][6]['data'] = explode(',',$serie->santacruz);

        $data['serie'][7]['name'] = 'Potosi';
        $data['serie'][7]['data'] = explode(',',$serie->potosi);

        $data['serie'][8]['name'] = 'Tarija';
        $data['serie'][8]['data'] = explode(',',$serie->tarija);

        return response()->json($data);
    }



}
