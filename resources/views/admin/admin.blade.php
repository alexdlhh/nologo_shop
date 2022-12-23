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
                    <div class="card-content">
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
                                            <p class="">Listado de noticias de la federación</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/admin/categoriesNew" class="">
                                            <span class=""><b>Categorias</b></span><span class="child-selector ">></span>
                                            <p class="">Administrar Categorías de noticias</p>
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
                                            <p class="">Lista de empleados de RFEF</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/admin/rfeg" class="">
                                            <span class=""><b>Administrar</b></span><span class="child-selector ">></span>
                                            <p class="">Administrar contenido RFEF</p>
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
                                            <p class="">Administrar caracteristicas generales de especialidades RFEF</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/admin/calendario" class="">
                                            <span class=""><b>Calendario</b></span><span class="child-selector ">></span>
                                            <p class="">Administrar calendarios nacionales e internacionales de especialidades RFEF</p>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col s3 home_admin">
                                <h4>Media</h4>
                                <ul>
                                    <li>
                                        <a href="/admin/colecciones" class="">
                                            <span class=""><b>Listar Colecciones</b></span><span class="child-selector ">></span>
                                            <p class="">Administrar conjunto de fotos y videos</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/admin/media/create" class="">
                                            <span class=""><b>Añadir Fotos y Videos</b></span><span class="child-selector ">></span>
                                            <p class="">Añadir nuevo recurso gráfico</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/admin/albums" class="">
                                            <span class=""><b>Listar Album</b></span><span class="child-selector ">></span>
                                            <p class="">Administrar conjunto de revistas</p>
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
                                            <span class=""><b>Listar Patrocinadores</b></span><span class="child-selector ">></span>
                                            <p class="">Listado de Patrocinadores y posiciones</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/admin/banners" class="">
                                            <span class=""><b>Listar Banners</b></span><span class="child-selector ">></span>
                                            <p class="">Listado de Banners de la web</p>
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
                                            <p class="">Normativa de escuelas y cursos RFEG</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/admin/courses" class="">
                                            <span class=""><b>Listar Cursos</b></span><span class="child-selector ">></span>
                                            <p class="">Listado de cursos RFEG</p>
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
                                            <p class="">Listado de usuarios registrados</p>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col s3 home_admin">
                                <h4>Redes Sociales</h4>
                                <ul>
                                    <li>
                                        <a href="/admin/social" class="">
                                            <span class=""><b>Listar Redes Sociales</b></span><span class="child-selector ">></span>
                                            <p class="">Listado de redes sociales de RFEG</p>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col s3 home_admin">
                                <h4>Páginas</h4>
                                <ul>
                                    <li>
                                        <a href="/admin/page_list" class="">
                                            <span class=""><b>Listar Páginas</b></span><span class="child-selector ">></span>
                                            <p class="">Listado de páginas simples y estáticas (solo texto)</p>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col s3 home_admin">
                                <h4>Configuración</h4>
                                <ul>
                                    <li>
                                        <a href="/admin/general_list" class="">
                                            <span class=""><b>Administrar</b></span><span class="child-selector ">></span>
                                            <p class="">Listado de configuraciones, imagen principal de la web, pie de página, logo, email, etc.</p>
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