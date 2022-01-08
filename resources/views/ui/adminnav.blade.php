{{-- $categorias viene del service provider --}}
<header class="hm-header">
    <nav class="hm-navbar">
        {{-- <a href="#" class="hm-nav-logo">WebDev.</a> --}}
        <ul class="hm-nav-menu">
            <li class="hm-nav-item">
                {{-- highlight si el request es la pagina actual --}}
                <a class="inline-block text-white text-sm uppercase font-bold p-3 mr-2 {{Request::is('vacantes') ? 'bg-teal-900' : 'bg-teal-500' }} " href="{{ route('vacantes.index') }}">Ver Vacantes</a>
                <a class="inline-block text-white text-sm uppercase font-bold p-3 {{Request::is('vacantes/create') ? 'bg-teal-900' : 'bg-teal-500' }} " href="{{ route('vacantes.create') }}">Nueva Vacante</a>
            </li>
        </ul>
        <div class="hm-hamburger">
            <span class="hm-bar"></span>
            <span class="hm-bar"></span>
            <span class="hm-bar"></span>
        </div>
    </nav>
</header>




