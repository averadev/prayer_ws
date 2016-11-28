$(document).ready(function() {
    getDays();
});

 function getDays(){
       $.get('RestPrayer/days/', function(data){  
            datos = data.items;
            var fechas = [];
            for (var i = 0; i < datos.length; i++) {
                evento = {
                    title: datos[i].day_name,
                    start: new Date(datos[i].day_date),
                }
                fechas.push(evento);
            }
            $('#calendar').fullCalendar({
                header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
                },
                events: fechas,
                eventColor: '#378006',
                displayEventTime: false,
                dayClick: function(date, jsEvent, view) {
                    //alert('Clicked on: ' + date.format());
                    //$( "#dialog" ).dialog();
                    newBacth(date.format());
                    //$(this).css('background-color', 'red');
                }
            })
        })
    }

function newBacth(fecha){
    var ajaxData =  {
        url: "AddDays/formulario",
        tipo: "html",
        datos: {
            fecha: fecha
        },
        funcionExito : addHTMLGeneral,
        funcionError: mensajeAlertify
    };
    var modalPropiedades = {
        div: "dialog",
        altura: 450,
        width: "50%",
        onOpen: ajaxDATAG,
        onSave: createNewBatch,
        botones :[{
            text: "Close",
            "class": 'dialogModalButtonCancel',
            click: function() {
                $(this).dialog('close');
            }
            },{
                text: "Save",
                "class": 'dialogModalButtonAccept',
                click: function() {
                   submitFileOK();
                }
            }]
        };

    if (modalCreditLimit!=null) {
        modalCreditLimit.dialog( "destroy" );
    }
    modalCreditLimit = modalGeneralG(modalPropiedades, ajaxData);
    modalCreditLimit.dialog( "open" );
}
function modalGeneralG(propiedades, datosAjax) {
    dialogo = $("#"+propiedades.div).dialog ({
        open : function (event){
            propiedades.onOpen(datosAjax, propiedades.div);
        },              
        autoOpen: false,
        height: propiedades.altura,
        width: propiedades.width,
        modal: true,
        buttons: propiedades.botones,
     close: function() {
        $(this).empty();
     }
    });
    return dialogo;
}
function addHTMLGeneral(data, div){
    $(this).css('background-color', 'green');
    $("#"+div).html(data);
}

function ajaxDATAG(datos, div){
    $.ajax({
        data:datos.datos,
        type: "POST",
        url: datos.url,
        dataType: datos.tipo,
        success: function(data){
            datos.funcionExito(data, div);
        },
        error: function(){
            datos.funcionError();
        }
    });
}


function createNewBatch(){
    console.log("creado");
}

function mensajeAlertify(){
    console.log("error");
}

function submitFileOK(){

    if(window.XMLHttpRequest) {
        var Req = new XMLHttpRequest(); 
    }else if(window.ActiveXObject) { 
        var Req = new ActiveXObject("Microsoft.XMLHTTP"); 
    }   
    
    var data = new FormData(); 
    
    data.append('nombreDia', $('#nombreDia').val().trim());
    data.append('fechaDia', $('#fechaDia').val());
    data.append('descripcionCorta', $('#descripcionCorta').val());
    data.append('descripcionLarga', $('#descripcionLarga').val());
    data.append('fechaDia', $('#fechaDia').val());
    
    var archivos = document.getElementById("file");
    var archivo = archivos.files; 
    data.append('Audio', archivo[0]);

    Req.open("POST", "addDays/saveAudios", true);
    Req.onload = function(Event) {
        if (Req.status == 200) {
            modalCreditLimit.dialog( "close" );
            $("#calendar").fullCalendar('destroy');
            getDays();
            alertify.success("Guardado correctamente");
        } else { 
          
        }   
    };
    Req.send(data); 
}