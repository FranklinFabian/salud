$(function() {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.select2_general').select2({
        placeholder: "Seleccione una opción"
    });


});


$("#form_bancooxigeno_generacionoxigeno").submit(function(event){
    event.preventDefault(); //prevent default action
    var post_url = $(this).attr("action"); //get form action url
    var request_method = $(this).attr("method"); //get form GET/POST method
    var form_data = $(this).serialize(); //Encode form elements for submission

    $.ajax({
        url : post_url,
        type: request_method,
        dataType: 'json',
        data : form_data
    }).done(function(response) { //
        if(response.res === 0){
            swal.fire({
                icon: 'error',
                title: 'Error de sistema, comuniquese con el administrador',
                showConfirmButton: false,
                timer: 3000
            });
        }else if(response.res === 1){
            swal.fire({
                icon: 'success',
                title: 'Registro insertado correctamente',
                showConfirmButton: false,
                timer: 2000
            }).then(function(result) {
                let current_tab = "head-tab2";
                loadTab(current_tab,2);
            });
        }
    });
});

$('input[type="radio"][name="item[generador_oxigeno]"]').click(function(){
    if ($(this).val() === 'Si' ){
        $('#tienegeneradoroxigeno').show();
    }else{
        $('#tienegeneradoroxigeno').hide();

        $('#generador_capacidad_produccion').val('');
        $('#generador_consumo_promedio').val('');
        $('#generador_cilindros_recargados').val('');
    }
});

$('input[type="radio"][name="item[contrato_vigente]"]').click(function(){
    if ($(this).val() === 'Si' ){
        $('#tienecontratovigente').show();
    }else{
        $('#tienecontratovigente').hide();

        $('#empresa_contrato').val('');
        $('#fecha_final_contrato').val('');
    }
});

$('input[type="radio"][name="item[tanque_criogenico]"]').click(function(){
    if ($(this).val() === 'Si' ){
        $('#tienetanquecriogenico').show();
    }else{
        $('#tienetanquecriogenico').hide();

        $('#tanque_criogenico_capacidad').val('');
        $('#tanque_criogenico_consumo').val('');
    }
});

$('input[type="radio"][name="item[tubos_6]"]').click(function(){
    if ($(this).val() === 'Si' ){
        $('#tienetubo6').show();
    }else{
        $('#tienetubo6').hide();

        $('#tubos_llenos_6').val('');
        $('#tubos_vacios_6').val('');
        $('#tubos_consumo_oxigeno_6').val('');
    }
});


$('input[type="radio"][name="item[tubos_8]"]').click(function(){
    if ($(this).val() === 'Si' ){
        $('#tienetubo8').show();
    }else{
        $('#tienetubo8').hide();

        $('#tubos_llenos_8').val('');
        $('#tubos_vacios_8').val('');
        $('#tubos_consumo_oxigeno_8').val('');
    }
});

$('input[type="radio"][name="item[compra_servicios]"]').click(function(){
    if ($(this).val() === 'Si' ){
        $('#compraservicios').show();
    }else{
        $('#compraservicios').hide();

        $('#compra_camas_habilitadas_internacion').val('');
        $('#compra_camas_ocupadas_internacion').val('');
        $('#compra_camas_habilitadas_terapia_intermedia').val('');
        $('#compra_camas_ocupadas_terapia_intermedia').val('');
        $('#compra_camas_habilitadas_terapia_intensiva').val('');
        $('#compra_camas_ocupadas_terapia_intensiva').val('');
    }
});


// Validaciones Parte 1
const generador_capacidad_produccion = document.getElementById('generador_capacidad_produccion');
generador_capacidad_produccion.addEventListener('keydown', function(evento) {
    const teclaPresionada = evento.key;
    const teclaPresionadaEsUnNumero =
        Number.isInteger(parseInt(teclaPresionada));
    const sePresionoUnaTeclaNoAdmitida =
        teclaPresionada != 'ArrowDown' &&
        teclaPresionada != 'ArrowUp' &&
        teclaPresionada != 'ArrowLeft' &&
        teclaPresionada != 'ArrowRight' &&
        teclaPresionada != 'Backspace' &&
        teclaPresionada != 'Delete' &&
        teclaPresionada != 'Enter' &&
        !teclaPresionadaEsUnNumero;
    const comienzaPorCero =
        generador_capacidad_produccion.value.length === 0 &&
        teclaPresionada == 0;
    if (sePresionoUnaTeclaNoAdmitida) {
        evento.preventDefault();
    }
});


