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
                <div id="adminlogo">
                    <h4 href="/dashboard">
                        RFEG
                    </h4>
                </div>
                <ul class="collapsible">
                    <li>
                        <div class="collapsible-header {{$admin['section'] == 'news' ? 'active' : ''}}"><i class="material-icons {{$admin['section'] == 'news' ? 'active' : ''}}">public</i>Actualidad</div>
                        <div class="collapsible-body" style="{{$admin['section'] == 'news' ? 'display: block;' : ''}}">
                            <ul class="list-child">
                                <li>
                                    <a href="/admin/news" class="{{$admin['subsection'] == 'list' ? 'active' : ''}}">
                                        <span class="{{$admin['subsection'] == 'list' ? 'active' : ''}}">Ver Noticias</span><span class="child-selector {{$admin['subsection'] == 'list' ? 'active' : ''}}">></span>
                                        <p class="{{$admin['subsection'] == 'list' ? 'active' : ''}}">Listado de noticias de la federación</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="/admin/news/create" class="{{$admin['subsection'] == 'save' ? 'active' : ''}}">
                                        <span class="{{$admin['subsection'] == 'save' ? 'active' : ''}}">Añadir Noticia</span><span class="child-selector {{$admin['subsection'] == 'save' ? 'active' : ''}}">></span>
                                        <p class="{{$admin['subsection'] == 'save' ? 'active' : ''}}">Añadir una nueva noticia</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="/admin/categoriesNew" class="{{$admin['subsection'] == 'cat' ? 'active' : ''}}">
                                        <span class="{{$admin['subsection'] == 'cat' ? 'active' : ''}}">Categorias</span><span class="child-selector {{$admin['subsection'] == 'cat' ? 'active' : ''}}">></span>
                                        <p class="{{$admin['subsection'] == 'cat' ? 'active' : ''}}">Administrar Categorías de noticias</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="/admin/tagsNew" class="{{$admin['subsection'] == 'tag' ? 'active' : ''}}">
                                        <span class="{{$admin['subsection'] == 'tag' ? 'active' : ''}}">Tags</span><span class="child-selector {{$admin['subsection'] == 'tag' ? 'active' : ''}}">></span>
                                        <p class="{{$admin['subsection'] == 'tag' ? 'active' : ''}}">Administrar tags de noticias</p>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <div class="collapsible-header"><i class="material-icons">account_balance</i>RFEG</div>
                        <div class="collapsible-body">
                            <ul class="list-child">
                                <li><a href="/admin/employees">Listar Empleados</a></li>
                                <li><a href="/admin/employee/create">Añadir Empleado</a></li>
                                <li><a href="/admin/rfeg">Administrar</a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <div class="collapsible-header"><i class="material-icons">directions_run</i>Especialidades</div>
                        <div class="collapsible-body">
                            <ul class="list-child">
                                <li><a href="/admin/especialidades">Administrar</a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <div class="collapsible-header"><i class="material-icons">collections</i>Media</div>
                        <div class="collapsible-body">
                            <ul class="list-child">
                                <li><a href="/admin/colecciones">Listar Colecciones</a></li>
                                <li><a href="/admin/media/create">Añadir Media</a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <div class="collapsible-header"><i class="material-icons">local_atm</i>Patrocinadores</div>
                        <div class="collapsible-body">
                            <ul class="list-child">
                                <li><a href="/admin/sponsors">Listar Patrocinadores</a></li>
                                <li><a href="/admin/sponsor/create">Añadir Patrocinador</a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <div class="collapsible-header"><i class="material-icons">local_library</i>Revistas</div>
                        <div class="collapsible-body">
                            <ul class="list-child">
                                <li><a href="/admin/albums">Listar Album</a></li>
                                <li><a href="/admin/album/create">Crear Album</a></li>
                                <li><a href="/admin/journals">Listar Revitas</a></li>
                                <li><a href="/admin/journal/create">Añadir Revita</a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <div class="collapsible-header"><i class="material-icons">school</i>Escuelas</div>
                        <div class="collapsible-body">
                            <ul class="list-child">
                                <li><a href="/admin/schools">Listar Escuelas</a></li>
                                <li><a href="/admin/school/create">Añadir Escuela</a></li>
                                <li><a href="/admin/courses">Listar Cursos</a></li>
                                <li><a href="/admin/course/create">Crear Curso</a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <div class="collapsible-header"><i class="material-icons">contacts</i>Usuarios</div>
                        <div class="collapsible-body">
                            <ul class="list-child">
                                <li><a href="/admin/users">Listar Usuarios</a></li>
                                <li><a href="/admin/users/create">Añadir Usuario</a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <div class="collapsible-header"><i class="material-icons">rss_feed</i>Redes Sociales</div>
                        <div class="collapsible-body">
                            <ul class="list-child">
                                <li><a href="/admin/social">Listar Redes Sociales</a></li>
                                <li><a href="/admin/social/create">Añadir Red Social</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col s12 m10 offset-m2" id="panel_stuff">
                <div class="row headAdmin">
                    <div class="input-field col s6">
                        <i class="material-icons prefix">search</i>
                        <input id="search" type="text" class="validate">
                        <label for="search">Buscar</label>
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
                                            <a class="nav-link" href="{{ route('logout') }}"><i class="material-icons">power_settings_new</i></a>
                                        </li>
                                        <li>
                                            <a class="nav-link" href="/admin"><i class="material-icons">person</i></a>
                                        </li>
                                        <li>
                                            <a class="nav-link" href="/admin/eventos"><i class="material-icons">notifications</i></a>
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