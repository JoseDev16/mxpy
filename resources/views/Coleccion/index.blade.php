 
@extends('base')
@section('titulo')
Colecciones
@endsection
@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Listado de colecciones</li>
    </ol>
</nav>

<!-- Boton agregar coleccion modal -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <button type="button" class="btn btn-facebook" data-toggle="modal" data-target="#addModal">
        Agregar coleccion
    </button>
</div>

<!-- Fin Boton agregar coleccion modal -->
<!-- Agregar Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalTitle"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#F2F2F2 !important;">
                <h5 class="modal-title" id="exampleModalLongTitle">
                    <i class="fas fw fa-plus-circle"></i>
                    Agregar coleccion
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('coleccion.store') }}" method="POST" name="miForm" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">

                        <label for="">Nombre de coleccion:</label>
                        <input maxlength="40" type="text" name="nombre_coleccion" id="nombre_coleccion"
                            class="form-control{{ $errors->has('nombre_coleccion') ? ' is-invalid' : '' }}"
                            placeholder="Ingrese nombre de coleccion" value="{{ old('nombre_coleccion') }}" required
                            autofocus>
                        @if($errors->has('nombre_coleccion'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('nombre_coleccion') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group"> 
                        <label for="ruta"> Seleccione una imagen </label>
                        <input  class="form-control" required type="file" name="ruta" id="ruta">
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button type="submit" class="btn btn-facebook">
                            <i class='fas fa-check-circle'></i>
                            Guardar
                        </button>
                        <a href="" class="btn btn-facebook" data-dismiss="modal">
                            <i class='fa fa-times'></i>
                            Cancelar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Fin Agregar Modal -->
<!-- Mensaje Exito -->
@if(session('exito'))
<div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">×</button>
    {{ session('exito') }}
</div>
@endif
<!-- Fin Mensaje Exito -->
@if(count($colecciones) > 0)
<!-- Table -->
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Imagen</th>
            <th scope="col">Acciones</th>
        </tr>
        <?php $i = 0 ?>
        @foreach ($colecciones as $coleccion )
        <?php $i++ ?>
        <tr>
            <td> {{ $i}} </td>
            <td> {{ $coleccion->nombre_coleccion }} </td>
            <td>  <a href="{{ asset('img').'/'.$coleccion->ruta_img }}" target="_blank"><img src="{{ asset('img').'/'.$coleccion->ruta_img }}" width="50"> </td></a>
            <td style="display: flex">
                
                <button type="button" data-toggle="modal" data-target="#editModal" class="fas fa-w fa-edit"
                    style="color:gray !important; background-color:transparent; border: 0px solid;"
                    onclick="fun_edit('{{$coleccion->id}}')"></button>
               
               
                <button type="button" data-toggle="modal" data-target="#deleteModal" class="fas fa-w fa-trash"
                    style="color:gray !important; background-color:transparent; border: 0px solid;"
                    onclick="fun_delete('{{$coleccion->id}}')"></button>
              
            </td>
        </tr>
        @endforeach
    </thead>
</table>
<!-- Fin Table -->
<!-- Paginacion de tabla -->
<div class="d-flex justify-content-center">
    {{ $colecciones->links() }}
</div>
<!-- Fin Paginacion de tabla-->
<!-- Editar Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalTitle"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#F2F2F2 !important;">
                <h5 class="modal-title" id="exampleModalLongTitle">
                    <i class="fas fa-w fa-edit"></i>
                    Editar coleccion
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('coleccion.update') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Nombre de coleccion:</label>
                        <input maxlength="40" type="text" name="nomb_coleccion" id="nomb_coleccion"
                            class="form-control{{ $errors->has('nomb_coleccion') ? ' is-invalid' : '' }}" required
                            autofocus>
                        @if($errors->has('nomb_coleccion'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('nomb_coleccion') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button type="submit" class="btn btn-facebook">
                            <i class='fas fa-check-circle'></i>
                            Editar
                        </button>
                        <input type="hidden" id="edit_id" name="edit_id">
                        <a href="" class="btn btn-facebook" data-dismiss="modal">
                            <i class='fa fa-times'></i>
                            Cancelar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Fin Editar Modal-->
<!-- Eliminar Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body align-self-center">
                <form action="{{ route('coleccion.destroy') }}" method="POST">
                    @csrf
                    {{ method_field('DELETE') }}
                    <div style="text-align: center">
                        <br>
                        <i class='fas fa-exclamation-circle' style='font-size:60px;color: gray;'></i>
                        <br>
                        <br>
                        <strong>
                            <h3>¿Estás seguro que deseas eliminar la coleccion?</h3>
                        </strong>
                        <strong>Recuerda que NO podrás revertir esta acción</strong>
                        <input type="hidden" id="delete_id" name="delete_id">
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button type="submit" class="btn btn-facebook">
                            <i class='fas fa-check-circle'></i>
                            Eliminar
                        </button>
                        <a href="" class="btn btn-facebook" data-dismiss="modal">
                            <i class='fa fa-times'></i>
                            Cancelar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@else
<div class="alert alert-danger">
    <strong>¡Opps! Parece que no tienes ninguna coleccion registrada.</strong>
</div>
@endif
<script type="text/javascript">
    function fun_edit(id)
   {
      console.log(id);
      var view_url = "coleccion/edit/"+id;
      console.log("Estoy aqui");
      $.ajax({
         url: view_url,
         type:"GET", 
         data: {"id":id},
         success: function(result){
            console.log(result.nombre_coleccion);
            $("#edit_id").val(result.id);
            $('#nomb_coleccion').val(result.nombre_coleccion);
         }
      });
   }
   function fun_delete(id)
   {
      $("#delete_id").val(id); 
   }
</script>
@endsection