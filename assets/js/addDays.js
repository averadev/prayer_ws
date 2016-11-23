$("#addDays").submit(function(e){
    e.preventDefault();
    console.log("OK");
    submitFileOK();
  });


function submitFile(){
        var formUrl = "addDays/saveAudios";
        var form = document.getElementById('addDays');
        var formData = new FormData(form);

var xhr = new XMLHttpRequest();
// Add any event handlers here...
xhr.open('POST', 'addDays/saveAudios', true);
xhr.send(formData);
        $.ajax({
                url: formUrl,
                type: 'POST',
                data: FormData,
                mimeType: "multipart/form-data",
                contentType: false,
                cache: false,
                processData: false,
                success: function(data, textSatus, jqXHR){
                        //now get here response returned by PHP in JSON fomat you can parse it using JSON.parse(data)
                },
                error: function(jqXHR, textStatus, errorThrown){
                        //handle here error returned
                }
        });
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
        
    //nos devuelve los resultados
    Req.onload = function(Event) {
        //Validamos que el status http sea ok 
        if (Req.status == 200) {
            console.log("OK");
           
        } else { 
          
        }   
    };
        
    //Enviamos la petición 
    Req.send(data); 
}