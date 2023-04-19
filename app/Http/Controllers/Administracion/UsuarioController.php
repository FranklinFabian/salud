<?php

namespace App\Http\Controllers\Administracion;

use App\Http\Controllers\Controller;
use App\Models\Administracion\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class UsuarioController extends Controller
{

    public function __construct() {
        $this->middleware(['role:administracion_usuarios']);
    }

    public function index(Request $request)
    {
        $item = new User();
        if ($request->ajax()){
            return Datatables($item->dataTables())->toJson();
        }

        $page_title = 'Datatables';
        $page_description = 'This is datatables test page';

        return view('pages.administracion.usuario.index', compact('page_title', 'page_description'));
    }

    public function tab(Request $request)
    {
        $data['page_title'] = 'Tab';
        $data['page_description'] = 'This is tab test page';
        $data['pid'] = $request->param1;
        $data['tipo'] = $request->param2;
        $data['tab'] = 'general';
        $data['vista'] = 'pages.administracion.usuario.general';
        return view::make('pages.administracion.usuario.tab')->with('data', $data);
    }

    /**
     * Demo methods below
     */

    // Datatables
    public function datatables()
    {
        $page_title = 'Datatables';
        $page_description = 'This is datatables test page';

        return view('pages.datatables', compact('page_title', 'page_description'));
    }



    public function sala_situacional()
    {
        $page_title = 'Dashboard';
        $page_description = 'Some description for the page';

        return view('pages.sala_situacional', compact('page_title', 'page_description'));
    }

}
