<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="token" id="token" value="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Santa Sangre @yield('titulo')</title>
    

    {!! Html::style('/css/app.css') !!} 
    {!! Html::style('/css/base.css') !!}
    {!! Html::style('/bootstrap/css/bootstrap.css') !!}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Fonts -->
    
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
</head>
<body>
    {{-- Header --}}
    <header id="cabecera">
        <div class="container">
            {{-- Header logo --}}
            <div class="row">
                <div class="col-xs-4 col-sm-3 col-md-3">
                    {{-- Logo --}}
                    <div class="Header-logo">
                        <a href="#">
                            <img src="{{ url('front/img/logo_SHPH.jpg') }}">
                        </a>
                    </div>
                </div>



                <div class="col-xs-12 col-sm-6 col-md-12">
                    <div class="Header-botones pull-right">
                        @if (Auth::check())

                        {{-- Usuario --}}
                        @if (Auth::user()->tipo  == 'user')
                            <div class="btn-group">
                            <button type="button" class="Header-botones-item btn btn-transparent-rosado btn-lg" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-user"></i> {{ Auth::user()->perfil->nombres }} <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="#">Perfil</a></li>
                                <li><a href="#">Cerrar Sesión</a></li>
                            </ul>
                            </div>


                        {{-- Admin --}}

                        @elseif(Auth::user()->tipo == 'admin')
                        <div class="btn-group">
                            <button type="button" class="Header-botones-item btn btn-transparent-rosado btn-lg" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-user"></i> {{ Auth::user()->nombres }} <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="#">AdministradoRRRr</a></li>
                                <li><a href="#">Cerrar Sesionsón</a></li>
                            </ul>
                        </div>
                        @endif
                        @else
                         <a href="#" class=" btn btn-transparent-rosado btn-lg">Iniciar sesion</a>
                        <a href="#" class=" btn btn-transparent-rosado btn-lg">Registrarme</a>
                        @endif
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 col-xs-12 col-sm-6">
                 <nav role="navigation" class="navbar navbar-default">
                    <div class="navbar-header">
                        <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        
                    </div>

                    <div id="navbarCollapse" class="collapse navbar-collapse ">
                        <ul class="nav navbar-nav ">
                            <li class="active"><a href="#">Inicio</a></li>
                            <li ><a href="#">Acerca de</a></li>
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">Contacto</a></li>
                            <li><a href="#">Contacto</a></li>

                        </ul>
                    </div>
                </nav>
            </div>
        </div>
           
        
        </div>
    </header>

    
    @yield('contenido')

    <!-- Scripts -->
    
    {!! Html::script('/bootstrap/js/bootstrap.js') !!}
    
    {!! Html::script('/bootstrap/js/jquery-1.12.4.js') !!}
    {!! Html::script('/js/vendor.js') !!}
    @stack('scripts')
    
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>

</body>
</html>