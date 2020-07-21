$(document).on('click','.btn_edit',function () {
   
   load($(this).data("id"));
});
$(document).on('click','.btn_delete',function () {
   $('#id_delete').val($(this).data("id"))
});



//////////////////////////////////////////////////////
////////////////FORMULARIO PARA AGREGAR///////////////
$("#form_add").on("submit", function(e){
    e.preventDefault();
    $("#loading_add").css('display','inherit');
     $.ajax({
      type: 'POST',
      url: 'providers',
      data: {
        '_token': $('input[name=_token]').val(),
        'name':$('#InputName').val(),
        'location':$('#InputLocation').val(),
        'phone':$('#InputPhone').val(),
      },success: function(data) {
      	$('#InputName').val('');
        $('#InputLocation').val('');
        $('#InputPhone').val('');
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
      url: 'providers/edit/'+$('#id_edit').val(),
      data: {
        '_token': $('input[name=_token]').val(),
        'name':$('#InputEditName').val(),
        'location':$('#InputEditLocation').val(),
        'phone':$('#InputEditPhone').val(),
      },success: function(data) {
      	$('#InputEditName').val('');
        $('#InputEditLocation').val('');
        $('#InputEditPhone').val('');
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
      url: 'providers/delete/'+$('#id_delete').val(),
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
      url: 'providers/'+id,
      data: {
        '_token': $('input[name=_token]').val(),
      },success: function(data) {
      	$('#InputEditName').val(data.name);
        $('#InputEditLocation').val(data.location);
        $('#InputEditPhone').val(data.phone);
      	$('#id_edit').val(data.id);
      	$('#content_tr').append(data);
      },
    });
}