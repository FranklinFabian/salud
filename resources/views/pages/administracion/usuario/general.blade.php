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
    <form action="{{ route('administracion.general.store') }}" method="post" id="form">
        @if ( $data['tipo'] == 'update' )
            <input type="hidden" class="form-control" id="id" name="id" value="{{ $data['pid'] }}">
        @endif
            <input type="hidden" class="form-control" id="type" name="type" value="{{ $data['tipo'] }}">

            <div class="row">
            <div class="col-md-6">
                <div class="card-body">
                    <div class="form-group">
                        <label>Nombre
                            <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" placeholder="Ingrese un nombre" name="item[name]" @if ( $data['tipo'] == 'update') value="{{ $data['item']['name'] }}" @endif/>
                        <!--<span class="form-text text-muted">We'll never share your email with anyone else.</span>-->
                    </div>
                    <div class="form-group">
                        <label for="exampleSelect1">Estado
                            <span class="text-danger">*</span></label>
                        <select class="form-control" id="exampleSelect1" name="estado">
                            <option>Activo</option>
                            <option>Inactivo</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card-body">
                    <div class="form-group">
                        <label>Correo
                            <span class="text-danger">*</span></label>
                        <input type="email" class="form-control" placeholder="Ingrese un correo" name="item[email]" @if ( $data['tipo'] == 'update') value="{{ $data['item']['email'] }}" @endif/>
                        <!--<span class="form-text text-muted">We'll never share your email with anyone else.</span>-->
                    </div>
                    @if ( $data['tipo'] == 'new' )
                        <div class="form-group">
                            <label>Contraseña
                                <span class="text-danger">*</span></label>
                            <input type="password" class="form-control" placeholder="Ingrese una contraseña" name="item[password]" />
                            <!--<span class="form-text text-muted">We'll never share your email with anyone else.</span>-->
                        </div>
                    @endif
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
<script src="{{ asset('scripts/administracion/usuario/general/index.js') }}" type="text/javascript"></script>






