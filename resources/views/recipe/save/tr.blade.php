<tr id="tr_{{$product->id}}">
	<td><img  height="50" src="{{asset('product_img/'.$product->photo)}}"/></td>
      <td>{{$product->code}}</td>
      <td>{{$product->name}}</td>
      <td>{{$product->weight.$product->unit}}</td>
      <td><input type="number" style="width: 70px" class="input_weight" id="product_weight_{{$product->id}}" data-id="{{$product->id}}" data-index="0"  name="" value="1">{{$product->unit}}</td>
      <td id="td_quantity_{{$product->id}}">1</td>
      <td id="total_{{$product->id}}">${{$product->price}}</td>
       <td><a id="product_delete_{{$product->id}}" class="btn btn-danger btn-sm btn_delete" data-id="{{$product->id}}" data-index="0">X</a></td>
</tr>