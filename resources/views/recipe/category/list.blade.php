@foreach($subs as $sub)
<tr id="tr_{{$sub->id}}">
              <td>{{$sub->id}}</td>
              <td>{{$sub->name}}</td>
              <td>
                <div class="btn-group" role="group" aria-label="Basic example">
                  <button type="button" class="btn btn-primary btn_edit" data-id="{{$sub->id}}" data-toggle="modal" data-target="#ModalEdit">Editar</button>
                  <button type="button" class="btn btn-danger btn_delete" data-id="{{$sub->id}}" data-toggle="modal" data-target="#ModalDelete">Eliminar</button>
                </div>
</td>
            </tr>
@endforeach