<div class="row">
    <div class="col-lg-12">
        <!--begin::Card-->
        <div class="card card-custom gutter-b">

            <!--begin::Header-->
            <div class="card-header h-auto">
                <!--begin::Title-->
                <div class="card-title py-5">
                    <h3 class="card-label">Reporte RHD CAMAS UTI NACIONAL VS FECHA DE REPORTE (fuente SNIS)</h3>
                </div>
                <!--end::Title-->
            </div>
            <!--end::Header-->
            <div class="card-body">
                <!--begin::Chart-->

                <div class="row">
                    <div class="col-lg-12">
                        <div id="grafico_rhd_utis"></div>
                    </div>
                </div>
                <!--end::Chart-->
            </div>


            <!--begin::Header-->
            <div class="card-header h-auto">
                <!--begin::Title-->
                <div class="card-title py-5">
                    <h3 class="card-label">Reporte RHD DISPONIBILIDAD DE CAMAS UTI  A FECHA {{ $data['fecha_rhd'] }} (fuente SNIS)</h3>
                </div>
                <!--end::Title-->
            </div>
            <!--end::Header-->
            <div class="card-body">
                <!--begin::Chart-->

                <div class="row">
                    <div class="col-lg-12">
                        <div id="grafico_rhd"></div>
                    </div>
                </div>
                <!--end::Chart-->
            </div>


            <!--begin::Header-->
            <div class="card-header h-auto">
                <!--begin::Title-->
                <div class="card-title py-5">
                    <h3 class="card-label">Reporte SIVE NACIONAL POR SEMANA EPIDEMIOLÓGICA (fuente SNIS)</h3>
                </div>
                <!--end::Title-->
            </div>
            <!--end::Header-->
            <div class="card-body">
                <!--begin::Chart-->

                <div class="row">
                    <div class="col-lg-12">
                        <div id="grafico_sive"></div>
                    </div>
                </div>
                <!--end::Chart-->
            </div>

            <!--begin::Header-->
            <div class="card-header h-auto">
                <!--begin::Title-->
                <div class="card-title py-5">
                    <h3 class="card-label">Reporte SIVE NACIONAL POR SEMANA EPIDEMIOLÓGICA (fuente SNIS)</h3>
                </div>
                <!--end::Title-->
            </div>
            <!--end::Header-->
            <div class="card-body">
                <!--begin::Chart-->

                <div class="row">
                    <div class="col-lg-12">
                        <div id="grafico_sive_positivos"></div>
                    </div>
                </div>
                <!--end::Chart-->
            </div>


            <div class="card-header h-auto">
                <!--begin::Title-->
                <div class="card-title py-5">
                    <h3 class="card-label">Reporte DISPONIBILIDAD DE TUBOS DE OXIGENO A NIVEL NACIONAL A {{ $data['fecha_banco_oxigeno'] }}</h3>
                </div>
                <!--end::Title-->
            </div>
            <!--end::Header-->
            <div class="card-body">
                <!--begin::Chart-->

                <div class="row">
                    <div class="col-lg-12">
                        <div id="grafico_banco_oxigeno"></div>
                    </div>
                </div>
                <!--end::Chart-->
            </div>


            <div class="card-header h-auto">
                <!--begin::Title-->
                <div class="card-title py-5">
                    <h3 class="card-label">Reporte VACUNACIÓN NACIONAL POR DOSIS Y PROVEEDOR (fuente SNIS)</h3>
                </div>
                <!--end::Title-->
            </div>
            <!--end::Header-->
            <div class="card-body">
                <!--begin::Chart-->

                <div class="row" align="left">
                    <div class="col-lg-12">
                        <div id="grafico_rnve"></div>
                    </div>
                </div>

            </div>
        </div>
        <!--end::Card-->
    </div>
</div>
<!--end::Card-->

{{-- Scripts Section --}}

<script src="{{ asset('scripts/salasituacional/item/general/index.js') }}" type="text/javascript"></script>






