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
                    <img src="/logon.png" alt="">
                </div>
                <ul class="collapsible">
                    <li>
                        <div class="collapsible-header {{$admin['section'] == 'news' ? 'active' : ''}}"><i class="material-icons {{$admin['section'] == 'news' ? 'active' : ''}}">public</i>Actualidad</div>
                        <div class="collapsible-body" style="{{$admin['section'] == 'news' ? 'display: block;' : ''}}">
                            <ul class="list-child">
                                <li>
                                    <a href="/admin/news" class="{{$admin['subsection'] == 'list' ? 'active' : ''}}">
                                        <span class="{{$admin['subsection'] == 'list' ? 'active' : ''}}"><b>Ver Noticias</b></span><span class="child-selector {{$admin['subsection'] == 'list' ? 'active' : ''}}">></span>
                                        <p class="{{$admin['subsection'] == 'list' ? 'active' : ''}}">Listado de noticias de la federación</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="/admin/news/create" class="{{$admin['subsection'] == 'save' ? 'active' : ''}}">
                                        <span class="{{$admin['subsection'] == 'save' ? 'active' : ''}}"><b>Añadir Noticia</b></span><span class="child-selector {{$admin['subsection'] == 'save' ? 'active' : ''}}">></span>
                                        <p class="{{$admin['subsection'] == 'save' ? 'active' : ''}}">Añadir una nueva noticia</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="/admin/categoriesNew" class="{{$admin['subsection'] == 'cat' ? 'active' : ''}}">
                                        <span class="{{$admin['subsection'] == 'cat' ? 'active' : ''}}"><b>Categorias</b></span><span class="child-selector {{$admin['subsection'] == 'cat' ? 'active' : ''}}">></span>
                                        <p class="{{$admin['subsection'] == 'cat' ? 'active' : ''}}">Administrar Categorías de noticias</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="/admin/tagsNew" class="{{$admin['subsection'] == 'tag' ? 'active' : ''}}">
                                        <span class="{{$admin['subsection'] == 'tag' ? 'active' : ''}}"><b>Tags</b></span><span class="child-selector {{$admin['subsection'] == 'tag' ? 'active' : ''}}">></span>
                                        <p class="{{$admin['subsection'] == 'tag' ? 'active' : ''}}">Administrar tags de noticias</p>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <div class="collapsible-header {{$admin['section'] == 'rfef' ? 'active' : ''}}"><i class="material-icons {{$admin['section'] == 'rfef' ? 'active' : ''}}">account_balance</i>RFEG</div>
                        <div class="collapsible-body" style="{{$admin['section'] == 'rfef' ? 'display: block;' : ''}}">
                            <ul class="list-child">
                                <li>
                                    <a href="/admin/employees" class="{{$admin['subsection'] == 'employees' ? 'active' : ''}}">
                                        <span class="{{$admin['subsection'] == 'employees' ? 'active' : ''}}"><b>Listar Empleados</b></span><span class="child-selector {{$admin['subsection'] == 'employees' ? 'active' : ''}}">></span>
                                        <p class="{{$admin['subsection'] == 'employees' ? 'active' : ''}}">Lista de empleados de RFEF</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="/admin/employees" class="{{$admin['subsection'] == 'saveemployees' ? 'active' : ''}}">
                                        <span class="{{$admin['subsection'] == 'saveemployees' ? 'active' : ''}}"><b>Añadir Empleado</b></span><span class="child-selector {{$admin['subsection'] == 'saveemployees' ? 'active' : ''}}">></span>
                                        <p class="{{$admin['subsection'] == 'saveemployees' ? 'active' : ''}}">Añadir empleado a RFEF</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="{{$admin['subsection'] == 'adminrfef' ? 'active' : ''}}">
                                        <span class="{{$admin['subsection'] == 'adminrfef' ? 'active' : ''}}"><b>Administrar</b></span><span class="child-selector {{$admin['subsection'] == 'adminrfef' ? 'active' : ''}}">></span>
                                        <p class="{{$admin['subsection'] == 'adminrfef' ? 'active' : ''}}">Administrar contenido RFEF</p>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <div class="collapsible-header {{$admin['section'] == 'especialidades' ? 'active' : ''}}"><i class="material-icons {{$admin['section'] == 'especialidades' ? 'active' : ''}}">directions_run</i>Especialidades</div>
                        <div class="collapsible-body" style="{{$admin['section'] == 'especialidades' ? 'display: block;' : ''}}">
                            <ul class="list-child">
                                <li>
                                    <a href="/admin/especialidades" class="{{$admin['subsection'] == 'listespecialidades' ? 'active' : ''}}">
                                        <span class="{{$admin['subsection'] == 'listespecialidades' ? 'active' : ''}}"><b>Administrar</b></span><span class="child-selector {{$admin['subsection'] == 'listespecialidades' ? 'active' : ''}}">></span>
                                        <p class="{{$admin['subsection'] == 'listespecialidades' ? 'active' : ''}}">Administrar caracteristicas generales de especialidades RFEF</p>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <div class="collapsible-header {{$admin['section'] == 'media' ? 'active' : ''}}"><i class="material-icons {{$admin['section'] == 'media' ? 'active' : ''}}">collections</i>Media</div>
                        <div class="collapsible-body" style="{{$admin['section'] == 'media' ? 'display: block;' : ''}}">
                            <ul class="list-child">
                                <li>
                                    <a href="/admin/colecciones" class="{{$admin['subsection'] == 'listmedia' ? 'active' : ''}}">
                                        <span class="{{$admin['subsection'] == 'listmedia' ? 'active' : ''}}"><b>Listar Colecciones</b></span><span class="child-selector {{$admin['subsection'] == 'listmedia' ? 'active' : ''}}">></span>
                                        <p class="{{$admin['subsection'] == 'listmedia' ? 'active' : ''}}">Administrar conjunto de fotos y videos</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="/admin/media/create" class="{{$admin['subsection'] == 'savemedia' ? 'active' : ''}}">
                                        <span class="{{$admin['subsection'] == 'savemedia' ? 'active' : ''}}"><b>Añadir Media</b></span><span class="child-selector {{$admin['subsection'] == 'savemedia' ? 'active' : ''}}">></span>
                                        <p class="{{$admin['subsection'] == 'savemedia' ? 'active' : ''}}">Añadir nuevo recurso gráfico</p>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <div class="collapsible-header {{$admin['section'] == 'sponsor' ? 'active' : ''}}"><i class="material-icons {{$admin['section'] == 'sponsor' ? 'active' : ''}}">local_atm</i>Patrocinadores</div>
                        <div class="collapsible-body" style="{{$admin['section'] == 'sponsor' ? 'display: block;' : ''}}">
                            <ul class="list-child">
                                <li>
                                    <a href="/admin/sponsors" class="{{$admin['subsection'] == 'listsponsor' ? 'active' : ''}}">
                                        <span class="{{$admin['subsection'] == 'listsponsor' ? 'active' : ''}}"><b>Listar Patrocinadores</b></span><span class="child-selector {{$admin['subsection'] == 'listsponsor' ? 'active' : ''}}">></span>
                                        <p class="{{$admin['subsection'] == 'listsponsor' ? 'active' : ''}}">Listado de Patrocinadores y posiciones</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="" class="{{$admin['subsection'] == 'savesponsor' ? 'active' : ''}}">
                                        <span class="{{$admin['subsection'] == 'savesponsor' ? 'active' : ''}}"><b>Añadir Patrocinador</b></span><span class="child-selector {{$admin['subsection'] == 'savesponsor' ? 'active' : ''}}">></span>
                                        <p class="{{$admin['subsection'] == 'savesponsor' ? 'active' : ''}}">Añadir Patrocinador a la web</p>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <div class="collapsible-header {{$admin['section'] == 'journal' ? 'active' : ''}}"><i class="material-icons {{$admin['section'] == 'journal' ? 'active' : ''}}">local_library</i>Revistas</div>
                        <div class="collapsible-body" style="{{$admin['section'] == 'journal' ? 'display: block;' : ''}}">
                            <ul class="list-child">
                                <li>
                                    <a href="/admin/albums" class="{{$admin['subsection'] == 'listalbum' ? 'active' : ''}}">
                                        <span class="{{$admin['subsection'] == 'listalbum' ? 'active' : ''}}"><b>Listar Album</b></span><span class="child-selector {{$admin['subsection'] == 'listalbum' ? 'active' : ''}}">></span>
                                        <p class="{{$admin['subsection'] == 'listalbum' ? 'active' : ''}}">Administrar conjunto de revistas</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="/admin/album/create" class="{{$admin['subsection'] == 'savealbum' ? 'active' : ''}}">
                                        <span class="{{$admin['subsection'] == 'savealbum' ? 'active' : ''}}"><b>Crear Album</b></span><span class="child-selector {{$admin['subsection'] == 'savealbum' ? 'active' : ''}}">></span>
                                        <p class="{{$admin['subsection'] == 'savealbum' ? 'active' : ''}}">Crear nuevo conjunto de revistas</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="/admin/journals" class="{{$admin['subsection'] == 'listjournal' ? 'active' : ''}}">
                                        <span class="{{$admin['subsection'] == 'listjournal' ? 'active' : ''}}"><b>Listar Revistas</b></span><span class="child-selector {{$admin['subsection'] == 'listjournal' ? 'active' : ''}}">></span>
                                        <p class="{{$admin['subsection'] == 'listjournal' ? 'active' : ''}}">Listado de Revistas</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="/admin/journal/create" class="{{$admin['subsection'] == 'savejournal' ? 'active' : ''}}">
                                        <span class="{{$admin['subsection'] == 'savejournal' ? 'active' : ''}}"><b>Añadir Revista</b></span><span class="child-selector {{$admin['subsection'] == 'savejournal' ? 'active' : ''}}">></span>
                                        <p class="{{$admin['subsection'] == 'savejournal' ? 'active' : ''}}">Añadir nueva revista</p>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <div class="collapsible-header {{$admin['section'] == 'school' ? 'active' : ''}}"><i class="material-icons {{$admin['section'] == 'school' ? 'active' : ''}}">school</i>Escuelas</div>
                        <div class="collapsible-body" style="{{$admin['section'] == 'school' ? 'display: block;' : ''}}">
                            <ul class="list-child">
                                <li>
                                    <a href="/admin/schools" class="{{$admin['subsection'] == 'listschool' ? 'active' : ''}}">
                                        <span class="{{$admin['subsection'] == 'listschool' ? 'active' : ''}}"><b>Listar Escuelas</b></span><span class="child-selector {{$admin['subsection'] == 'listschool' ? 'active' : ''}}">></span>
                                        <p class="{{$admin['subsection'] == 'listschool' ? 'active' : ''}}">Listado de escuelas RFEG</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="/admin/school/create" class="{{$admin['subsection'] == 'saveschool' ? 'active' : ''}}">
                                        <span class="{{$admin['subsection'] == 'saveschool' ? 'active' : ''}}"><b>Añadir Escuela</b></span><span class="child-selector {{$admin['subsection'] == 'saveschool' ? 'active' : ''}}">></span>
                                        <p class="{{$admin['subsection'] == 'saveschool' ? 'active' : ''}}">Añadir nueva escuela</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="/admin/courses" class="{{$admin['subsection'] == 'listcourses' ? 'active' : ''}}">
                                        <span class="{{$admin['subsection'] == 'listcourses' ? 'active' : ''}}"><b>Listar Cursos</b></span><span class="child-selector {{$admin['subsection'] == 'listcourses' ? 'active' : ''}}">></span>
                                        <p class="{{$admin['subsection'] == 'listcourses' ? 'active' : ''}}">Listado de cursos RFEG</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="/admin/course/create" class="{{$admin['subsection'] == 'savecourse' ? 'active' : ''}}">
                                        <span class="{{$admin['subsection'] == 'savecourse' ? 'active' : ''}}"><b>Crear Curso</b></span><span class="child-selector {{$admin['subsection'] == 'savecourse' ? 'active' : ''}}">></span>
                                        <p class="{{$admin['subsection'] == 'savecourse' ? 'active' : ''}}">Añadir nuevo curso a RFEG</p>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <div class="collapsible-header {{$admin['section'] == 'users' ? 'active' : ''}}"><i class="material-icons {{$admin['section'] == 'users' ? 'active' : ''}}">contacts</i>Usuarios</div>
                        <div class="collapsible-body" style="{{$admin['section'] == 'users' ? 'display: block;' : ''}}">
                            <ul class="list-child">
                                <li>
                                    <a href="/admin/users" class="{{$admin['subsection'] == 'listusers' ? 'active' : ''}}">
                                        <span class="{{$admin['subsection'] == 'listusers' ? 'active' : ''}}"><b>Listar Usuarios</b></span><span class="child-selector {{$admin['subsection'] == 'listusers' ? 'active' : ''}}">></span>
                                        <p class="{{$admin['subsection'] == 'listusers' ? 'active' : ''}}">Listado de usuarios registrados</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="/admin/users/create" class="{{$admin['subsection'] == 'saveusers' ? 'active' : ''}}">
                                        <span class="{{$admin['subsection'] == 'saveusers' ? 'active' : ''}}"><b>Añadir Usuario</b></span><span class="child-selector {{$admin['subsection'] == 'saveusers' ? 'active' : ''}}">></span>
                                        <p class="{{$admin['subsection'] == 'saveusers' ? 'active' : ''}}">Añadir nuevo usuario</p>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <div class="collapsible-header {{$admin['section'] == 'rs' ? 'active' : ''}}"><i class="material-icons {{$admin['section'] == 'rs' ? 'active' : ''}}">rss_feed</i>Redes Sociales</div>
                        <div class="collapsible-body" style="{{$admin['section'] == 'rs' ? 'display: block;' : ''}}">
                            <ul class="list-child">
                                <li>
                                    <a href="/admin/social" class="{{$admin['subsection'] == 'listrs' ? 'active' : ''}}">
                                        <span class="{{$admin['subsection'] == 'listrs' ? 'active' : ''}}"><b>Listar Redes Sociales</b></span><span class="child-selector {{$admin['subsection'] == 'listrs' ? 'active' : ''}}">></span>
                                        <p class="{{$admin['subsection'] == 'listrs' ? 'active' : ''}}">Listado de redes sociales de RFEG</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="/admin/rs/create" class="{{$admin['subsection'] == 'savers' ? 'active' : ''}}">
                                        <span class="{{$admin['subsection'] == 'savers' ? 'active' : ''}}"><b>Añadir Red Social</b></span><span class="child-selector {{$admin['subsection'] == 'savers' ? 'active' : ''}}">></span>
                                        <p class="{{$admin['subsection'] == 'savers' ? 'active' : ''}}">Añadir nueva Red Social</p>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col s12 m10 offset-m2" id="panel_stuff">
                <div class="row headAdmin">
                    <div class="input-field col s6">
                        <i class="material-icons prefix">search</i>
                        <input id="search" type="search" class="validate">
                        <label id="searchlabel" for="search">Buscar</label>
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
                                            @php
                                                $current_url = explode('/',$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
                                            @endphp
                                            <a class="nav-link" href="/admin/users/edit/{{Auth::user()->id}}"><i class="material-icons {{count($current_url)>=4 && $current_url[2]=='users'&&$current_url[4]==Auth::user()->id ? 'active' : ''}}">person</i></a>
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
            <!-- <div class="popover">Añade un atractivo formulario de compra con una línea de JavaScript.</div> -->
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