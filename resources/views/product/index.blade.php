@extends('layouts.layout')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Productos</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <button type="button" class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#ModalAdd">Agregar Producto</button>
          </div>
      
        </div>
      </div>
<div class="card">
                <div class="card-header"><label for="searchCategory">Seleccionar Categoria</label>
        <div class="form-group">
            
                <select class="form-control custom-select" id="searchCategory">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name." (".$category->products->count().")"}}</option>
                    @endforeach
                                            </select>
                                        </div>
                                      </div>
<div class="col-6">
        
    </div>
                <div class="card-body">
                    <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Codigo</th>
              <th>Tienda</th>
              <th>Categoria</th>
               <th>Provedor</th>
              <th>Nombre de producto</th>
              <th>Descripción</th>
              <th>Unidad medida</th>
              <th>Peso</th>
              <th>Precio</th>
              <th>Imagen</th>
              <th>Opciones</th>
            </tr>
          </thead>
          <tbody id="content_tr">
            @foreach($products as $product)
            @include('product.item')
            @endforeach
          </tbody>
        </table>
      </div>
                </div>
            </div>
      
      <!-- Modal -->
<div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="form_add">
      <div class="modal-body">
        <label>Seleccionar Tienda</label>
        <select class="form-control custom-select" id="selectStore" required="true">
                  <option value="">Seleccionar Tienda</option>
                      @foreach($stores as $store)
                        <option value="{{$store->id}}">{{$store->name}}</option>
                    @endforeach
                </select>
                <label>Seleccionar Categoria</label>
                <select class="form-control custom-select" id="selectCategory" required="true">
                  <option value="">Seleccionar Categoria</option>
                      @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
                <label>Seleccionar el proveedor</label>
        <select class="form-control custom-select" id="selectProvider" required="true">
                  <option value="">Seleccionar Proveedor</option>
                      @foreach($providers as $provider)
                        <option value="{{$provider->id}}">{{$provider->name}}</option>
                    @endforeach
                </select>
                <div class="form-group">
    <label for="exampleInputEmail1">Codigo del producto</label>
    <input type="text" class="form-control" id="InputCode" required="true">
    <small id="emailHelp" class="form-text text-muted">Digita el codigo del producto</small>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Nombre del producto</label>
    <input type="text" class="form-control" id="InputName" required="true">
    <small id="emailHelp" class="form-text text-muted">Digita el nombre del producto</small>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Descripción del producto</label>
    <input type="text" class="form-control" id="InputDescription" required="true">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Unidad de medida</label>
    <input type="text" class="form-control" placeholder="(KG, ML...)" id="InputMeasure" required="true">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Peso del producto</label>
    <input type="number" step="any" class="form-control" id="InputWeight" required="true">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Precio del producto</label>
    <input type="number" step="any" class="form-control" id="InputPrice" required="true">
  </div>
  <label for="exampleFormControlFile1">Imagen</label>
  <div class="form-group">
    <input type="file" class="form-control-file" id="file_img" required="true">
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <center><img id="loading_add" width="50" height="40" src="{{asset('img/loading.gif')}}" style="display: none;" /></center>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="form_edit">
      <div class="modal-body">
  <label>Seleccionar Tienda</label>
        <select class="form-control custom-select" id="selectEditStore" required="true">
                  <option value="">Seleccionar Tienda</option>
                      @foreach($stores as $store)
                        <option value="{{$store->id}}">{{$store->name}}</option>
                    @endforeach
                </select>
                <label>Seleccionar Categoria</label>
                <select class="form-control custom-select" id="selectEditCategory" required="true">
                  <option value="">Seleccionar Categoria</option>
                      @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
                 <label>Seleccionar el proveedor</label>
        <select class="form-control custom-select" id="selectEditProvider" required="true">
                  <option value="">Seleccionar Proveedor</option>
                      @foreach($providers as $provider)
                        <option value="{{$provider->id}}">{{$provider->name}}</option>
                    @endforeach
                </select>
                <div class="form-group">
    <label for="exampleInputEmail1">Codigo del producto</label>
    <input type="text" class="form-control" id="InputEditCode" required="true">
    <small id="emailHelp" class="form-text text-muted">Digita el codigo del producto</small>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Nombre del producto</label>
    <input type="text" class="form-control" id="InputEditName" required="true">
    <small id="emailHelp" class="form-text text-muted">Digita el nombre del producto</small>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Descripción del producto</label>
    <input type="text" class="form-control" id="InputEditDescription" required="true">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Unidad de medida</label>
    <input type="text" class="form-control" placeholder="(KG, ML...)" id="InputEditMeasure" required="true">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Peso del producto</label>
    <input type="number" step="any" class="form-control" id="InputEditWeight" required="true">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Precio del producto</label>
    <input type="number" step="any" class="form-control" id="InputEditPrice" required="true">
  </div>
  <label for="exampleFormControlFile1">Imagen</label>
  <div class="form-group">
    <input type="file" class="form-control-file" id="file_edit_img" >
  </div>
      </div>
      <input type="hidden" class="form-control" id="id_edit">
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <center><img id="loading_edit"  width="50" height="40" src="{{asset('img/loading.gif')}}" style="display: none;" /></center>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="ModalDelete" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar Distrito</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="form_delete">
      <div class="modal-body">
        <h3>¿Deseas eliminar este distrito? se eliminara todo lo asociado a este.</h3>
      </div>
      <input type="hidden" class="form-control" id="id_delete">
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-danger">Eliminar</button>
        <center><img id="loading_delete" width="50" height="40" src="{{asset('img/loading.gif')}}" style="display: none;" /></center>
      </div>
      </form>
    </div>
  </div>
</div>

@endsection
@section('js')
<script src="{{ asset('js/product.js')}}"></script>
@endsection