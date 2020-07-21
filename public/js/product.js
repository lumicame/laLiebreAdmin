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
      url: 'products/search/'+ id,
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
            var formData = new FormData();
            formData.append("_token", $('input[name=_token]').val());
            formData.append("store", $('#selectStore').val());
            formData.append("category", $('#selectCategory').val());
            formData.append("provider", $('#selectProvider').val());
            formData.append("name", $('#InputName').val());
            formData.append("description", $('#InputDescription').val());
            formData.append('img', $('#file_img')[0].files[0]);
            formData.append("unit", $('#InputMeasure').val());
            formData.append("weight", $('#InputWeight').val());
            formData.append("price", $('#InputPrice').val());
            formData.append("code", $('#InputCode').val());


            $.ajax({
              type: 'POST',
              url: 'products',
              contentType: false,
                    data: formData, // Al atributo data se le asigna el objeto FormData.
                    processData: false,
                    cache: false,success: function(data) {
                $('#InputName').val('');
                $('#InputDescription').val('');
                $('#file_img').val('');
                $('#content_tr').append(data);
                $("#loading_add").css('display','none');
                $('#InputMeasure').val('');
                $('#InputWeight').val('');
                $('#InputPrice').val('');
                $('#InputCode').val('');
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
            formData.append("store", $('#selectEditStore').val());
            formData.append("category", $('#selectEditCategory').val());
            formData.append("provider", $('#selectEditProvider').val());
            formData.append("name", $('#InputEditName').val());
            formData.append("description", $('#InputEditDescription').val());
            formData.append('img', $('#file_edit_img')[0].files[0]);
            formData.append("unit", $('#InputEditMeasure').val());
            formData.append("weight", $('#InputEditWeight').val());
             formData.append("price", $('#InputEditPrice').val());
             formData.append("code", $('#InputEditCode').val());
    $("#loading_edit").css('display','inherit');
     $.ajax({
      type: 'POST',
      url: 'products/edit/'+$('#id_edit').val(),
      contentType: false,
      data: formData, // Al atributo data se le asigna el objeto FormData.
      processData: false,
      cache: false,success: function(data) {
        
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
      url: 'products/delete/'+$('#id_delete').val(),
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
      url: 'products/'+id,
      data: {
        '_token': $('input[name=_token]').val(),
      },success: function(data) {
        $('#InputEditName').val(data.name);
$('#InputEditDescription').val(data.description);
$('#InputEditMeasure').val(data.unit);
$('#InputEditWeight').val(data.weight);
$('#InputEditPrice').val(data.price);
$('#InputEditCode').val(data.code);
        $('#id_edit').val(data.id);
        $('#content_tr').append(data);
            
            
      },
    });
}
