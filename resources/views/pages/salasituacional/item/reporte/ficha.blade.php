<html>
<head>
    <style>
        @page {
            margin: 0cm 0cm;
            font-family: Arial, Helvetica, sans-serif, normal;
            font-size: 12px;
        }

        body {
            margin: 3.5cm 2cm 2cm;
        }

        header {
            position: fixed;
            top: 0.6cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;
            text-align: center;
            line-height: 15px;
        }

        #table {

            width: 100%;
        }

        #table td, #table th {
            border: 1px solid #6D6E70;
            padding: 4px;
        }

        #table th {
            text-align: center;
            background-color: #D1D2D4;
        }


        #table tr td:nth-child(1) {
            text-align: center;
        }

        .table-no-margin {
            width: 100%;
            text-align: center;
        }

        input[type=checkbox] {
            transform: scale(1.3);
            background-color: white;
            margin_top: 3px;
            margin-left: 17px;
            color:black;
            padding-top: -6.2px;
            padding-bottom: -4.5px;
            padding-left: -2.7px;
            padding-right: -2.7px;
        }

        #subt{
            text-align: center;
        }

        #msg{
            font-size: 9px;
            font-weight: bold;
            text-align: left !important;
        }

        .tablefooter td{
            background-color: white !important;
            border: 0px !important;
        }

        .tablefooter{
            margin-top: 48px;
            text-align: center;
        }
        .tableheader{
            text-align: center !important;
        }
        .fondoplomo{
            background-color: rgba(167, 188, 198, 0.44);
        }
        .letrasblancas{
            color: white;
        }
        .negrilla{
            font-weight:bold;
        }
        #table-mapa td{

            text-align: center;
            width: 100%;
        }

        .table-striped>tbody>tr:nth-child(odd)>td,
        .table-striped>tbody>tr:nth-child(odd)>th {
            background-color: #eee;
        }
        .table-striped>tbody>tr:nth-child(even)>td,
        .table-striped>tbody>tr:nth-child(even)>th {
            background-color: #ccc;
        }
        .table-striped>thead>tr>th {
            background-color: #eee;
        }


    </style>
