<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="token" id="token" value="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Santa Sangre @yield('titulo')</title>
    

    {!! Html::style('/css/app.css') !!} 
    {!! Html::style('/css/lightbox.css') !!}         
    {!! Html::style('/bootstrap/css/bootstrap.css') !!}

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Fonts -->
    <link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/4.0.1/ekko-lightbox.css">

    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
</head>
<body>
    {{-- Header --}}
    <header id="cabecera">
        <div class="container">
            {{-- Header logo --}}
            <div class="row">
                <!-- <div class="col-xs-4 col-sm-3 col-md-3">
                    {{-- Logo --}}
                    <div class="Header-logo">                        
                            <img src="{{ url('/imagenes/logos/logoSantasAmarillo.png') }}">                       
                    </div>
                </div> -->
                <div class="col-xs-12 col-sm-6 col-md-12">
                    <div class=" pull-right">
                        @if(Auth::check())
                        @if (Auth::user()->tipo  == 'user')
                        <div class="btn-group">
                            <button type="button" class="Header-botones-item btn btn-transparent-rosado btn-lg" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-user"></i> {{ Auth::user()->perfil->nombres }} <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="#">Perfil</a></li>
                                <li><a href="{{route('salir')}}">Cerrar Sesión</a></li>
                            </ul>
                        </div>                        
                        {{-- Admin --}}
                        @elseif(Auth::user()->tipo == 'admin')
                        <div class="btn-group">
                            <button type="button" class="Header-botones-item btn btn-transparent-rosado btn-lg" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-user"></i> {{ Auth::user()->nombres }} <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="{{route('dashboard')}}">Administrador</a></li>
                                <li><a href="{{route('salir')}}">Cerrar Sesión</a></li>
                            </ul>
                        </div>
                        @endif
                        @else                    

                        <a href="{{route('vista_login')}}" class=" btn btn-inicio btn-lg">Iniciar sesion</a>
                        <a href="{{route('registro_usuario')}}" class=" btn btn-inicio btn-lg">Registrarme</a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
            <div class="col-xs-4 col-sm-3 col-md-4">
                    {{-- Logos --}}
                    <div class="Header-logo ">                        
                            <img src="{{ url('imagenes/logos/logoSantasAmarillo.png') }}">                       
                    </div>
                </div>
                <div class="bajar-menu col-md-6 col-xs-12 col-sm-6">
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
                                <li class="active"><a href="{{route('home')}}">Inicio</a></li>
                                <li ><a href="{{route('vista_tatuador')}}">Tatuadores</a></li>
                                <li><a href="{{route('vista_trabajos')}}">Trabajos</a></li>
                                <li><a href="{{route('vista_bocetos')}}">bocetos</a></li>
                                <li><a href="{{route('como_llegar')}}">Contacto</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>          
        </div>
    </header>

    @yield('header')
    
    @yield('contenido')



        <footer class="footer">   
            <div class="row">
                <div class="col-md-4">
                {{-- Logos --}}
                    <div class="Footer-logo " align="center">                        
                            <img src="{{ url('imagenes/logos/logoSantasVino.png') }}">                       
                    </div>
                </div>
                <div class="col-md-4">                
                    <a href="#" target="_blank" class="Footer-social-btn btn btn-facebook "><i class="color fa fa-facebook fa-3x" aria-hidden="true"></i></a>
                    <a href="#" target="_blank" class="Footer-social-btn btn btn-twitter btn-circle"><i class=" color fa fa-twitter fa-3x"></i></a>
                    <a href="#" target="_blank" class="Footer-social-btn btn btn-facebook btn-circle"><i class="color fa fa-instagram fa-3x"></i></a>
                </div>
                <div class="col-md-4">
                </div>
            </div>    
            <div class="container">
                <p class=" pull-left">Copyright © 2016 Santa Sangre</p>
            </div>
        </footer>
    


    
    {!! Html::script('/bootstrap/js/bootstrap.js') !!}
    
    {!! Html::script('/bootstrap/js/jquery-1.12.4.js') !!}
    {!! Html::script('/js/vendor.js') !!}
    {!! Html::script('/js/lightbox.js') !!}
    {!! Html::script('/js/bootstrap-lightbox.min.js') !!}
    {!! Html::script('/js/bootstrap-datepicker.min.js') !!}
    @stack('scripts')
    
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
</body>
</html>