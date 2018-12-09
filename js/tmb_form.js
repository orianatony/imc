$(function () {
    getNivelActividad();
});

function getNivelActividad(){
    $.ajax({
        method: "POST",
        url: "../php/web_ajax.php",
        data:{
            "action": "getNivelActividad"
        },
        success:function(response) {
            let obj = JSON.parse(response);
            let select  = $("#nivel_actividad");
            $.each( obj, function( key, value ) {
                let option = "<option value='" + value.id + "'>" + value.nombre + " [" + value.descripcion + "]" + "</option>"
                select.append(option);
            });
            getSexos();
        },
        error:function(){
            toastr.error("Ha ocurrido un error.");
        }
    });
}
function getSexos(){
    $.ajax({
        method: "POST",
        url: "../php/web_ajax.php",
        data:{
            "action": "getSexos"
        },
        success:function(response) {
            let obj = JSON.parse(response);
            let select  = $("#sexo");
            $.each( obj, function( key, value ) {
                let option = "<option value='" + value.id + "'>" + value.nombre + "</option>";
                select.append(option);
            });
        },
        error:function(){
            toastr.error("Ha ocurrido un error.");
        }
    });
}

$("#send").on('click',function(e){
    e.preventDefault();

    let inputs = getInputs();

    let peso =  inputs.txt_peso.val();
    let estatura =  inputs.txt_estatura.val();
    let edad =  inputs.txt_estatura.val();
    let nivel_actividad =  inputs.txt_estatura.val();
    let sexo =  inputs.txt_estatura.val();

    let inputs_values = {};

    inputs_values.peso = peso;
    inputs_values.estatura = estatura;
    inputs_values.edad = edad;
    inputs_values.nivel_actividad = nivel_actividad;
    inputs_values.sexo = sexo;

    validar(inputs_values);

});

function validar(inputs_values){

    let validated = true;

    let peso =  inputs_values.peso;
    let estatura =  inputs_values.estatura;
    let edad =  inputs_values.edad;
    let nivel_actividad =  inputs_values.nivel_actividad;
    let sexo =  inputs_values.sexo;

    let errors_msg = [
        "Ingrese peso.",
        "Peso debe ser numerico.",
        "Peso no valido.",
        "Ingrese estatura.",
        "Estatura debe ser numerico.",
        "Estatura no valida.",
        "Ingrese edad.",
        "Edad debe ser numerico.",
        "Edad no valida.",
        "Seleccione nivel de actividad.",
        "Seleccione sexo."
    ];

    let errors = [];

    //PESO
    if(peso.length === 0){
        validated = false;
        errors.push(errors_msg[0]);
    }

    if(!$.isNumeric(peso)){
        validated = false;
        errors.push(errors_msg[1]);
    }else{
        if(parseInt(peso, 10) < 0){
            validated = false;
            errors.push(errors_msg[2]);
        }
    }

    //Estatura
    if(estatura.length === 0){
        validated = false;
        errors.push(errors_msg[3]);
    }

    if(!$.isNumeric(estatura)){
        validated = false;
        errors.push(errors_msg[4]);
    }else{
        if(parseInt(estatura, 10) < 0){
            validated = false;
            errors.push(errors_msg[5]);
        }
    }

    //Edad
    if(edad.length === 0){
        validated = false;
        errors.push(errors_msg[6]);
    }

    if(!$.isNumeric(edad)){
        validated = false;
        errors.push(errors_msg[7]);
    }else{
        if(parseInt(edad, 10) < 1){
            validated = false;
            errors.push(errors_msg[8]);
        }
    }

    //Nivel de actividad
    if(nivel_actividad === "0"){
        validated = false;
        errors.push(errors_msg[9]);
    }

    //Sexo
    if(sexo === "0"){
        validated = false;
        errors.push(errors_msg[10]);
    }

    initToastr();
    if(validated === true){
        $.ajax({
            method: "POST",
            url: "../php/calcularTMB.php",
            data:{
                "peso": peso,
                "estatura": estatura,
                "edad": edad,
                "nivel_actividad": nivel_actividad,
                "sexo": sexo
            },
            success:function(response) {
                let obj = JSON.parse(response);
                console.log(obj);
                console.log(obj.tmb);
                toastr.info("TMB calculado: " + obj.tmb);
                toastr.info("Consumo minimo de calorias: " + obj.num_calorias);

            },
            error:function(){
                toastr.error("Ha ocurrido un error.");
            }
        });
    }else{
        $.each(errors, function( index, value ) {
            toastr.error(value);
        });
    }
}

function initToastr(){
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": true,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
}

function getInputs(){

    let txt_peso = $("#peso");
    let txt_estatura = $("#estatura");
    let txt_edad = $("#edad");
    let cmb_nivel_actividad = $("#nivel_actividad");
    let cmb_sexo = $("#sexo");

    let inputs = {};

    inputs.txt_peso = txt_peso;
    inputs.txt_estatura = txt_estatura;
    inputs.txt_edad = txt_edad;
    inputs.cmb_nivel_actividad = cmb_nivel_actividad;
    inputs.cmb_sexo = cmb_sexo;

    return inputs;
}

function clean(inputs) {
    inputs.txt_peso.val("");
    inputs.txt_estatura.val("");
    inputs.txt_edad.val("");
    inputs.cmb_nivel_actividad.val("0");
    inputs.cmb_sexo.val("0");
}
