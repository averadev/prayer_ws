$(document).ready(function() {
	$(document).off('change', '#days_cancel');
	$(document).on( 'change', '#days_cancel', function () {
		cancelDays();
	});
});

var vm = new Vue({ 
	el: '#app',
	data:{
		headers: [
		{ text: 'ID_DIA' },
		{ text: 'Nombre' },
		{ text: 'Fecha' },
		{ text: 'Descripcion' },
		{ text: 'Audio' }
		],
		days:[],
		BASE_URL : BASE_URL_AUDIO,
	},
	ready : function(){
		getDays();
	}
})

function getDays(){
	$.get('RestPrayer/days/', function(data){
		vm.days = data.items;
	})
}


function cancelDays(){
	var ajaxData =  {
		url: "RestPrayer/days/",
		tipo: "json",
		metodo: "GET",
		datos: {

		},
		funcionExito : addGeneral,
		funcionError: mensajeAlertify
	};
	ajaxDATAG(ajaxData);
}

function addGeneral(data){
	console.table(data.items);
	console.log("respuesta");
}