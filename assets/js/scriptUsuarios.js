function ValidarForm(){
    var validacion = true;
    if(document.frmRegistro.txtContrasena.value !== document.frmRegistro.txtContrasenaConfirma.value){
        validacion = false;
    }

    if(validacion){
        document.validarFormAlumnosAltas.submit();
    }else{
        alert("las contraseñas no coinciden! >:v");
        document.frmRegistro.txtContrasena.value="";
        document.frmRegistro.txtContrasenaConfirma.value="";
    }

}

window.onload = function(){
    document.getElementById("btnRegistrar").onclick = ValidarForm;
}