const generador_consumo_promedio = document.getElementById('generador_consumo_promedio');
generador_consumo_promedio.addEventListener('keydown', function(evento) {
    const teclaPresionada = evento.key;
    const teclaPresionadaEsUnNumero =
        Number.isInteger(parseInt(teclaPresionada));
    const sePresionoUnaTeclaNoAdmitida =
        teclaPresionada != 'ArrowDown' &&
        teclaPresionada != 'ArrowUp' &&
        teclaPresionada != 'ArrowLeft' &&
        teclaPresionada != 'ArrowRight' &&
        teclaPresionada != 'Backspace' &&
        teclaPresionada != 'Delete' &&
        teclaPresionada != 'Enter' &&
        !teclaPresionadaEsUnNumero;
    const comienzaPorCero =
        generador_consumo_promedio.value.length === 0 &&
        teclaPresionada == 0;
    if (sePresionoUnaTeclaNoAdmitida) {
        evento.preventDefault();
    }
});


const generador_cilindros_recargados = document.getElementById('generador_cilindros_recargados');
generador_cilindros_recargados.addEventListener('keydown', function(evento) {
    const teclaPresionada = evento.key;
    const teclaPresionadaEsUnNumero =
        Number.isInteger(parseInt(teclaPresionada));
    const sePresionoUnaTeclaNoAdmitida =
        teclaPresionada != 'ArrowDown' &&
        teclaPresionada != 'ArrowUp' &&
        teclaPresionada != 'ArrowLeft' &&
        teclaPresionada != 'ArrowRight' &&
        teclaPresionada != 'Backspace' &&
        teclaPresionada != 'Delete' &&
        teclaPresionada != 'Enter' &&
        !teclaPresionadaEsUnNumero;
    const comienzaPorCero =
        generador_cilindros_recargados.value.length === 0 &&
        teclaPresionada == 0;
    if (sePresionoUnaTeclaNoAdmitida) {
        evento.preventDefault();
    }
});

// Validaciones Tanque Criogenico

const tanque_criogenico_capacidad = document.getElementById('tanque_criogenico_capacidad');
tanque_criogenico_capacidad.addEventListener('keydown', function(evento) {
    const teclaPresionada = evento.key;
    const teclaPresionadaEsUnNumero =
        Number.isInteger(parseInt(teclaPresionada));
    const sePresionoUnaTeclaNoAdmitida =
        teclaPresionada != 'ArrowDown' &&
        teclaPresionada != 'ArrowUp' &&
        teclaPresionada != 'ArrowLeft' &&
        teclaPresionada != 'ArrowRight' &&
        teclaPresionada != 'Backspace' &&
        teclaPresionada != 'Delete' &&
        teclaPresionada != 'Enter' &&
        !teclaPresionadaEsUnNumero;
    const comienzaPorCero =
        tanque_criogenico_capacidad.value.length === 0 &&
        teclaPresionada == 0;
    if (sePresionoUnaTeclaNoAdmitida) {
        evento.preventDefault();
    }
});


const tanque_criogenico_consumo = document.getElementById('tanque_criogenico_consumo');
tanque_criogenico_consumo.addEventListener('keydown', function(evento) {
    const teclaPresionada = evento.key;
    const teclaPresionadaEsUnNumero =
        Number.isInteger(parseInt(teclaPresionada));
    const sePresionoUnaTeclaNoAdmitida =
        teclaPresionada != 'ArrowDown' &&
        teclaPresionada != 'ArrowUp' &&
        teclaPresionada != 'ArrowLeft' &&
        teclaPresionada != 'ArrowRight' &&
        teclaPresionada != 'Backspace' &&
        teclaPresionada != 'Delete' &&
        teclaPresionada != 'Enter' &&
        !teclaPresionadaEsUnNumero;
    const comienzaPorCero =
        tanque_criogenico_consumo.value.length === 0 &&
        teclaPresionada == 0;
    if (sePresionoUnaTeclaNoAdmitida) {
        evento.preventDefault();
    }
});



// Validaciones Parte 2


