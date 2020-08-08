@extends('base')
    <link href="https://fonts.googleapis.com/css2?family=Indie+Flower&display=swap" rel="stylesheet">
    <style>
        header{
            font-family: 'Indie Flower',serif;
            font-size: 50px;
            }
        @media (min-width: 768px) 
        {
    
             header
             {
                font-family: 'Indie Flower',serif;
                font-size: 60px;
            }
        }

        .hvr-grow {
  display: inline-block;
  vertical-align: middle;
  -webkit-transform: perspective(1px) translateZ(0);
  transform: perspective(1px) translateZ(0);
  box-shadow: 0 0 1px rgba(0, 0, 0, 0);
  -webkit-transition-duration: 0.3s;
  transition-duration: 0.3s;
  -webkit-transition-property: transform;
  transition-property: transform;
}
    </style>
                
@section('content')
<header>
    Coleccion {{ $coleccion->nombre_coleccion }}
</header>
   <div class="md-col-12">
       <section class="py-4">
        <div class="container">
            <div class="row">
                @foreach ($camisas as $camisa )
                <article class="col-md-4">
                    <div class="card-deck hvr-grow">
                       <div class="card">
                          <label>
                           <div class="card-body">
                               <h5 class="card-title text-primary">{{ $camisa->nombre_camisa }}</h5>
                               <a href="{{ route('camisacolor.detalle', $camisa->id) }}">
                               <p class="card-text"> <img src="{{ asset('img').'/'.$camisa->ruta_img }}" width="250"></p>
                               </a>
                          </div>
                          </label>
                       </div>
                   </div>
     
                 </article> 
                    
                @endforeach
              

                
            </div>
        </div>
       </section>
   </div>

    
@endsection




