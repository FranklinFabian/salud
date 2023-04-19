<?php

namespace App\Http\Controllers\BancoOxigeno;

use App\Http\Controllers\Controller;
use App\Models\BancoOxigeno\GeneracionOxigeno;
use App\Models\Correlativo;
use App\Models\BancoOxigeno\General;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class GeneralController extends Controller
{

    public function __construct() {
        $this->middleware(['role:banco_oxigeno']);
    }

    public function index(Request $request)
    {
        if($request->param2 == 'update'){
            $data['pid'] = $request->param1;
            $data['tipo'] = $request->param2;
            $data['item'] = General::find($data['pid']);
        }else{
            $data['tipo'] = 'new';
        }

        $general = new General();
        $data['establecimientos'] = $general->establecimientoFiltrado(Auth::user()->id);
        return view::make('pages.bancooxigeno.item.general.index')->with('data', $data);
    }

    public function store(Request $request)
    {
        $data = $request->item;
        $data['fecha'] = date('Y-m-d');
        $correlativo = Correlativo::where('modulo', 'banco_oxigeno')->where('submodulo', 'item')->first();
        $data['codigo'] = 'FORM-BANCO_OXIGENO-' . Auth::user()->id . '-' . $correlativo->numero;
        $data['estado'] = 'Abierto';
        $data['control'] = bcrypt($data['codigo']);
        $data['id_usuario'] = Auth::user()->id;

        $item = new General();
        $existe_item = $item->verificarFichaDuplicada($data['id_establecimiento']);
        if ($existe_item == 0){
            try {
                $general = General::updateOrCreate(['id' => $request->id], $data);
                $res['id'] = $general->id;
                $correlativo->numero = $correlativo->numero + 1;
                $correlativo->save();
                $res['res'] = 1;
            } catch (\Exception $e) {
                $res['id'] = 0;
                $res['res'] = 0;
            }
        }else{
            $res['res'] = 2;
        }

        $res['type'] = $request->type;
        return response()->json($res);
    }

    public function destroy($id)
    {
        try {
            GeneracionOxigeno::where('id_item', $id)->delete();
            General::destroy($id);
            $res = 1;
        } catch (\Exception $e) {
            $res = 0;
        }
        return response()->json($res);
    }

}
