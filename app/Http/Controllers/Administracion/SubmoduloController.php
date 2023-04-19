<?php

namespace App\Http\Controllers\Administracion;

use App\Http\Controllers\Controller;
use App\Models\Administracion\Submodulo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class SubmoduloController extends Controller
{

    public function __construct() {
        $this->middleware(['role:administracion_usuarios']);
    }

    public function index(Request $request)
    {
        $data['page_title'] = 'Submodulo';
        $data['page_description'] = 'This is submodulo test page';
        $data['pid'] = $request->param1;
        $data['tipo'] = $request->param2;
        $data['tab'] = 'submodulo';

        return view::make('pages.administracion.usuario.submodulo')->with('data', $data);
    }

    public function dataTable(){
        $item = new Submodulo();
        return Datatables($item->dataTables())->toJson();
    }

}
