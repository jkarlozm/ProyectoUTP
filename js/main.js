/*Inicio de sesion*/
$('#accesoPage').click(function(){
	$('.modal').modal('show');
})

$('#login').click(function() {
	var validar = $('#userLogin').val().length * $('#passLogin').val().length;
	if (validar != 0) {
		$.ajax({
			type: 'POST',
			url: 'librerias/crudUser.php',
			data: {user: $('#userLogin').val(), pass: $('#passLogin').val(), type: 1},
			success: function (response) {
				console.log(response);
				switch(response){
					case '1':
						//Ingreso a sistema
						window.location = 'mymenu.html';
						break;
					case '2':
						//Datos Erroneos
						$("#mensajeSesion").append('<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><p class="text-center">"¡Verifica tus credenciales!"</p></div>');
						break;
				}
			}
		})
	}else{
		$("#mensajeSesion").append('<div class="alert alert-info alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><p class="text-center">"¡Hay campos vacios!"</p></div>');
	}

});