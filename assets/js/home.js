

var vm = new Vue({ 
	el: '#app',
	data:{
		headers: [
			{ text: 'ID_DIA' },
			{ text: 'Nombre' },
			{ text: 'Fecha' },
			{ text: 'Descripcion' },
			{ text: 'Audio' },
			{ text: 'Eliminar' }
		],
		days:[],
		BASE_URL : BASE_URL_AUDIO,
	},
	ready : function(){
		getDays();
		$(document).off('change', '#deleteDay');
		$(document).on( 'change', '#deleteDay', function () {
			deleteDay();
		});
	}
})

function getDays(){
	/*$.get('RestPrayer/days/', function(data){
		vm.days = data.items;
	});*/
	var ajaxData =  {
		url: "RestPrayer/days/",
		tipo: "json",
		metodo: "POST",
		datos: {
		},
		funcionExito : deleteMessage,
		funcionError: mensajeAlertify
	};
	ajaxDATAG(ajaxData);
}

function deleteDay(id){
	var ajaxData =  {
		url: "AddDays/deleteDay/",
		tipo: "json",
		metodo: "POST",
		datos: {
			idDay: id,
		},
		funcionExito : setVue,
		funcionError: mensajeAlertify
	};
	ajaxDATAG(ajaxData);
}

function setVue(data){
	vm.days = data.items;
}

function deleteMessage(data){
	if (data.success) {
		alertify.success(data.message);
		getDays();
	}else{
		alertify.error(data.message);
	}
}