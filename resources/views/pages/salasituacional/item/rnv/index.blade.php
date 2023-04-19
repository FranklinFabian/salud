
<div class="row">
    <div class="col-lg-12">
        <!--begin::Card-->
        <div class="card card-custom gutter-b">
            <!--begin::Header-->
            <div class="card-header h-auto">
                <!--begin::Title-->
                <div class="card-title py-5">
                    <h3 class="card-label">Reporte</h3>
                </div>
                <!--end::Title-->
            </div>
            <!--end::Header-->
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="message-text" class="form-control-label">
                                Departamento:
                            </label><br>
                            <select class="form-control select2_general" id="id_departamento" required style="width: 100%">
                                <option></option>
                                @foreach($data['departamentos'] as $departamento)
                                    @if($departamento->id == 1)
                                        <option value="{{ $departamento->nombre }}" selected> {{ $departamento->nombre }}</option>
                                    @else
                                        <option value="{{ $departamento->nombre }}"> {{ $departamento->nombre }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <label for="message-text" class="form-control-label">
                            &nbsp;
                        </label><br>
                        <button type="submit" class="btn btn-primary float-left" id="generar_reporte">Generar Reporte</button>
                    </div>

                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div id="grafico"></div>
                    </div>
                </div>
                <!--end::Chart-->
            </div>
        </div>
        <!--end::Card-->
    </div>
</div>
<!--end::Card-->

{{-- Scripts Section --}}

<script src="{{ asset('scripts/salasituacional/item/rnv/index.js') }}" type="text/javascript"></script>






