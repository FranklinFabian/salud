<?php

namespace App\Http\Controllers\ParqueInformatico;

use App\Http\Controllers\Controller;
use App\Models\CatalogoDepartamento;
use App\Models\CatalogoEstablecimiento;
use App\Models\Correlativo;
use App\Models\Rhd\AtencionPaciente;
use App\Models\Parqueinformatico\General;
use App\Models\Rhd\InsumoDisponible;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class GeneralController extends Controller
{

    public function __construct() {
        $this->middleware(['role:rhd']);
    }

    public function index(Request $request)
    {
        dd($data['pid']);
        if($request->param2 == 'update'){
            $data['pid'] = $request->param1;
            $data['tipo'] = $request->param2;
            $data['item'] = General::find($data['pid']);
            $id_municipio = $data['item']->cat_establecimiento->cat_municipio->id;
            $data['establecimientos'] = CatalogoEstablecimiento::where('id_municipio', '=', $id_municipio)->get();
        }else{
            $data['tipo'] = 'new';
            $data['establecimientos'] = CatalogoEstablecimiento::all();
        }
        $data['departamentos'] = CatalogoDepartamento::all();
        return view::make('pages.rhd.item.general.index')->with('data', $data);
    }

    public function store(Request $request)
    {
        $data = $request->item;
        $data['id_usuario'] = Auth::user()->id;
        $data['fecha'] = date('Y-m-d');
        $correlativo = Correlativo::where('modulo', 'rhd')->where('submodulo', 'item')->first();
        $data['codigo'] = 'FORM-RHD-' . Auth::user()->id . '-' . $correlativo->numero;
        $data['estado'] = 'Abierto';
        $data['control'] = bcrypt($data['codigo']);

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

    public function establecimiento($id){
        $general = new General;
        $data = $general->get_establecimiento($id);
        return response()->json($data);
    }

    public function destroy($id)
    {
        try {
            AtencionPaciente::where('id_item', $id)->delete();
            InsumoDisponible::where('id_item', $id)->delete();
            General::destroy($id);
            $res = 1;
        } catch (\Exception $e) {
            $res = 0;
        }
        return response()->json($res);
    }

}
