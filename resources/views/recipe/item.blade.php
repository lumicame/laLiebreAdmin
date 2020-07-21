<tr id="tr_{{$recipe->id}}">
              <td>{{$recipe->id}}</td>
              <td>{{$recipe->name}}</td>
              <td>{{$recipe->description}}</td>
              <td><img  height="50" src="{{asset('recipe_img/'.$recipe->image)}}"/></td>
              <td>@if($recipe->products)
                    @foreach($recipe->products as $product)
                    {{$product->name}}
                    @endforeach
              @endif</td>
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