</head>
<body>
<script type="text/php">
    if ( isset($pdf) ) {
        $pdf->page_script('
            $font = $fontMetrics->get_font("Arial, Helvetica, sans-serif", "normal");
            $pdf->text(480, 795, "Pagina $PAGE_NUM de $PAGE_COUNT", $font, 10);
        ');
    }
</script>
<header>
    <table width="100%">
        <tr>
            <td align="center" width="30%"><img src="{{ public_path('storage/chacana.jpg') }}" alt="Logo" height="90px"></td>
            <td align="center" width="40%"><div style="font-size:xx-small;  font-weight: bold;">VICEMINISTERIO DE SEGUROS DE SALUD Y GESTIÓN DEL SUS <br>  DIRECCIÓN GENERAL DE SEGUROS DE SALUD
                    <br> DE CORTO PLAZO
                </div></td>
            <td align="center"><img src="{{ public_path('storage/logo.png') }}" alt="Logo" height="100px"></td>
        </tr>

    </table>

</header>
<main>
    <div>
        <h3 id="subt">REPORTE DE SEGUIMIENTO A COVID-19 - SSCP</h3>
        <h4 id="subt">FECHA REPORTE: {{ date('d/m/Y') }}</h4>

        <table id="table" class="tableheader">
            <tr>
                <td colspan="2" class="fondoplomo">
                    CASOS POSITIVOS COVID-19 BOLIVIA - SEMANA EPIDEMIOLÓGICA:
                </td>
                <td>
                    {{ $ultima_semana_epidemiologica }}
                </td>
            </tr>
        </table>

        <table id="table" class="tableheader">
            <tr>
                <td width="33%" class="letrasblancas negrilla" style="background-color: red" >INCREMENTO</td>
                <td width="33%" class="negrilla"style="background-color: yellow" >SIN CAMBIOS</td>
                <td class="letrasblancas negrilla" style="background-color: green">DECREMENTO</td>
            </tr>
        </table>



        <table id="table" class="tableheader">
            <tr>
                <td width="25%" class="negrilla">COBERTURA</td>
                <td width="25%" class="negrilla">CASOS SEMANA {{ $ultima_semana_epidemiologica }}</td>
                <td width="25%" class="negrilla">CASOS SEMANA {{ $ultima_semana_epidemiologica -1 }}</td>
                <td class="negrilla">CAMBIO % ({{ $ultima_semana_epidemiologica -1}} AL {{ $ultima_semana_epidemiologica}})</td>
            </tr>
            <tr>
                <td>NACIONAL</td>
                <td>{{ $covid_positivos_nacional['ultima'] }}</td>
                <td>{{ $covid_positivos_nacional['penultima'] }}</td>
                <td class="letrasblancas" @if($covid_positivos_nacional['ultima'] > $covid_positivos_nacional['penultima']) style="background-color: red;" @else style="background-color: green;" @endif>{{ $covid_positivos_nacional['cambio'] }}%</td>
            </tr>

            @foreach($covid_positivos_departamento as $res)

                <tr>
                    <td>{{ strtoupper($res->departamento) }}</td>
                    <td>{{ $res->ultima }}</td>
                    <td>{{ $res->penultima }}</td>
                    <td class="letrasblancas" @if($res->ultima > $res->penultima) style="background-color: red;" @else style="background-color: green;" @endif>{{ abs(round((($res->penultima - $res->ultima)/$res->penultima)*100,2)) }}%</td>
                </tr>
            @endforeach
        </table>

        <br>
        <br>
        <!-- CAMAS UTI -->

        <table id="table" class="tableheader">
            <tr>
                <td colspan="2" class="fondoplomo">
                    OCUPACIÓN CAMAS UTI NACIONAL - FECHA:
                </td>
                <td>
                    {{ date("d/m/Y", strtotime("yesterday")) }}
                </td>
            </tr>
        </table>

        <table id="table" class="tableheader">
            <tr>
                <td width="33%" class="letrasblancas negrilla" style="background-color: red" >MAYOR AL 85%</td>
                <td width="33%" class="negrilla"style="background-color: yellow" >ENTRE 50% - 85%</td>
                <td class="letrasblancas negrilla" style="background-color: green">MENOR A 50%</td>
            </tr>
        </table>

        <table id="table" class="tableheader">
            <tr>
                <td width="25%" class="negrilla">COBERTURA</td>
                <td width="25%" class="negrilla">CAMAS UTI DISPONIBLES</td>
                <td width="25%" class="negrilla">CAMAS UTI OCUPADAS</td>
                <td class="negrilla">OCUPACIÓN %</td>
            </tr>


            <tr>
                <td>NACIONAL</td>
                <td>{{ $total_camas_uti_habilitadas }}</td>
                <td>{{ $total_camas_uti_ocupadas }}</td>
                <td class="letrasblancas"
                    @if($total_camas_uti_ocupadas == 0)
                    style="background-color: green;"
                    @else
                    @if(($total_camas_uti_ocupadas*100)/$total_camas_uti_habilitadas > 85)
                        style="background-color: red;"
                    @elseif(($total_camas_uti_ocupadas*100)/$total_camas_uti_habilitadas >= 50 && ($total_camas_uti_ocupadas*100)/$total_camas_uti_habilitadas <= 85)
                        style="background-color: yellow; color: black;"
                    @else
                        style="background-color: green;"
                    @endif
                    @endif>

                    @if($total_camas_uti_ocupadas == 0)
                        0%
                    @else
                        {{ round(($total_camas_uti_ocupadas* 100)/$total_camas_uti_habilitadas,2) }}%
                    @endif
                </td>

            </tr>


            @foreach($camas_uti as $res_camas)

                <tr>
                    <td>{{ strtoupper($res_camas->departamento) }}</td>
                    <td>{{ $res_camas->total_camas_uti_habilitadas }}</td>
                    <td>{{ $res_camas->total_camas_uti_ocupadas }}</td>
                    <td class="letrasblancas"
                        @if($res_camas->total_camas_uti_ocupadas == 0)
                            style="background-color: green;"
                        @else

                                @if($res_camas->total_camas_uti_habilitadas > 0)
                                    @if(($res_camas->total_camas_uti_ocupadas*100)/$res_camas->total_camas_uti_habilitadas > 85)
                                        style="background-color: red;"
                                    @elseif(($res_camas->total_camas_uti_ocupadas*100)/$res_camas->total_camas_uti_habilitadas >= 50 && ($res_camas->total_camas_uti_ocupadas*100)/$res_camas->total_camas_uti_habilitadas <= 85)
                                        style="background-color: yellow; color: black;"
                                    @else
                                        style="background-color: green;"
                                    @endif
                                @else
                                    style="background-color: green;"
                                @endif






                        @endif>

                        @if($res_camas->total_camas_uti_ocupadas == 0)
                            0%
                        @else

                            @if($res_camas->total_camas_uti_habilitadas > 0)
                                {{ round(($res_camas->total_camas_uti_ocupadas* 100)/$res_camas->total_camas_uti_habilitadas,2) }}%

                            @else

                                0%
                            @endif




                        @endif
                        </td>
                </tr>
            @endforeach
        </table>






        <div style="page-break-after:always;"></div>





        <table id="table" class="tableheader">
            <tr>
                <td colspan="2" class="fondoplomo">
                    OCUPACIÓN CAMAS UTI COMPRA DE SERVICIOS:
                </td>
                <td>
                    {{ date("d/m/Y", strtotime("yesterday")) }}
                </td>
            </tr>
        </table>


        <table id="table" class="tableheader">
            <tr>
                <td width="25%" class="negrilla">COBERTURA</td>
                <td width="25%" class="negrilla">CAMAS UTI DISPONIBLES</td>
                <td width="25%" class="negrilla">CAMAS UTI OCUPADAS</td>
                <td class="negrilla">OCUPACIÓN %</td>
            </tr>


            <tr>
                <td>NACIONAL</td>
                <td>{{ $total_camas_habilitadas_compra }}</td>
                <td>{{ $total_camas_ocupadas_compra }}</td>
                <td class="letrasblancas"
                    @if($total_camas_ocupadas_compra == 0)
                    style="background-color: green;"
                    @else
                    @if(($total_camas_ocupadas_compra*100)/$total_camas_habilitadas_compra > 85)
                    style="background-color: red;"
                    @elseif(($total_camas_ocupadas_compra*100)/$total_camas_habilitadas_compra >= 50 && ($total_camas_ocupadas_compra*100)/$total_camas_habilitadas_compra <= 85)
                    style="background-color: yellow; color: black;"
                    @else
                    style="background-color: green;"
                        @endif
                        @endif>

                    @if($total_camas_ocupadas_compra == 0)
                        0%
                    @else
                        {{ round(($total_camas_ocupadas_compra* 100)/$total_camas_habilitadas_compra,2) }}%
                    @endif
                </td>

            </tr>


            @foreach($camas_uti as $res_camas)

                <tr>
                    <td>{{ strtoupper($res_camas->departamento) }}</td>
                    <td>{{ $res_camas->total_camas_habilitadas_compra }}</td>
                    <td>{{ $res_camas->total_camas_ocupadas_compra }}</td>
                    <td class="letrasblancas"
                        @if($res_camas->total_camas_ocupadas_compra == 0 || $res_camas->total_camas_habilitadas_compra == 0)
                        style="background-color: green;"
                        @else
                        @if(($res_camas->total_camas_ocupadas_compra*100)/$res_camas->total_camas_habilitadas_compra > 85)
                        style="background-color: red;"
                        @elseif(($res_camas->total_camas_ocupadas_compra*100)/$res_camas->total_camas_habilitadas_compra >= 50 && ($res_camas->total_camas_ocupadas_compra*100)/$res_camas->total_camas_habilitadas_compra <= 85)
                        style="background-color: yellow; color: black;"
                        @else
                        style="background-color: green;"
                            @endif
                            @endif>

                        @if($res_camas->total_camas_ocupadas_compra == 0 || $res_camas->total_camas_habilitadas_compra == 0)
                            0%
                        @else
                            {{ round(($res_camas->total_camas_ocupadas_compra* 100)/$res_camas->total_camas_habilitadas_compra,2) }}%
                        @endif
                    </td>
                </tr>
            @endforeach
        </table>


        <br><br>















        <!-- TUBOS DE OXIGENO -->

        <table id="table" class="tableheader">
            <tr>
                <td colspan="2" class="fondoplomo">
                    DISPONIBILIDAD DE TUBOS DE OXÍGENO A NIVEL NACIONAL - FECHA:
                </td>
                <td>
                    {{ date("d/m/Y", strtotime("yesterday")) }}
                </td>
            </tr>
        </table>

        <table id="table" class="tableheader">
            <tr>
                <td width="33%" class="letrasblancas negrilla" style="background-color: red" >TUBOS VACÍOS MAYOR A 85%</td>
                <td width="33%" class="negrilla"style="background-color: yellow" >TUBOS VACÍOS 50% - 85%</td>
                <td class="letrasblancas negrilla" style="background-color: green">TUBOS VACÍOS MENOR A 50% </td>
            </tr>
        </table>

        <table id="table" class="tableheader">
            <tr>
                <td width="25%" class="negrilla">COBERTURA</td>
                <td width="25%" class="negrilla">TUBOS TOTALES</td>
                <td width="25%" class="negrilla">TUBOS VACIOS</td>
                <td class="negrilla">DISPONIBILIDAD %</td>
            </tr>


            <tr>
                <td>NACIONAL</td>
                <td>{{ $total_tubos_totales }}</td>
                <td>{{ $total_tubos_vacios }}</td>
                <td class="letrasblancas"
                    @if($total_tubos_vacios == 0)
                    style="background-color: green;"
                    @else
                    @if(($total_tubos_vacios*100)/$total_tubos_totales > 85)
                    style="background-color: red;"
                    @elseif(($total_tubos_vacios*100)/$total_tubos_totales >= 50 && ($total_tubos_vacios*100)/$total_tubos_totales <= 85)
                    style="background-color: yellow; color: black;"
                    @else
                    style="background-color: green;"
                        @endif
                        @endif>

                    @if($total_tubos_vacios == 0)
                        0%
                    @else
                        {{ round(($total_tubos_vacios* 100)/$total_tubos_totales,2) }}%
                    @endif
                </td>

            </tr>


            @foreach($tubos_oxigeno as $res_tubos)

                <tr>
                    <td>{{ strtoupper($res_tubos->departamento) }}</td>
                    <td>{{ $res_tubos->tubos_llenos + $res_tubos->tubos_vacios }}</td>
                    <td>{{ $res_tubos->tubos_vacios }}</td>
                    <td class="letrasblancas"
                        @if($res_tubos->tubos_vacios == 0)
                        style="background-color: green;"
                        @else
                        @if(($res_tubos->tubos_vacios*100)/($res_tubos->tubos_llenos + $res_tubos->tubos_vacios) > 85)
                        style="background-color: red;"
                        @elseif(($res_tubos->tubos_vacios*100)/($res_tubos->tubos_llenos + $res_tubos->tubos_vacios) >= 50 && ($res_tubos->tubos_vacios*100)/($res_tubos->tubos_llenos + $res_tubos->tubos_vacios) <= 85)
                        style="background-color: yellow; color: black;"
                        @else
                        style="background-color: green;"
                            @endif
                            @endif>

                        @if($res_tubos->tubos_vacios == 0)
                            0%
                        @else
                            {{ round(($res_tubos->tubos_vacios* 100)/($res_tubos->tubos_llenos + $res_tubos->tubos_vacios),2) }}%
                        @endif
                    </td>
                </tr>
            @endforeach
        </table>

        <br><br><br>

        <table class="table-no-margin">
            <tr>
                <td width="33%"><div style="border-color: red; border-style: solid; background-color: red; color:white; font-weight: bold; border-radius: 5px; ">TOTAL CASOS COVID-19</div></td>
                <td width="33%"><div style="border-color: blue; border-style: solid; background-color: blue; color:white; font-weight: bold; border-radius: 5px; ">DESCARTADOS</div></td>
                <td width="33%"><div style="border-color: green; border-style: solid; background-color: green; color:white; font-weight: bold; border-radius: 5px; ">RECUPERADOS</div></td>
            </tr>
            <tr>
                <td width="33%"><div style="border-color: red; border-style: solid; color:black; font-weight: bold; border-radius: 5px; ">{{ $resumen_sive1->positivo }}</div></td>
                <td width="33%"><div style="border-color: blue; border-style: solid; color:black; font-weight: bold; border-radius: 5px; ">{{ $resumen_sive1->descartado }}</div></td>
                <td width="33%"><div style="border-color: green; border-style: solid; color:black; font-weight: bold; border-radius: 5px; ">{{ $resumen_sive2->recuperado }}</div></td>
            </tr>
        </table>

        <table class="table-no-margin">
            <tr>
                <td width="33%"><div style="border-color: grey; border-style: solid; background-color: grey; color:white; font-weight: bold; border-radius: 5px; ">TOTAL DECESOS</div></td>
                <td width="33%"><div style="border-color: blue; border-style: solid; background-color: blue; color:white; font-weight: bold; border-radius: 5px; ">TOTAL ACTIVOS</div></td>
                <td width="33%"><div style="border-color: orangered; border-style: solid; background-color: orangered; color:white; font-weight: bold; border-radius: 5px; ">TASA DE LETALIDAD 3ra Ola </div></td>
            </tr>
            <tr>
                <td width="33%"><div style="border-color: grey; border-style: solid; color:black; font-weight: bold; border-radius: 5px; ">{{ $resumen_sive2->fallecido }}</div></td>
                <td width="33%"><div style="border-color: blue; border-style: solid; color:black; font-weight: bold; border-radius: 5px; ">{{ $resumen_sive2->activo }}</div></td>
                <td width="33%"><div style="border-color: orangered; border-style: solid; color:black; font-weight: bold; border-radius: 5px; ">2.7%</div></td>
            </tr>
        </table>

        <div style="page-break-after:always;"></div>

        <h2 style="background-color: grey; color: white;" align="center">RESUMEN POR DEPARTAMENTOS</h2>
        <h4 id="subt">FECHA REPORTE: {{ date('d/m/Y') }}</h4>




        <table id="table-mapa">
            <tr>
                <td></td>
                <td colspan="5" rowspan="7" style="vertical-align: bottom;"><img src="{{ public_path('storage/mapa.png') }}"  alt="Mapa" width="77%" height="550 px;"></td>
                <td></td>
            </tr>
            <tr>
                <td>
                    <div style="background-color: grey; border-color: grey; border-style: solid; color:white; font-weight: bold; border-radius: 5px; "><strong>CASOS</strong><br>
                        {{ $covid_positivos_departamento[5]->ultima }}<br>
                        <strong>UTIS</strong> <br>
                        {{ $camas_uti[5]->total_camas_uti_habilitadas - $camas_uti[5]->total_camas_uti_ocupadas}} <br>
                        <strong>OXIGENO</strong> <br>
                        {{ $tubos_oxigeno[5]->tubos_vacios}}
                    </div>
                </td>
                <td>
                    <div style="background-color: grey; border-color: grey; border-style: solid; color:white; font-weight: bold; border-radius: 5px; "><strong>CASOS</strong><br>
                        {{ $covid_positivos_departamento[0]->ultima }}<br>
                         <strong>UTIS</strong> <br>
                        {{ $camas_uti[0]->total_camas_uti_habilitadas - $camas_uti[0]->total_camas_uti_ocupadas}} <br>
                        <strong>OXIGENO</strong> <br>
                        {{ $tubos_oxigeno[0]->tubos_vacios}}
                        </div>
                </td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>
                    <div style="background-color: grey; border-color: grey; border-style: solid; color:white; font-weight: bold; border-radius: 5px; "><strong>CASOS</strong><br>
                        {{ $covid_positivos_departamento[3]->ultima }}<br>
                        <strong>UTIS</strong> <br>
                        {{ $camas_uti[3]->total_camas_uti_habilitadas - $camas_uti[3]->total_camas_uti_ocupadas}} <br>
                        <strong>OXIGENO</strong> <br>
                        {{ $tubos_oxigeno[3]->tubos_vacios}}
                    </div>
                </td>
                <td>
                    <div style="background-color: grey; border-color: grey; border-style: solid; color:white; font-weight: bold; border-radius: 5px; "><strong>CASOS</strong><br>
                        {{ $covid_positivos_departamento[7]->ultima }}<br>
                        <strong>UTIS</strong> <br>
                        {{ $camas_uti[6]->total_camas_uti_habilitadas - $camas_uti[6]->total_camas_uti_ocupadas}} <br>
                        <strong>OXIGENO</strong> <br>
                        {{ $tubos_oxigeno[6]->tubos_vacios}}
                    </div>
                </td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>
                    <div style="background-color: grey; border-color: grey; border-style: solid; color:white; font-weight: bold; border-radius: 5px; "><strong>CASOS</strong><br>
                        <br>
                        <strong>UTIS</strong> <br>
                        <strong>OXIGENO</strong> <br>
                    </div>
                </td>
                <td>
                    <div style="background-color: grey; border-color: grey; border-style: solid; color:white; font-weight: bold; border-radius: 5px; "><strong>CASOS</strong><br>
                        {{ $covid_positivos_departamento[2]->ultima }}<br>
                        <strong>UTIS</strong> <br>
                        {{ $camas_uti[2]->total_camas_uti_habilitadas - $camas_uti[2]->total_camas_uti_ocupadas}} <br>
                        <strong>OXIGENO</strong> <br>
                        {{ $tubos_oxigeno[2]->tubos_vacios}}
                    </div>
                </td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>

            <tr>
                <td></td>
                <td>
                    <div style="background-color: grey; border-color: grey; border-style: solid; color:white; font-weight: bold; border-radius: 5px; "><strong>CASOS</strong><br>
                        {{ $covid_positivos_departamento[6]->ultima }}<br>
                        <strong>UTIS</strong> <br>
                        {{ $camas_uti[5]->total_camas_uti_habilitadas - $camas_uti[5]->total_camas_uti_ocupadas}} <br>
                        <strong>OXIGENO</strong> <br>
                        {{ $tubos_oxigeno[5]->tubos_vacios}}
                    </div>
                </td>
                <td></td>

                <td>
                    <div style="background-color: grey; border-color: grey; border-style: solid; color:white; font-weight: bold; border-radius: 5px; "><strong>CASOS</strong><br>

                    </div>
                </td>
                <td></td>
                <td>
                    <div style="background-color: grey; border-color: grey; border-style: solid; color:white; font-weight: bold; border-radius: 5px; "><strong>CASOS</strong><br>
                        {{ $covid_positivos_departamento[1]->ultima }}<br>
                        <strong>UTIS</strong> <br>
                        {{ $camas_uti[1]->total_camas_uti_habilitadas - $camas_uti[1]->total_camas_uti_ocupadas}} <br>
                        <strong>OXIGENO</strong> <br>
                        {{ $tubos_oxigeno[1]->tubos_vacios}}
                    </div>
                </td>
                <td></td>
            </tr>
        </table>


        <br>
        <h4 id="subt">*EN EL MAPA, SE PUEDE APRECIAR: NÚMERO DE CASOS POSITIVOS COVID-19 (SEMANA EPIDEMIOLÓGICA), NÚMERO DE CAMAS UTI DISPONIBLES Y NÚMERO DE TUBOS DE OXÍGENO VACIOS, REPORTADOS EN LA FECHA</h4>

        <div style="page-break-after:always;"></div>

        <h3 style="color: black;" align="center">RESUMEN DE VACUNACIÓN POR ENTE GESTOR A FECHA {{ date('d/m/Y') }}</h3>




        <table id="table">
            <tr style="background-color: #026AB4; color: white;" >
                <td width="20%" style="font-size: 10px;"><strong>ENTE GESTOR</strong></td>
                <td width="10%" style="font-size: 8px;">SPUTNIK V 1D</td>
                <td width="10%" style="font-size: 8px;">SPUTNIK V 2D</td>
                <td width="10%" style="font-size: 8px;">SINOPHARM 1D</td>
                <td width="10%" style="font-size: 8px;">SINOPHARM 2D</td>
                <td width="10%" style="font-size: 8px;">AZTRA SENECA 1D</td>
                <td width="10%" style="font-size: 8px;">AZTRA SENECA 2D</td>
                <td width="10%" style="font-size: 8px;">PFIZER 1D</td>
                <td width="10%" style="font-size: 8px;">PFIZER 2D</td>
            </tr>
        </table>


        <table id="table" class="table table-striped">

            <?php
                $sput1=0;
                $sput2=0;
                $sin1=0;
                $sin2=0;
                $as1=0;
                $as2=0;
                $pfi1=0;
                $pfi2=0;
            ?>
            @foreach($resumen_vacunas_ente as $resve)
                <tr style="text-align: right;">
                    <td width="20%" style="font-size: 8px;">
                        {{ strtoupper($resve->ente_gestor) }}
                    </td>
                    <td width="10%">
                        {{ $resve->sputnik_1d }}
                        <?php $sput1 = $sput1 + $resve->sputnik_1d ?>
                    </td>
                    <td width="10%">
                        {{ $resve->sputnik_2d }}
                        <?php $sput2 = $sput2 + $resve->sputnik_2d ?>
                    </td>
                    <td width="10%">
                        {{ $resve->sinopharm_1d }}
                        <?php $sin1 = $sin1 + $resve->sinopharm_1d ?>
                    </td>
                    <td width="10%">
                        {{ $resve->sinopharm_2d }}
                        <?php $sin2 = $sin2 + $resve->sinopharm_2d ?>
                    </td>
                    <td width="10%">
                        {{ $resve->astrazeneca_1d }}
                        <?php $as1 = $as1 + $resve->astrazeneca_1d ?>
                    </td>
                    <td width="10%">
                        {{ $resve->astrazeneca_2d }}
                        <?php $as2 = $as2 + $resve->astrazeneca_2d ?>
                    </td>
                    <td width="10%">
                        {{ $resve->pfizer_1d }}
                        <?php $pfi1 = $pfi1 + $resve->pfizer_1d ?>
                    </td>
                    <td width="10%">
                        {{ $resve->pfizer_2d }}
                        <?php $pfi2 = $pfi2 + $resve->pfizer_2d ?>
                    </td>
                </tr>
            @endforeach

        </table>



        <table id="table">
            <tr style="background-color: #026AB4; color: white; text-align: right;">
                <td width="20%">
                    SUBTOTALES
                </td>
                <td width="10%">
                    {{ $sput1 }}
                </td>
                <td width="10%">
                    {{ $sput2 }}
                </td>
                <td width="10%">
                    {{ $sin1 }}
                </td>
                <td width="10%">
                    {{ $sin2 }}
                </td>
                <td width="10%">
                    {{ $as1 }}
                </td>
                <td width="10%">
                    {{ $as2 }}
                </td>
                <td width="10%">
                    {{ $pfi1 }}
                </td>
                <td width="10%">
                    {{ $pfi2 }}
                </td>

            </tr>

            <tr style="background-color: #026AB4; color: white;">
                <td><strong>TOTAL</strong></td>
                <td align="center" colspan="8"><strong> {{ $sput1 + $sput2 +$sin1 + $sin2 + $as1 +$as2 +$pfi1 + $pfi2}} </strong></td>
            </tr>
        </table>



    </div>


</main>
</body>
</html>
