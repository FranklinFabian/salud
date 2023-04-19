<!--begin::Card-->
<div class="card card-custom gutter-b example example-compact">
    <div class="card-header justify-content-left">
        <h3 class="card-title">Atención de Pacientes COVID 19(+)</h3>
        <div class="card-toolbar">
            <div class="example-tools justify-content-center">
                <!-- <span class="example-toggle" data-toggle="tooltip" title="View code"></span>
                <span class="example-copy" data-toggle="tooltip" title="Copy code"></span> -->
            </div>
        </div>
    </div>
    <!--begin::Form-->
    <form action="{{ route('rhd.atencionpaciente.store') }}" method="post" id="form_atencion_paciente">
        @if ( $data['tipo'] == 'update' )
            <input type="hidden" class="form-control" id="id_item" name="item[id_item]" value="{{ $data['pid'] }}">
            <input type="hidden" class="form-control" id="id" name="id" value="{{ $data['item']['id'] }}">
        @endif
            <input type="hidden" class="form-control" id="type" name="type" value="{{ $data['tipo'] }}">

            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Camas Habilitadas en Internación.</label>
                            <input type="text" class="form-control numero_entero" placeholder="Ingrese un numero" name="item[camas_internacion]" id="camas_internacion" @if ( $data['tipo'] == 'update') value="{{ $data['item']['camas_internacion'] }}" @endif/>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Camas Habilitadas en UTI.</label>
                            <input type="text" class="form-control numero_entero" placeholder="Ingrese un numero" name="item[camas_uti]" id="camas_uti" @if ( $data['tipo'] == 'update') value="{{ $data['item']['camas_uti'] }}" @endif/>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Camas Habilitadas en UCI.</label>
                            <input type="text" class="form-control numero_entero" placeholder="Ingrese un numero" name="item[camas_uci]" id="camas_uci"  @if ( $data['tipo'] == 'update') value="{{ $data['item']['camas_uci'] }}" @endif/>
                        </div>
                    </div>
                </div>
                <div class="separator separator-dashed my-8"></div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Ingresos Nuevos en Emergencias</label>
                            <input type="text" class="form-control" placeholder="Ingrese un numero" name="item[ingresos_emergencias]" id="ingresos_emergencias" @if ( $data['tipo'] == 'update') value="{{ $data['item']['ingresos_emergencias'] }}" @endif/>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Ingresos Nuevos en Internación</label>
                            <input type="text" class="form-control" placeholder="Ingrese un numero" name="item[ingresos_internacion]" id="ingresos_internacion" @if ( $data['tipo'] == 'update') value="{{ $data['item']['ingresos_internacion'] }}" @endif/>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Ingresos Nuevos en UTI.</label>
                            <input type="text" class="form-control" placeholder="Ingrese un numero" name="item[ingresos_uti]" id="ingresos_uti" @if ( $data['tipo'] == 'update') value="{{ $data['item']['ingresos_uti'] }}" @endif/>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Ingresos Nuevos en UCI.</label>
                            <input type="text" class="form-control" placeholder="Ingrese un numero" name="item[ingresos_uci]" id="ingresos_uci" @if ( $data['tipo'] == 'update') value="{{ $data['item']['ingresos_uci'] }}" @endif/>
                        </div>
                    </div>
                </div>
                <div class="separator separator-dashed my-8"></div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Pacientes en Internación.</label>
                            <input type="text" class="form-control" placeholder="Ingrese un numero" name="item[pacientes_internacion]" id="pacientes_internacion" @if ( $data['tipo'] == 'update') value="{{ $data['item']['pacientes_internacion'] }}" @endif/>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Pacientes en UTI.</label>
                            <input type="text" class="form-control" placeholder="Ingrese un numero" name="item[pacientes_uti]" id="pacientes_uti" @if ( $data['tipo'] == 'update') value="{{ $data['item']['pacientes_uti'] }}" @endif/>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Pacientes en UCI.</label>
                            <input type="text" class="form-control" placeholder="Ingrese un numero" name="item[pacientes_uci]" id="pacientes_uci" @if ( $data['tipo'] == 'update') value="{{ $data['item']['pacientes_uci'] }}" @endif/>
                        </div>
                    </div>
                </div>
                <div class="separator separator-dashed my-8"></div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Egresos (Vivos) en Internación.</label>
                            <input type="text" class="form-control" placeholder="Ingrese un numero" name="item[egresos_internacion]" id="egresos_internacion" @if ( $data['tipo'] == 'update') value="{{ $data['item']['egresos_internacion'] }}" @endif/>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Egresos (Vivos) en UTI.</label>
                            <input type="text" class="form-control" placeholder="Ingrese un numero" name="item[egresos_uti]" id="egresos_uti" @if ( $data['tipo'] == 'update') value="{{ $data['item']['egresos_uti'] }}" @endif/>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Egresos (Vivos) en UCI.</label>
                            <input type="text" class="form-control" placeholder="Ingrese un numero" name="item[egresos_uci]" id="egresos_uci" @if ( $data['tipo'] == 'update') value="{{ $data['item']['egresos_uci'] }}" @endif/>
                        </div>
                    </div>
                </div>
                <div class="separator separator-dashed my-8"></div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Defunciones en Emergencias/Sala de Observación.</label>
                            <input type="text" class="form-control" placeholder="Ingrese un numero" name="item[defunciones_emergencias]" id="defunciones_emergencias" @if ( $data['tipo'] == 'update') value="{{ $data['item']['defunciones_emergencias'] }}" @endif/>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Defunciones en Internación.</label>
                            <input type="text" class="form-control" placeholder="Ingrese un numero" name="item[defunciones_internacion]" id="defunciones_internacion" @if ( $data['tipo'] == 'update') value="{{ $data['item']['defunciones_internacion'] }}" @endif/>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Defunciones en UTI.</label>
                            <input type="text" class="form-control" placeholder="Ingrese un numero" name="item[defunciones_uti]" id="defunciones_uti" @if ( $data['tipo'] == 'update') value="{{ $data['item']['defunciones_uti'] }}" @endif/>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Defunciones en UCI.</label>
                            <input type="text" class="form-control" placeholder="Ingrese un numero" name="item[defunciones_uci]" id="defunciones_uci" @if ( $data['tipo'] == 'update') value="{{ $data['item']['defunciones_uci'] }}" @endif/>
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

<script src="{{ asset('scripts/rhd/item/atencionpaciente/index.js') }}" type="text/javascript"></script>






