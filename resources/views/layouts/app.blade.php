<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('titulo') || Instargral</title>

    <!-- Tailwind CSS Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.0.1/tailwind.min.css">
  </head>
  <body class="bg-white-100 text-gray-800">

    <nav class="flex bg-indigo-500 text-white">
      <div class="px-5">
        <a href="{{ route('publicaciones.index') }}"><img src="/img/logo/instargral.png" alt=""></a>
      </div>

      <div class="w-1/2 px-1 mr-auto py-7">
        <p class="text-2xl font-bold">Instargral</p>
      </div>

      <ul class="w-1/2 px-16 ml-auto flex justify-end pt-1">
      @if(auth()->check())
        <li class="mx-8 my-6">
          <h5>Bienvenido <b>{{ auth()->user()->name }}</b></h5>
        </li>
        @if(auth()->user()->foto_perfil != null)
            <li class="mx-1">
                <a href="{{ route('perfil') }}"><img class="rounded-full h-16 w-16 flex bg-teal-400 m-2" src="/img/perfil/{{ auth()->user()->foto_perfil }}" alt=""></a>
            </li>
        @else
            <li class="mx-4">
                <a href="{{ route('perfil') }}"><img src="/img/perfil/usuario.png" alt="" height="50" width="50"></a>

            </li>

        @endif
      @else
        <li class="mx-6 my-7">
          <a href="{{ route('login') }}" class="font-semibold
          hover:bg-indigo-700 py-3 bg-green-500 px-4 rounded-md">Conectarse</a>
        </li>
        <li class="my-7">
          <a href="{{ route('registro.index') }}" class="font-semibold
          border-2 border-white py-2 px-4 rounded-md hover:bg-white
          hover:text-indigo-700">Registrar</a>
        </li>
      @endif
      </ul>

    </nav>


    @yield('content')


  </body>
</html>
