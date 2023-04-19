<html>
<head>
    <style>
        @page {
            margin: 0cm 0cm;
            font-family: Arial, Helvetica, sans-serif, normal;
            font-size: 12px;
        }

        body {
            margin: 3.4cm 2cm 2cm;
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
            text-align: left !important;
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
        <h3 id="subt">SISTEMA MODULAR DE INFORMACIÓN DE SALUD</h3>
        <h4 id="subt">FICHA DE GENERACIÓN DE OXÍGENO Y USO</h4>

        <table id="table" class="tableheader">
            <tr>
                <td width="55%">
                    <strong>ENTE GESTOR:</strong>
                </td>
                <td>
                    @isset( $data->ente_gestor ){{ $data->ente_gestor }} @endisset
                </td>
            </tr>
            <tr>
                <td>
                    <strong>NOMBRE DEL ESTABLECIMIENTO DE SALUD:</strong>
                </td>
                <td>
                    @isset( $data->establecimiento ) {{ $data->establecimiento }} @endisset
                </td>
            </tr>
            <tr>
                <td>
                    <strong>DEPARTAMENTO DEL ESTABLECIMIENTO DE SALUD:</strong>
                </td>
                <td>
                    @isset( $data->departamento ) {{ $data->departamento }} @endisset
                </td>
            </tr>
            <tr>
                <td>
                    <strong>CÓDIGO DE FORMULARIO:</strong>
                </td>
                <td>
                    @isset( $data->codigo ){{ $data->codigo }} @endisset
                </td>
            </tr>
            <tr>
                <td>
                    <strong>ESTADO DE FORMULARIO:</strong>
                </td>
                <td>
                    @isset( $data->estado ){{ $data->estado }} @endisset
                </td>
            </tr>
            <tr>
                <td>
                    <strong>NOMBRE DEL SUPERVISOR:</strong>
                </td>
                <td>
                    @isset( $data->nombre ) {{ $data->nombre }} @endisset
                </td>
            </tr>
            <tr>
                <td>
                    <strong>EMAIL:</strong>
                </td>
                <td>
                    @isset( $data->email ) {{ $data->email }} @endisset
                </td>
            </tr>
            <tr>
                <td>
                    <strong>FECHA:</strong>
                </td>
                <td>
                    @isset( $data->fecha_formateada ) {{ $data->fecha_formateada }} @endisset
                </td>
            </tr>
        </table>


        <table id="table" class="tableheader">
            <tr>
                <th>DESCRIPCIÓN</th>
                <th width="10%">SI</th>
                <th width="10%">NO</th>
            </tr>
            <tr>
                <td>¿Su Establecimiento de Salud Cuenta con Generador de Oxígeno Medicinal?</td>
                <td width="10%"><input type="checkbox" @isset($data->generador_oxigeno) @if($data->generador_oxigeno == 'Si') checked @endif @endisset></td>
                <td width="10%"><input type="checkbox" @isset($data->generador_oxigeno) @if($data->generador_oxigeno == 'No') checked @endif @endisset></td>
            </tr>
            @if($data->generador_oxigeno == 'Si')
                <tr>
                    <td>Ingrese la Capacidad de Producción (m3/h):</td>
                    <td colspan="2">@isset( $data->generador_capacidad_produccion ) {{ $data->generador_capacidad_produccion  }} @endisset</td>
                </tr>
                <tr>
                    <td>Ingrese el Consumo Promedio del Día Anterior (m3/día):</td>
                    <td colspan="2">@isset( $data->generador_consumo_promedio ) {{ $data->generador_consumo_promedio  }} @endisset</td>
                </tr>
                <tr>
                    <td>Ingresa el Número de Cilindros Recargados el Día Anterior:</td>
                    <td colspan="2">@isset( $data->generador_cilindros_recargados ) {{ $data->generador_cilindros_recargados  }} @endisset</td>
                </tr>
            @endif
        </table>

        <table id="table" class="tableheader">
            <tr>
                <th>DESCRIPCIÓN</th>
                <th width="10%">SI</th>
                <th width="10%">NO</th>
            </tr>
            <tr>
                <td>¿Su Establecimiento Cuenta con Contrato Vigente para la Provisión de Oxigeno?</td>
                <td width="10%"><input type="checkbox" @isset($data->contrato_vigente) @if($data->contrato_vigente == 'Si') checked @endif @endisset></td>
                <td width="10%"><input type="checkbox" @isset($data->contrato_vigente) @if($data->contrato_vigente == 'No') checked @endif @endisset></td>
            </tr>
            @if($data->contrato_vigente == 'Si')
                <tr>
                    <td>Nombre de la Empresa:</td>
                    <td colspan="2">@isset( $data->empresa_contrato ) {{ $data->empresa_contrato  }} @endisset</td>
                </tr>
                <tr>
                    <td>Fecha Final de Contrato:</td>
                    <td colspan="2">@isset( $data->fecha_final_contrato ) {{ $data->fecha_final_contrato  }} @endisset</td>
                </tr>

            @endif
        </table>

        <table id="table" class="tableheader">
            <tr>
                <th>DESCRIPCIÓN</th>
                <th width="10%">SI</th>
                <th width="10%">NO</th>
            </tr>
            <tr>
                <td>¿Su Establecimiento Cuenta con Tanque Criogénico?</td>
                <td width="10%"><input type="checkbox" @isset($data->tanque_criogenico) @if($data->tanque_criogenico == 'Si') checked @endif @endisset></td>
                <td width="10%"><input type="checkbox" @isset($data->tanque_criogenico) @if($data->tanque_criogenico == 'No') checked @endif @endisset></td>
            </tr>
            @if($data->tanque_criogenico == 'Si')
                <tr>
                    <td>Ingrese la Capacidad del Tanque (m3):</td>
                    <td colspan="2">@isset( $data->tanque_criogenico_capacidad ) {{ $data->tanque_criogenico_capacidad  }} @endisset</td>
                </tr>
                <tr>
                    <td>Ingrese el Consumo Promedio del Día Anterior (m3/día):</td>
                    <td colspan="2">@isset( $data->tanque_criogenico_consumo ) {{ $data->tanque_criogenico_consumo  }} @endisset</td>
                </tr>

            @endif
        </table>

        <table id="table" class="tableheader">
            <tr>
                <th>DESCRIPCIÓN</th>
                <th width="10%">SI</th>
                <th width="10%">NO</th>
            </tr>
            <tr>
                <td>¿Su Establecimiento Cuenta con Tubos de Oxígeno de 6 m3?</td>
                <td width="10%"><input type="checkbox" @isset($data->tubos_6) @if($data->tubos_6 == 'Si') checked @endif @endisset></td>
                <td width="10%"><input type="checkbox" @isset($data->tubos_6) @if($data->tubos_6 == 'No') checked @endif @endisset></td>
            </tr>
            @if($data->tubos_6 == 'Si')
                <tr>
                    <td>Ingrese el Número de Tubos de Oxigeno Medicinal Llenos (Disponibles):</td>
                    <td colspan="2">@isset( $data->tubos_llenos_6 ) {{ $data->tubos_llenos_6  }} @endisset</td>
                </tr>
                <tr>
                    <td>Ingrese el Número de Tubos de Oxigeno Medicinal Vacíos:</td>
                    <td colspan="2">@isset( $data->tubos_vacios_6 ) {{ $data->tubos_vacios_6  }} @endisset</td>
                </tr>
                <tr>
                    <td>Ingrese el Consumo de Tubos de Oxigeno Medicinal del Día Anterior:</td>
                    <td colspan="2">@isset( $data->tubos_consumo_oxigeno_6 ) {{ $data->tubos_consumo_oxigeno_6  }} @endisset</td>
                </tr>
            @endif
        </table>

        <table id="table" class="tableheader">
            <tr>
                <th>DESCRIPCIÓN</th>
                <th width="10%">SI</th>
                <th width="10%">NO</th>
            </tr>
            <tr>
                <td>¿Su Establecimiento Cuenta con Tubos de Oxígeno de 8 m3?</td>
                <td width="10%"><input type="checkbox" @isset($data->tubos_8) @if($data->tubos_8 == 'Si') checked @endif @endisset></td>
                <td width="10%"><input type="checkbox" @isset($data->tubos_8) @if($data->tubos_8 == 'No') checked @endif @endisset></td>
            </tr>
            @if($data->tubos_8 == 'Si')
                <tr>
                    <td>Ingrese el Número de Tubos de Oxigeno Medicinal Llenos (Disponibles):</td>
                    <td colspan="2">@isset( $data->tubos_llenos_8 ) {{ $data->tubos_llenos_8  }} @endisset</td>
                </tr>
                <tr>
                    <td>Ingrese el Número de Tubos de Oxigeno Medicinal Vacíos:</td>
                    <td colspan="2">@isset( $data->tubos_vacios_8 ) {{ $data->tubos_vacios_8  }} @endisset</td>
                </tr>
                <tr>
                    <td>Ingrese el Consumo de Tubos de Oxigeno Medicinal del Día Anterior:</td>
                    <td colspan="2">@isset( $data->tubos_consumo_oxigeno_8 ) {{ $data->tubos_consumo_oxigeno_8  }} @endisset</td>
                </tr>
            @endif
        </table>


        <table id="table" class="tableheader">
            <tr>
                <th>DESCRIPCIÓN</th>
                <th width="20%">CANTIDAD</th>
            </tr>
            <tr>
                <td>Ingrese el Número de Camas Habilitadas en Internación:</td>
                <td>@isset( $data->camas_habilitadas_internacion ) {{ $data->camas_habilitadas_internacion  }} @endisset</td>
            </tr>
            <tr>
                <td>Ingrese el Número de Camas Ocupadas en Internación:</td>
                <td>@isset( $data->camas_ocupadas_internacion ) {{ $data->camas_ocupadas_internacion  }} @endisset</td>
            </tr>
            <tr>
                <td>Ingrese el Número de Camas Habilitadas en Terapia Intermedia:</td>
                <td>@isset( $data->camas_habilitadas_terapia_intermedia ) {{ $data->camas_habilitadas_terapia_intermedia  }} @endisset</td>
            </tr>
            <tr>
                <td>Ingrese el Número de Camas Ocupadas en Terapia Intermedia:</td>
                <td>@isset( $data->camas_ocupadas_terapia_intermedia ) {{ $data->camas_ocupadas_terapia_intermedia  }} @endisset</td>
            </tr>
            <tr>
                <td>Ingrese el Número de Camas Habilitadas en Terapia Intensiva:</td>
                <td>@isset( $data->camas_habilitadas_terapia_intensiva ) {{ $data->camas_habilitadas_terapia_intensiva  }} @endisset</td>
            </tr>
            <tr>
                <td>Ingrese el Número de Camas Ocupadas en Terapia Intensiva:</td>
                <td>@isset( $data->camas_ocupadas_terapia_intensiva ) {{ $data->camas_ocupadas_terapia_intensiva  }} @endisset</td>
            </tr>
            <tr>
                <td>Ingrese el Número de Camas Habilitadas en Emergencias:</td>
                <td>@isset( $data->camas_habilitadas_emergencias ) {{ $data->camas_habilitadas_emergencias  }} @endisset</td>
            </tr>
            <tr>
                <td>Ingrese el Número de Camas Ocupadas en Emergencias:</td>
                <td>@isset( $data->camas_ocupadas_emergencias ) {{ $data->camas_ocupadas_emergencias  }} @endisset</td>
            </tr>
            <tr>
                <td>¿Cuantos Pacientes COVID-19 Refirio a Otro Centro Médico el Día Anterior?</td>
                <td>@isset( $data->pacientes_covid_referidos ) {{ $data->pacientes_covid_referidos  }} @endisset</td>
            </tr>

        </table>

        <table id="table" class="tableheader">
            <tr>
                <th>DESCRIPCIÓN</th>
                <th width="10%">SI</th>
                <th width="10%">NO</th>
            </tr>
            <tr>
                <td>¿Su Establecimiento Compra Servicios?</td>
                <td width="10%"><input type="checkbox" @isset($data->compra_servicios) @if($data->compra_servicios == 'Si') checked @endif @endisset></td>
                <td width="10%"><input type="checkbox" @isset($data->compra_servicios) @if($data->compra_servicios == 'No') checked @endif @endisset></td>
            </tr>
            @if($data->compra_servicios == 'Si')
                <tr>
                    <td>Ingrese el Número de Camas Habilitadas en Internación:</td>
                    <td colspan="2">@isset( $data->compra_camas_habilitadas_internacion ) {{ $data->compra_camas_habilitadas_internacion  }} @endisset</td>
                </tr>
                <tr>
                    <td>Ingrese el Número de Camas Ocupadas en Internación:</td>
                    <td colspan="2">@isset( $data->compra_camas_ocupadas_internacion ) {{ $data->compra_camas_ocupadas_internacion  }} @endisset</td>
                </tr>
                <tr>
                    <td>Ingrese el Número de Camas Habilitadas en Terapia Intermedia:</td>
                    <td colspan="2">@isset( $data->compra_camas_habilitadas_terapia_intermedia ) {{ $data->compra_camas_habilitadas_terapia_intermedia  }} @endisset</td>
                </tr>
                <tr>
                    <td>Ingrese el Número de Camas Ocupadas en Terapia Intermedia:</td>
                    <td colspan="2">@isset( $data->compra_camas_ocupadas_terapia_intermedia ) {{ $data->compra_camas_ocupadas_terapia_intermedia  }} @endisset</td>
                </tr>
                <tr>
                    <td>Ingrese el Número de Camas Habilitadas en Terapia Intensiva:</td>
                    <td colspan="2">@isset( $data->compra_camas_habilitadas_terapia_intensiva ) {{ $data->compra_camas_habilitadas_terapia_intensiva  }} @endisset</td>
                </tr>
                <tr>
                    <td>Ingrese el Número de Camas Ocupadas en Terapia Intensiva:</td>
                    <td colspan="2">@isset( $data->compra_camas_ocupadas_terapia_intensiva ) {{ $data->compra_camas_ocupadas_terapia_intensiva  }} @endisset</td>
                </tr>
            @endif
        </table>


        <table id="table" class="tableheader">
            <tr>
                <th colspan="5">VACUNACIÓN COVID-19</th>
            </tr>


        @if($vacunacion->isEmpty())
                <tr>
                    <td colspan="5">No hay datos registrados.</td>
                </tr>
        @else
                <tr>
                    <th>FABRICANTE</th>
                    <th>DOSIS</th>
                    <th>CANTIDAD DE VACUNAS RECIBIDAS</th>
                    <th>CANTIDAD DE VACUNAS USADAS</th>
                    <th>MUJERES GESTANTES VACUNADAS</th>
                </tr>
                @foreach($vacunacion as $vac)
                    <tr>
                        <td>
                            {{ $vac->vacuna }}
                        </td>
                        <td>
                            {{ $vac->dosis }}
                        </td>
                        <td>
                            {{ $vac->cantidad_recibida }}
                        </td>
                        <td>
                            {{ $vac->cantidad_usada }}
                        </td>
                        <td>
                            {{ $vac->mujeres_gestantes }}
                        </td>
                    </tr>
                @endforeach

        @endif


        </table>

    </div>
</main>
</body>
</html>
