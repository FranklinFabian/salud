<form class="kt-form" action="{{ route('parqueinformatico.lista.store') }}" method="post" id="form_modulo">
    @csrf
    <div class="modal-header">
        <h5 class="modal-title kt-font-brand kt-font-bold" id="exampleModalLabel">
            @if ( $type == 'update' ) Editar @else Nuevo @endif
            Registro
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">
                &times
            </span>
        </button>
    </div>
    <div class="modal-body">
        <input type="hidden" class="form-control" value="{{ $type }}" name="type">
        @if ( $type == 'update' )
            <input type="hidden" class="form-control" id="id" name="id" @if ( $type == 'update') value="{{ $id }}" @endif>
        @endif

        <div class="form-group">
            <label>Nombre
                <span class="text-danger">*</span></label>
            <input type="text" class="form-control" placeholder="Ingrese un nombre" name="item[name]" @if ( $type == 'update') value="{{ $item['name'] }}" @endif/>
            <!--<span class="form-text text-muted">We'll never share your email with anyone else.</span>-->
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
            Cancelar
        </button>
        <button type="submit" class="btn btn-primary">
            @if ($type == 'update') Actualizar @else Guardar @endif
        </button>
    </div>
</form>

<script src="{{ asset('scripts/parqueinformatico/item/lista/modal.js') }}" type="text/javascript"></script>


