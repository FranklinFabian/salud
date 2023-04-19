<?php

namespace App\Http\Controllers\Rhd;

use App\Http\Controllers\Controller;
use App\Models\Rhd\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class ItemController extends Controller
{
    public function __construct() {
        $this->middleware(['role:rhd']);
    }

    public function index(Request $request)
    {
        $item = new Item();
        if ($request->ajax()){
            return Datatables($item->dataTables(Auth::user()->id))->toJson();
        }
        $data['page_title'] = 'RHD';
        $data['page_description'] = 'Formulario de Seguimiento a Reporte Hospitalario Diario';
        return view('pages.rhd.item.index')->with('data', $data);
    }

    public function tab(Request $request)
    {
        $data['page_title'] = 'RHD';
        $data['page_description'] = 'Formulario de Seguimiento a Reporte Hospitalario Diario';
        $data['pid'] = $request->param1;
        $data['tipo'] = $request->param2;
        $data['tab'] = 'general';
        $data['vista'] = 'pages.rhd.item.general';
        return view::make('pages.rhd.item.tab')->with('data', $data);
    }

    public function ficha($id)
    {
        $item = new Item();
        $data['data'] = $item->ficha_general($id);
        $pdf = \PDF::loadView('pages.rhd.item.reporte.ficha', $data);
        $pdfName= 'formulario_' . date('d-m-Y') . '_' . $id;
        return $pdf->stream($pdfName);
    }

}
