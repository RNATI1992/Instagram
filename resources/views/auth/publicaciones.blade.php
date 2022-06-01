@extends('layouts.app')    <!--  validado en vez app-->

@section('titulo', 'Inicio')

@section('content')

  <div class="block mx-auto my-12 p-5 bg-red w-1/4 border border-gray-200
  rounded-lg shadow-lg">
  @if (session('success'))
    <p class="border border-green-500 rounded-md bg-green-100 w-full
      text-green-600 p-2 my-2">{{ session('success') }}</p>
    @endif
    <h5>Bienvenido {{ Auth::user()->name }}</h5>
    <h1 class="text-5xl text-center pt-5">Instagral</h1>
      <div class="float-left sticky">
        @if(auth()->user()->foto_perfil != null)
            <div class="">
                <img class="rounded-full h-16 w-16 flex bg-teal-400 m-2" src="/img/perfil/{{ auth()->user()->foto_perfil }}" alt="">
            </div>
        @else
            <div class="mx-4">
                <img src="/img/perfil/usuario.png" alt="" height="50" width="50">
            </div>
        @endif
      </div>
      <div class="float-right">
          <form class="mt-4" method="POST" action="{{ route('publicaciones.pag_inicio_usuario') }}">
            <p>Comentar:<p>
            <textarea name="caja_comentario"> </textarea>
          </form>

            <!-- comentarios --> medio
      </div>
  </div>

@endsection
