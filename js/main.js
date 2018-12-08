$("#logout").on('click',function(e){
   e.preventDefault();
   $.ajax({
        method: "POST",
        url: "../php/web_ajax.php",
        data:{
            "action": 'logout'
        },
        success:function(response) {
            let obj = JSON.parse(response);
            let error_id = obj.error_id;
            if(error_id === 0){
                console.log("test");
                window.location.href = "index.html";
            }
        },
        error:function(){
            toastr.error("Ha ocurrido un error.");
        }
    });
});