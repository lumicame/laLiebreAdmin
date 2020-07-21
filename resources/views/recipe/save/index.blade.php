@extends('layouts.layout')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Crear Nueva Receta</h1>
        <br>
        
      </div>
<div class="card">
                <div class="card-header">
                  <label for="searchCategory">Seleccionar Categoria</label>
                  <div class="form-group">
            
                <select class="form-control custom-select" id="searchCategory">
                        <option value="{{$category->id}}">{{$category->name}}</option>
                                            </select>
                                        </div>
                        <label for="searchCategory">Seleccionar Sub Categoria</label>
                  <div class="form-group">
            
                <select class="form-control custom-select" id="searchSub">
                        <option value="{{$sub->id}}">{{$sub->name}}</option>
                                            </select>
                                        </div>
                                      </div>

                <div class="card-body">
                    <form id="form_add">
      <div class="modal-body">
       
  <div class="form-group">
    <label for="exampleInputEmail1">Nombre de la receta</label>
    <input type="text" class="form-control" id="InputName" required="true">
    <small  class="form-text text-muted">Digita el nombre de la receta</small>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Descripción</label>
    <input type="text" class="form-control" id="InputLocation">
  </div>
  <label for="exampleFormControlFile1">Imagen</label>
  <div class="form-group">
    <input type="file" class="form-control-file" id="file_img" required="true">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">link de video</label>
    <input type="text" class="form-control" id="InputLink">
  </div>
  <div class="card">
    <div class="card-header">
      <label>Productos de la receta</label>
      <small  class="form-text text-muted">Ingresa la cantidad de productos para una sola porción</small>
      <button type="button" class="btn btn-sm btn-outline-primary" class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#ModalAdd" >Agregar Producto</button>

    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>Imagen</th>
              <th>Codigo</th>
              <th>Nombre</th>
              <th>unidad</th>
              <th>Peso</th>
              <th>Cantidad</th>
              <th>Precio</th>
              <th>Opciones</th>
            </tr>
          </thead>
          <tbody id="content_tr">
            
          </tbody>
          <tfoot>
            <tr>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th>Total</th>
              <th id="th_total"></th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
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
      
      <!-- Modal -->
<div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">

        <h5 class="modal-title" id="exampleModalLabel">Buscar Producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        
      </div>
      
      <div class="modal-body">
       <div class="form-group">
    <input type="text" class="form-control" id="InputSearchProduct" required="true" placeholder="Nombre o codigo producto">
    <small  class="form-text text-muted">Digita el codigo o nombre del producto</small>
  </div>

  <div id="content_tr">
    <div class="card">
      <div class="modal-body">
        <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>imagen</th>
              <th>codigo</th>
              <th>Nombre</th>
              <th>medida</th>
              <th>precio</th>
            </tr>
          </thead>
          <tbody id="content_product">

          </tbody>
        </table>
      </div>
      </div>
    </div>
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <center><img id="loading_add" width="50" height="40" src="{{asset('img/loading.gif')}}" style="display: none;" /></center>
      </div>
    </div>
  </div>
</div>



@endsection
@section('js')
<script src="{{ asset('js/recipe.js')}}"></script>
@endsection