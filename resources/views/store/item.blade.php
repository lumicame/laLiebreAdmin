<tr id="tr_{{$store->id}}">
              <td>{{$store->id}}</td>
              <td>{{$store->district->name}}</td>
              <td>@if($store->type){{$store->type->name}}@endif</td>
              <td>{{$store->name}}</td>
              <td>{{$store->description}}</td>
              <td><img  height="50" src="{{asset('store_logo/'.$store->logo)}}"/></td>
              <td>@if($store->user){{$store->user->email}}@else N/N @endif</td>
              <td>
                <div class="btn-group" role="group" aria-label="Basic example">
                  <button type="button" class="btn btn-primary btn_edit" data-id="{{$store->id}}" data-toggle="modal" data-target="#ModalEdit">Editar</button>
                  <button type="button" class="btn btn-danger btn_delete" data-id="{{$store->id}}" data-toggle="modal" data-target="#ModalDelete">Eliminar</button>
                </div>
</td>
            </tr>