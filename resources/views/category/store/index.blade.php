@extends('layouts.layout')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Categorias de productos</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <button type="button" class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#ModalAdd">Agregar Categoria</button>

          </div>
      
        </div>
      </div>
<div class="card">
                
    <div class="col-6">
        <label for="searchCategory">Negocio</label>
        <div class="form-group">
            
                <select class="form-control custom-select" id="searchCategory">
                    @if(Auth::user()->hasRole('admin'))
                    @foreach($stores as $store)
                        <option value="{{$store->id}}">{{$store->name}}</option>
                    @endforeach
                    @else
                    <option value="{{$store->id}}">{{$store->name}}</option>
                    @endif
                                            </select>
                                        </div>
    </div>

                <div class="card-body">
                    <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Negocio</th>
              <th>Nombre de categoria</th>
              <th>Opciones</th>
            </tr>
          </thead>
          <tbody id="content_tr">
            @foreach($categories as $category)
            @include('category.store.item')
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
        <h5 class="modal-title" id="exampleModalLabel">Agregar Categoria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="form_add">
      <div class="modal-body">
  <div class="form-group">
    <label for="exampleInputEmail1">Nombre de la categoria</label>
    <input type="text" class="form-control" id="InputName" required="true">
    <small id="emailHelp" class="form-text text-muted">Digita el nombre de la categoria</small>
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
        <h5 class="modal-title" id="exampleModalLabel">Editar Categoria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="form_edit">
      <div class="modal-body">
  <div class="form-group">
    <label for="exampleInputEmail1">Nombre de la categoria</label>
    <input type="text" class="form-control" id="InputEditName" required="true">
    <small id="emailHelp" class="form-text text-muted">Digita el nombre de la categoria</small>
  </div>
      </div>
      <input type="hidden" class="form-control" id="id_edit">
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <center><img width="50" height="40" src="{{asset('img/loading.gif')}}" style="display: none;" /></center>
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
        <h5 class="modal-title" id="exampleModalLabel">Eliminar Categoria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="form_delete">
      <div class="modal-body">
        <h3>¿Deseas eliminar esta categoria? se eliminara todo lo asociado a este.</h3>
      </div>
      <input type="hidden" class="form-control" id="id_delete">
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-danger">Eliminar</button>
        <center><img width="50" height="40" src="{{asset('img/loading.gif')}}" style="display: none;" /></center>
      </div>
      </form>
    </div>
  </div>
</div>

@endsection
@section('js')
<script src="{{ asset('js/categorystore.js')}}"></script>
@endsection