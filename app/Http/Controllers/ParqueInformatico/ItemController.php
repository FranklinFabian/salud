<?php

namespace App\Http\Controllers\ParqueInformatico;

use App\Http\Controllers\Controller;
use App\Models\ParqueInformatico\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class ItemController extends Controller
{
    public function __construct() {
        $this->middleware(['role:parque_informatico_lista']);
    }

    public function index(Request $request)
    {
        $item = new Item();
        if ($request->ajax()){
            return Datatables($item->dataTables(Auth::user()->id))->toJson();
        }
        $data['page_title'] = 'Lista';
        $data['page_description'] = 'Lista de Equipos que Conforman el Parque Informático de la ASUSS';
        return view('pages.parqueinformatico.item.index')->with('data', $data);
    }

    public function tab(Request $request)
    {
        $data['page_title'] = 'Lista';
        $data['page_description'] = 'Lista de Equipos que Conforman el Parque Informático de la ASUSS';
        $data['pid'] = $request->param1;
        $data['tipo'] = $request->param2;
        $data['tab'] = 'general';
        //$data['vista'] = 'pages.parqueinformatico.item.general';
        return view::make('pages.parqueinformatico.item.tab')->with('data', $data);
    }

    public function ficha($id)
    {
        $item = new Item();
        $data['data'] = $item->ficha_general($id);
        $pdf = \PDF::loadView('pages.parqueinformatico.item.reporte.ficha', $data);
        $pdfName= 'formulario_' . date('d-m-Y') . '_' . $id;
        return $pdf->stream($pdfName);
    }

}
