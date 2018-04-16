function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
    results = regex.exec(location.search);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}

function ListaGrupos(){
    var idCiclo = getParameterByName('idCiclo');
    var idSalon = getParameterByName('idSalon');
    var dir = '../../logic/generacionPDFs/listasGrupos.php?idSalon='+idSalon+'&idCiclo='+idCiclo;
    window.location.replace(dir)
}

function BitacoraPDF(){
    var dir = '../../logic/generacionPDFs/reporteBitacora.php';
    window.location.replace(dir)

}


function CamposCompletos(){
    var idCiclo = getParameterByName('idCiclo');
    var idSalon = getParameterByName('idSalon');
    var idBimestre = getParameterByName('idBimestre');

    var elementos = document.getElementsByClassName("clCalificacion");
    var bandera = true;

    for(var i=0; i<elementos.length; i++) {
        
        if(elementos[i].value == ''){
            bandera = false;
        }
    }


    if(bandera){
        var dir = '../../logic/generacionPDFs/calificacionesPDF.php?Bimestre='+idBimestre+'&Salon='+idSalon+'&Ciclo='+idCiclo;
        window.location.replace(dir)
    }else{
        alert('No sean completado todos los campos');
    }

}


window.onload = function(){
    this.document.getElementsById('btnListaGruposPDF').onclick = ListaGrupos;
}