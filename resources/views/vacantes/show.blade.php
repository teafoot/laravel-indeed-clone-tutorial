@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.1/css/lightbox.min.css" integrity="sha256-tBxlolRHP9uMsEFKVk+hk//ekOlXOixLKvye5W2WR5c=" crossorigin="anonymous" />
    {{-- lightbox2 javascript ya fue required en app.js y su dependencia a jquery en webpack.mix.js --}}
@endsection

@section('navegacion')
    @include('ui.categoriasnav')
@endsection

@section('content')
    <h1 class="text-3xl text-center mt-10"> {{$vacante->titulo}} </h1>

    <div class="mt-10 mb-20 md:flex items-start">
        <div class="md:w-3/5">
            <p class="block text-gray-700 font-bold my-2">
                Publicado <span class="font-normal"> {{$vacante->created_at->diffForHumans() }}  </span>{{-- Carbon de laravel --}}
                por: <span class="font-normal"> {{$vacante->reclutador->name}} </span>
            </p>
            <p class="block text-gray-700 font-bold my-2">
                Categoría: <span class="font-normal"> {{$vacante->categoria->nombre}} </span>
            </p>
            <p class="block text-gray-700 font-bold my-2">
                Salario: <span class="font-normal"> {{$vacante->salario->nombre}} </span>
            </p>
            <p class="block text-gray-700 font-bold my-2">
                Ubicación: <span class="font-normal"> {{$vacante->ubicacion->nombre}} </span>
            </p>
            <p class="block text-gray-700 font-bold my-2">
                Experiencia: <span class="font-normal"> {{$vacante->experiencia->nombre}} </span>
            </p>

            <h2 class="text-2xl text-center mt-10 text-gray-700 mb-5">Conocimientos y Tecnologías</h2>
            @php
                $arraySkills = explode(",", $vacante->skills)
            @endphp
            @foreach($arraySkills as $skill)
                <p class="inline-block border border-gray-400 rounded py-2 px-8 text-gray-700  my-2">
                    {{$skill}}
                </p>
            @endforeach
            <a href="/storage/vacantes/{{$vacante->imagen}}" data-lightbox="imagen" data-title="Vacante {{ $vacante->titulo}} ">
                <img src="/storage/vacantes/{{ $vacante->imagen }}" class="w-40 mt-10">
                {{-- src="/storage/vacantes/1589309896.jpeg" --}}
                {{-- src="http://127.0.0.1:8000/storage/vacantes/1589309896.jpeg" --}}
            </a>
            <div class="descripcion mt-10 mb-5">
                {!! $vacante->descripcion  !!}
            </div>
        </div>

        {{-- Formulario de contacto al reclutador --}}
        @if($vacante->activa === 1 )
            @include('ui.contacto')
        @endif
    </div>
@endsection
