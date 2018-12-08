$("#btn_login").on('click',function(e){

	e.preventDefault();
	let username = $("#username").val();
	let password = $("#password").val();

	$.ajax({
          method: "POST",
          url: "../php/web_ajax.php",
          data:{
            "username": username,
            "password": password,
            "action": 'login'
          },
          success:function(response) {
              let obj = JSON.parse(response);
              let error_id = obj.error_id;
              console.log(error_id);
              switch (error_id) {
                  case 0:
                      window.location.href = "main.php";
                  case 1:
                      toastr.error("Usuario no existe.");
                      break;
                  case 2:
                      toastr.error("Contraseña no coincide.");
                      break;
              }
            },
            error:function(){
                toastr.error("Ha ocurrido un error.");
            }
        });
});