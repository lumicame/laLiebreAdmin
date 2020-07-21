<tr id="tr_{{$provider->id}}">
              <td>{{$provider->id}}</td>
              <td>{{$provider->name}}</td>
              <td>{{$provider->location}}</td>
              <td>{{$provider->phone}}</td>
              <td>
                <div class="btn-group" role="group" aria-label="Basic example">
                  <button type="button" class="btn btn-primary btn_edit" data-id="{{$provider->id}}" data-toggle="modal" data-target="#ModalEdit">Editar</button>
                  <button type="button" class="btn btn-danger btn_delete" data-id="{{$provider->id}}" data-toggle="modal" data-target="#ModalDelete">Eliminar</button>
                </div>
              </td>
            </tr>