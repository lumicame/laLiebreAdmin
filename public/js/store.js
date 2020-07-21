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
            formData.append("district", $('#selectDistrict').val());
            formData.append("type", $('#selectCategory').val());
            formData.append("name", $('#InputName').val());
            formData.append("description", $('#InputDescription').val());
            formData.append('logo', $('#file_logo')[0].files[0]);
            formData.append("email", $('#InputEmail').val());
            formData.append("pass", $('#InputPass').val());
            $.ajax({
              type: 'POST',
              url: 'stores',
              contentType: false,
                    data: formData, // Al atributo data se le asigna el objeto FormData.
                    processData: false,
                    cache: false,success: function(data) {
              	$('#InputName').val('');
                $('#description').val('');
                 $('#logo').val('');
                 $('#InputEmail').val('');
                $('#InputPass').val('');
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
    var formData = new FormData();
            formData.append("_token", $('input[name=_token]').val());
            formData.append("district", $('#selectEditDistrict').val());
            formData.append("type", $('#selectEditCategory').val());
            formData.append("name", $('#InputEditName').val());
            formData.append("description", $('#InputEditDescription').val());
            formData.append('logo', $('#file_edit_logo')[0].files[0]);
            formData.append("email", $('#InputEditEmail').val());
            formData.append("pass", $('#InputEditPass').val());
	$("#loading_edit").css('display','inherit');
     $.ajax({
        type: 'POST',
        url: 'stores/edit/'+$('#id_edit').val(),
        contentType: false,
        data: formData, // Al atributo data se le asigna el objeto FormData.
        processData: false,
        cache: false,
        success: function(data) {
      	$('#InputName').val('');
        $('#InputEditEmail').val('');
        $('#InputEditPass').val('');
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
      url: 'stores/delete/'+$('#id_delete').val(),
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
      url: 'stores/'+id,
      data: {
        '_token': $('input[name=_token]').val(),
      },success: function(data) {
      	$('#InputEditName').val(data.name);
        $('#InputEditDescription').val(data.description);
      	$('#id_edit').val(data.id);
      	$('#content_tr').append(data);
            
            
      },
    });
}