const tubos_llenos_6 = document.getElementById('tubos_llenos_6');
tubos_llenos_6.addEventListener('keydown', function(evento) {
    const teclaPresionada = evento.key;
    const teclaPresionadaEsUnNumero =
        Number.isInteger(parseInt(teclaPresionada));
    const sePresionoUnaTeclaNoAdmitida =
        teclaPresionada != 'ArrowDown' &&
        teclaPresionada != 'ArrowUp' &&
        teclaPresionada != 'ArrowLeft' &&
        teclaPresionada != 'ArrowRight' &&
        teclaPresionada != 'Backspace' &&
        teclaPresionada != 'Delete' &&
        teclaPresionada != 'Enter' &&
        !teclaPresionadaEsUnNumero;
    const comienzaPorCero =
        tubos_llenos_6.value.length === 0 &&
        teclaPresionada == 0;
    if (sePresionoUnaTeclaNoAdmitida) {
        evento.preventDefault();
    }
});

const tubos_vacios_6 = document.getElementById('tubos_vacios_6');
tubos_vacios_6.addEventListener('keydown', function(evento) {
    const teclaPresionada = evento.key;
    const teclaPresionadaEsUnNumero =
        Number.isInteger(parseInt(teclaPresionada));
    const sePresionoUnaTeclaNoAdmitida =
        teclaPresionada != 'ArrowDown' &&
        teclaPresionada != 'ArrowUp' &&
        teclaPresionada != 'ArrowLeft' &&
        teclaPresionada != 'ArrowRight' &&
        teclaPresionada != 'Backspace' &&
        teclaPresionada != 'Delete' &&
        teclaPresionada != 'Enter' &&
        !teclaPresionadaEsUnNumero;
    const comienzaPorCero =
        tubos_vacios_6.value.length === 0 &&
        teclaPresionada == 0;
    if (sePresionoUnaTeclaNoAdmitida) {
        evento.preventDefault();
    }
});

const tubos_consumo_oxigeno_6 = document.getElementById('tubos_consumo_oxigeno_6');
tubos_consumo_oxigeno_6.addEventListener('keydown', function(evento) {
    const teclaPresionada = evento.key;
    const teclaPresionadaEsUnNumero =
        Number.isInteger(parseInt(teclaPresionada));
    const sePresionoUnaTeclaNoAdmitida =
        teclaPresionada != 'ArrowDown' &&
        teclaPresionada != 'ArrowUp' &&
        teclaPresionada != 'ArrowLeft' &&
        teclaPresionada != 'ArrowRight' &&
        teclaPresionada != 'Backspace' &&
        teclaPresionada != 'Delete' &&
        teclaPresionada != 'Enter' &&
        !teclaPresionadaEsUnNumero;
    const comienzaPorCero =
        tubos_consumo_oxigeno_6.value.length === 0 &&
        teclaPresionada == 0;
    if (sePresionoUnaTeclaNoAdmitida) {
        evento.preventDefault();
    }
});


// Validaciones Parte 2.2


const tubos_llenos_8 = document.getElementById('tubos_llenos_8');
tubos_llenos_8.addEventListener('keydown', function(evento) {
    const teclaPresionada = evento.key;
    const teclaPresionadaEsUnNumero =
        Number.isInteger(parseInt(teclaPresionada));
    const sePresionoUnaTeclaNoAdmitida =
        teclaPresionada != 'ArrowDown' &&
        teclaPresionada != 'ArrowUp' &&
        teclaPresionada != 'ArrowLeft' &&
        teclaPresionada != 'ArrowRight' &&
        teclaPresionada != 'Backspace' &&
        teclaPresionada != 'Delete' &&
        teclaPresionada != 'Enter' &&
        !teclaPresionadaEsUnNumero;
    const comienzaPorCero =
        tubos_llenos_8.value.length === 0 &&
        teclaPresionada == 0;
    if (sePresionoUnaTeclaNoAdmitida) {
        evento.preventDefault();
    }
});

