function mostrar($id){
	if (document.getElementById('mostrarOcultar' + $id).style.display == "none"){
		document.getElementById('mostrarOcultar' + $id).style.display="block";
	}else{
		document.getElementById('mostrarOcultar' + $id).style.display="none";
	}

}