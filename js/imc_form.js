$("#clean").on('click',function(){
	clean(getInputs());
});

$("#send").on('click',function(e){
	e.preventDefault();

	let inputs = getInputs();

	let peso =  inputs.txt_peso.val();
	let estatura =  inputs.txt_estatura.val();	

	let inputs_values = {};

	inputs_values.peso = peso;
	inputs_values.estatura = estatura;	

    validar(inputs_values);

});

function validar(inputs_values){

	let validated = true;

	let peso =  inputs_values.peso;
	let estatura =  inputs_values.estatura;

    let errors_msg = [
        "Ingrese peso.",
        "Peso debe ser numerico.",
        "Peso no valido.",
        "Ingrese estatura.",
        "Estatura debe ser numerico.",
        "Estatura no valida.",
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

    initToastr();
    if(validated === true){
        $.ajax({
          method: "POST",
          url: "../php/calcularIMC.php",
          data:{
            "peso": peso,
            "estatura": estatura
          },
          success:function(response) {
              let obj = JSON.parse(response);
              if(obj.error){
                toastr.error("Ha ocurrido un error.");
            }else{
                if(obj.grado === "1"){
                toastr.warning("Su IMC es: " + obj.imc);
                toastr.warning("Su Clasificacion es: " + obj.clasificacion);
              }else if(obj.grado === "2"){
                toastr.success("Su IMC es: " + obj.imc);
                toastr.success("Su Clasificacion es: " + obj.clasificacion);
              }else if(obj.grado === "3"){
                toastr.info("Su IMC es: " + obj.imc);
                toastr.info("Su Clasificacion es: " + obj.clasificacion);
              }else{
                toastr.error("Su IMC es: " + obj.imc);
                toastr.error("Su Clasificacion es: " + obj.clasificacion);
              }
            }
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

	let inputs = {};

	inputs.txt_peso = txt_peso;
	inputs.txt_estatura = txt_estatura;	

	return inputs;
}

function clean(inputs){

	inputs.txt_name.val("");
	inputs.txt_age.val("");
	inputs.txt_salary.val("");
	inputs.txt_dni.val("");
	inputs.cmb_region.val("0");
	inputs.rb_sex.each(function()  {
		$(this).prop('checked', false);
	});
	inputs.chk_work.prop('checked',false);
}