const tubos_vacios_8 = document.getElementById('tubos_vacios_8');
tubos_vacios_8.addEventListener('keydown', function(evento) {
    const teclaPresionada = evento.key;
    const teclaPresionadaEsUnNumero =
        Number.isInteger(parseInt(teclaPresionada));
    const sePresionoUnaTeclaNoAdmitida =
        teclaPresionada != 'ArrowDown' &&
        teclaPresionada != 'ArrowUp' &&
        teclaPresionada != 'ArrowLeft' &&
        teclaPresionada != 'ArrowRight' &&
        teclaPresionada != 'Backspace' &&
        teclaPresionada != 'Delete' &&
        teclaPresionada != 'Enter' &&
        !teclaPresionadaEsUnNumero;
    const comienzaPorCero =
        tubos_vacios_8.value.length === 0 &&
        teclaPresionada == 0;
    if (sePresionoUnaTeclaNoAdmitida) {
        evento.preventDefault();
    }
});

const tubos_consumo_oxigeno_8 = document.getElementById('tubos_consumo_oxigeno_8');
tubos_consumo_oxigeno_8.addEventListener('keydown', function(evento) {
    const teclaPresionada = evento.key;
    const teclaPresionadaEsUnNumero =
        Number.isInteger(parseInt(teclaPresionada));
    const sePresionoUnaTeclaNoAdmitida =
        teclaPresionada != 'ArrowDown' &&
        teclaPresionada != 'ArrowUp' &&
        teclaPresionada != 'ArrowLeft' &&
        teclaPresionada != 'ArrowRight' &&
        teclaPresionada != 'Backspace' &&
        teclaPresionada != 'Delete' &&
        teclaPresionada != 'Enter' &&
        !teclaPresionadaEsUnNumero;
    const comienzaPorCero =
        tubos_consumo_oxigeno_8.value.length === 0 &&
        teclaPresionada == 0;
    if (sePresionoUnaTeclaNoAdmitida) {
        evento.preventDefault();
    }
});



// Validaciones Parte 3

const camas_habilitadas_internacion = document.getElementById('camas_habilitadas_internacion');
camas_habilitadas_internacion.addEventListener('keydown', function(evento) {
    const teclaPresionada = evento.key;
    const teclaPresionadaEsUnNumero =
        Number.isInteger(parseInt(teclaPresionada));
    const sePresionoUnaTeclaNoAdmitida =
        teclaPresionada != 'ArrowDown' &&
        teclaPresionada != 'ArrowUp' &&
        teclaPresionada != 'ArrowLeft' &&
        teclaPresionada != 'ArrowRight' &&
        teclaPresionada != 'Backspace' &&
        teclaPresionada != 'Delete' &&
        teclaPresionada != 'Enter' &&
        !teclaPresionadaEsUnNumero;
    const comienzaPorCero =
        camas_habilitadas_internacion.value.length === 0 &&
        teclaPresionada == 0;
    if (sePresionoUnaTeclaNoAdmitida) {
        evento.preventDefault();
    }
});

const camas_ocupadas_internacion = document.getElementById('camas_ocupadas_internacion');
camas_ocupadas_internacion.addEventListener('keydown', function(evento) {
    const teclaPresionada = evento.key;
    const teclaPresionadaEsUnNumero =
        Number.isInteger(parseInt(teclaPresionada));
    const sePresionoUnaTeclaNoAdmitida =
        teclaPresionada != 'ArrowDown' &&
        teclaPresionada != 'ArrowUp' &&
        teclaPresionada != 'ArrowLeft' &&
        teclaPresionada != 'ArrowRight' &&
        teclaPresionada != 'Backspace' &&
        teclaPresionada != 'Delete' &&
        teclaPresionada != 'Enter' &&
        !teclaPresionadaEsUnNumero;
    const comienzaPorCero =
        camas_ocupadas_internacion.value.length === 0 &&
        teclaPresionada == 0;
    if (sePresionoUnaTeclaNoAdmitida) {
        evento.preventDefault();
    }
});

const camas_habilitadas_terapia_intermedia = document.getElementById('camas_habilitadas_terapia_intermedia');
camas_habilitadas_terapia_intermedia.addEventListener('keydown', function(evento) {
    const teclaPresionada = evento.key;
    const teclaPresionadaEsUnNumero =
        Number.isInteger(parseInt(teclaPresionada));
    const sePresionoUnaTeclaNoAdmitida =
        teclaPresionada != 'ArrowDown' &&
        teclaPresionada != 'ArrowUp' &&
        teclaPresionada != 'ArrowLeft' &&
        teclaPresionada != 'ArrowRight' &&
        teclaPresionada != 'Backspace' &&
        teclaPresionada != 'Delete' &&
        teclaPresionada != 'Enter' &&
        !teclaPresionadaEsUnNumero;
    const comienzaPorCero =
        camas_habilitadas_terapia_intermedia.value.length === 0 &&
        teclaPresionada == 0;
    if (sePresionoUnaTeclaNoAdmitida) {
        evento.preventDefault();
    }
});

