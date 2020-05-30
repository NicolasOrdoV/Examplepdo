//Definir una variable global para cargar las categorias seleccionadas//
var arrayMovies = [];

$('#add').click(function(e){
	//Desabilitar submit del formulario
	e.preventDefault();
	let idMovie = $("#movies").val()
	let nameMovie = $("#movies option:selected").text()
	if (idMovie != '') {
		if (typeof existMovie(idMovie) === 'undefined') {
			//agregar nuevo objeto al array
	        arrayMovies.push({
	        	'id'   :idMovie,
	        	'name' :nameMovie
	        })
        showMovies()
		}else{
			alert("La pelicula ya se encuentra seleccionada")
		}   
	}else{
		alert("Debe seleccionar una pelicula");
	}
});

function showMovies(){
	$('#list-movies').empty()
	arrayMovies.forEach(function(movie){
		let html = '<div class="form-group"> <button onclick="removeElement('+movie.id+')" class="btn btn-danger">X</button> <span>'+movie.name+'</span> </div>'
       $("#list-movies").append(html)
	})
}

function existMovie(idMovie){
   let existMovie = arrayMovies.find(function(movie){
   	return movie.id == idMovie
   })
   return existMovie
}

function removeElement(idMovie){
	//obtiene el indice en donde esta la categoria
   let index = arrayMovies.indexOf(existMovie(idMovie))
   //elimina el indice del array
   arrayMovies.splice(index,1)
   showMovies()
}

$("#submit").click(function(e){
	e.preventDefault()

	let url = "?controller=rental&method=save"
	let params = {
		start_date       : $("#start_date").val(),
		end_date         : $("#end_date").val(),
		total            : $("#total").val(),
		user_id          : $("#user_id").val(),
		movies           : arrayMovies
	}
	//metodo POST de ajax para el envio del formulario
	$.post(url, params, function(response){
       if (typeof response.error !== 'undefined') {
       	alert(response.message)
       }else{
       	alert("Inserción satistactoria")
       	location.href = '?controller=rental'
       }
	},'json').fail(function(error){
		alert("Error insertando el alquiler")
	});
});