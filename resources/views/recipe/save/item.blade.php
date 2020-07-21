<tr id="tr_product_{{$product->id}}" class="select_product" data-id="{{$product->id}}" style="cursor: pointer;">
              <td><img  height="50" src="{{asset('product_img/'.$product->photo)}}"/></td>
              <td>{{$product->code}}</td>
              <td>{{$product->name."(".$product->weight.$product->unit.")"}}</td>
              <td>{{$product->unit}}</td>
              <td>{{$product->price}}</td>
            </tr>