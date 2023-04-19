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


$("#form_insumo_disponible").submit(function(event){
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
                let current_tab = "head-tab1";
                loadTab(current_tab,3);
            });
        }
    });
});

// Parte 1

const respiradores_disponibles = document.getElementById('respiradores_disponibles');
respiradores_disponibles.addEventListener('keydown', function(evento) {
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
        respiradores_disponibles.value.length === 0 &&
        teclaPresionada == 0;
    if (sePresionoUnaTeclaNoAdmitida || comienzaPorCero) {
        evento.preventDefault();
    }
});

const respiradores_utilizados = document.getElementById('respiradores_utilizados');
respiradores_utilizados.addEventListener('keydown', function(evento) {
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
        respiradores_utilizados.value.length === 0 &&
        teclaPresionada == 0;
    if (sePresionoUnaTeclaNoAdmitida || comienzaPorCero) {
        evento.preventDefault();
    }
});

// Parte 2

const monitores_uti = document.getElementById('monitores_uti');
monitores_uti.addEventListener('keydown', function(evento) {
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
        monitores_uti.value.length === 0 &&
        teclaPresionada == 0;
    if (sePresionoUnaTeclaNoAdmitida || comienzaPorCero) {
        evento.preventDefault();
    }
});

const monitores_uci = document.getElementById('monitores_uci');
monitores_uci.addEventListener('keydown', function(evento) {
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
        monitores_uci.value.length === 0 &&
        teclaPresionada == 0;
    if (sePresionoUnaTeclaNoAdmitida || comienzaPorCero) {
        evento.preventDefault();
    }
});

// Parte 3

const bombas_infusion_uti = document.getElementById('bombas_infusion_uti');
bombas_infusion_uti.addEventListener('keydown', function(evento) {
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
        bombas_infusion_uti.value.length === 0 &&
        teclaPresionada == 0;
    if (sePresionoUnaTeclaNoAdmitida || comienzaPorCero) {
        evento.preventDefault();
    }
});

const bombas_infusion_uci = document.getElementById('bombas_infusion_uci');
bombas_infusion_uci.addEventListener('keydown', function(evento) {
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
        bombas_infusion_uci.value.length === 0 &&
        teclaPresionada == 0;
    if (sePresionoUnaTeclaNoAdmitida || comienzaPorCero) {
        evento.preventDefault();
    }
});

