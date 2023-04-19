<?php

namespace App\Http\Controllers\BancoOxigeno;

use App\Http\Controllers\Controller;
use App\Models\BancoOxigeno\CatalogoDosis;
use App\Models\BancoOxigeno\CatalogoVacuna;
use App\Models\BancoOxigeno\Vacunacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class VacunacionController extends Controller
{

    public function __construct() {
        $this->middleware(['role:banco_oxigeno']);
    }

    public function index(Request $request)
    {
        if($request->param2 == 'update'){
            $data['pid'] = $request->param1;
            $data['tipo'] = $request->param2;
        }else{
            $data['tipo'] = 'new';
        }
        return view::make('pages.bancooxigeno.item.vacunacion.index')->with('data', $data);
    }

    public function edit($id, $type, $pid)
    {
        if($type == 'update'){
            $data['id'] = $id;
            $data['type'] = $type;
            $data['item'] = Vacunacion::find($id);
        }else{
            $data['type'] = 'new';
        }

        $data['pid'] = $pid;

        $data['vacunas'] = CatalogoVacuna::where('estado', 'activo')->get();
        $data['cantidad_dosis'] = CatalogoDosis::where('estado', 'activo')->get();

        return View::make('pages.bancooxigeno.item.vacunacion.modal')->with($data);
    }

    public function dataTable($id){
        $item = new Vacunacion();
        return Datatables($item->dataTables($id))->toJson();
    }


    public function store(Request $request)
    {
        $data = $request->item;
        try {
            $data_inserted = Vacunacion::updateOrCreate(['id' => $request->id], $data);
            $res['id'] = $data_inserted->id;
            $res['res'] = 1;
        } catch (\Exception $e) {
            $res['id'] = 0;
            $res['res'] = 0;
            dd($e->getMessage());
        }

        $res['type'] = $request->type;
        return response()->json($res);

    }

    public function destroy($id)
    {
        try {
            Vacunacion::destroy($id);
            $res = 1;
        } catch (\Exception $e) {
            $res = 0;
        }
        return response()->json($res);
    }


}
