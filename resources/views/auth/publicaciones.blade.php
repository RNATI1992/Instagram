@extends('layouts.app')    <!--  validado en vez app-->

@section('titulo', 'Inicio')

@section('content')

    <div class="flex flex-wrap justify-center h-screen h-full w-full ">

      {{-- <div class="p-5 w-auto bg-red border border-gray-200 rounded-lg shadow-lg"> --}}
        <div class="h-40 w-40 my-4">
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
        <div class="my-4 border border-gray-200 rounded-lg shadow-lg p-5">
            @if (session('success'))
                <p class="border border-green-500 rounded-md bg-green-100
                text-green-600 p-2 my-2">{{ session('success') }}</p>
            @endif
            <form class="mt-4" method="POST" action="{{ route('publicaciones.create') }}" enctype="multipart/form-data">
                @csrf
                <div class="w-full">
                    <label class="font-bold">Título</label>
                    @error('titulo')
                        <p class="border border-red-500 rounded-md bg-red-100 w-full
                        text-red-600 p-2 my-2">* {{ $message }}</p>
                    @enderror
                    <input type="text" class="text-red-400 border border-gray-200 rounded-md bg-gray-200 w-full
                    text-lg placeholder-gray-900 p-2 my-2 focus:bg-white" id="titulo" name="titulo">
                </div>

                <div class="w-full">
                    <label class="font-bold">Imagen</label>
                    @error('foto')
                        <p class="border border-red-500 rounded-md bg-red-100 w-full
                        text-red-600 p-2 my-2">* {{ $message }}</p>
                    @enderror
                    <input type="file" class="border border-gray-200 rounded-md bg-gray-200 w-full
                    text-lg placeholder-gray-900 p-2 my-2 focus:bg-white" id="foto" name="foto">
                </div>

                <div class="w-full">
                    <label class="font-bold">Descripción</label>
                    @error('descripcion')
                        <p class="border border-red-500 rounded-md bg-red-100 w-full
                        text-red-600 p-2 my-2">* {{ $message }}</p>
                    @enderror
                    <textarea name="descripcion" id="descripcion" class="w-full rounded-md bg-gray-200"> </textarea>
                </div>

                <button type="submit" class="rounded-md bg-indigo-500 w-full text-lg
                text-white font-semibold p-2 my-3 hover:bg-indigo-600">Publicar</button>
            </form>
        </div>
        <div class="h-96 w-full my-7 mx-10 border border-gray-200 rounded-lg shadow-lg p-5">
            <p class="text-2xl font-bold text-center">Listado de todas las Publicaciones</p>

            <ul class="justify-center">
                @foreach ($publicaciones as $publicacion)
                    @php
                        $user = DB::table('users')->where('id', $publicacion->usu_id)->first();
                    @endphp

                    <li class="border border-gray-200 rounded-lg shadow-lg p-5 mt-7 mx-7">
                        {{ $user->nick }}
                        {{ $publicacion->nombre }}
                        {{ $publicacion->descripcion }}
                        {{ $publicacion->foto }}
                        {{ $publicacion->created_at }}

                    </li>

                @endforeach
            </ul>

        </div>

    </div>
  {{-- flex mx-8 my-12 items-center p-5 bg-red w-52 border border-gray-200
  rounded-lg shadow-lg --}}

@endsection
