@extends('layouts.app')    <!--  validado en vez app-->

@section('titulo', 'Publicaciones')

@section('content')

  <div class="padre block mx-auto my-12 p-5 bg-red w-1/4 border border-gray-200
  rounded-lg shadow-lg">

    <h1 class="text-5xl text-center pt-5">Instagral</h1>
      <div class="izquierda ">
        Bienvenido {{ Auth::user()->name }}
      </div>
      <div class="centro ">
      <!-- comentarios --> medio
      </div>
  </div>

@endsection
