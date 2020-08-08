<!DOCTYPE html>
<html lang="es">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">


  <title> @yield('titulo') </title>

  <!-- Custom fonts for this template-->
  <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{ asset('css/sb-admin-2.css') }}" rel="stylesheet">
  <link href="{{ asset('css/hover.css') }}" rel="stylesheet">
   <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>

</head>

<body id="page-top">
    <!-- Load Facebook SDK for JavaScript -->
    <div id="fb-root"></div>
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          xfbml            : true,
          version          : 'v8.0'
        });
      };
  
      (function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = 'https://connect.facebook.net/es_LA/sdk/xfbml.customerchat.js';
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
  
    <!-- Your Chat Plugin code -->
    <div class="fb-customerchat"
      attribution=setup_tool
      page_id="108883600919522"
  theme_color="#44bec7"
  logged_in_greeting="Te ha interesado la camisa? Contactanos!"
  logged_out_greeting="Te ha interesado la camisa? Contactanos!">
    </div>
  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->

    <ul class="navbar-nav bg-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('coleccion.indexHome') }}">
        <div class="sidebar-brand-icon ">
          <img src="{{ asset('img/Logo-lentes.png') }}" alt="">
        </div>
        
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Secciones
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
    @if (auth()->check())
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
          aria-controls="collapseTwo">
          <i class="fas fa-fw fa-lock"></i>
          <span>Seguridad</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Opciones de Seguridad:</h6>
            <a class="collapse-item" href="">Gestion de usuarios</a>
            
          </div>
        </div>
      </li>
  
   

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseInventario"
          aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-list"></i>
          <span>Inventario</span>
        </a>
        <div id="collapseInventario" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Opciones de inventario:</h6>
            
            <a class="collapse-item" href="{{ route('coleccion.index') }}">Coleccion</a>
         
            <a class="collapse-item" href="{{ route('colores.index') }}">Colores</a>
                  
            <a class="collapse-item" href="{{ route('camisacolor.index') }}">Camisa completa</a>
                 
            <a class="collapse-item" href="{{ route('camisa.index') }}">Prototipo camisa</a>
            <a class="collapse-item" href="{{ route('camisacolor.agregarColor') }}">Agregar colores a camisa</a>
          
          
          </div>
        </div>
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseInventario2"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-list"></i>
          <span>Menu</span>
      </a>
      <div id="collapseInventario2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
         <div class="bg-white py-2 collapse-inner rounded">
             <h6 class="collapse-header">Menu</h6>
      
              <a class="collapse-item" href="{{ route('coleccion.indexHome') }}">Colecciones</a>
   
               <a class="collapse-item" href="{{ route('colores.index') }}">Sobre nosotros</a>
  
          </div>
        </div>
      </li>
    @else 
      
       <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseInventario"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-list"></i>
              <span>Menu</span>
          </a>
          <div id="collapseInventario" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <h6 class="collapse-header">Menu</h6>
          
                  <a class="collapse-item" href="{{ route('coleccion.indexHome') }}">Colecciones</a>
       
                   <a class="collapse-item" href="{{ route('colores.index') }}">Sobre nosotros</a>
      
              </div>
            </div>
       </li>
    @endif


      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>

    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content" class="bg-white">

        <!-- Topbar -->
        @if (auth()->check())
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <ul class="navbar-nav ml-auto">


              <div class="topbar-divider d-none d-sm-block"></div>

             
              <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                <img class="img-profile rounded-circle"
                  src="https://cdn.icon-icons.com/icons2/1508/PNG/512/systemusers_104569.png">
              </a>

              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Cerrar sesión
                </a>
              </div>
            </li>

           

          </ul>

        </nav>
        @else 
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <ul class="navbar-nav ml-auto ">
            <img src="{{ asset('img/Portada2.png') }}" class="text-center" alt="">


            <div class="topbar-divider d-none d-sm-block"></div>

           
            <!-- Nav Item - User Information -->
   
            <!-- Dropdown - User Information -->
              
         

         

        </ul>
        </nav> 


        @endif

        <!-- End of Topbar -->
    
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid" >
          <div class="table-responsive">
            <h1 class="h3 mb-0 text-gray-800">

            </h1>
            @yield('content')
          </div>
          &nbsp;
          <footer class="sticky-footer bg-dark ">
            <div class="container my-auto">
              <div class="copyright text-center my-auto">
                <script type="text/javascript">
                  copyright=new Date();
                  
                  update=copyright.getFullYear();
                  
                  document.write("© Maxis Store " + update + " " + "");
                  
                  
                </script>
              </div>
            </div>
          </footer>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- Fin main COontent-->




    </div>


  </div>
  <!--Inicio Footer-->

  <!-- End of Page Wrapper -->


  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Cerrar sesión</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">¡Estás seguro que deseas cerrar sesión?</div>
        <div class="modal-footer">
          <a class="btn btn-primary" href="/logout">Cerrar sesión</a>
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js')  }}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

  <!-- Page level plugins -->
  <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>

  <!-- Page level custom scripts -->
  <script src="{{ asset('js/demo/chart-area-demo.js') }}"></script>
  <script src="{{ asset('js/demo/chart-pie-demo.js') }}"></script>
  <script type='text/javascript'>
    document.oncontextmenu = function(){return false}
  </script>
  

</body>

</html>