 
@extends('base')
@section('titulo')
Listado de colors
@endsection
@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Listado de colors</li>
    </ol>
</nav>

<!-- Boton agregar color modal -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">
        Agregar color
    </button>
</div>

<!-- Fin Boton agregar color modal -->
<!-- Agregar Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalTitle"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#F2F2F2 !important;">
                <h5 class="modal-title" id="exampleModalLongTitle">
                    <i class="fas fw fa-plus-circle"></i>
                    Agregar color
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('colores.store') }}" method="POST" name="miForm">
                    @csrf
                    <div class="form-group">

                        <label for="">Nombre de color:</label>
                        <input maxlength="40" type="text" name="nombre_color" id="nombre_color"
                            class="form-control{{ $errors->has('nombre_color') ? ' is-invalid' : '' }}"
                            placeholder="Ingrese nombre de color" value="{{ old('nombre_color') }}" required
                            autofocus>
                        @if($errors->has('nombre_color'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('nombre_color') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">
                            <i class='fas fa-check-circle'></i>
                            Guardar
                        </button>
                        <a href="" class="btn btn-primary" data-dismiss="modal">
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
@if(count($colores) > 0)
<!-- Table -->
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Acciones</th>
        </tr>
        <?php $i = 0 ?>
        @foreach ($colores as $color )
        <?php $i++ ?>
        <tr>
            <td> {{ $i}} </td>
            <td> {{ $color->nombre_color }} </td>
            <td style="display: flex">
                
                <button type="button" data-toggle="modal" data-target="#editModal" class="fas fa-w fa-edit"
                    style="color:gray !important; background-color:transparent; border: 0px solid;"
                    onclick="fun_edit('{{$color->id}}')"></button>
               
               
                <button type="button" data-toggle="modal" data-target="#deleteModal" class="fas fa-w fa-trash"
                    style="color:gray !important; background-color:transparent; border: 0px solid;"
                    onclick="fun_delete('{{$color->id}}')"></button>
              
            </td>
        </tr>
        @endforeach
    </thead>
</table>
<!-- Fin Table -->
<!-- Paginacion de tabla -->
<div class="d-flex justify-content-center">
    {{ $colores->links() }}
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
                    Editar color
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('colores.update') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Nombre de color:</label>
                        <input maxlength="40" type="text" name="nomb_color" id="nomb_color"
                            class="form-control{{ $errors->has('nomb_color') ? ' is-invalid' : '' }}" required
                            autofocus>
                        @if($errors->has('nomb_color'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('nomb_color') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">
                            <i class='fas fa-check-circle'></i>
                            Editar
                        </button>
                        <input type="hidden" id="edit_id" name="edit_id">
                        <a href="" class="btn btn-primary" data-dismiss="modal">
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
                <form action="{{ route('colores.destroy') }}" method="POST">
                    @csrf
                    {{ method_field('DELETE') }}
                    <div style="text-align: center">
                        <br>
                        <i class='fas fa-exclamation-circle' style='font-size:60px;color: gray;'></i>
                        <br>
                        <br>
                        <strong>
                            <h3>¿Estás seguro que deseas eliminar la color?</h3>
                        </strong>
                        <strong>Recuerda que NO podrás revertir esta acción</strong>
                        <input type="hidden" id="delete_id" name="delete_id">
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">
                            <i class='fas fa-check-circle'></i>
                            Eliminar
                        </button>
                        <a href="" class="btn btn-primary" data-dismiss="modal">
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
    <strong>¡Opps! Parece que no tienes ninguna color registrada.</strong>
</div>
@endif
<script type="text/javascript">
    function fun_edit(id)
   {
      console.log(id);
      var view_url = "colores/edit/"+id;
      console.log("Estoy aqui");
      $.ajax({
         url: view_url,
         type:"GET", 
         data: {"id":id},
         success: function(result){
            console.log(result.nombre_color);
            $("#edit_id").val(result.id);
            $('#nomb_color').val(result.nombre_color);
         }
      });
   }
   function fun_delete(id)
   {
      $("#delete_id").val(id); 
   }
</script>
@endsection