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

                    @foreach ($comentarios as $comentario)
                        @php
                            $miComentario = DB::table('comentarios')->where('publi_id', $publicacion->id)->where('id', $comentario->id);
                            $miComentarioCount = $miComentario->count();

                            $user = DB::table('users')->where('id', $comentario->usu_id)->first();
                        @endphp

                        @if ($miComentarioCount > 0)
                            <div class="border border-black-200 rounded-lg shadow-lg mt-2 p-5">
                                <p class="">Usuario: <span class="font-bold">{{ $user->nick }}</span></p>
                                <p>{{ $comentario->contenido }}</p>
                                <p class="font-bold">{{ $comentario->created_at }}</p>

                            </div>

                        @endif

                    @endforeach


                </li>

              @endforeach

          </ul>
        </div>
      <div>
@endsection