const camas_ocupadas_terapia_intermedia = document.getElementById('camas_ocupadas_terapia_intermedia');
camas_ocupadas_terapia_intermedia.addEventListener('keydown', function(evento) {
    const teclaPresionada = evento.key;
    const teclaPresionadaEsUnNumero =
        Number.isInteger(parseInt(teclaPresionada));
    const sePresionoUnaTeclaNoAdmitida =
        teclaPresionada != 'ArrowDown' &&
        teclaPresionada != 'ArrowUp' &&
        teclaPresionada != 'ArrowLeft' &&
        teclaPresionada != 'ArrowRight' &&
        teclaPresionada != 'Backspace' &&
        teclaPresionada != 'Delete' &&
        teclaPresionada != 'Enter' &&
        !teclaPresionadaEsUnNumero;
    const comienzaPorCero =
        camas_ocupadas_terapia_intermedia.value.length === 0 &&
        teclaPresionada == 0;
    if (sePresionoUnaTeclaNoAdmitida) {
        evento.preventDefault();
    }
});

const camas_habilitadas_terapia_intensiva = document.getElementById('camas_habilitadas_terapia_intensiva');
camas_habilitadas_terapia_intensiva.addEventListener('keydown', function(evento) {
    const teclaPresionada = evento.key;
    const teclaPresionadaEsUnNumero =
        Number.isInteger(parseInt(teclaPresionada));
    const sePresionoUnaTeclaNoAdmitida =
        teclaPresionada != 'ArrowDown' &&
        teclaPresionada != 'ArrowUp' &&
        teclaPresionada != 'ArrowLeft' &&
        teclaPresionada != 'ArrowRight' &&
        teclaPresionada != 'Backspace' &&
        teclaPresionada != 'Delete' &&
        teclaPresionada != 'Enter' &&
        !teclaPresionadaEsUnNumero;
    const comienzaPorCero =
        camas_habilitadas_terapia_intensiva.value.length === 0 &&
        teclaPresionada == 0;
    if (sePresionoUnaTeclaNoAdmitida) {
        evento.preventDefault();
    }
});

const camas_ocupadas_terapia_intensiva = document.getElementById('camas_ocupadas_terapia_intensiva');
camas_ocupadas_terapia_intensiva.addEventListener('keydown', function(evento) {
    const teclaPresionada = evento.key;
    const teclaPresionadaEsUnNumero =
        Number.isInteger(parseInt(teclaPresionada));
    const sePresionoUnaTeclaNoAdmitida =
        teclaPresionada != 'ArrowDown' &&
        teclaPresionada != 'ArrowUp' &&
        teclaPresionada != 'ArrowLeft' &&
        teclaPresionada != 'ArrowRight' &&
        teclaPresionada != 'Backspace' &&
        teclaPresionada != 'Delete' &&
        teclaPresionada != 'Enter' &&
        !teclaPresionadaEsUnNumero;
    const comienzaPorCero =
        camas_ocupadas_terapia_intensiva.value.length === 0 &&
        teclaPresionada == 0;
    if (sePresionoUnaTeclaNoAdmitida) {
        evento.preventDefault();
    }
});

const camas_habilitadas_emergencias = document.getElementById('camas_habilitadas_emergencias');
camas_habilitadas_emergencias.addEventListener('keydown', function(evento) {
    const teclaPresionada = evento.key;
    const teclaPresionadaEsUnNumero =
        Number.isInteger(parseInt(teclaPresionada));
    const sePresionoUnaTeclaNoAdmitida =
        teclaPresionada != 'ArrowDown' &&
        teclaPresionada != 'ArrowUp' &&
        teclaPresionada != 'ArrowLeft' &&
        teclaPresionada != 'ArrowRight' &&
        teclaPresionada != 'Backspace' &&
        teclaPresionada != 'Delete' &&
        teclaPresionada != 'Enter' &&
        !teclaPresionadaEsUnNumero;
    const comienzaPorCero =
        camas_habilitadas_emergencias.value.length === 0 &&
        teclaPresionada == 0;
    if (sePresionoUnaTeclaNoAdmitida) {
        evento.preventDefault();
    }
});

