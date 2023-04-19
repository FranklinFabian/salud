<!--begin::Card-->
<div class="card card-custom gutter-b example example-compact">
    <div class="card-header justify-content-left">
        <h3 class="card-title">Datos Generales</h3>
        <div class="card-toolbar">
            <div class="example-tools justify-content-center">
                <!-- <span class="example-toggle" data-toggle="tooltip" title="View code"></span>
                <span class="example-copy" data-toggle="tooltip" title="Copy code"></span> -->
            </div>
        </div>
    </div>
    <!--begin::Form-->
    <form action="{{ route('bancooxigeno.general.store') }}" method="post" id="form_general">
        @if ( $data['tipo'] == 'update' )
            <input type="hidden" class="form-control" id="id" name="id" value="{{ $data['pid'] }}">
        @endif
            <input type="hidden" class="form-control" id="type" name="type" value="{{ $data['tipo'] }}">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="message-text" class="form-control-label">
                            </label><br>
                            <select class=" form-control select2_general" id="id_establecimiento" name="item[id_establecimiento]" required @if ($data['tipo'] == 'update') disabled @endif >
                                <option></option>
                                @foreach($data['establecimientos'] as $establecimiento)
                                    <option value="{{ $establecimiento->id }}" @if ($data['tipo'] == 'update')@if($data['item']->id_establecimiento == $establecimiento->id) selected="selected" @endif @endif> {{ $establecimiento->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        Una vez seleccionado el establecimiento de salud, presione el botón guardar y podra registrar los datos diarios en la pestaña:
                        Generación de Oxígeno y Uso.
                    </div>
                </div>
            </div>
        <div class="card-footer">
            @if ( $data['tipo'] == 'new' )
                <button type="submit" class="btn btn-primary float-right">Guardar</button>
            @endif
            <!-- <button type="reset" class="btn btn-secondary float-right mr-2">Cancelar</button> -->
        </div>
    </form>
    <!--end::Form-->
</div>
<!--end::Card-->

{{-- Scripts Section --}}

<script src="{{ asset('scripts/bancooxigeno/item/general/index.js') }}" type="text/javascript"></script>






