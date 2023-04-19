<?php

namespace App\Http\Controllers\SalaSituacional;

use App\Http\Controllers\Controller;
use App\Models\CatalogoDepartamento;
use App\Models\SalaSituacional\Rnv;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class RnvController extends Controller
{

    public function __construct()
    {
        $this->middleware(['role:sala_situacional']);
    }

    public function index(Request $request)
    {
        $data['departamentos'] = CatalogoDepartamento::all();
        return view::make('pages.salasituacional.item.rnv.index')->with('data', $data);
    }

    public function grafico($id_departamento){
        $item = new Rnv();
        $serie = $item->grafico($id_departamento);

        $categoria = $item->categoria($id_departamento);

        $data['categoria'] = explode(',',$categoria->res);

        $data['serie'][0]['name'] = 'ASTRAZENECA 1D.';
        $data['serie'][0]['data'] = explode(',',$serie->as1);

        $data['serie'][1]['name'] = 'ASTRAZENECA 1D.';
        $data['serie'][1]['data'] = explode(',',$serie->as2);

        $data['serie'][2]['name'] = 'PFIZER 1D.';
        $data['serie'][2]['data'] = explode(',',$serie->pf1);

        $data['serie'][3]['name'] = 'PFIZER 2D.';
        $data['serie'][3]['data'] = explode(',',$serie->pf2);

        $data['serie'][4]['name'] = 'SINOPHARM 1D.';
        $data['serie'][4]['data'] = explode(',',$serie->si1);

        $data['serie'][5]['name'] = 'SINOPHARM 2D';
        $data['serie'][5]['data'] = explode(',',$serie->si2);

        $data['serie'][6]['name'] = 'SPUTNIK-V 1D.';
        $data['serie'][6]['data'] = explode(',',$serie->sp1);

        $data['serie'][7]['name'] = 'SPUTNIK-V 2D.';
        $data['serie'][7]['data'] = explode(',',$serie->sp2);


        return response()->json($data);
    }



}
