@extends('layouts.app')    <!--  validado en vez app-->

@section('titulo', 'Inicio')

@section('content')

    <div class="flex flex-wrap justify-center h-screen h-auto w-full ">

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
      </div>
      <div class="flex flex-col min-h-screen justify-center items-center">
        <div class="w-2/4 mx-15">
          <p class="text-2xl font-bold text-center">Listado de todas las Publicaciones</p>

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
                    <div class="flex place-content-between">
                      <div>
                          <p class="font-bold">{{ $publicacion->created_at }}</p>
                      </div>
                      <div class="flex">
                          <p class="font-bold text-2xl">{{ $likesCount }}</p>
                          <a href="{{ url("likes/{$publicacion->id}") }}"><img src="img/logo/me-gusta.png" alt="No hi ha foto" height="30px" width="30px"></a>
                      </div>
                      {{-- <div>
                          <a href="{{ url("likes/{$publicacion->id}") }}"><img src="img/logo/me-gusta.png" alt="No hi ha foto"></a>
                      </div> --}}
                    </div>
                    <p class="my-6">Descripción: {{ $publicacion->descripcion }}</p>

                    <p> Comentarios: </p>
                    <div class="border border-black-200 rounded-lg shadow-lg p-5 mt-2 mx-3">

                    </div>
                    <form class="mt-4" method="POST" action="{{ url("comentarios/{$publicacion->id}"),  }}" enctype="multipart/form-data">
                      @csrf {{-- @csrf  importante si no la pagin expira--}}
                      <div class="border border-black-200 rounded-lg shadow-lg mt-2 ">
                        <textarea name="comentario" id="comentario" class="w-full rounded-md bg-gray-200"> </textarea>
                        @error('comentario')
                          <p class="border border-red-500 rounded-md bg-red-100 w-full
                          text-red-600 p-2 my-2">* {{ $message }}</p>
                        @enderror
                      </div>
                      <div class="justify-items-center">
                        <button type="submit" class="rounded-md bg-indigo-500  text-lg
                        text-white font-semibold p-2 my-3 hover:bg-indigo-600">Publicar</button>
                      </div>
                    </form>
                    @php
                      $comentarios = DB::table('comentarios')->where('publi_id', $publicacion->id);
                    @endphp
                    @foreach ($comentarios as $comentario)
                      {{$comentario->contenido}}
                      {{$comentario->created_at}}
                      {{$comentario->usu_id}}
                      

                      
                    @endforeach
                </li>

              @endforeach

          </ul>
        </div>
      <div>
  {{-- flex mx-8 my-12 items-center p-5 bg-red w-52 border border-gray-200
  rounded-lg shadow-lg --}}

@endsection
