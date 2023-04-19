<?php

namespace App\Http\Controllers\Rhd;

use App\Http\Controllers\Controller;
use App\Models\Rhd\InsumoDisponible;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class InsumoDisponibleController extends Controller
{

    public function __construct() {
        $this->middleware(['role:rhd']);
    }

    public function index(Request $request)
    {
        if($request->param2 == 'update'){
            $data['pid'] = $request->param1;
            $data['tipo'] = $request->param2;
            $data['item'] = InsumoDisponible::where('id_item',$data['pid'])->first();
        }else{
            $data['tipo'] = 'new';
        }
        return view::make('pages.rhd.item.insumodisponible.index')->with('data', $data);
    }

    public function store(Request $request)
    {
        $data = $request->item;
        try {
            $data_inserted = InsumoDisponible::updateOrCreate(['id' => $request->id], $data);
            $res['id'] = $data_inserted->id;
            $res['res'] = 1;
        } catch (\Exception $e) {
            $res['id'] = 0;
            $res['res'] = 0;
        }

        $res['type'] = $request->type;
        return response()->json($res);
    }

    public function destroy($id)
    {
        try {
            InsumoDisponible::destroy($id);
            $res = 1;
        } catch (\Exception $e) {
            $res = 0;
        }
        return response()->json($res);
    }

}
