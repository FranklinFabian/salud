<div class="row">
    <div class="col-lg-6">
        <!--begin::Card-->
        <div class="card card-custom gutter-b">
            <!--begin::Header-->

            <div class="card-header h-auto">
                <!--begin::Title-->
                <div class="card-title py-5">
                    <h3 class="card-label">Vacunados</h3>
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
                                <th></th>
                                <th>ENTE GESTOR</th>
                                <th>Cantidad Vacunados a Nivel Nacional</th>
                            </tr>
                            <?php
                                $contador0=0;
                            ?>
                            @foreach($score_vacunados as $data)
                                <tr>
                                    <td>
                                        @if($contador0 == 0)
                                          <i class="flaticon-medal icon-lg text-warning"></i>
                                        @endif
                                        @if($contador0 == 1)
                                          <i class="flaticon-medal icon-lg"></i>
                                        @endif
                                    </td>
                                    <td>
                                        {{ $data->ente_gestor }}
                                    </td>
                                    <td>
                                        {{ $data->vacunados }}
                                    </td>
                                </tr>
                                <?php
                                    $contador0++;
                                ?>
                            @endforeach
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
                    <h3 class="card-label">Capacidad Instalada</h3>
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
                                <th></th>
                                <th>ENTE GESTOR</th>
                                <th>Cantidad de Camas Instaladas a Nivel Nacional</th>
                            </tr>

                            <?php
                            $contador1=0;
                            ?>
                            @foreach($score_capacidad_instalada as $data)
                                <tr>
                                    <td>
                                        @if($contador1 == 0)
                                            <i class="flaticon-medal icon-lg text-warning"></i>
                                        @endif
                                        @if($contador1 == 1)
                                            <i class="flaticon-medal icon-lg"></i>
                                        @endif
                                    </td>
                                    <td>
                                        {{ $data->eg }}
                                    </td>
                                    <td>
                                        {{ $data->capacidad_instalada }}
                                    </td>

                                </tr>
                                <?php
                                $contador1++;
                                ?>
                            @endforeach
                        </table>

                    </div>
                </div>
                <!--end::Chart-->
            </div>
        </div>
        <!--end::Card-->

    </div>
    <div class="col-lg-6">

        <div class="card card-custom gutter-b">
            <!--begin::Header-->

            <div class="card-header h-auto">
                <!--begin::Title-->
                <div class="card-title py-5">
                    <h3 class="card-label">Casos COVID</h3>
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
                                <th></th>
                                <th>ENTE GESTOR</th>
                                <th>Cantidad de Casos COVID Reportados a Nivel Nacional</th>
                            </tr>

                            <?php
                            $contador2=0;
                            ?>
                            @foreach($score_casos_covid as $data)
                                <tr>
                                    <td>
                                        @if($contador2 == 0)
                                            <i class="flaticon-medal icon-lg text-warning"></i>
                                        @endif
                                        @if($contador2 == 1)
                                            <i class="flaticon-medal icon-lg"></i>
                                        @endif
                                    </td>
                                    <td>
                                        {{ $data->ente_gestor }}
                                    </td>
                                    <td>
                                        {{ $data->casos_covid_reportados }}
                                    </td>
                                </tr>
                                <?php
                                $contador2++;
                                ?>
                            @endforeach
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
                    <h3 class="card-label">Oxigeno Disponible</h3>
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
                                <th></th>
                                <th>ENTE GESTOR</th>
                                <th>Cantidad de Tubos de Oxigeno Disponibles a Nivel Nacional</th>
                            </tr>
                            <?php $contador3 = 0 ?>
                            @foreach($score_oxigeno_disponible as $data)
                                <tr>
                                    <td>
                                        @if($contador3 == 0)
                                            <i class="flaticon-medal icon-lg text-warning"></i>
                                        @endif
                                        @if($contador3 == 1)
                                            <i class="flaticon-medal icon-lg"></i>
                                        @endif
                                    </td>
                                    <td>
                                        {{ $data->nombre }}
                                    </td>
                                    <td>
                                        {{ $data->oxigeno }}
                                    </td>
                                </tr>
                                <?php
                                $contador3++;
                                ?>
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

<script src="{{ asset('scripts/salasituacional/item/score/index.js') }}" type="text/javascript"></script>






