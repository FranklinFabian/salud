<?php

namespace App\Http\Controllers\Administracion;

use App\Http\Controllers\Controller;
use App\Models\Administracion\General;
use App\Models\Administracion\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class GeneralController extends Controller
{

    public function __construct() {
        $this->middleware(['role:administracion_usuarios']);
    }

    public function show($request, $tab) {
        $data = ['title'=> 'No tab'];

        if ($tab === 'tab1') {
            $data = ['title' => 'I am tab 1'];
        }

        return view('page', [
            'tab' => $tab,
            'data'=> $data
        ]);
    }

    public function index(Request $request)
    {
        if($request->param2 == 'update'){
            $data['pid'] = $request->param1;
            $data['tipo'] = $request->param2;
            $data['item'] = User::find($data['pid']);
        }else{
            $data['tipo'] = 'new';
        }
        return view::make('pages.administracion.usuario.general')->with('data', $data);
    }

    public function store(Request $request)
    {
        $data = $request->item;
        $data['password'] = bcrypt($request->item['password']);
        try {
            $general = General::updateOrCreate(['id' => $request->id], $data);
            $res['id'] = $general->id;

        } catch (\Exception $e) {
            $res['id'] = 0;
        }
        $res['type'] = $request->type;

        return response()->json($res);
    }

    public function vista(){
        return view::make('pages.administracion.usuario.prueba');
    }
}
