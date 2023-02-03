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
                    <a href="/dashboard"><img src="/logon.png" alt=""></a>
                    <div class="col s12 esp_nav_admin_head">
                        <nav class="esp_nav_admin">
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
                                            <a class="nav-link" href="/admin/users/edit/{{Auth::user()->id}}"><i class="material-icons {{(!empty($current_url[2]) && !empty($current_url[4]) && $current_url[2]=='users' && $current_url[4]==Auth::user()->id) ? 'active' : ''}}">person</i></a>
                                        </li>
                                        <li>
                                            <a class="nav-link" href="/"><i class="material-icons">open_in_new</i></a>
                                        </li>
                                    @endguest
                            </ul>
                            </div>
                        </nav>
                    </div>
                </div>
                <ul class="collapsible">
                    <li>
                        <div class="collapsible-header {{$admin['section'] == 'news' ? 'active' : ''}}"><img src="/icons/rfeg_ico_actualidad.svg" class="img_admin" width="26">Actualidad</div>
                        <div class="collapsible-body" style="{{$admin['section'] == 'news' ? 'display: block;' : ''}}">
                            <ul class="list-child">
                                <li>
                                    <a href="/admin/news" class="{{$admin['subsection'] == 'list' ? 'active' : ''}}">
                                        <span class="{{$admin['subsection'] == 'list' ? 'active' : ''}}"><b>Ver Noticias</b></span><span class="child-selector {{$admin['subsection'] == 'list' ? 'active' : ''}}">></span>
                                        <p class="{{$admin['subsection'] == 'list' ? 'active' : ''}}">Listado de todas las noticias</p>
                                    </a>
                                </li>
                                <!--li>
                                    <a href="/admin/news/create" class="{{$admin['subsection'] == 'save' ? 'active' : ''}}">
                                        <span class="{{$admin['subsection'] == 'save' ? 'active' : ''}}"><b>Añadir Noticia</b></span><span class="child-selector {{$admin['subsection'] == 'save' ? 'active' : ''}}">></span>
                                        <p class="{{$admin['subsection'] == 'save' ? 'active' : ''}}">Añadir una nueva noticia</p>
                                    </a>
                                </li-->
                                <li>
                                    <a href="/admin/categoriesNew" class="{{$admin['subsection'] == 'cat' ? 'active' : ''}}">
                                        <span class="{{$admin['subsection'] == 'cat' ? 'active' : ''}}"><b>Categorias</b></span><span class="child-selector {{$admin['subsection'] == 'cat' ? 'active' : ''}}">></span>
                                        <p class="{{$admin['subsection'] == 'cat' ? 'active' : ''}}">Administrar categorías de noticias</p>
                                    </a>
                                </li>
                                <!--li>
                                    <a href="/admin/tagsNew" class="{{$admin['subsection'] == 'tag' ? 'active' : ''}}">
                                        <span class="{{$admin['subsection'] == 'tag' ? 'active' : ''}}"><b>Tags</b></span><span class="child-selector {{$admin['subsection'] == 'tag' ? 'active' : ''}}">></span>
                                        <p class="{{$admin['subsection'] == 'tag' ? 'active' : ''}}">Administrar tags de noticias</p>
                                    </a>
                                </li-->
                            </ul>
                        </div>
                    </li>
                    <li>
                        <div class="collapsible-header {{$admin['section'] == 'rfeg' ? 'active' : ''}}"><img src="/icons/rfeg_ico_rfeg.svg" class="img_admin" width="26">RFEG</div>
                        <div class="collapsible-body" style="{{$admin['section'] == 'rfeg' ? 'display: block;' : ''}}">
                            <ul class="list-child">
                                <li>
                                    <a href="/admin/employees" class="{{$admin['subsection'] == 'employees' ? 'active' : ''}}">
                                        <span class="{{$admin['subsection'] == 'employees' ? 'active' : ''}}"><b>Listar Empleados</b></span><span class="child-selector {{$admin['subsection'] == 'employees' ? 'active' : ''}}">></span>
                                        <p class="{{$admin['subsection'] == 'employees' ? 'active' : ''}}">Listado de empleados de la sección RFEG</p>
                                    </a>
                                </li>
                                <!--li>
                                    <a href="/admin/employees" class="{{$admin['subsection'] == 'saveemployees' ? 'active' : ''}}">
                                        <span class="{{$admin['subsection'] == 'saveemployees' ? 'active' : ''}}"><b>Añadir Empleado</b></span><span class="child-selector {{$admin['subsection'] == 'saveemployees' ? 'active' : ''}}">></span>
                                        <p class="{{$admin['subsection'] == 'saveemployees' ? 'active' : ''}}">Añadir empleado a RFEF</p>
                                    </a>
                                </li-->
                                <li>
                                    <a href="/admin/rfeg" class="{{$admin['subsection'] == 'adminrfef' ? 'active' : ''}}">
                                        <span class="{{$admin['subsection'] == 'adminrfef' ? 'active' : ''}}"><b>Administrar</b></span><span class="child-selector {{$admin['subsection'] == 'adminrfef' ? 'active' : ''}}">></span>
                                        <p class="{{$admin['subsection'] == 'adminrfef' ? 'active' : ''}}">Administrar contenido de la sección RFEG</p>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <div class="collapsible-header {{$admin['section'] == 'especialidades' ? 'active' : ''}}"><img src="/icons/rfeg_ico_especialidades.svg" class="img_admin" width="26">Especialidades</div>
                        <div class="collapsible-body" style="{{$admin['section'] == 'especialidades' ? 'display: block;' : ''}}">
                            <ul class="list-child">
                                <li>
                                    <a href="/admin/especialidades" class="{{$admin['subsection'] == 'listespecialidades' ? 'active' : ''}}">
                                        <span class="{{$admin['subsection'] == 'listespecialidades' ? 'active' : ''}}"><b>Administrar</b></span><span class="child-selector {{$admin['subsection'] == 'listespecialidades' ? 'active' : ''}}">></span>
                                        <p class="{{$admin['subsection'] == 'listespecialidades' ? 'active' : ''}}">Administrar caracteristicas generales de especialidades</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="/admin/calendario" class="{{$admin['subsection'] == 'calendario' ? 'active' : ''}}">
                                        <span class="{{$admin['subsection'] == 'calendario' ? 'active' : ''}}"><b>Calendario</b></span><span class="child-selector {{$admin['subsection'] == 'calendario' ? 'active' : ''}}">></span>
                                        <p class="{{$admin['subsection'] == 'calendario' ? 'active' : ''}}">Administrar calendarios NAC. e INTL. de especialidades</p>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <div class="collapsible-header {{$admin['section'] == 'media' ? 'active' : ''}}"><img src="/icons/rfeg_ico_fotos.svg" class="img_admin" width="26">Media</div>
                        <div class="collapsible-body" style="{{$admin['section'] == 'media' ? 'display: block;' : ''}}">
                            <ul class="list-child">
                                <li>
                                    <a href="/admin/colecciones" class="{{$admin['subsection'] == 'listmedia' ? 'active' : ''}}">
                                        <span class="{{$admin['subsection'] == 'listmedia' ? 'active' : ''}}"><b>Gestionar Colecciones</b></span><span class="child-selector {{$admin['subsection'] == 'listmedia' ? 'active' : ''}}">></span>
                                        <p class="{{$admin['subsection'] == 'listmedia' ? 'active' : ''}}">Administrar colecciones de fotos y vídeos</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="/admin/media/create" class="{{$admin['subsection'] == 'savemedia' ? 'active' : ''}}">
                                        <span class="{{$admin['subsection'] == 'savemedia' ? 'active' : ''}}"><b>Añadir Fotos y Videos</b></span><span class="child-selector {{$admin['subsection'] == 'savemedia' ? 'active' : ''}}">></span>
                                        <p class="{{$admin['subsection'] == 'savemedia' ? 'active' : ''}}">Añadir nuevo recurso</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="/admin/albums" class="{{$admin['subsection'] == 'listalbum' ? 'active' : ''}}">
                                        <span class="{{$admin['subsection'] == 'listalbum' ? 'active' : ''}}"><b>Gestionar Álbumes de revistas</b></span><span class="child-selector {{$admin['subsection'] == 'listalbum' ? 'active' : ''}}">></span>
                                        <p class="{{$admin['subsection'] == 'listalbum' ? 'active' : ''}}">Álbumes de revistas por años</p>
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
                        <div class="collapsible-header {{$admin['section'] == 'sponsor' ? 'active' : ''}}"><img src="/icons/rfeg_ico_patrocinadores.svg" class="img_admin" width="26">Patrocinadores</div>
                        <div class="collapsible-body" style="{{$admin['section'] == 'sponsor' ? 'display: block;' : ''}}">
                            <ul class="list-child">
                                <li>
                                    <a href="/admin/sponsors" class="{{$admin['subsection'] == 'listsponsor' ? 'active' : ''}}">
                                        <span class="{{$admin['subsection'] == 'listsponsor' ? 'active' : ''}}"><b>Gestionar Patrocinadores</b></span><span class="child-selector {{$admin['subsection'] == 'listsponsor' ? 'active' : ''}}">></span>
                                        <p class="{{$admin['subsection'] == 'listsponsor' ? 'active' : ''}}">Listado de Patrocinadores y colaboradores</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="/admin/banners" class="{{$admin['subsection'] == 'banner' ? 'active' : ''}}">
                                        <span class="{{$admin['subsection'] == 'banner' ? 'active' : ''}}"><b>Gestionar Publicidad</b></span><span class="child-selector {{$admin['subsection'] == 'banner' ? 'active' : ''}}">></span>
                                        <p class="{{$admin['subsection'] == 'banner' ? 'active' : ''}}">Listado de banners y publicidad de la web</p>
                                    </a>
                                </li>
                                <!--li>
                                    <a href="" class="{{$admin['subsection'] == 'savesponsor' ? 'active' : ''}}">
                                        <span class="{{$admin['subsection'] == 'savesponsor' ? 'active' : ''}}"><b>Añadir Patrocinador</b></span><span class="child-selector {{$admin['subsection'] == 'savesponsor' ? 'active' : ''}}">></span>
                                        <p class="{{$admin['subsection'] == 'savesponsor' ? 'active' : ''}}">Añadir Patrocinador a la web</p>
                                    </a>
                                </li-->
                            </ul>
                        </div>
                    </li>
                    <!--li>
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
                    </li-->
                    <li>
                        <div class="collapsible-header {{$admin['section'] == 'school' ? 'active' : ''}}"><img src="/icons/rfeg_ico_eng.svg" class="img_admin" width="26">Escuela Nacional</div>
                        <div class="collapsible-body" style="{{$admin['section'] == 'school' ? 'display: block;' : ''}}">
                            <ul class="list-child">
                                <li>
                                    <a href="/admin/normativa_school" class="{{$admin['subsection'] == 'normativa_school' ? 'active' : ''}}">
                                        <span class="{{$admin['subsection'] == 'normativa_school' ? 'active' : ''}}"><b>Normativa</b></span><span class="child-selector {{$admin['subsection'] == 'normativa_school' ? 'active' : ''}}">></span>
                                        <p class="{{$admin['subsection'] == 'normativa_school' ? 'active' : ''}}">Normativa de escuelas y cursos</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="/admin/courses" class="{{$admin['subsection'] == 'listcourses' ? 'active' : ''}}">
                                        <span class="{{$admin['subsection'] == 'listcourses' ? 'active' : ''}}"><b>Gestionar Cursos</b></span><span class="child-selector {{$admin['subsection'] == 'listcourses' ? 'active' : ''}}">></span>
                                        <p class="{{$admin['subsection'] == 'listcourses' ? 'active' : ''}}">Listado de cursos RFEG y FFAA</p>
                                    </a>
                                </li>
                                <!--li>
                                    <a href="/admin/course/create" class="{{$admin['subsection'] == 'savecourse' ? 'active' : ''}}">
                                        <span class="{{$admin['subsection'] == 'savecourse' ? 'active' : ''}}"><b>Crear Curso</b></span><span class="child-selector {{$admin['subsection'] == 'savecourse' ? 'active' : ''}}">></span>
                                        <p class="{{$admin['subsection'] == 'savecourse' ? 'active' : ''}}">Añadir nuevo curso a RFEG</p>
                                    </a>
                                </li-->
                            </ul>
                        </div>
                    </li>
                    <li>
                        <div class="collapsible-header {{$admin['section'] == 'users' ? 'active' : ''}}"><img src="/icons/rfeg_ico_users.svg" class="img_admin" width="26">Usuarios</div>
                        <div class="collapsible-body" style="{{$admin['section'] == 'users' ? 'display: block;' : ''}}">
                            <ul class="list-child">
                                <li>
                                    <a href="/admin/users" class="{{$admin['subsection'] == 'listusers' ? 'active' : ''}}">
                                        <span class="{{$admin['subsection'] == 'listusers' ? 'active' : ''}}"><b>Gestionar Usuarios</b></span><span class="child-selector {{$admin['subsection'] == 'listusers' ? 'active' : ''}}">></span>
                                        <p class="{{$admin['subsection'] == 'listusers' ? 'active' : ''}}">Edición, altas y bajas de usuarios registrados</p>
                                    </a>
                                </li>
                                <!--li>
                                    <a href="/admin/users/create" class="{{$admin['subsection'] == 'saveusers' ? 'active' : ''}}">
                                        <span class="{{$admin['subsection'] == 'saveusers' ? 'active' : ''}}"><b>Añadir Usuario</b></span><span class="child-selector {{$admin['subsection'] == 'saveusers' ? 'active' : ''}}">></span>
                                        <p class="{{$admin['subsection'] == 'saveusers' ? 'active' : ''}}">Añadir nuevo usuario</p>
                                    </a>
                                </li-->
                            </ul>
                        </div>
                    </li>
                    <li>
                        <div class="collapsible-header {{$admin['section'] == 'rs' ? 'active' : ''}}"><img src="/icons/rfeg_ico_twitter.svg" class="img_admin" width="26">Redes Sociales</div>
                        <div class="collapsible-body" style="{{$admin['section'] == 'rs' ? 'display: block;' : ''}}">
                            <ul class="list-child">
                                <li>
                                    <a href="/admin/social" class="{{$admin['subsection'] == 'listrs' ? 'active' : ''}}">
                                        <span class="{{$admin['subsection'] == 'listrs' ? 'active' : ''}}"><b>Gestionar Redes Sociales</b></span><span class="child-selector {{$admin['subsection'] == 'listrs' ? 'active' : ''}}">></span>
                                        <p class="{{$admin['subsection'] == 'listrs' ? 'active' : ''}}">Listado de redes sociales, iconos y enlaces web</p>
                                    </a>
                                </li>
                                <!--li>
                                    <a href="/admin/rs/create" class="{{$admin['subsection'] == 'savers' ? 'active' : ''}}">
                                        <span class="{{$admin['subsection'] == 'savers' ? 'active' : ''}}"><b>Añadir Red Social</b></span><span class="child-selector {{$admin['subsection'] == 'savers' ? 'active' : ''}}">></span>
                                        <p class="{{$admin['subsection'] == 'savers' ? 'active' : ''}}">Añadir nueva Red Social</p>
                                    </a>
                                </li-->
                            </ul>
                        </div>
                    </li>
                    <li>
                        <div class="collapsible-header {{$admin['section'] == 'estaticas' ? 'active' : ''}}"><img src="/icons/rfeg_ico_addpages.svg" class="img_admin" width="26">Páginas estáticas</div>
                        <div class="collapsible-body" style="{{$admin['section'] == 'estaticas' ? 'display: block;' : ''}}">
                            <ul class="list-child">
                                <li>
                                    <a href="/admin/page_list" class="{{$admin['subsection'] == 'listestaticas' ? 'active' : ''}}">
                                        <span class="{{$admin['subsection'] == 'listestaticas' ? 'active' : ''}}"><b>Listar Páginas estáticas</b></span><span class="child-selector {{$admin['subsection'] == 'listestaticas' ? 'active' : ''}}">></span>
                                        <p class="{{$admin['subsection'] == 'listestaticas' ? 'active' : ''}}">Listado de páginas simples y estáticas (solo texto) como Aviso Legal, Política de privacidad, etc.</p>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <div class="collapsible-header {{$admin['section'] == 'general' ? 'active' : ''}}"><img src="/icons/rfeg_ico_config.svg" class="img_admin" width="26">Configuración General</div>
                        <div class="collapsible-body" style="{{$admin['section'] == 'general' ? 'display: block;' : ''}}">
                            <ul class="list-child">
                                <li>
                                    <a href="/admin/general_list" class="{{$admin['subsection'] == 'listgeneral' ? 'active' : ''}}">
                                        <span class="{{$admin['subsection'] == 'listgeneral' ? 'active' : ''}}"><b>Administración global de la web</b></span><span class="child-selector {{$admin['subsection'] == 'listgeneral' ? 'active' : ''}}">></span>
                                        <p class="{{$admin['subsection'] == 'listgeneral' ? 'active' : ''}}">Listado de configuraciones, imagen principal de la web, pie de página, logo, email, etc.</p>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <div class="collapsible-header {{$admin['section'] == 'mundial' ? 'active' : ''}}"><img src="/icons/rfeg_ico_corazon.svg" class="img_admin" width="26">Campeonato del Mundo Valencia 2023</div>
                        <div class="collapsible-body" style="{{$admin['section'] == 'mundial' ? 'display: block;' : ''}}">
                            <ul class="list-child">
                                <li>
                                    <a href="/admin/mundial/general" class="{{$admin['subsection'] == 'general' ? 'active' : ''}}">
                                        <span class="{{$admin['subsection'] == 'general' ? 'active' : ''}}"><b>Ajustes Generales</b></span><span class="child-selector {{$admin['subsection'] == 'general' ? 'active' : ''}}">></span>
                                        <p class="{{$admin['subsection'] == 'general' ? 'active' : ''}}">Configuraciones Generales</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="/admin/mundial/mundial" class="{{$admin['subsection'] == 'mundial' ? 'active' : ''}}">
                                        <span class="{{$admin['subsection'] == 'mundial' ? 'active' : ''}}"><b>Sección Campeonato</b></span><span class="child-selector {{$admin['subsection'] == 'mundial' ? 'active' : ''}}">></span>
                                        <p class="{{$admin['subsection'] == 'mundial' ? 'active' : ''}}">Accesos y Pabellones 1 y 2</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="/admin/mundial/valencia" class="{{$admin['subsection'] == 'valencia' ? 'active' : ''}}">
                                        <span class="{{$admin['subsection'] == 'valencia' ? 'active' : ''}}"><b>Sección Valencia</b></span><span class="child-selector {{$admin['subsection'] == 'valencia' ? 'active' : ''}}">></span>
                                        <p class="{{$admin['subsection'] == 'valencia' ? 'active' : ''}}">Valencia, Cómo llegar, Alojamientos, Restaurantes y Puntos de interés</p>
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
                        <div class="rfeg_admin_zone">
                            <img src="/icons/rfeg_ico_buscar.svg" class="img_admin" width="16">                            
                        </div>
                        <input id="search" type="search" class="validate">
                        <label id="searchlabel" for="search">Buscar</label>
                        <div class="resultados_search"></div>
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
                $('.resultados_search').hide();
                $('#search').on('keyup', function(){
                    var value = $(this).val().toLowerCase();
                    if(value !='' && value.length > 3){
                        $('.resultados_search').show();
                        $('.resultados_search').html('');
                        $('.resultados_search').append(`<div class="preloader-wrapper big active center">
                            <div class="spinner-layer spinner-blue-only">
                            <div class="circle-clipper left">
                                <div class="circle"></div>
                            </div><div class="gap-patch">
                                <div class="circle"></div>
                            </div><div class="circle-clipper right">
                                <div class="circle"></div>
                            </div>
                            </div>
                        </div>`);
                        $.ajax({
                            type: 'get',
                            url: '/prosearch/'+value,
                            dataType: 'json',
                            success: function(data){     
                                $('.resultados_search').html('');   
                                var html ='<div class="row">';                        
                                if(data.news.length > 0){                                    
                                    html += '<div class="col s4">';
                                    html += '<b>Noticias</b><br>';
                                    $.each(data.news, function(index, value){
                                        html += '<a href="/admin/news/edit/'+value.id+'">'+value.title.substr(0,40)+'...</a><br>';
                                    });
                                    html += '</div>';
                                }
                                if(data.rs.length > 0){                                    
                                    html += '<div class="col s4">';
                                    html += '<b>Redes Sociales</b><br>';
                                    $.each(data.rs, function(index, value){
                                        html += '<a href="/admin/rs/edit/'+value.id+'">'+value.name.substr(0,40)+'...</a><br>';
                                    });
                                    html += '</div>';
                                }
                                if(data.sponsors.length > 0){                                    
                                    html += '<div class="col s4">';
                                    html += '<b>Patrocinadores</b><br>';
                                    $.each(data.sponsors, function(index, value){
                                        html += '<a href="/admin/sponsor/edit/'+value.id+'">'+value.name.substr(0,40)+'...</a><br>';
                                    });
                                    html += '</div>';
                                }
                                if(data.rfeg_title.length > 0){                                    
                                    html += '<div class="col s4">';
                                    html += '<b>Titulos RFEG</b><br>';
                                    $.each(data.rfeg_titles, function(index, value){
                                        html += '<a href="/admin/rfeg/'+value.type+'">'+value.name.substr(0,40)+'...</a><br>';
                                    });
                                    html += '</div>';
                                }
                                if(data.courses.length > 0){                                    
                                    html += '<div class="col s4">';
                                    html += '<b>Cursos</b><br>';
                                    $.each(data.courses, function(index, value){
                                        html += '<a href="/admin/courses">'+value.curso.substr(0,40)+'...</a><br>';
                                    });
                                    html += '</div>';
                                }
                                if(data.normativas.length > 0){                                    
                                    html += '<div class="col s4">';
                                    html += '<b>Normativas</b><br>';
                                    $.each(data.normativas, function(index, value){
                                        html += '<a href="/admin/normativa_school">'+value.documento.substr(0,40)+'...</a><br>';
                                    });
                                    html += '</div>';
                                }
                                if(data.events.length > 0){                                    
                                    html += '<div class="col s4">';
                                    html += '<b>Eventos</b><br>';
                                    $.each(data.events, function(index, value){
                                        //obtenemos mes y año del campo fecha
                                        var fecha = value.fecha.split('-');
                                        html += '<a href="/admin/calendario/'+fecha[1]+'/'+fecha[0]+'">'+value.competicion.substr(0,40)+'...</a><br>';
                                    });
                                    html += '</div>';
                                }
                                if(data.albums.length > 0){                                    
                                    html += '<div class="col s4">';
                                    html += '<b>Albums</b><br>';
                                    $.each(data.albums, function(index, value){
                                        html += '<a href="/admin/album/edit/'+value.id+'">'+value.name.substr(0,40)+'...</a><br>';
                                    });
                                    html += '</div>';
                                }
                                if(data.journals.length > 0){                                    
                                    html += '<div class="col s4">';
                                    html += '<b>Revistas</b><br>';
                                    $.each(data.journals, function(index, value){
                                        html += '<a href="/admin/journal/edit/'+value.id+'">'+value.title.substr(0,40)+'...</a><br>';
                                    });
                                    html += '</div>';
                                }
                                if(data.banners.length > 0){
                                    html += '<div class="col s4">';
                                    html += '<b>Banners</b><br>';
                                    $.each(data.banners, function(index, value){
                                        html += '<a href="/admin/banner/edit/'+value.id+'">'+value.place.substr(0,40)+'...</a><br>';
                                    });
                                    html += '</div>';
                                }
                                if(data.categories.length > 0){                                    
                                    html += '<div class="col s4">';
                                    html += '<b>Categorias</b><br>';
                                    $.each(data.categories, function(index, value){
                                        html += '<a href="/admin/categoriesNew">'+value.name.substr(0,40)+'...</a><br>';
                                    });
                                    html += '</div>';
                                }
                                if(data.table1.length > 0){                                    
                                    html += '<div class="col s4">';
                                    html += '<b>Tabla 1</b><br>';
                                    $.each(data.tabla1, function(index, value){
                                        html += '<a href="/admin/rfeg/">'+value.documento.substr(0,40)+'...</a><br>';
                                    });
                                    html += '</div>';
                                }
                                if(data.table2.length > 0){                                    
                                    html += '<div class="col s4">';
                                    html += '<b>Tabla 2</b><br>';
                                    $.each(data.tabla2, function(index, value){
                                        html += '<a href="/admin/rfeg/">'+value.nombre.substr(0,40)+'...</a><br>';
                                    });
                                    html += '</div>';
                                }
                                if(data.table7.length > 0){                                    
                                    html += '<div class="col s4">';
                                    html += '<b>Tabla 7</b><br>';
                                    $.each(data.tabla7, function(index, value){
                                        html += '<a href="/admin/rfeg/">'+value.titulo.substr(0,40)+'...</a><br>';
                                    });
                                    html += '</div>';
                                }
                                if(data.employees.length > 0){                                    
                                    html += '<div class="col s4">';
                                    html += '<b>Empleados</b><br>';
                                    $.each(data.employees, function(index, value){
                                        html += '<a href="/admin/employee/edit/'+value.id+'">'+value.name.substr(0,40)+'...</a><br>';
                                    });
                                    html += '</div>';
                                }
                                if(data.especialidades.length > 0){                                    
                                    html += '<div class="col s4">';
                                    html += '<b>Especialidades</b><br>';
                                    $.each(data.especialidades, function(index, value){
                                        html += '<a href="/admin/especialidad/'+value.id+'">'+value.name.substr(0,40)+'...</a><br>';
                                    });
                                    html += '</div>';
                                }
                                if(data.page.length > 0){                                    
                                    html += '<div class="col s4">';
                                    html += '<b>Paginas</b><br>';
                                    $.each(data.pages, function(index, value){
                                        html += '<a href="'+value.url+'" target="_blank">'+value.title.substr(0,40)+'...</a><br>';
                                    });
                                    html += '</div>';
                                }
                                if(data.general.length > 0){
                                    html += '<div class="col s4">';
                                    html += '<b>General</b><br>';                                    
                                    $.each(data.general, function(index, value){
                                        html += '<a href="/admin/general_list">'+value.title.substr(0,40)+'...</a><br>';
                                    });
                                    html += '</div>';
                                }
                                if(data.teams.length > 0){                                   
                                    html += '<div class="col s4">';
                                    html += '<b>Equipos</b><br>';
                                    $.each(data.teams, function(index, value){
                                        html += '<a href="/admin/especialidad/'+value.especialidad+'">'+value.name.substr(0,40)+'...</a><br>';
                                    });
                                    html += '</div>';
                                }
                                if(data.medias.length > 0){                                    
                                    html += '<div class="col s4">';
                                    html += '<b>Medios</b><br>';
                                    $.each(data.medias, function(index, value){
                                        html += '<a href="/admin/media/edit/'+value.id+'">'+value.title.substr(0,40)+'...</a><br>';
                                    });
                                    html += '</div>';
                                }
                                if(data.comisionesTecnicas.length > 0){                                    
                                    html += '<div class="col s4">';
                                    html += '<b>Comisiones Tecnicas</b><br>';
                                    $.each(data.comisionesTecnicas, function(index, value){
                                        html += '<a href="/admin/especialidad/'+value.especialidad+'">'+value.name.substr(0,40)+'...</a><br>';
                                    });
                                    html += '</div>';
                                }
                                if(data.colecciones.length > 0){                                    
                                    html += '<div class="col s4">';
                                    html += '<b>Colecciones</b><br>';
                                    $.each(data.colecciones, function(index, value){
                                        html += '<a href="/admin/coleccion/edit/'+value.id+'">'+value.name.substr(0,40)+'...</a><br>';
                                    });
                                    html += '</div>';
                                }
                                if(data.resultados.length > 0){                                    
                                    html += '<div class="col s4">';
                                    html += '<b>Resultados</b><br>';
                                    $.each(data.resultados, function(index, value){
                                        html += '<a href="/admin/especialidad/'+value.especialidad+'">'+value.name.substr(0,40)+'...</a><br>';
                                    });
                                    html += '</div>';
                                }
                                console.log(html)
                                $('.resultados_search').append(html);
                            }                             
                        });
                    }
                });
            });
            var bPreguntar = false;

            $('input').change(function(){
                bPreguntar = true;
            });
            $('textarea').change(function(){
                bPreguntar = true;
            });
            $('select').change(function(){
                bPreguntar = true;
            });
            $('button').click(function(){
                bPreguntar = false;
            });
            $('form').submit(function(){
                bPreguntar = false;
            });
            $('a.waves-effect').click(function(){
                bPreguntar = false;
            });
            window.onbeforeunload = preguntarAntesDeSalir;
        
            function preguntarAntesDeSalir () {
                var respuesta;
        
                if ( bPreguntar ) {
                    respuesta = confirm ( '¿Seguro que quieres salir?' );
        
                    if ( respuesta ) {
                        window.onunload = function () {
                            return true;
                        }
                    } else {
                        return false;
                    }
                }
            }
        </script>
        @yield('scripts')
    </body>
</html>