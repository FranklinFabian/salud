<div class="row">
    <div class="col-lg-12">
        <!--begin::Card-->
        <div class="card card-custom gutter-b">
            <!--begin::Header-->

            <div class="card-header h-auto">
                <!--begin::Title-->
                <div class="card-title py-5">
                    <h3 class="card-label">Reporte Acumulado de Vacunación por Ente Gestor y Dósis</h3>
                </div>
                <!--end::Title-->
            </div>

            <!--end::Header-->
            <div class="card-body">
                <!--begin::Chart-->

                <div class="row">
                    <div class="col-lg-12">

                        <table class=" table table-striped">
                            <tr>
                                <th>ENTE GESTOR</th>
                                <th>1ra. Dosis</th>
                                <th>2da. Dosis</th>
                                <th>Total</th>
                            </tr>

                            <?php $total_dosis1 = 0; $total_dosis2 = 0 ?>
                            @foreach($totales_rnve as $total)
                                <tr>
                                    <td>
                                        {{ $total->nombre }}
                                    </td>
                                    <td>
                                        {{ $total->dosis1 }}
                                    </td>
                                    <td>
                                        {{ $total->dosis2 }}
                                    </td>
                                    <td>
                                        {{ $total->nacional }}
                                    </td>
                                </tr>
                                <?php $total_dosis1 = $total_dosis1 + $total->dosis1;
                                 $total_dosis2 = $total_dosis2 + $total->dosis2 ?>
                            @endforeach
                            <tr>
                                <th>TOTALES</th>
                                <th> {{ $total_dosis1 }}</th>
                                <th> {{ $total_dosis2 }}</th>
                                <th> {{ $total_dosis1 + $total_dosis2 }}</th>
                            </tr>
                        </table>

                    </div>
                </div>
                <!--end::Chart-->
            </div>
        </div>


        <div class="card card-custom gutter-b">
            <!--begin::Header-->

            <div class="card-header h-auto">
                <!--begin::Title-->
                <div class="card-title py-5">
                    <h3 class="card-label">Camas en UTI reportadas en fecha {{ $fecha }}</h3>
                </div>
                <!--end::Title-->
            </div>

            <!--end::Header-->
            <div class="card-body">
                <!--begin::Chart-->

                <div class="row">
                    <div class="col-lg-12">

                        <table class=" table table-striped">
                            <tr>
                                <th>ENTE GESTOR</th>
                                <th>DEPARTAMENTO</th>
                                <th>ESTABLECIMIENTO</th>
                                <th>Camas Habilitadas UTI</th>
                                <th>Camas Ocupadas UTI</th>
                                <th>Camas Disponibles UTI</th>
                            </tr>

                            @foreach($camas_tubos_disponibles as $res)
                                <tr>
                                    <td>
                                        {{ $res->ente_gestor }}
                                    </td>
                                    <td>
                                        {{ $res->departamento }}
                                    </td>
                                    <td>
                                        {{ $res->establecimiento }}
                                    </td>
                                    <td>
                                        {{ $res->camas_habilitadas_terapia_intensiva }}
                                    </td>
                                    <td>
                                        {{ $res->camas_ocupadas_terapia_intensiva }}
                                    </td>
                                    <td>
                                        {{ $res->camas_disponibles_terapia_intensiva }}
                                    </td>
                                </tr>
                            @endforeach
                        </table>

                    </div>
                </div>
                <!--end::Chart-->
            </div>
        </div>
        <!--end::Card-->
        <div class="card card-custom gutter-b">
            <!--begin::Header-->

            <div class="card-header h-auto">
                <!--begin::Title-->
                <div class="card-title py-5">
                    <h3 class="card-label">Tubos de Oxígeno llenos reportados en fecha {{ $fecha }}</h3>
                </div>
                <!--end::Title-->
            </div>

            <!--end::Header-->
            <div class="card-body">
                <!--begin::Chart-->

                <div class="row">
                    <div class="col-lg-12">

                        <table class=" table table-striped">
                            <tr>
                                <th>ENTE GESTOR</th>
                                <th>DEPARTAMENTO</th>
                                <th>ESTABLECIMIENTO</th>
                                <th>Tubos de 6 m3.</th>
                                <th>Tubos de 8 m3.</th>
                            </tr>

                            @foreach($camas_tubos_disponibles as $res)
                                <tr>
                                    <td>
                                        {{ $res->ente_gestor }}
                                    </td>
                                    <td>
                                        {{ $res->departamento }}
                                    </td>
                                    <td>
                                        {{ $res->establecimiento }}
                                    </td>
                                    <td>
                                        {{ $res->tubos_disponibles_6 }}
                                    </td>
                                    <td>
                                        {{ $res->tubos_disponibles_8 }}
                                    </td>
                                </tr>
                            @endforeach
                        </table>

                    </div>
                </div>
                <!--end::Chart-->
            </div>
        </div>



    </div>
</div>
<!--end::Card-->

{{-- Scripts Section --}}

<script src="{{ asset('scripts/salasituacional/item/tabla/index.js') }}" type="text/javascript"></script>






