
var list=[];



$("#addRecipe").on('click',function () {
	location.href ="recipes/create/"+$("#searchSub").val();
});
$(document).on('click','.btn_edit',function () {
   
   load($(this).data("id"));
});
$(document).on('click','.btn_delete',function () {
   $('#id_delete').val($(this).data("id"));
});

$(document).on('click','.select_product',function () {
	var id=$(this).data("id");
	$.ajax({
      type: 'GET',
      url: 'select/product/',
      data: {
        '_token': $('input[name=_token]').val(),
        'id':id
      },success: function(data) {
        
          if (data=="ERROR") {
            alert("Este producto no existe");
        }
        else{
          var is=false;
          var index=0;
          var i=0;
          list.forEach(function (e) {
            if (e.id==data.id) {
              is=true;
              index=i;
              console.log("true");
              return
            }
            i=i+1
          });
          if (is==true) {
            $('#tr_'+data.id).css('display','');
            console.log(list[index]);
            list[index].total=0;
             
		      
		      $('.close').click(); 
          }
          else{
          $('#content_tr').append(data.data);
          var product=new Object();
          product.id=data.id;
          product.cantidad=1;
          product.precio=data.price;
          product.weight=data.weight;
          product.peso=1;
          product.total=product.cantidad*product.precio;
          list.push(product);
          $('#td_weight_'+data.id).attr('data-index',(list.length-1));
          $('#product_weight_'+data.id).attr('data-index',(list.length-1));
          $('#product_delete_'+data.id).attr('data-index',(list.length-1));
          }
          var total=0;
          list.forEach(e=>total=total+(e.total));
          
          $('#th_total').html('$'+total);
          $('#InputSearchProduct').val("");
          console.log(list);
           $('.close').click();  
        }
      },
    });

});

//////////////////////////////////////////////////////
///////////FUNCION PARA ELIMINAR PRODUCTO///////////
  $(document).on('click','.btn_delete',function () {
      var i=$(this).data("index");
      list[i].cantidad=0;
      list[i].total=0;

      $('#tr_'+$(this).data("id")).css('display','none');
      var total=0;
          list.forEach(e=>
              total=total+(e.total)
           );
          $('#th_total').html('$'+total);
          console.log(list);
    });
///////----------------//-------------------///////////

//////////////////////////////////////////////////////
///////////EVENTO PARA MODIFICAR LA CANTIDAD DE LOS PRODUCTOS///////////
  $(document).on('change','.input_weight',function () {
      var i=$(this).data("index");
      //var str = $("#inventory_d_"+$(this).data("id")).val();
      list[i].peso=$(this).val();
      console.log((list[i].peso/list[i].weight));
      if ((list[i].peso/list[i].weight)>1) {
      	list[i].cantidad=Math.ceil((list[i].peso/list[i].weight));
      	 list[i].total=Math.ceil((list[i].peso/list[i].weight))*list[i].precio;
      }
     else{
     	list[i].cantidad=1;
     	list[i].total=list[i].precio;
     }
      
      $('#total_'+$(this).data("id")).html("$"+list[i].total);
     var total=0;
          list.forEach(e=>
              total=total+(e.total)
           );
          $('#th_total').html('$'+total);
    });

$('#searchCategory').change( function () {
 searchCategory($(this).val());
});

//////////////////////////////////////////////////////
///////////FUNCION PARA FINALIZAR UNA CUENTA///////////
 $("#form_add").on("submit", function(e){
    e.preventDefault();
    $("#loading_add").css('display','inherit');
  if (list.length>0) {
  	var formData = new FormData();
            formData.append("_token", $('input[name=_token]').val());
            formData.append("list", list);
            formData.append("name", $('#inputName').val());
            formData.append("description", $('#inputDescription').val());
            formData.append('img', $('#file_img')[0].files[0]);
            formData.append("link", $('#InputLink').val());
    $.ajax({
      type: 'POST',
      url: 'recipes/create/'+$('#searchSub').val()),
      contentType: false,
       data: formData, // Al atributo data se le asigna el objeto FormData.
       processData: false,
      cache: false,success: function(data) {
        if (data=="exito") {
      location.href="/recipes";
        }
        else{
          alert("a ocurrido un error");
        }
        
      },
    });
  }
  else
    alert("Agregue productos a la receta.");
    });
