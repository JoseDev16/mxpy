@extends('base')
@section('titulo')
Listado de camisas
@endsection
@section('content')
@if(count($colecciones) > 0)
<nav aria-label="breadcrumb">
   <ol class="breadcrumb">
      <li class="breadcrumb-item active" aria-current="page">Listado de camisas</li>
   </ol>
</nav>
<!-- Boton agregar camisa modal -->

<div class="d-sm-flex align-items-center justify-content-between mb-4">
   <button type="button" class="btn btn-facebook" data-toggle="modal" data-target="#addModal">
      Agregar camiseta
   </button>
</div>

<!-- Fin Boton agregar camisa modal -->
@else
<div class="d-sm-flex align-items-center justify-content-between mb-4">
   <button type="button" class="btn btn-facebook" data-toggle="modal" data-target="#addcoleccionModal">
      Agregar camiseta
   </button>
</div>
@endif
<div class="modal fade" id="addcoleccionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
   aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-body align-self-center">
            <div style="text-align: center">
               <br>
               <i class='fas fa-exclamation-circle' style='font-size:0px;color: gray;'></i>
               <br>
               <br>
               <strong>
                  <h3>¡Opps! Parece que no tienes ninguna coleccion registrada.</h3>
               </strong>
               <strong>
                  <h4>¿Deseas gestionar una coleccion?</h4>
               </strong>
               <strong>Recuerda que debes agregar una coleccion antes de realizar esta acción.</strong>
            </div>
            <div class="modal-footer d-flex justify-content-center">
               <a href="{{route('coleccion.index')}}" class="btn btn-facebook">
                  <i class='fas fa-check-circle'></i>
                  Si
               </a>
               <a href="" class="btn btn-facebook" data-dismiss="modal">
                  <i class='fa fa-times'></i>
                  No
               </a>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- Agregar Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalTitle"
   aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header" style="background-color:#F2F2F2 !important;">
            <h5 class="modal-title" id="exampleModalLongTitle">
               <i class="fas fw fa-plus-circle"></i>
               Agregar Camisa
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <form action="{{ route('camisa.store') }}" method="POST" name="miForm" enctype="multipart/form-data">
               @csrf
               <div class="form-group">

                  <label for="">Nombre de Camisa:</label>
                  <input maxlength="40" type="text" name="nombre_camisa" id="nombre_camisa"
                     class="form-control{{ $errors->has('nombre_camisa') ? ' is-invalid' : '' }}"
                     placeholder="Ingrese nombre de camisa" value="{{ old('nombre_camisa') }}" required
                     autofocus>
                  @if($errors->has('nombre_camisa'))
                  <span class="invalid-feedback" role="alert">
                     <strong>{{ $errors->first('nombre_camisa') }}</strong>
                  </span>
                  @endif
                  <br>

                  <label for="">Descripcion:</label>
                  <input  type="text" name="descripcion" id="descripcion"
                     class="form-control{{ $errors->has('descripcion') ? ' is-invalid' : '' }}"
                     placeholder="Ingrese nombre de camisa" value="{{ old('descripcion') }}" required
                     autofocus>
                  @if($errors->has('descripcion'))
                  <span class="invalid-feedback" role="alert">
                     <strong>{{ $errors->first('descripcion') }}</strong>
                  </span>
                  @endif

                  <label for="">Precio:</label>
                  <input  type="number" name="precio" id="precio" min="0" 
                     class="form-control{{ $errors->has('precio') ? ' is-invalid' : '' }}"
                     placeholder="0.00" value="{{ old('precio') }}" required
                     autofocus>
                  @if($errors->has('precio'))
                  <span class="invalid-feedback" role="alert">
                     <strong>{{ $errors->first('precio') }}</strong>
                  </span>
                  @endif

                  <label for="">Coleccion:</label>
                  <select name="coleccions_id" id="coleccions_id" class="form-control" required>
                     <option value="">Selecciona la categoría</option>
                     @foreach ($colecciones as $coleccion)
                     <option value="{{ $coleccion->id }}">{{ $coleccion->nombre_coleccion }}</option>
                     @endforeach
                  </select>
                  <div class="form-group"> 
                     <label for="ruta2"> Seleccione una imagen </label>
                     <input  class="form-control" required type="file" name="ruta2" id="ruta2">
                 </div>
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
@if(count($camisas) > 0)
<br>
<!-- Table -->
<table class=" table">
   <thead class="thead-dark">
      <tr>
         <th scope="col">#</th>
         <th scope="col">Nombre Camisa</th>
         <th scope="col">Coleccion</th>
         <th scope="col">Precio</th>
         <th scope="col">Imagen </th>
         <th scope="col">Acciones</th>
      </tr>
   </thead>
   <tbody>
      <?php $i = 0 ?>
      @foreach ($camisas as $camisa )
      <?php $i++ ?>
      <tr>
         <td> {{$i}} </td>
         <td> {{ $camisa->nombre_camisa }} </td>
         @foreach ($colecciones as $coleccion )
         @if($camisa->coleccions_id === $coleccion->id)
         <td> {{ $coleccion->nombre_coleccion }} </td>
         @endif
         @endforeach
         <td> ${{ $camisa->precio }} </td>
         <td>  <a href="{{ asset('img').'/'.$camisa->ruta_img }}" target="_blank"><img src="{{ asset('img').'/'.$camisa->ruta_img }}" width="50"> </td></a>
         <td style="display: flex">
         
            <button type="button" data-toggle="modal" data-target="#editModal" class="fas fa-w fa-edit"
               style="color:gray !important; background-color:transparent; border: 0px solid;"
               onclick="fun_edit('{{$camisa->id}}')"></button>
    
         
            <button type="button" data-toggle="modal" data-target="#deleteModal" class="fas fa-w fa-trash"
               style="color:gray !important; background-color:transparent; border: 0px solid;"
               onclick="fun_delete('{{$camisa->id}}')"></button>
   
         </td>
      </tr>
      @endforeach
   </tbody>
