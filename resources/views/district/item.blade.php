<tr id="tr_{{$district->id}}">
              <td>{{$district->id}}</td>
              <td>{{$district->name}}</td>
              <td>
                <div class="btn-group" role="group" aria-label="Basic example">
                  <button type="button" class="btn btn-primary btn_edit" data-id="{{$district->id}}" data-toggle="modal" data-target="#ModalEdit">Editar</button>
                  <button type="button" class="btn btn-danger btn_delete" data-id="{{$district->id}}" data-toggle="modal" data-target="#ModalDelete">Eliminar</button>
                </div>
</td>
            </tr>