const camas_ocupadas_emergencias = document.getElementById('camas_ocupadas_emergencias');
camas_ocupadas_emergencias.addEventListener('keydown', function(evento) {
    const teclaPresionada = evento.key;
    const teclaPresionadaEsUnNumero =
        Number.isInteger(parseInt(teclaPresionada));
    const sePresionoUnaTeclaNoAdmitida =
        teclaPresionada != 'ArrowDown' &&
        teclaPresionada != 'ArrowUp' &&
        teclaPresionada != 'ArrowLeft' &&
        teclaPresionada != 'ArrowRight' &&
        teclaPresionada != 'Backspace' &&
        teclaPresionada != 'Delete' &&
        teclaPresionada != 'Enter' &&
        !teclaPresionadaEsUnNumero;
    const comienzaPorCero =
        camas_ocupadas_emergencias.value.length === 0 &&
        teclaPresionada == 0;
    if (sePresionoUnaTeclaNoAdmitida) {
        evento.preventDefault();
    }
});

//Validaciones Compra de Servicios

const compra_camas_habilitadas_internacion = document.getElementById('compra_camas_habilitadas_internacion');
compra_camas_habilitadas_internacion.addEventListener('keydown', function(evento) {
    const teclaPresionada = evento.key;
    const teclaPresionadaEsUnNumero =
        Number.isInteger(parseInt(teclaPresionada));
    const sePresionoUnaTeclaNoAdmitida =
        teclaPresionada != 'ArrowDown' &&
        teclaPresionada != 'ArrowUp' &&
        teclaPresionada != 'ArrowLeft' &&
        teclaPresionada != 'ArrowRight' &&
        teclaPresionada != 'Backspace' &&
        teclaPresionada != 'Delete' &&
        teclaPresionada != 'Enter' &&
        !teclaPresionadaEsUnNumero;
    const comienzaPorCero =
        compra_camas_habilitadas_internacion.value.length === 0 &&
        teclaPresionada == 0;
    if (sePresionoUnaTeclaNoAdmitida) {
        evento.preventDefault();
    }
});

const compra_camas_ocupadas_internacion = document.getElementById('compra_camas_ocupadas_internacion');
compra_camas_ocupadas_internacion.addEventListener('keydown', function(evento) {
    const teclaPresionada = evento.key;
    const teclaPresionadaEsUnNumero =
        Number.isInteger(parseInt(teclaPresionada));
    const sePresionoUnaTeclaNoAdmitida =
        teclaPresionada != 'ArrowDown' &&
        teclaPresionada != 'ArrowUp' &&
        teclaPresionada != 'ArrowLeft' &&
        teclaPresionada != 'ArrowRight' &&
        teclaPresionada != 'Backspace' &&
        teclaPresionada != 'Delete' &&
        teclaPresionada != 'Enter' &&
        !teclaPresionadaEsUnNumero;
    const comienzaPorCero =
        compra_camas_ocupadas_internacion.value.length === 0 &&
        teclaPresionada == 0;
    if (sePresionoUnaTeclaNoAdmitida) {
        evento.preventDefault();
    }
});

const compra_camas_habilitadas_terapia_intermedia = document.getElementById('compra_camas_habilitadas_terapia_intermedia');
compra_camas_habilitadas_terapia_intermedia.addEventListener('keydown', function(evento) {
    const teclaPresionada = evento.key;
    const teclaPresionadaEsUnNumero =
        Number.isInteger(parseInt(teclaPresionada));
    const sePresionoUnaTeclaNoAdmitida =
        teclaPresionada != 'ArrowDown' &&
        teclaPresionada != 'ArrowUp' &&
        teclaPresionada != 'ArrowLeft' &&
        teclaPresionada != 'ArrowRight' &&
        teclaPresionada != 'Backspace' &&
        teclaPresionada != 'Delete' &&
        teclaPresionada != 'Enter' &&
        !teclaPresionadaEsUnNumero;
    const comienzaPorCero =
        compra_camas_habilitadas_terapia_intermedia.value.length === 0 &&
        teclaPresionada == 0;
    if (sePresionoUnaTeclaNoAdmitida) {
        evento.preventDefault();
    }
});

