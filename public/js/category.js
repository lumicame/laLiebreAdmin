$(document).on('click','.btn_edit',function () {
   
   load($(this).data("id"));
});
$(document).on('click','.btn_delete',function () {
   $('#id_delete').val($(this).data("id"))
});


$('#searchCategory').change( function () {
 searchCategory($(this).val());
});

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
////////////////FORMULARIO PARA AGREGAR///////////////
$("#form_add").on("submit", function(e){
    e.preventDefault();
    $("#loading_add").css('display','inherit');
     $.ajax({
      type: 'POST',
      url: 'categories',
      data: {
        '_token': $('input[name=_token]').val(),
        'name':$('#InputName').val(),
        'aisle':$('#searchCategory').val()
      },success: function(data) {
      	$('#InputName').val('');
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
      url: 'categories/edit/'+$('#id_edit').val(),
      data: {
        '_token': $('input[name=_token]').val(),
        'name':$('#InputEditName').val()
      },success: function(data) {
      	$('#InputName').val('');
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
      url: 'categories/delete/'+$('#id_delete').val(),
      data: {
        '_token': $('input[name=_token]').val(),
      },success: function(data) {
      	$("#loading_delete").css('display','none');
      	$('#tr_'+data).remove();
      	 $('.close').click(); 
            
            
      },
    });
});
function load(id) {
	$.ajax({
      type: 'GET',
      url: 'categories/'+id,
      data: {
        '_token': $('input[name=_token]').val(),
      },success: function(data) {
      	$('#InputEditName').val(data.name);
      	$('#id_edit').val(data.id);
      	$('#content_tr').append(data);
            
            
      },
    });
}