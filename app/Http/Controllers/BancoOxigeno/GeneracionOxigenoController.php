<?php

namespace App\Http\Controllers\BancoOxigeno;

use App\Http\Controllers\Controller;
use App\Models\BancoOxigeno\GeneracionOxigeno;
use App\Models\BancoOxigeno\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class GeneracionOxigenoController extends Controller
{

    public function __construct() {
        $this->middleware(['role:banco_oxigeno']);
    }

    public function index(Request $request)
    {
        /*if($request->param2 == 'update'){
            $data['pid'] = $request->param1;
            $data['tipo'] = $request->param2;
            $item = new GeneracionOxigeno();
            //$existen_datos_registrados = GeneracionOxigeno::where('id_item',$data['pid'])->first();
            $existen_datos_registrados = $item->registro_actual($data['pid']);
            //dd($existen_datos_registrados);
            if (is_null($existen_datos_registrados)){
                //Se obtienes datos del ultimo registro por establecimiento y usuario
                $id_establecimiento =  Item::where('id',$request->param1)->first()->id_establecimiento;
                $precarga = $item->ultimo_registro(Auth::user()->id, $id_establecimiento);
                //dd($precarga);
                if (is_null($precarga)){
                    $data['item'] = null;
                }else{
                    $data['item'] = $precarga;
                }
            }else{
                $data['item'] = $existen_datos_registrados;
            }
        }else{
            $data['tipo'] = 'new';
        }*/

        if($request->param2 == 'update'){
            $data['pid'] = $request->param1;
            $data['tipo'] = $request->param2;
            $data['item'] = GeneracionOxigeno::where('id_item',$data['pid'])->first();
        }else{
            $data['tipo'] = 'new';
        }

        return view::make('pages.bancooxigeno.item.generacionoxigeno.index')->with('data', $data);
    }

    public function store(Request $request)
    {
        $data = $request->item;
        try {
            $data_inserted = GeneracionOxigeno::updateOrCreate(['id' => $request->id], $data);
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


}