const compra_camas_ocupadas_terapia_intermedia = document.getElementById('compra_camas_ocupadas_terapia_intermedia');
compra_camas_ocupadas_terapia_intermedia.addEventListener('keydown', function(evento) {
    const teclaPresionada = evento.key;
    const teclaPresionadaEsUnNumero =
        Number.isInteger(parseInt(teclaPresionada));
    const sePresionoUnaTeclaNoAdmitida =
        teclaPresionada != 'ArrowDown' &&
        teclaPresionada != 'ArrowUp' &&
        teclaPresionada != 'ArrowLeft' &&
        teclaPresionada != 'ArrowRight' &&
        teclaPresionada != 'Backspace' &&
        teclaPresionada != 'Delete' &&
        teclaPresionada != 'Enter' &&
        !teclaPresionadaEsUnNumero;
    const comienzaPorCero =
        compra_camas_ocupadas_terapia_intermedia.value.length === 0 &&
        teclaPresionada == 0;
    if (sePresionoUnaTeclaNoAdmitida) {
        evento.preventDefault();
    }
});

const compra_camas_habilitadas_terapia_intensiva = document.getElementById('compra_camas_habilitadas_terapia_intensiva');
compra_camas_habilitadas_terapia_intensiva.addEventListener('keydown', function(evento) {
    const teclaPresionada = evento.key;
    const teclaPresionadaEsUnNumero =
        Number.isInteger(parseInt(teclaPresionada));
    const sePresionoUnaTeclaNoAdmitida =
        teclaPresionada != 'ArrowDown' &&
        teclaPresionada != 'ArrowUp' &&
        teclaPresionada != 'ArrowLeft' &&
        teclaPresionada != 'ArrowRight' &&
        teclaPresionada != 'Backspace' &&
        teclaPresionada != 'Delete' &&
        teclaPresionada != 'Enter' &&
        !teclaPresionadaEsUnNumero;
    const comienzaPorCero =
        compra_camas_habilitadas_terapia_intensiva.value.length === 0 &&
        teclaPresionada == 0;
    if (sePresionoUnaTeclaNoAdmitida) {
        evento.preventDefault();
    }
});


const compra_camas_ocupadas_terapia_intensiva = document.getElementById('compra_camas_ocupadas_terapia_intensiva');
compra_camas_ocupadas_terapia_intensiva.addEventListener('keydown', function(evento) {
    const teclaPresionada = evento.key;
    const teclaPresionadaEsUnNumero =
        Number.isInteger(parseInt(teclaPresionada));
    const sePresionoUnaTeclaNoAdmitida =
        teclaPresionada != 'ArrowDown' &&
        teclaPresionada != 'ArrowUp' &&
        teclaPresionada != 'ArrowLeft' &&
        teclaPresionada != 'ArrowRight' &&
        teclaPresionada != 'Backspace' &&
        teclaPresionada != 'Delete' &&
        teclaPresionada != 'Enter' &&
        !teclaPresionadaEsUnNumero;
    const comienzaPorCero =
        compra_camas_ocupadas_terapia_intensiva.value.length === 0 &&
        teclaPresionada == 0;
    if (sePresionoUnaTeclaNoAdmitida) {
        evento.preventDefault();
    }
});



const pacientes_covid_referidos = document.getElementById('pacientes_covid_referidos');
pacientes_covid_referidos.addEventListener('keydown', function(evento) {
    const teclaPresionada = evento.key;
    const teclaPresionadaEsUnNumero =
        Number.isInteger(parseInt(teclaPresionada));
    const sePresionoUnaTeclaNoAdmitida =
        teclaPresionada != 'ArrowDown' &&
        teclaPresionada != 'ArrowUp' &&
        teclaPresionada != 'ArrowLeft' &&
        teclaPresionada != 'ArrowRight' &&
        teclaPresionada != 'Backspace' &&
        teclaPresionada != 'Delete' &&
        teclaPresionada != 'Enter' &&
        !teclaPresionadaEsUnNumero;
    const comienzaPorCero =
        pacientes_covid_referidos.value.length === 0 &&
        teclaPresionada == 0;
    if (sePresionoUnaTeclaNoAdmitida) {
        evento.preventDefault();
    }
});