///////----------------//-------------------///////////

function searchCategory(id) {
  $.ajax({
      type: 'GET',
      url: 'categories/search/'+ id,
      data: {
        '_token': $('input[name=_token]').val()
      },success: function(data) {
        
           $('#content_tr').html(data);
      },
    });
}

//////////////////////////////////////////////////////
///////////FUNCION PARA BUSCAR A UN CLIENTE///////////
  const $search = document.querySelector('#InputSearchProduct');

  const searchHandler = function(e) {

  $.ajax({
        type: 'GET',
        url: 'search/product',
        data: {
          '_token': $('input[name=_token]').val(),
          'text':$('#InputSearchProduct').val()
        },success: function(data) {
        	if (data=="ERROR") {
  			$('#content_product').html("<h3>No hay coincidencias</h3>");
        	}
        	else{
        		$('#content_product').html(data);
        	}
          
        },
      }); 
  }
  $search.addEventListener('input', searchHandler); // register for oninput

//////////////////////////////////////////////////////
////////////////FORMULARIO PARA AGREGAR///////////////
$("#form_add").on("submit", function(e){
    e.preventDefault();
    $("#loading_add").css('display','inherit');
     $.ajax({
      type: 'POST',
      url: 'category',
      data: {
        '_token': $('input[name=_token]').val(),
        'name':$('#InputName').val(),
      },success: function(data) {
      	$('#InputName').val('');
      	$('#searchCategory').html(data);
      	$("#loading_add").css('display','none');
                $('.close').click(); 
      },
    });
              
        });


//////////////////////////////////////////////////////
////////////////FORMULARIO PARA AGREGAR SUB CATEGORIA///////////////
$("#form_add_sub").on("submit", function(e){
    e.preventDefault();
    $("#loading_add").css('display','inherit');
     $.ajax({
      type: 'POST',
      url: 'subcategory',
      data: {
        '_token': $('input[name=_token]').val(),
        'name':$('#InputNameSub').val(),
        'category':$('#searchCategory').val()
      },success: function(data) {
        $('#InputNameSub').val('');
        $('#content_tr').append(data);
        $("#loading_add").css('display','none');
                $('.close').click(); 
      },
    });
              
        });

//////////////////////////////////////////////////////
////////////////FORMULARIO PARA EDITAR///////////////
$("#form_edit").on("submit", function(e){
    e.preventDefault();
	$("#loading_edit").css('display','inherit');
     $.ajax({
      type: 'POST',
      url: 'subcategory/edit/'+$('#id_edit').val(),
      data: {
        '_token': $('input[name=_token]').val(),
        'name':$('#InputEditName').val(),
      },success: function(data) {
      	$('#InputEditName').val('');
      	$('#tr_'+$('#id_edit').val()).replaceWith(data);
      	$("#loading_edit").css('display','none');
        $('.close').click(); 
      },
    });
              
        });


$('#form_delete').on('submit',function (e) {
	e.preventDefault();
	$("#loading_delete").css('display','inherit');
	$.ajax({
      type: 'POST',
      url: 'subcategory/delete/'+$('#id_delete').val(),
      data: {
        '_token': $('input[name=_token]').val(),
      },success: function(data) {
      	$("#loading_delete").css('display','none');
      	$('#tr_'+data.id).remove();
      	 $('.close').click(); 
            
            
      },
    });
});
function load(id) {
	$.ajax({
      type: 'GET',
      url: 'subcategory/show/'+id,
      data: {
        '_token': $('input[name=_token]').val(),
      },success: function(data) {
      	$('#InputEditName').val(data.name);
      	$('#id_edit').val(data.id);
      	$('#content_tr').append(data);
      },
    });
}