<tr id="tr_{{$type->id}}">
              <td>{{$type->id}}</td>
              <td>{{$type->name}}</td>
              <td><img  height="50" src="{{asset('type_logo/'.$type->logo)}}"/></td>
              <td>
                <div class="btn-group" role="group" aria-label="Basic example">
                  <button type="button" class="btn btn-primary btn_edit" data-id="{{$type->id}}" data-toggle="modal" data-target="#ModalEdit">Editar</button>
                  <button type="button" class="btn btn-danger btn_delete" data-id="{{$type->id}}" data-toggle="modal" data-target="#ModalDelete">Eliminar</button>
                </div>
</td>
            </tr>