</table>
<!-- Paginacion de tabla -->
<div class="d-flex justify-content-center">
   {{ $camisas->links() }}
</div>
<!-- Fin Paginacion de tabla-->
<!-- Fin Table -->
<!-- Editar Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalTitle"
   aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header" style="background-color:#F2F2F2 !important;">
            <h5 class="modal-title" id="exampleModalLongTitle">
               <i class="fas fa-w fa-edit"></i>
               Editar Camisa
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <form action="{{ route('camisa.update') }}" method="POST">
               @csrf
               <div class="form-group">
                  <label for="">Nombre de camisa:</label>
                  <input maxlength="40" type="text" name="nomb_camisa" id="nomb_camisa"
                     class="form-control{{ $errors->has('nomb_camisa') ? ' is-invalid' : '' }}" required
                     autofocus>
                  @if($errors->has('nomb_camisa'))
                  <span class="invalid-feedback" role="alert">
                     <strong>{{ $errors->first('nomb_camisa') }}</strong>
                  </span>
                  @endif
                  <br>
                  <label for="">Descripcion:</label>
                  <input type="text" name="dcp" id="dcp"
                     class="form-control{{ $errors->has('dcp') ? ' is-invalid' : '' }}" required
                     autofocus>
                  @if($errors->has('dcp'))
                  <span class="invalid-feedback" role="alert">
                     <strong>{{ $errors->first('dcp') }}</strong>
                  </span>
                  @endif
                  <label for="">Precio:</label>
                  <input type="number" name="prc" id="prc" min="0" value="0"
                     class="form-control{{ $errors->has('prc') ? ' is-invalid' : '' }}" required
                     autofocus>
                  @if($errors->has('prc'))
                  <span class="invalid-feedback" role="alert">
                     <strong>{{ $errors->first('prc') }}</strong>
                  </span>
                  @endif
                  <label for="">Coleccion:</label>
                  <select name="cat_id" id="cat_id" class="form-control">
                     @foreach ($colecciones as $coleccion)
                     <option value="{{ $coleccion->id }}">{{ $coleccion->nombre_coleccion }}</option>
                     @endforeach
                  </select>
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
            <form action="{{ route('camisa.destroy') }}" method="POST">
               @csrf
               {{ method_field('DELETE') }}
               <div style="text-align: center">
                  <br>
                  <i class='fas fa-exclamation-circle' style='font-size:60px;color: gray;'></i>
                  <br>
                  <br>
                  <strong>
                     <h3>¿Estás seguro que deseas eliminar la camisa?</h3>
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
   <strong>¡Opps! Parece que no tienes ninguna camisa registrada.</strong>
</div>
@endif
<script type="text/javascript">
   function fun_edit(id)
      {
         var view_url = "camisa/edit/"+id;
         $.ajax({
            url: view_url,
            type:"GET", 
            data: {"id":id},
            success: function(result){
               $("#edit_id").val(result.id);
               $('#nomb_camisa').val(result.nombre_camisa);
               $('#dcp').val(result.descripcion);
               $('#prc').val(result.precio);
               $('#cat_id').val(result.coleccions_id);
            }
         });
      }
   function fun_delete(id)
   {
      $("#delete_id").val(id); 
   }
</script>
@endsection