$(document).ready(function() {
	$(document).off('change', '#days_cancel');
	$(document).on( 'change', '#days_cancel', function () {
		cancelDays();
	});
});

function cancelDays(){
	var ajaxData =  {
		url: "AddDays/saveDaysCancel/",
		tipo: "json",
		metodo: "POST",
		datos: {
			id_dayCancel: 2,
			days_cancel : $("#days_cancel").val()
		},
		funcionExito : addGeneral,
		funcionError: mensajeAlertify
	};
	ajaxDATAG(ajaxData);
}

function addGeneral(data){
	if (data.success) {
		alertify.success(data.message);
	}else{
		alertify.error(data.message);
	}
}