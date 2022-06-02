@extends('layouts.app')    <!--  validado en vez app-->

@section('titulo', 'Inicio')

@section('content')

    <div class="flex flex-wrap justify-center h-screen h-auto w-full ">

      <div class="flex flex-col min-h-screen justify-center items-center">
        <div class="w-2/4 mx-15">
          <p class="text-2xl font-bold text-center">Listado de mis Publicaciones</p>

          <ul class="justify-items-center">
              @foreach ($publicaciones as $publicacion)
                @php
                  $user = DB::table('users')->where('id', $publicacion->usu_id)->first();
                @endphp
                <li class="border border-gray-200 rounded-lg shadow-lg p-5 mt-7 mx-7 w-42">
                    <p class="text-xl">Usuario: <span class="font-bold">{{ $user->nick }}</span></p>
                    <h6 class="text-lg font-bold text-center">{{ $publicacion->nombre }}</h6>

                    <img src="img/publicacion/{{ $publicacion->foto }}" alt="No hi ha foto">

                    @php
                        $likes = DB::table('likes')->where('publi_id', $publicacion->id);
                        $likesCount = $likes->count();
                    @endphp
                    <div class="flex justify-end">
                        <p class="mx-8 font-bold">{{ $publicacion->created_at }}</p>
                        <p class="my-2 font-bold text-2xl w-96 text-right">{{ $likesCount }}</p>
                        <a href="{{ url("likes/{$publicacion->id}") }}"><img src="img/logo/me-gusta.png" alt="No hi ha foto"></a>
                    </div>
                    <p class="my-6">Descripción: {{ $publicacion->descripcion }}</p>

                    <p> Comentarios: </p>
                    <div class="border border-black-200 rounded-lg shadow-lg p-5 mt-2 mx-3">

                    </div>

                </li>

              @endforeach

          </ul>
        </div>
      <div>
@endsection
