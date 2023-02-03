@extends('admin')
@section('title')
    Panel de Control
@endsection
@section('content')

<div class="container_admin">
    <div class="row">
        <div class="col s12 m12">
            <div class="card horizontal">
                <div class="card-stacked">
                    <div class="card-content dashboard-table">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="row">
                            <div class="col s3 home_admin">
                                <h4>Noticias</h4>
                                <ul>
                                    <li>
                                        <a href="/admin/news" class="">
                                            <span class=""><b>Ver Noticias</b></span><span class="child-selector ">></span>
                                            <p class="">Listado de todas las noticias</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/admin/categoriesNew" class="">
                                            <span class=""><b>Categorias</b></span><span class="child-selector ">></span>
                                            <p class="">Administrar categorías de noticias</p>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col s3 home_admin">
                                <h4>RFEG</h4>
                                <ul>
                                    <li>
                                        <a href="/admin/employees" class="">
                                            <span class=""><b>Listar Empleados</b></span><span class="child-selector ">></span>
                                            <p class="">Listado de empleados de la sección RFEG</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/admin/rfeg" class="">
                                            <span class=""><b>Administrar</b></span><span class="child-selector ">></span>
                                            <p class="">Administrar contenido de la sección RFEG</p>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col s3 home_admin">
                                <h4>Especialidades</h4>
                                <ul>
                                    <li>
                                        <a href="/admin/especialidades" class="">
                                            <span class=""><b>Administrar</b></span><span class="child-selector ">></span>
                                            <p class="">Administrar características generales de especialidades</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/admin/calendario" class="">
                                            <span class=""><b>Calendario</b></span><span class="child-selector ">></span>
                                            <p class="">Administrar calendarios NAC. e INTL. de especialidades</p>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col s3 home_admin">
                                <h4>Media</h4>
                                <ul>
                                    <li>
                                        <a href="/admin/colecciones" class="">
                                            <span class=""><b>Gestionar Colecciones</b></span><span class="child-selector ">></span>
                                            <p class="">Administrar colecciones de fotos y vídeos</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/admin/media/create" class="">
                                            <span class=""><b>Añadir Fotos y Vídeos</b></span><span class="child-selector ">></span>
                                            <p class="">Añadir nuevo recurso</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/admin/albums" class="">
                                            <span class=""><b>Gestionar Álbumes de revistas</b></span><span class="child-selector ">></span>
                                            <p class="">Álbumes de revistas por años</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/admin/journal/create" class="">
                                            <span class=""><b>Añadir Revista</b></span><span class="child-selector ">></span>
                                            <p class="">Añadir nueva revista</p>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col s3 home_admin">
                                <h4>Patrocinadores</h4>
                                <ul>
                                    <li>
                                        <a href="/admin/sponsors" class="">
                                            <span class=""><b>Gestionar Patrocinadores</b></span><span class="child-selector ">></span>
                                            <p class="">Listado de Patrocinadores y colaboradores</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/admin/banners" class="">
                                            <span class=""><b>Gestionar Publicidad</b></span><span class="child-selector ">></span>
                                            <p class="">Listado de banners y publicidad de la web</p>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col s3 home_admin">
                                <h4>Escuela Nacional</h4>
                                <ul>
                                    <li>
                                        <a href="/admin/normativa_school" class="">
                                            <span class=""><b>Normativa</b></span><span class="child-selector ">></span>
                                            <p class="">Normativa de escuelas y cursos</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/admin/courses" class="">
                                            <span class=""><b>Gestionar Cursos</b></span><span class="child-selector ">></span>
                                            <p class="">Listado de cursos RFEG y FFAA</p>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col s3 home_admin">
                                <h4>Usuarios</h4>
                                <ul>
                                    <li>
                                        <a href="/admin/users" class="">
                                            <span class=""><b>Listar Usuarios</b></span><span class="child-selector ">></span>
                                            <p class="">Edición, altas y bajas de usuarios registrados</p>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col s3 home_admin">
                                <h4>Redes Sociales</h4>
                                <ul>
                                    <li>
                                        <a href="/admin/social" class="">
                                            <span class=""><b>Gestionar Redes Sociales</b></span><span class="child-selector ">></span>
                                            <p class="">Listado de redes sociales, iconos y enlaces web</p>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col s3 home_admin">
                                <h4>Páginas estáticas</h4>
                                <ul>
                                    <li>
                                        <a href="/admin/page_list" class="">
                                            <span class=""><b>Listar Páginas estáticas</b></span><span class="child-selector ">></span>
                                            <p class="">Listado de páginas simples y estáticas (solo texto) como Aviso Legal, Política de privacidad, etc.</p>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col s3 home_admin">
                                <h4>Configuración General</h4>
                                <ul>
                                    <li>
                                        <a href="/admin/general_list" class="">
                                            <span class=""><b>Administración global de la web</b></span><span class="child-selector ">></span>
                                            <p class="">Listado de configuraciones, imagen principal de la web, pie de página, logo, email, etc.</p>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col s3 home_admin">
                                <h4>Campeonato del Mundo Valencia 2023</h4>
                                <ul>
                                    <li>
                                        <a href="/admin/mundial/general" class="">
                                            <span class=""><b>Ajustes generales</b></span><span class="child-selector ">></span>
                                            <p class="">Configuraciones Generales</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/admin/mundial/mundial" class="">
                                            <span class=""><b>Sección Campeonato</b></span><span class="child-selector ">></span>
                                            <p class="">Accesos y Pabellones 1 y 2</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/admin/mundial/valencia" class="">
                                            <span class=""><b>Sección Valencia</b></span><span class="child-selector ">></span>
                                            <p class="">Valencia, Cómo llegar, Alojamientos, Restaurantes y Puntos de interés</p>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection