<?php

namespace App\Http\Controllers\BancoOxigeno;

use App\Http\Controllers\Controller;
use App\Models\BancoOxigeno\GeneracionOxigeno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class GeneracionOxigenoController extends Controller
{

    public function __construct() {
        $this->middleware(['role:banco_oxigeno']);
    }

    public function index(Request $request)
    {
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
        }

        $res['type'] = $request->type;
        return response()->json($res);
    }


}
