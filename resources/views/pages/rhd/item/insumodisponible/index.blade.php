<!--begin::Card-->
<div class="card card-custom gutter-b example example-compact">
    <div class="card-header justify-content-left">
        <h3 class="card-title">Insumos Disponibles Para la Atención de Pacientes COVID 19(+)</h3>
        <div class="card-toolbar">
            <div class="example-tools justify-content-center">
                <!-- <span class="example-toggle" data-toggle="tooltip" title="View code"></span>
                <span class="example-copy" data-toggle="tooltip" title="Copy code"></span> -->
            </div>
        </div>
    </div>
    <!--begin::Form-->
    <form action="{{ route('rhd.insumodisponible.store') }}" method="post" id="form_insumo_disponible">
        @if ( $data['tipo'] == 'update' )
            <input type="hidden" class="form-control" id="id_item" name="item[id_item]" value="{{ $data['pid'] }}">
            <input type="hidden" class="form-control" id="id" name="id" value="{{ $data['item']['id'] }}">
        @endif
            <input type="hidden" class="form-control" id="type" name="type" value="{{ $data['tipo'] }}">

            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>¿Cuentan con Oxigeno?</label>
                            <div class="kt-radio-inline">
                                <label class="kt-radio kt-radio--brand">
                                    <input type="radio" name="item[oxigeno]" @if ($data['tipo'] == 'update') @if($data['item']['oxigeno'] == 'Si') checked="checked" @endif @endif value="Si"> Si
                                    <span></span>
                                </label>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <label class="kt-radio">
                                    <input type="radio" name="item[oxigeno]" @if ($data['tipo'] == 'update') @if($data['item']['oxigeno'] == 'No') checked="checked" @endif @endif value="No"> No
                                    <span></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Cantidad de Respiradores Disponibles.</label>
                            <input type="text" class="form-control" placeholder="Ingrese un numero" name="item[respiradores_disponibles]" id="respiradores_disponibles" @if ( $data['tipo'] == 'update') value="{{ $data['item']['respiradores_disponibles'] }}" @endif/>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Cantidad de Respiradores Utilizados.</label>
                            <input type="text" class="form-control" placeholder="Ingrese un numero" name="item[respiradores_utilizados]" id="respiradores_utilizados" @if ( $data['tipo'] == 'update') value="{{ $data['item']['respiradores_utilizados'] }}" @endif/>
                        </div>
                    </div>
                </div>
                <div class="separator separator-dashed my-8"></div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>N° de Monitores Multiparamétricos en UTI.</label>
                            <input type="text" class="form-control" placeholder="Ingrese un numero" name="item[monitores_uti]" id="monitores_uti" @if ( $data['tipo'] == 'update') value="{{ $data['item']['monitores_uti'] }}" @endif/>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>N° de Monitores Multiparamétricos en UCI.</label>
                            <input type="text" class="form-control" placeholder="Ingrese un numero" name="item[monitores_uci]" id="monitores_uci" @if ( $data['tipo'] == 'update') value="{{ $data['item']['monitores_uci'] }}" @endif/>
                        </div>
                    </div>
                </div>
                <div class="separator separator-dashed my-8"></div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>N° de Bombas de Infusión en UTI.</label>
                            <input type="text" class="form-control" placeholder="Ingrese un numero" name="item[bombas_infusion_uti]" id="bombas_infusion_uti" @if ( $data['tipo'] == 'update') value="{{ $data['item']['bombas_infusion_uti'] }}" @endif/>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>N° de Bombas de Infusión en UCI.</label>
                            <input type="text" class="form-control" placeholder="Ingrese un numero" name="item[bombas_infusion_uci]" id="bombas_infusion_uci" @if ( $data['tipo'] == 'update') value="{{ $data['item']['bombas_infusion_uci'] }}" @endif/>
                        </div>
                    </div>

                </div>
            </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary float-right">Guardar</button>
            <!-- <button type="reset" class="btn btn-secondary float-right mr-2">Cancelar</button> -->
        </div>
    </form>
    <!--end::Form-->
</div>
<!--end::Card-->

{{-- Scripts Section --}}

<script src="{{ asset('scripts/rhd/item/insumodisponible/index.js') }}" type="text/javascript"></script>






