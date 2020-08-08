@extends('base')
    <link href="https://fonts.googleapis.com/css2?family=Indie+Flower&display=swap" rel="stylesheet">
    <style>
        header{
            font-family: 'Indie Flower',serif;
            font-size: 50px;
            }
              .bg-prueba{
              background-color: #DDDDDD !important;
              }

        @media (min-width: 768px) 
        {
    
             header
             {
                font-family: 'Indie Flower',serif;
                font-size: 80px;
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
<header  class="text-center pt-1 pb-4">
    <img src="{{ asset('/img/bannerColecciones.png') }}" alt="" class="img-fluid">
</header>
   <div class="md-col-12">
       <section class="py-4">
        <div class="container text-center">
            <div class="row">
                @foreach ($colecciones as $coleccion )
                <article class="col-md-4">
                    <div class="card-deck hvr-glow hvr-grow-shadow ">
                       <div class="card">
                          <label>
                           <div class="card-body">
                              <!-- <h5 class="card-title text-primary">  //$coleccion->nombre_coleccion }}</h5> -->
                              <a class="hvr-grow" href="{{  route('camisa.indexcamisas',$coleccion->id) }}">
                                    <p class="card-text"> <img src="{{ asset('img').'/'.$coleccion->ruta_img }}" alt="Click para ver coleccion" width="250"></p>
                              </a>
                             <!--  <p>
                                 <a class="hvr-grow" href="// route('camisa.indexcamisas',$coleccion->id) }}"><button class="btn btn-primary"> Ver mas </button></a>
                               </p> -->
                           
                          </div>
                          </label>
                       </div>
                   </div>
     
                 </article> 
                    
                @endforeach
                {{ $colecciones->links() }}

                
            </div>
        </div>
       </section>
   </div>

    
@endsection




