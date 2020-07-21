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
var formData = new FormData();
            formData.append("_token", $('input[name=_token]').val());
            formData.append("name", $('#InputName').val());
            formData.append('logo', $('#file_logo')[0].files[0]);
     $.ajax({
      type: 'POST',
      url: 'types',
       contentType: false,
                    data: formData, // Al atributo data se le asigna el objeto FormData.
                    processData: false,
                    cache: false,success: function(data) {
      	$('#InputName').val('');
        $("#loading_add").css('display','none');
      	$('#content_tr').append(data);
                $('.close').click(); 
      },
    });
              
        });


//////////////////////////////////////////////////////
////////////////FORMULARIO PARA EDITAR///////////////
$("#form_edit").on("submit", function(e){
    e.preventDefault();
$("#loading_edit").css('display','inherit');
var formData = new FormData();
            formData.append("_token", $('input[name=_token]').val());
            formData.append("name", $('#InputEditName').val());
            formData.append('logo', $('#file_logo_edit')[0].files[0]);
     $.ajax({
      type: 'POST',
      url: 'types/edit/'+$('#id_edit').val(),
      contentType: false,
      data: formData, // Al atributo data se le asigna el objeto FormData.
      processData: false,
      cache: false,success: function(data) {
      	$('#InputName').val('');
        $("#loading_edit").css('display','none');
      	$('#tr_'+$('#id_edit').val()).replaceWith(data);
        $('.close').click(); 
      },
    });
              
        });


$('#form_delete').on('submit',function (e) {
	e.preventDefault();
$("#loading_delete").css('display','inherit');
	$.ajax({
      type: 'POST',
      url: 'types/delete/'+$('#id_delete').val(),
      data: {
        '_token': $('input[name=_token]').val(),
      },success: function(data) {
      	
      	$('#tr_'+data).remove();
        $("#loading_delete").css('display','none');
      	 $('.close').click(); 
            
            
      },
    });
});
function load(id) {
	$.ajax({
      type: 'GET',
      url: 'types/'+id,
      data: {
        '_token': $('input[name=_token]').val(),
      },success: function(data) {
      	$('#InputEditName').val(data.name);
      	$('#id_edit').val(data.id);
      	$('#content_tr').append(data);
            
            
      },
    });
}