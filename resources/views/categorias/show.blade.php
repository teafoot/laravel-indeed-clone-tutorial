@extends ('layouts.app')

@section('navegacion')
    {{-- esta parte solo funciona por el service provider CategoriasProvider --}}
    @include('ui.categoriasnav')
@endsection

{{-- Pagina frontend - vacantes por categoria --}}
@section('content')
    <div class="my-10 bg-gray-100 p-10 shadow">
        <h1 class="text-3xl text-gray-700 m-0">
            Categoría:
            <span class="font-bold">{{$categoria->nombre}} </span>
        </h1>

        @include('ui.listadovacantes')
    </div>
@endsection
