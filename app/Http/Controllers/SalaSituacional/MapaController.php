<?php

namespace App\Http\Controllers\SalaSituacional;

use App\Http\Controllers\Controller;
use App\Models\SalaSituacional\Mapa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class MapaController extends Controller
{

    public function __construct()
    {
        $this->middleware(['role:sala_situacional']);
    }

    public function index(Request $request)
    {

        setlocale(LC_TIME, 'spanish');

        $map =  new Mapa();
        $fecha_ingles = $map->latest('id')->first()->fec_vac;
        $fecha = date_create_from_format("Y-m-d", $fecha_ingles);
        $data['fecha'] = date_format($fecha, "d/m/Y");


        $mapa_total = $map->mapa_total();
        $mapa_total_vacuna = $map->mapa_total_vacuna();

        //$data['tabla_totales_primera_dosis'] = $map->tabla_total_primera_dosis();
        //$data['tabla_totales_segunda_dosis'] = $map->tabla_total_segunda_dosis();

        $total_nacional = $map->count('id');

        $data["beni_primera"] = $map->where('departamento', 'BENI')->where('nro_dosis','1ra. DOSIS')->count();
        $data["beni_segunda"] = $map->where('departamento', 'BENI')->where('nro_dosis','2da DOSIS')->count();

        $data["chuquisaca_primera"] = $map->where('departamento', 'CHUQUISACA')->where('nro_dosis','1ra. DOSIS')->count();
        $data["chuquisaca_segunda"] = $map->where('departamento', 'CHUQUISACA')->where('nro_dosis','2da DOSIS')->count();

        $data["cochabamba_primera"] = $map->where('departamento', 'COCHABAMBA')->where('nro_dosis','1ra. DOSIS')->count();
        $data["cochabamba_segunda"] = $map->where('departamento', 'COCHABAMBA')->where('nro_dosis','2da DOSIS')->count();

        $data["lapaz_primera"] = $map->where('departamento', 'LA PAZ')->where('nro_dosis','1ra. DOSIS')->count();
        $data["lapaz_segunda"] = $map->where('departamento', 'LA PAZ')->where('nro_dosis','2da DOSIS')->count();

        $data["oruro_primera"] = $map->where('departamento', 'ORURO')->where('nro_dosis','1ra. DOSIS')->count();
        $data["oruro_segunda"] = $map->where('departamento', 'ORURO')->where('nro_dosis','2da DOSIS')->count();

        $data["pando_primera"] = $map->where('departamento', 'PANDO')->where('nro_dosis','1ra. DOSIS')->count();
        $data["pando_segunda"] = $map->where('departamento', 'PANDO')->where('nro_dosis','2da DOSIS')->count();

        $data["potosi_primera"] = $map->where('departamento', 'POTOSI')->where('nro_dosis','1ra. DOSIS')->count();
        $data["potosi_segunda"] = $map->where('departamento', 'POTOSI')->where('nro_dosis','2da DOSIS')->count();

        $data["santacruz_primera"] = $map->where('departamento', 'SANTA CRUZ')->where('nro_dosis','1ra. DOSIS')->count();
        $data["santacruz_segunda"] = $map->where('departamento', 'SANTA CRUZ')->where('nro_dosis','2da DOSIS')->count();

        $data["tarija_primera"] = $map->where('departamento', 'TARIJA')->where('nro_dosis','1ra. DOSIS')->count();
        $data["tarija_segunda"] = $map->where('departamento', 'TARIJA')->where('nro_dosis','2da DOSIS')->count();


        /*Tablas por departamento*/
        $tabla_beni = $map->tabla_beni();
        $data['tablas_beni'] = $tabla_beni;

        $tabla_chuquisaca = $map->tabla_chuquisaca();
        $data['tablas_chuquisaca'] = $tabla_chuquisaca;

        $tabla_cochabamba= $map->tabla_cochabamba();
        $data['tablas_cochabamba'] = $tabla_cochabamba;

        $tabla_lapaz = $map->tabla_lapaz();
        $data['tablas_lapaz'] = $tabla_lapaz;

        $tabla_oruro = $map->tabla_oruro();
        $data['tablas_oruro'] = $tabla_oruro;

        $tabla_pando = $map->tabla_pando();
        $data['tablas_pando'] = $tabla_pando;

        $tabla_potosi = $map->tabla_potosi();
        $data['tablas_potosi'] = $tabla_potosi;

        $tabla_santacruz = $map->tabla_santacruz();
        $data['tablas_santacruz'] = $tabla_santacruz;

        $tabla_tarija = $map->tabla_tarija();
        $data['tablas_tarija'] = $tabla_tarija;


        $data['mapa_totales'] = $mapa_total;
        $data['mapa_totales_vacuna'] = $mapa_total_vacuna;
        $data['total_nacional'] = $total_nacional;

        return view('pages.salasituacional.item.mapa.index')->with($data);
    }

}
