{{-- $categorias viene del service provider --}}
<header class="hm-header">
    <nav class="hm-navbar">
        {{-- <a href="#" class="hm-nav-logo">WebDev.</a> --}}
        <ul class="hm-nav-menu">
            @foreach ($categorias as $categoria)
                <li class="hm-nav-item">
                    <a
                        {{-- class="text-white text-sm uppercase font-bold p-3" --}}
                        class="hm-nav-link"
                        href="{{ route('categorias.show', ['categoria' => $categoria->id ])}} "
                    >
                        {{$categoria->nombre}}
                    </a>
                </li>
            @endforeach
        </ul>
        <div class="hm-hamburger">
            <span class="hm-bar"></span>
            <span class="hm-bar"></span>
            <span class="hm-bar"></span>
        </div>
    </nav>
</header>


