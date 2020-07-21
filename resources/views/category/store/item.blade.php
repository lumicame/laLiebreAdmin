<tr id="tr_{{$category->id}}">
              <td>{{$category->id}}</td>
              <td>{{$category->store->name}}</td>
              <td>{{$category->name}}</td>
              <td>
                <div class="btn-group" role="group" aria-label="Basic example">
                  <button type="button" class="btn btn-primary btn_edit" data-id="{{$category->id}}" data-toggle="modal" data-target="#ModalEdit">Editar</button>
                  <button type="button" class="btn btn-danger btn_delete" data-id="{{$category->id}}" data-toggle="modal" data-target="#ModalDelete">Eliminar</button>
                </div>
</td>
            </tr>