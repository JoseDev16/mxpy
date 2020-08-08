@extends('base')
@section('content')
<div class="col-md-12">
    <h1 class="text-center"> Agregar color a camisa </h1>
    <form action="{{ route('camisacolor.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="camisas_id">Seleccione la camisa*</label>
            <select name="camisas_id" id="camisas_id" class="form-control" required>
                @foreach ($camisas as $camisa)
                    <option value="{{ $camisa->id }}">{{ $camisa->nombre_camisa }}</option>               
                @endforeach
            </select>

        </div>
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
            <label for="ruta">Sube una imagen*</label>
            <input class="form-control"  type="file" name="ruta" id="ruta" required>
        </div>
        <input name='AddColor' id="AddColor" type="hidden" value="1">

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