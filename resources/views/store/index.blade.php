@extends('layouts.layout')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tiendas</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <button type="button" class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#ModalAdd">Agregar Tienda</button>
          </div>
      
        </div>
      </div>
<div class="card">
                <div class="card-header">Lista tiendas</div>

                <div class="card-body">
                    <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Distrito</th>
              <th>Categoria</th>
              <th>Nombre</th>
              <th>Descripción</th>
              <th>Logo</th>
              <th>Correo electronico</th>
              <th>Opciones</th>
            </tr>
          </thead>
          <tbody id="content_tr">
            @foreach($stores as $store)
            @include('store.item')
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
        <h5 class="modal-title" id="exampleModalLabel">Agregar tienda</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="form_add">
      <div class="modal-body">
        <div class="form-group">
                <select class="form-control custom-select" id="selectDistrict" required="true">
                  <option value="">Seleccionar Distrito</option>
                      @foreach($districts as $district)
                        <option value="{{$district->id}}">{{$district->name}}</option>
                    @endforeach
                </select>
              </div>
              <div class="form-group">
                <select class="form-control custom-select" id="selectCategory" required="true">
                  <option value="">Seleccionar Categoria</option>
                      @foreach($types as $type)
                        <option value="{{$type->id}}">{{$type->name}}</option>
                    @endforeach
                </select>
              </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Nombre Tienda</label>
    <input type="text" class="form-control" id="InputName" required="true">
    <small  class="form-text text-muted">Digita el nombre de la tienda</small>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Descripción</label>
    <input type="text" class="form-control" id="InputDescription" required="true">
    <small  class="form-text text-muted">Descripción de la tienda</small>
  </div>
  <label for="exampleFormControlFile1">Logo</label>
  <div class="form-group">
    <input type="file" class="form-control-file" id="file_logo" required="true">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Correo electronico</label>
    <input type="email" class="form-control" id="InputEmail" required="true">
    <small  class="form-text text-muted">Digita el correo electronico</small>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Contraseña</label>
    <input type="password" class="form-control" id="InputPass" required="true">
    <small  class="form-text text-muted">Digita la contraseña</small>
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
        <h5 class="modal-title" id="exampleModalLabel">Editar Tienda</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="form_edit">
      <div class="modal-body">
        <div class="form-group">
                <select class="form-control custom-select" id="selectEditDistrict" required="true">
                  <option value="">Seleccionar Distrito</option>
                      @foreach($districts as $district)
                        <option value="{{$district->id}}">{{$district->name}}</option>
                    @endforeach
                </select>
              </div>
              <div class="form-group">
                <select class="form-control custom-select" id="selectEditCategory" required="true">
                  <option value="">Seleccionar Categoria</option>
                      @foreach($types as $type)
                        <option value="{{$type->id}}">{{$type->name}}</option>
                    @endforeach
                </select>
              </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Nombre Tienda</label>
    <input type="text" class="form-control" id="InputEditName" required="true">
    <small  class="form-text text-muted">Digita el nombre de la tienda</small>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Descripción</label>
    <input type="text" class="form-control" id="InputEditDescription" required="true">
    <small  class="form-text text-muted">Descripción de la tienda</small>
  </div>
  <label for="exampleFormControlFile1">Logo</label>
  <div class="form-group">
    <input type="file" class="form-control-file" id="file_edit_logo">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Correo electronico</label>
    <input type="email" class="form-control" id="InputEditEmail" required="true">
    <small  class="form-text text-muted">Digita el correo electronico</small>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Contraseña</label>
    <input type="password" class="form-control" id="InputEditPass">
    <small  class="form-text text-muted">Digita la contraseña</small>
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
        <h5 class="modal-title" id="exampleModalLabel">Eliminar Tienda</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="form_delete">
      <div class="modal-body">
        <h3>¿Deseas eliminar esta tienda? se eliminara todo lo asociado a esto.</h3>
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
<script src="{{ asset('js/store.js')}}"></script>
@endsection