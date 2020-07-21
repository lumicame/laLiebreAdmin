@extends('layouts.layout')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Recetas</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <button type="button" class="btn btn-sm btn-outline-primary" id="addRecipe" >Agregar Receta</button>
          </div>
      
        </div>
      </div>
<div class="card">
                <div class="card-header">
                  <label for="searchCategory">Seleccionar Categoria</label>
                  <div class="form-group">
            
                <select class="form-control custom-select" id="searchCategory">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                                            </select>
                                        </div>
                        <label for="searchCategory">Seleccionar Sub Categoria</label>
                  <div class="form-group">
            
                <select class="form-control custom-select" id="searchSub">
                    @foreach($subs as $sub)
                        <option value="{{$sub->id}}">{{$sub->name}}</option>
                    @endforeach
                                            </select>
                                        </div>
                                      </div>

                <div class="card-body">
                    <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Nombre</th>
              <th>Descripción</th>
              <th>Imagen</th>
              <th>Productos</th>
              <th>Opciones</th>
            </tr>
          </thead>
          <tbody id="content_tr">
            @foreach($recipes as $recipe)
            @include('provider.item')
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
        <h5 class="modal-title" id="exampleModalLabel">Agregar proveedor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="form_add">
      <div class="modal-body">
       
  <div class="form-group">
    <label for="exampleInputEmail1">Nombre Proveedor</label>
    <input type="text" class="form-control" id="InputName" required="true">
    <small  class="form-text text-muted">Digita el nombre del proveedor</small>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Dirección</label>
    <input type="text" class="form-control" id="InputLocation">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Telefono</label>
    <input type="text" class="form-control" id="InputPhone" required="true">
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
        <h5 class="modal-title" id="exampleModalLabel">Editar Proveedor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="form_edit">
      <div class="modal-body">
        
  <div class="form-group">
    <label for="exampleInputEmail1">Nombre Tienda</label>
    <input type="text" class="form-control" id="InputEditName" required="true">
    <small  class="form-text text-muted">Digita el nombre de la tienda</small>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Dirección</label>
    <input type="text" class="form-control" id="InputEditLocation">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Telefono</label>
    <input type="text" class="form-control" id="InputEditPhone" required="true">
  </div>
  
      </div>
      <input type="hidden" class="form-control" id="id_edit">
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <center><img id="loading_edit" width="50" height="40" src="{{asset('img/loading.gif')}}" style="display: none;" /></center>
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
        <h5 class="modal-title" id="exampleModalLabel">Eliminar Proveedor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="form_delete">
      <div class="modal-body">
        <h3>¿Deseas eliminar esta proveedor? se eliminara todo lo asociado a esto.</h3>
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
<script src="{{ asset('js/recipe.js')}}"></script>
@endsection