<html>
<head>
    <style>
        @page {
            margin: 0cm 0cm;
            font-family: Arial, Helvetica, sans-serif, normal;
            font-size: 12px;
        }

        body {
            margin: 3cm 2cm 2cm;
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
            <td align="center" width="30%"><img src="{{ asset('logos/escudo.jpg') }}" alt="Logo" height="90px"></td>
            <td align="center" width="40%">AUTORIDAD DE SUPERVISIÓN DE LA <br> SEGURIDAD SOCIAL DE CORTO PLAZO ASUSS</td>
            <td align="center"><img src="{{ asset('storage/logo.png') }}" alt="Logo" height="100px"></td>
        </tr>

    </table>

</header>
<main>
    <div>
        <h3 id="subt">SISTEMA MODULAR DE INFORMACIÓN DE SALUD</h3>
        <h4 id="subt">REPORTE HOSPITALARIO DIARIO</h4>

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
                <th>ATENCIÓN DE PACIENTES</th>
                <th width="20%">CANTIDAD</th>
            </tr>
            <tr>
                <td>CAMAS HABILITADAS EN INTERNACIÓN:</td>
                <td>@isset( $data->camas_internacion ) {{ $data->camas_internacion  }} @endisset</td>
            </tr>
            <tr>
                <td>CAMAS HABILITADAS EN UTI:</td>
                <td>@isset( $data->camas_uti ) {{ $data->camas_uti  }} @endisset</td>
            </tr>
            <tr>
                <td>CAMAS HABILITADAS EN UCI:</td>
                <td>@isset( $data->camas_uci ) {{ $data->camas_uci  }} @endisset</td>
            </tr>
            <tr>
                <td>INGRESOS NUEVOS EN EMERGENCIAS:</td>
                <td>@isset( $data->ingresos_emergencias ) {{ $data->ingresos_emergencias  }} @endisset</td>
            </tr>
            <tr>
                <td>INGRESOS NUEVOS EN INTERNACIÓN:</td>
                <td>@isset( $data->ingresos_internacion ) {{ $data->ingresos_internacion  }} @endisset</td>
            </tr>
            <tr>
                <td>INGRESOS NUEVOS EN UTI:</td>
                <td>@isset( $data->ingresos_uti ) {{ $data->ingresos_uti  }} @endisset</td>
            </tr>
            <tr>
                <td>INGRESOS NUEVOS EN UCI:</td>
                <td>@isset( $data->ingresos_uci ) {{ $data->ingresos_uci  }} @endisset</td>
            </tr>
            <tr>
                <td>PACIENTES EN INTERNACIÓN:</td>
                <td>@isset( $data->pacientes_internacion ) {{ $data->pacientes_internacion  }} @endisset</td>
            </tr>
            <tr>
                <td>PACIENTES EN UTI:</td>
                <td>@isset( $data->pacientes_uti ) {{ $data->pacientes_uti  }} @endisset</td>
            </tr>
            <tr>
                <td>PACIENTES EN UCI:</td>
                <td>@isset( $data->pacientes_uci ) {{ $data->pacientes_uci  }} @endisset</td>
            </tr>
            <tr>
                <td>EGRESOS (VIVOS) EN INTERNACIÓN:</td>
                <td>@isset( $data->egresos_internacion ) {{ $data->egresos_internacion  }} @endisset</td>
            </tr>
            <tr>
                <td>EGRESOS (VIVOS) EN UTI:</td>
                <td>@isset( $data->egresos_uti ) {{ $data->egresos_uti  }} @endisset</td>
            </tr>
            <tr>
                <td>EGRESOS (VIVOS) EN UCI:</td>
                <td>@isset( $data->egresos_uci ) {{ $data->egresos_uci  }} @endisset</td>
            </tr>
            <tr>
                <td>DEFUNCIONES EN EMERGENCIAS/SALA DE OBSERVACIÓN:</td>
                <td>@isset( $data->defunciones_emergencias ) {{ $data->defunciones_emergencias  }} @endisset</td>
            </tr>
            <tr>
                <td>DEFUNCIONES EN INTERNACIÓN:</td>
                <td>@isset( $data->defunciones_internacion ) {{ $data->defunciones_internacion  }} @endisset</td>
            </tr>
            <tr>
                <td>DEFUNCIONES EN UTI:</td>
                <td>@isset( $data->defunciones_uti ) {{ $data->defunciones_uti  }} @endisset</td>
            </tr>
            <tr>
                <td>DEFUNCIONES EN UCI:</td>
                <td>@isset( $data->defunciones_uci ) {{ $data->defunciones_uci  }} @endisset</td>
            </tr>
            <tr>

                <th>INSUMOS DISPONIBLES</th>
                <th width="20%">CANTIDAD</th>
            </tr>



        </table>
        <table id="table" class="tableheader">
            <tr>
                <th>DESCRIPCIÓN</th>
                <th width="10%">SI</th>
                <th width="10%">NO</th>
            </tr>
            <tr>
                <td>CUENTAN CON OXIGENO?</td>
                <td width="10%"><input type="checkbox" @isset($data->oxigeno) @if($data->oxigeno == 'Si') checked @endif @endisset></td>
                <td width="10%"><input type="checkbox" @isset($data->oxigeno) @if($data->oxigeno == 'No') checked @endif @endisset></td>
            </tr>
            <tr>
                <td>CANTIDAD DE RESPIRADORES DISPONIBLES:</td>
                <td colspan="2">@isset( $data->respiradores_disponibles ) {{ $data->respiradores_disponibles  }} @endisset</td>
            </tr>
            <tr>
                <td>CANTIDAD DE RESPIRADORES UTILIZADOS:</td>
                <td colspan="2">@isset( $data->respiradores_utilizados ) {{ $data->respiradores_utilizados  }} @endisset</td>
            </tr>
            <tr>
                <td>N° DE MONITORES MULTIPARAMÉTRICOS EN UTI:</td>
                <td colspan="2">@isset( $data->monitores_uti ) {{ $data->monitores_uti  }} @endisset</td>
            </tr>
            <tr>
                <td>N° DE MONITORES MULTIPARAMÉTRICOS EN UCI:</td>
                <td colspan="2">@isset( $data->monitores_uci ) {{ $data->monitores_uci  }} @endisset</td>
            </tr>
            <tr>
                <td>N° DE BOMBAS DE INFUSIÓN EN UTI:</td>
                <td colspan="2">@isset( $data->bombas_infusion_uti ) {{ $data->bombas_infusion_uti  }} @endisset</td>
            </tr>
            <tr>
                <td>N° DE BOMBAS DE INFUSIÓN EN UCI:</td>
                <td colspan="2">@isset( $data->bombas_infusion_uci ) {{ $data->bombas_infusion_uci  }} @endisset</td>
            </tr>
        </table>
    </div>
</main>
</body>
</html>
