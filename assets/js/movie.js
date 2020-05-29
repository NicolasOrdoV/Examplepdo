//Definir una variable global para cargar las categorias seleccionadas//
var arrayCategories = [];

$('#add').click(function(e){
	//Desabilitar submit del formulario
	e.preventDefault();
	let idCategory = $("#categories").val()
	let nameCategory = $("#categories option:selected").text()
	if (idCategory != '') {
		if (typeof existCategory(idCategory) === 'undefined') {
			//agregar nuevo objeto al array
	        arrayCategories.push({
	        	'id'   :idCategory,
	        	'name' :nameCategory
	        })
        showCategories()
		}else{
			alert("La categoria ya se encuentra seleccionada")
		}   
	}else{
		alert("Debe seleccionar una categoria");
	}
});

function showCategories(){
	$('#list-categories').empty()
	arrayCategories.forEach(function(category){
		let html = '<div class="form-group"> <button onclick="removeElement('+category.id+')" class="btn btn-danger">X</button> <span>'+category.name+'</span> </div>'
       $("#list-categories").append(html)
	})
}

function existCategory(idCategory){
   let existCategory = arrayCategories.find(function(category){
   	return category.id == idCategory
   })
   return existCategory
}

function removeElement(idCategory){
	//obtiene el indice en donde esta la categoria
   let index = arrayCategories.indexOf(existCategory(idCategory))
   //elimina el indice del array
   arrayCategories.splice(index,1)
   showCategories()
}

$("#submit").click(function(e){
	e.preventDefault()

	let url = "?controller=movie&method=save"
	let params = {
		name       : $("#name").val(),
		description: $("#description").val(),
		user_id    : $("#user_id").val(),
		categories : arrayCategories
	}
	//metodo POST de ajax para el envio del formulario
	$.post(url, params, function(response){
       if (typeof response.error !== 'undefined') {
       	alert(response.message)
       }else{
       	alert("Inserción satistactoria")
       	location.href = '?controller=movie'
       }
	},'json').fail(function(error){
		alert("Error insertando la pelicula")
	});
});