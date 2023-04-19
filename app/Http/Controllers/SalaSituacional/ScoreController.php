<?php

namespace App\Http\Controllers\SalaSituacional;

use App\Http\Controllers\Controller;
use App\Models\SalaSituacional\Score;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ScoreController extends Controller
{

    public function __construct()
    {
        $this->middleware(['role:sala_situacional']);
    }

    public function index(Request $request)
    {
        $item = new Score();

        $data['score_vacunados'] = $item->score_vacunados();
        $data['score_capacidad_instalada'] = $item->score_capacidad_instalada();
        $data['score_casos_covid'] = $item->score_casos_covid();
        $data['score_oxigeno_disponible'] = $item->score_oxigeno_disponible();

        return view::make('pages.salasituacional.item.score.index')->with($data);
    }

}
