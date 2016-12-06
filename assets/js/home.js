

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
	var ajaxData =  {
		url: "RestPrayer/days/",
		tipo: "json",
		metodo: "GET",
		datos: {
		},
		funcionExito : daysMessage,
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
		funcionExito : deleteMessage,
		funcionError: mensajeAlertify
	};
	ajaxDATAG(ajaxData);
}

function setVue(data){
	if (data.success) {
		alertify.success(data.message);
	}else{
		alertify.error(data.message);
	}
	//vm.days = data.items;
}

function daysMessage(data){
	if (data.success) {
		vm.days = data.items;
	}else{
		alertify.error(data.message);
	}
}

function deleteMessage(data){
	if (data.success) {
		alertify.success(data.message);
		getDays();
	}else{
		alertify.error(data.message);
	}
}