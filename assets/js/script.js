function validarCurp(CURP){
    CURP = CURP.toUpperCase();
    document.getElementById("idCURP").value = CURP;

    var patronCURP = /^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$/,
    validado = CURP.match(patronCURP);

  if(validado){
      return true;
  } else{
     return false;
  }
}

function calcularFechaNacimiento(CURP){
    var anio = CURP.substr(4, 2), mes = CURP.substr(6, 2), dia = CURP.substr(8, 2);
    return `${anio}-${mes}-${dia} `;
}


function validarNombreApellido(nombre){
    nombre = nombre.toUpperCase();
    var patron = /^[a-zA-Z\s]*$/;
    var validado = nombre.match(patron);

    if(validado){     
        return true;
    } else{
        return false;
    }
}



function validarFormAlumnosAltas(){
    var validacion = true;

     if(!validarNombreApellido(document.getElementById("idNombre").value)){
        validacion = false;
    }else if(!validarNombreApellido(document.getElementById("idPaterno").value)){
        validacion = false;
    }else if(!validarNombreApellido(document.getElementById("idMaterno").value)){
        validacion = false;
    }else if(!validarCurp(document.getElementById("idCURP").value)){
        validacion = false;
    }else if(!document.getElementById("idEmail").value){
        validacion = false;
    }

    if(validacion){
        document.validarFormAlumnosAltas.submit();
    }else{
        alert("Completar los campos correctamente!");
        
    }

}


window.onload = function(){
    document.getElementById("btnAltaAlumnos").onclick = validarFormAlumnosAltas;
}
