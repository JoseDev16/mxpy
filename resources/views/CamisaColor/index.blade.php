@extends('base')
@section('content')
<div class="col-md-12">
   <!-- INICIO DE recuadro de listar-->
   @if(count($camisasColores) > 0)
   <a href="{{ route('camisacolor.create') }}"><button class="btn btn-yellow"  > Agregar Camisa</button></a>
   <table class="table">
      <thead class="thead-dark">
         <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Coleccion </th>
            <th scope="col">Color </th>
            <th scope="col">Tallas </th>
            <th scope="col">Disponible </th>
            <th scope="col"> Acciones </th>
         </tr>
         @foreach ($camisasColores as $camisaColor )
         <tr>
            <td> {{ $camisaColor->id }} </td>
            @foreach ( $camisas as $camisa )
            @if($camisa->id == $camisaColor->camisas_id)
            <td> {{ $camisa->nombre_camisa }} </td>
            @endif
            @endforeach
            @foreach ( $colecciones as $coleccion)
            @if($camisa->coleccions_id == $coleccion->id)
            <td> {{$coleccion->nombre_coleccion }} </td>
            @endif
            @endforeach
            @foreach ($colores as $color )
            @if($camisaColor->colors_id == $color->id)
            <td> {{ $color->nombre_color }} </td>
            @endif           
            @endforeach
            <td> {{ $camisaColor->talla }} </td>
            <td>
               @if($camisaColor->disponible)
               Disponible
               @endif
               @if(!$camisaColor->disponible)
               No Disponible
               @endif
            </td>
            <td>
               
               
               <img src="{{ asset('img').'/'.$camisaColor->ruta_img }}" width="50">
            </td>
         </tr>
         @endforeach
      </thead>
   </table>
   @else 
   <h1 class="display 4 text-center"> No existen registros actualmente</h1>
  <h3 class="text-center"> <a href="{{ route('camisacolor.create') }} " > Agrega uno nuevo </a></h1>
   <!-- FIN DE TABLA PARA LISTAR-->  
   @endif
   
     
</div>
@endsection