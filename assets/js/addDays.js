$("#addDays").submit(function(e){
    e.preventDefault();
    submitFileOK();
});

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
    //data.append('fechaDia', $('#fechaDia').val());
    
    var archivos = document.getElementById("file");
    var archivo = archivos.files; 
    data.append('Audio', archivo[0]);

    Req.open("POST", "addDays/saveAudios", true);
    Req.onload = function(Event) {
        if (Req.status == 200) {
            document.getElementById("addDays").reset();
            alertify.success("Guardado correctamente");
        } else { 
          
        }   
    };
    Req.send(data); 
}