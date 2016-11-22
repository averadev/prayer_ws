function ajaxDATA(datos){
	$.ajax({
	    data:datos.datos,
	    type: "POST",
	    url: datos.url,
	    dataType: datos.tipo,
	    success: function(data){
			datos.funcionExito(data);
	    },
	    error: function(){
	        datos.funcionError();
	    }
	});
}

$("#loginForm").submit(function(e){
    return false;
});

$(document).off( 'click', '#ingresarAdmin');
$(document).on( 'click', '#ingresarAdmin', function () {
	var Usuario = $("#username").val();
	var Password = $("#password").val();
	if (Usuario.length > 0 || Password.length >0) {
		login(Usuario, Password);
	}else{
		alert("Ingresa el usuario y password");
	}
});


function login(Usuario, Password){
	var ajaxData =  {
		url: "login/checkLogin",
		tipo: "json",
		datos: {
			username: Usuario,
			password: Password
		},
		funcionExito : loginSuccess,
		funcionError: mensajeError
	};
	ajaxDATA(ajaxData);
}


function loginSuccess(data){
	console.table(data);
	if (data.success) {
		window.location.href = "Admin";
	}
}

function mensajeError(){
	console.log("error");
}