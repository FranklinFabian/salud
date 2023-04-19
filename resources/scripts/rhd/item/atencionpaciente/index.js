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


$("#form_atencion_paciente").submit(function(event){
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
                loadTab(current_tab,2);
            });
        }
    });
});


// Validaciones Parte 1
const camas_internacion = document.getElementById('camas_internacion');
camas_internacion.addEventListener('keydown', function(evento) {
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
        camas_internacion.value.length === 0 &&
        teclaPresionada == 0;
    if (sePresionoUnaTeclaNoAdmitida || comienzaPorCero) {
        evento.preventDefault();
    }
});


const camas_uti = document.getElementById('camas_uti');
camas_uti.addEventListener('keydown', function(evento) {
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
        camas_uti.value.length === 0 &&
        teclaPresionada == 0;
    if (sePresionoUnaTeclaNoAdmitida || comienzaPorCero) {
        evento.preventDefault();
    }
});


const camas_uci = document.getElementById('camas_uci');
camas_uci.addEventListener('keydown', function(evento) {
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
        camas_uci.value.length === 0 &&
        teclaPresionada == 0;
    if (sePresionoUnaTeclaNoAdmitida || comienzaPorCero) {
        evento.preventDefault();
    }
});

// Validaciones Parte 2
const ingresos_emergencias = document.getElementById('ingresos_emergencias');
ingresos_emergencias.addEventListener('keydown', function(evento) {
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
        ingresos_emergencias.value.length === 0 &&
        teclaPresionada == 0;
    if (sePresionoUnaTeclaNoAdmitida || comienzaPorCero) {
        evento.preventDefault();
    }
});

const ingresos_internacion = document.getElementById('ingresos_internacion');
ingresos_internacion.addEventListener('keydown', function(evento) {
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
        ingresos_internacion.value.length === 0 &&
        teclaPresionada == 0;
    if (sePresionoUnaTeclaNoAdmitida || comienzaPorCero) {
        evento.preventDefault();
    }
});

const ingresos_uti = document.getElementById('ingresos_uti');
ingresos_uti.addEventListener('keydown', function(evento) {
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
        ingresos_uti.value.length === 0 &&
        teclaPresionada == 0;
    if (sePresionoUnaTeclaNoAdmitida || comienzaPorCero) {
        evento.preventDefault();
    }
});

const ingresos_uci = document.getElementById('ingresos_uci');
ingresos_uci.addEventListener('keydown', function(evento) {
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
        ingresos_uci.value.length === 0 &&
        teclaPresionada == 0;
    if (sePresionoUnaTeclaNoAdmitida || comienzaPorCero) {
        evento.preventDefault();
    }
});

// Validaciones Parte 3
const pacientes_internacion = document.getElementById('pacientes_internacion');
pacientes_internacion.addEventListener('keydown', function(evento) {
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
        pacientes_internacion.value.length === 0 &&
        teclaPresionada == 0;
    if (sePresionoUnaTeclaNoAdmitida || comienzaPorCero) {
        evento.preventDefault();
    }
});

const pacientes_uti = document.getElementById('pacientes_uti');
pacientes_uti.addEventListener('keydown', function(evento) {
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
        pacientes_uti.value.length === 0 &&
        teclaPresionada == 0;
    if (sePresionoUnaTeclaNoAdmitida || comienzaPorCero) {
        evento.preventDefault();
    }
});

const pacientes_uci = document.getElementById('pacientes_uci');
pacientes_uci.addEventListener('keydown', function(evento) {
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
        pacientes_uci.value.length === 0 &&
        teclaPresionada == 0;
    if (sePresionoUnaTeclaNoAdmitida || comienzaPorCero) {
        evento.preventDefault();
    }
});

// Validaciones Parte 4
const egresos_internacion = document.getElementById('egresos_internacion');
egresos_internacion.addEventListener('keydown', function(evento) {
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
        egresos_internacion.value.length === 0 &&
        teclaPresionada == 0;
    if (sePresionoUnaTeclaNoAdmitida || comienzaPorCero) {
        evento.preventDefault();
    }
});

const egresos_uti = document.getElementById('egresos_uti');
egresos_uti.addEventListener('keydown', function(evento) {
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
        egresos_uti.value.length === 0 &&
        teclaPresionada == 0;
    if (sePresionoUnaTeclaNoAdmitida || comienzaPorCero) {
        evento.preventDefault();
    }
});

const egresos_uci = document.getElementById('egresos_uci');
egresos_uci.addEventListener('keydown', function(evento) {
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
        egresos_uci.value.length === 0 &&
        teclaPresionada == 0;
    if (sePresionoUnaTeclaNoAdmitida || comienzaPorCero) {
        evento.preventDefault();
    }
});

// Validaciones Parte 5
const defunciones_emergencias = document.getElementById('defunciones_emergencias');
defunciones_emergencias.addEventListener('keydown', function(evento) {
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
        defunciones_emergencias.value.length === 0 &&
        teclaPresionada == 0;
    if (sePresionoUnaTeclaNoAdmitida || comienzaPorCero) {
        evento.preventDefault();
    }
});

const defunciones_internacion = document.getElementById('defunciones_internacion');
defunciones_internacion.addEventListener('keydown', function(evento) {
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
        defunciones_internacion.value.length === 0 &&
        teclaPresionada == 0;
    if (sePresionoUnaTeclaNoAdmitida || comienzaPorCero) {
        evento.preventDefault();
    }
});

const defunciones_uti = document.getElementById('defunciones_uti');
defunciones_uti.addEventListener('keydown', function(evento) {
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
        defunciones_uti.value.length === 0 &&
        teclaPresionada == 0;
    if (sePresionoUnaTeclaNoAdmitida || comienzaPorCero) {
        evento.preventDefault();
    }
});

const defunciones_uci = document.getElementById('defunciones_uci');
defunciones_uci.addEventListener('keydown', function(evento) {
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
        defunciones_uci.value.length === 0 &&
        teclaPresionada == 0;
    if (sePresionoUnaTeclaNoAdmitida || comienzaPorCero) {
        evento.preventDefault();
    }
});



