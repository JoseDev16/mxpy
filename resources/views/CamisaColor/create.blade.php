@extends('base')
@section('content')
<div class="col-md-12">
    <h1 class="text-center"> Agregar camisa completa </h2>
    <form action="{{ route('camisacolor.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="nombre_camisa"> Nombre camisa *</label>
            <input class="form-control"  type="text" name="nombre_camisa" id="nombre_camisa" required>
        </div>
        <div class="form-group">
            <label for="descripcion"> Descripcion camisa * </label>
            <textarea class="form-control" type="text" name="descripcion" id="descripcion" required></textarea>
        </div>
        <div class="form-group">
            <label for="precio"> Precio *</label>
            <input class="form-control"  type="number" name="precio" id="precio" min="0" step="0.01" plahceholder="0.0" required>
        </div>
        <div class="form-group">
            <label for="coleccion_id">Seleccione la coleccion</label>
            <select name="coleccion_id" id="coleccion_id" class="form-control">
                @foreach ($colecciones as $coleccion)
                    <option value="{{ $coleccion->id }}">{{ $coleccion->nombre_coleccion }}</option>               
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="colors_id">Seleccione el color*</label>
            <select name="colors_id" id="colors_id" class="form-control" required>
                @foreach ($colores as $color)
                    <option value="{{ $color->id }}">{{ $color->nombre_color }}</option>               
                @endforeach
            </select>

        </div>
        <div class="form-group">
            <label for="talla"> Talla  *</label>
            <input class="form-control"  type="text" name="talla" id="talla" required>
        </div>
        <div class="form-group">
            <label for="disponible"> Disponibilidad *</label>
            <select name="disponible" id="disponible" class="form-control" required>
                <option> Disponible </option>
                <option> No Disponible </option>
            </select>
            
        </div>
        <div class="form-group">
            <label for="ruta2">Imagen publicitaria*</label>
            <input class="form-control"  type="file" name="ruta2" id="ruta2" required>
        </div>
        <div class="form-group">
            <label for="ruta">Imagen color camisa*</label>
            <input class="form-control"  type="file" name="ruta" id="ruta" required>
        </div>

        <button class="btn btn-facebook" type="submit">Save</button>




        

    </form>
    @if(session('exito'))
<div class="alert alert-success">
   <button type="button" class="close" data-dismiss="alert">×</button>
   {{ session('exito') }}
</div>
@endif
</div>

@endsection