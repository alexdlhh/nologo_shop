<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title')</title>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    
        @yield('css')
    </head>
    <body>        
        <div class="row" id="admin_page">
            <div class="col s12 m2" id="sidebar_admin">
                <h4 href="/dashboard">
                    RFEG
                </h4>
                <ul class="collapsible">
                    <li>
                        <div class="collapsible-header"><i class="material-icons">public</i>Actualidad</div>
                        <div class="collapsible-body">
                            <ul>
                                <li><div class="collapsible-header"><a href="/admin/news">Ver Noticias</a></div></li>
                                <li><div class="collapsible-header"><a href="/admin/news/create">Añadir Noticia</a></div></li>
                                <li><div class="collapsible-header"><a href="/admin/categoriesNew">Categorias</a></div></li>
                                <li><div class="collapsible-header"><a href="/admin/tagsNew">Tags</a></div></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <div class="collapsible-header"><i class="material-icons">account_balance</i>RFEG</div>
                        <div class="collapsible-body">
                            <ul>
                                <li><div class="collapsible-header"><a href="/admin/employees">Listar Empleados</a></div></li>
                                <li><div class="collapsible-header"><a href="/admin/employee/create">Añadir Empleado</a></div></li>
                                <li><div class="collapsible-header"><a href="/admin/rfeg">Administrar</a></div></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <div class="collapsible-header"><i class="material-icons">directions_run</i>Especialidades</div>
                        <div class="collapsible-body">
                            <ul>
                                <li><div class="collapsible-header"><a href="/admin/especialidades">Administrar</a></div></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <div class="collapsible-header"><i class="material-icons">collections</i>Media</div>
                        <div class="collapsible-body">
                            <ul>
                                <li><div class="collapsible-header"><a href="/admin/colecciones">Listar Colecciones</a></div></li>
                                <li><div class="collapsible-header"><a href="/admin/media/create">Añadir Media</a></div></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <div class="collapsible-header"><i class="material-icons">local_atm</i>Patrocinadores</div>
                        <div class="collapsible-body">
                            <ul>
                                <li><div class="collapsible-header"><a href="/admin/sponsors">Listar Patrocinadores</a></div></li>
                                <li><div class="collapsible-header"><a href="/admin/sponsor/create">Añadir Patrocinador</a></div></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <div class="collapsible-header"><i class="material-icons">local_library</i>Revistas</div>
                        <div class="collapsible-body">
                            <ul>
                                <li><div class="collapsible-header"><a href="/admin/albums">Listar Album</a></div></li>
                                <li><div class="collapsible-header"><a href="/admin/album/create">Crear Album</a></div></li>
                                <li><div class="collapsible-header"><a href="/admin/journals">Listar Revitas</a></div></li>
                                <li><div class="collapsible-header"><a href="/admin/journal/create">Añadir Revita</a></div></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <div class="collapsible-header"><i class="material-icons">school</i>Escuelas</div>
                        <div class="collapsible-body">
                            <ul>
                                <li><div class="collapsible-header"><a href="/admin/schools">Listar Escuelas</a></div></li>
                                <li><div class="collapsible-header"><a href="/admin/school/create">Añadir Escuela</a></div></li>
                                <li><div class="collapsible-header"><a href="/admin/courses">Listar Cursos</a></div></li>
                                <li><div class="collapsible-header"><a href="/admin/course/create">Crear Curso</a></div></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <div class="collapsible-header"><i class="material-icons">contacts</i>Usuarios</div>
                        <div class="collapsible-body">
                            <ul>
                                <li><div class="collapsible-header"><a href="/admin/users">Listar Usuarios</a></div></li>
                                <li><div class="collapsible-header"><a href="/admin/users/create">Añadir Usuario</a></div></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <div class="collapsible-header"><i class="material-icons">rss_feed</i>Redes Sociales</div>
                        <div class="collapsible-body">
                            <ul>
                                <li><div class="collapsible-header"><a href="/admin/social">Listar Redes Sociales</a></div></li>
                                <li><div class="collapsible-header"><a href="/admin/social/create">Añadir Red Social</a></div></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col s12 m10 offset-m2" id="panel_stuff">
                <div class="row headAdmin">
                    <div class="input-field col s6">
                        <i class="material-icons prefix">search</i>
                        <input id="search" type="text" class="validate" placeholder="Buscar">
                        <label for="search"></label>
                    </div>
                    <div class="col s6">
                        <nav>
                            <div class="nav-wrapper">
                            <ul id="nav-mobile" class="right hide-on-med-and-down">
                                    @guest
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('login') }}">Iniciar Sesión</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('register') }}">Regístrate</a>
                                        </li>
                                    @else
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('logout') }}">Cerrar Sesión</a>
                                        </li>
                                    @endguest
                            </ul>
                            </div>
                        </nav>
                    </div>
                </div>
                @yield('content')
            </div>
        </div>        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <script src="{{ asset('js/loader.js') }}" rel="stylesheet"></script>
        <script>
            $(document).ready(function(){
                $('.collapsible').collapsible();                
            });
        </script>
        @yield('scripts')
    </body>
</html>