@extends('base')
@section('titulo')

{{ $camisa->nombre_camisa}}
@endsection
@section('content')
<style>
    .text-danger {
  color: #000308 !important;
}
</style>
<div class="row">
   <section class="col-md-12">
      <div class="container-fluid">
         <div class="row">
            <article class="col-md-6">
               <!--Carousel Wrapper-->
               <div id="carousel-example-1z" class="carousel slide carousel-fade" data-ride="carousel">
                  <!--Indicators-->
                  <ol class="carousel-indicators">
                      {{ $items =0 }}
                      @for ($items; $items<=$cant;  $items++)
                        @if($items == 0)
                        
                            <li data-target="#carousel-example-1z" data-slide-to="{{ $items }}" class="active"></li>
                        
                        @endif
                        @if ($items > 0)
                            <li data-target="#carousel-example-1z" data-slide-to="{{ $items }}"></li>
                        @endif
                        
                          

                        
                       

                      @endfor
              
                     
                  </ol>
                  <!--Slides-->
                  <div class="carousel-inner" role="listbox">
                     <!--First slide-->
                     {{ $item2=0 }}
                     @for ( $item2; $item2 <=$cant; $item2++)
                        @if ($item2 ==0)
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="{{ asset('img').'/'.$camisas_colores[$item2]->ruta_img }}"
                            alt="First slide" >

                        </div>

                            
                        @endif
                        @if ($item2>0)
                            <div class="carousel-item ">
                                <img class="d-block w-100" src="{{ asset('img').'/'.$camisas_colores[$item2]->ruta_img }}"
                                alt="Second slide" >
                            </div>

                            
                        @endif
                         
                     @endfor


                     <!--/First slide-->
                     <!--Second slide-->
     
                     <!--/Second slide-->
                     <!--Third slide-->
                   
                  </div>
                  <!--/.Slides-->
                  <!--/Third slide-->
                  <!--/.Indicators-->
                  <!--/.Indicators-->
                  <!--Controls-->
                  <a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                  </a>
                  <!--/.Controls-->
               </div>
               <!--/.Carousel Wrapper-->
            </article>
            <article class="col-md-6">
               <h2 class="pt-3 pb-3 text-danger"> {{ $camisa->nombre_camisa }} </h3>
              
                 <label class="h5 pb-3">  Precio :</label> <label class="font-weight-bold ml-5 h3 text-facebook">${{ $camisa->precio }}</label>
                <p >
                     
                    <label class="h5 pb-2 pt-2"> Descripcion :</label> <label class="font-weight-bold ml-1 h6 "> {{ $camisa->descripcion }}</label>
                  
                   <p>
                       
                    <label class="h5"> Colores:</label>
                    <select class="form-control col-md-6" name="color" id="color" onclick="ShowSelected()" >
                        @for ( $item3=0;  $item3<=$cant; $item3++)
                        <option class="ml-5 h6 font-weight-bold " >{{ $colores[$item3] }} </option>
                    @endfor
                    </select>
                   </p>
                   <label class="h5 pt-2 "> Cantidad: </label> <input class="form-control col-md-6"type="number" value="1" min="1" max="50" step="1" />
                   <input id="colorh" name="colorh" type="hidden">
                   <label class=" h5 pt-4  "> Disponible en:</label> <label class="h6 font-weight-bolder"> {{ $camisas_colores[0]->talla }} </label>
                    <label class="pt-3 font-weight-light3">
                        ¿Te ha interesado la camisa? Hack clien en el siguiente boton y luego pega el mensaje de tu encargo en el chat de 
                        messenger incorporado es nuestro sitio. Rapido y facil.
                        
                    </label>
                    <button class=" form-control btn btn-facebook " data-toggle="modal" data-target="#editModal"><i class="fab fa-shopify">Realiza tu encargo!</i></button>

                </p>
            </article>
            <!-- Editar Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalTitle"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header" style="background-color:#F2F2F2 !important;">
            <h5 class="modal-title" id="exampleModalLongTitle">
                <i class="fas fa-w fa-edit"></i>
                Realizar pedido
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            
                
                <div class="form-group">
                    <textarea name="" id="" cols="50" rows="10">Buen dia. Deseo realizar un pedido
                         de las camisa: {{ $camisa->nombre_camisa }} en color
                    </textarea>
                        
                    <div class="topbar-divider"></div>
                    <label>Da click en Ok para copiar el mensaje automaticamente, luego 
                        envialo atraves de nuestro chat de facebook incorporado</label>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="submit" class="btn btn-facebbok">
                        <i class='fas fa-check-circle'></i>
                        OK
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

         </div>
      </div>
   </section>
   <script type="text/javascript">
    function ShowSelected()
    {
    
   
     
    /* Para obtener el texto */
    
    var combo = document.getElementById("color");
    var selected = combo.options[combo.selectedIndex].text;
    document.getElementById("colorh").value = selected;
    
    }
    </script>
</div>
@endsection