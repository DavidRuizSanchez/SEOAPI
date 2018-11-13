window.onload=function(){
	var conexion = new XMLHttpRequest();
	conexion.onreadystatechange=function(){
		if(this.status==200&this.readyState==4){
			console.log(this.responseText);
		}

	}
	conexion.open("GET","http://localhost:8888/APIS/curl.php",true);
	conexion.send();
}