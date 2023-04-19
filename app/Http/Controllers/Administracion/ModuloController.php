<?php

namespace App\Http\Controllers\Administracion;

use App\Http\Controllers\Controller;
use App\Models\Administracion\Modulo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ModuloController extends Controller
{

    public function __construct() {
        $this->middleware(['role:administracion_usuarios']);
    }

    public function index(Request $request)
    {
        $data['page_title'] = 'Modulo';
        $data['page_description'] = 'This is modulo test page';
        $data['pid'] = $request->param1;
        $data['tipo'] = $request->param2;
        $data['tab'] = 'modulo';

        return view::make('pages.administracion.usuario.modulo.index')->with('data', $data);
    }

    public function dataTable(){
        $item = new Modulo();
        return Datatables($item->dataTables())->toJson();
    }

    public function edit($id, $type)
    {
        if($type == 'update'){
            $data['id'] = $id;
            $data['type'] = $type;
            $data['item'] = Modulo::find($id);
        }else{
            $data['type'] = 'new';
        }
        //dd($data);
        //$data['establecimientos'] = CatalogoEstablecimiento::where('estado', 'activo')->get();
        return View::make('pages.administracion.usuario.modulo.modal')->with($data);
    }

    public function store(Request $request)
    {
        //$id_usuario = Auth::user()->id;
        $data = $request->item;

        //Modulo::updateOrCreate(['id' => $request->id], $data);

        //exit;
        //dd($request->type);
        try {
            Modulo::updateOrCreate(['id' => $request->id], $data);
            $res['res'] = 1;
        } catch (\Exception $e) {
            $res['res'] = 0;
        }
        $res['type'] = $request->type;
        return response()->json($res);
    }

    public function destroy($id)
    {
        try {
            Modulo::destroy($id);
            $res = 1;
        } catch (\Exception $e) {
            $res = 0;
        }
        return response()->json($res);
    }

}
