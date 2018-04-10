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



window.onload = function(){
    this.document.getElementsById('btnListaGruposPDF').onclick = ListaGrupos;
}