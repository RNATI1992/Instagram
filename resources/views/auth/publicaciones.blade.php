@extends('layouts.app')    <!--  validado en vez app-->

@section('titulo', 'Inicio')

@section('content')

  <div class="block mx-auto my-12 p-5 bg-red w-1/4 border border-gray-200
  rounded-lg shadow-lg">
    {{Auth::user()->name}}
    <h1 class="text-5xl text-center pt-5">Instagral</h1>
      <div class="izquierda ">
        mini
      </div>
      <div class="centro">
        <div>
          <form class="mt-4" method="POST" action="{{ route('publicaciones.pag_inicio_usuario') }}">
            <input type="text" name="caja_comentario">

        
            <!-- comentarios --> medio
      </div>
  </div>

@endsection
