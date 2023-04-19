<form class="kt-form" action="{{ route('bancooxigeno.vacunacion.store') }}" method="post" id="form_vacunacion">
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
        @if ($type == 'update')
            <input type="hidden" class="form-control" value="{{ $id }}" name="id">
        @endif

        <input type="hidden" class="form-control" value="{{ $type }}" name="type">
        <input type="hidden" class="form-control" id="pid" name="item[id_item]" value="{{ $pid }}">

        @if ($type == 'new')
            <div class="form-group">
                <label for="message-text" class="form-control-label">
                    Vacuna:
                </label>
                <span class="text-danger">*</span><br>
                <select style="width: 100%" class=" form-control m-select2 select2_general" id="id_vacuna" name="item[id_vacuna]" required>
                    <option></option>
                    @foreach($vacunas as $vacuna)
                        <option value="{{ $vacuna->id }}" > {{ $vacuna->nombre }}</option>
                    @endforeach
                </select>
            </div>
        @endif

        @if ($type == 'new')
            <div class="form-group">
                <label for="message-text" class="form-control-label">
                    Dosis:
                </label>
                <span class="text-danger">*</span><br>
                <select style="width: 100%" class=" form-control m-select2 select2_general" id="id_dosis" name="item[id_dosis]" required>
                    <option></option>
                    @foreach($cantidad_dosis as $dosis)
                        <option value="{{ $dosis->id }}" > {{ $dosis->nombre }}</option>
                    @endforeach
                </select>
            </div>
        @endif

        <div class="form-group">
            <label>Cantidad de Vacunas Recibidas</label>
            <input type="text" class="form-control" placeholder="Ingrese una cantidad" name="item[cantidad_recibida]" @if( $type == 'update' ) value=" {{ $item['cantidad_recibida']  }}  @endif" />
            <!--<span class="form-text text-muted">We'll never share your email with anyone else.</span>-->
        </div>

            <div class="form-group">
                <label>Cantidad de Vacunas Usadas</label>
                <input type="text" class="form-control" placeholder="Ingrese una cantidad" name="item[cantidad_usada]" @if( $type == 'update' ) value=" {{ $item['cantidad_usada']  }}  @endif" />
                <!--<span class="form-text text-muted">We'll never share your email with anyone else.</span>-->
            </div>

            <div class="form-group">
                <label>Cantidad de Mujeres Gestantes Vacunadas</label>
                <input type="text" class="form-control" placeholder="Ingrese una cantidad" name="item[mujeres_gestantes]" @if( $type == 'update' ) value=" {{ $item['mujeres_gestantes']  }}  @endif" />
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

<script src="{{ asset('scripts/bancooxigeno/item/vacunacion/modal.js') }}" type="text/javascript"></script>


