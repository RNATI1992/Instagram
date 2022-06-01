@extends('layouts.app')    <!--  validado en vez app-->

@section('titulo', 'Inicio')

@section('content')

  <h5>Bienvenido {{ Auth::user()->name }}</h5>
    <div class="flex justify-center items-center h-screen h-full w-full ">
      {{-- <div class="p-5 w-auto bg-red border border-gray-200 rounded-lg shadow-lg"> --}}
        <div class="h-40 w-40">
          @if(auth()->user()->foto_perfil != null)
              <div>
                  <img class="rounded-full h-16 w-16 flex bg-teal-400 m-2 float-right" src="/img/perfil/{{ auth()->user()->foto_perfil }}" alt="">
              </div>
          @else 
              <div class="mx-4 ">
                  <img src="/img/perfil/usuario.png" alt="" height="50" width="50">
              </div>
          @endif
        </div>
        <div class="h-400 w-42 items-center">
            <form class="mt-4" method="POST" action="{{ route('publicaciones.pag_inicio_usuario') }}">
              <p>Imagen:<p>
              <input type="file" class="border border-gray-200 rounded-md bg-gray-200 w-full
              text-lg placeholder-gray-900 p-2 my-2 focus:bg-white" id="foto_perfil" name="foto_perfil">
              <p>Descripción:<p>
              <textarea name="caja_comentario" class="w-full"> </textarea>
              <button type="submit" class="rounded-md bg-indigo-500 w-full text-lg
              text-white font-semibold p-2 my-3 hover:bg-indigo-600">Publicar</button>
            </form>

        </div>
      {{-- </div> --}}
    </div>
  {{-- flex mx-8 my-12 items-center p-5 bg-red w-52 border border-gray-200
  rounded-lg shadow-lg --}}

@endsection
