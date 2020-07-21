<tr id="tr_{{$product->id}}">
              <td>{{$product->id}}</td>
              <td>{{$product->code}}</td>
              <td>{{$product->store->name}}</td>
              <td>{{$product->category->name}}</td>
              <td>@if($product->provider){{$product->provider->name}}@else N/N @endif</td>
              <td>{{$product->name}}</td>
              <td>{{$product->description}}</td>
              <td>{{$product->unit}}</td>
              <td>{{$product->weight}}</td>
              <td>{{$product->price}}</td>
              <td><img  height="50" src="{{asset('product_img/'.$product->photo)}}"/></td>
              <td>
                <div class="btn-group" role="group" aria-label="Basic example">
                  <button type="button" class="btn btn-primary btn_edit" data-id="{{$product->id}}" data-toggle="modal" data-target="#ModalEdit">Editar</button>
                  <button type="button" class="btn btn-danger btn_delete" data-id="{{$product->id}}" data-toggle="modal" data-target="#ModalDelete">Eliminar</button>
                </div>
</td>
            </tr>