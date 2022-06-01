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
      <div class="w-1/2 px-12 mr-auto py-6">
        <p class="text-2xl font-bold">Instargral</p>
      </div>

      <ul class="w-1/2 px-16 ml-auto flex justify-end pt-1">
      @if(auth()->check())
        <li class="mx-8 my-6">
          <p class="text-xl"><b>{{ auth()->user()->name }}</b></p>
        </li>
        @if(auth()->user()->foto_perfil != null)
            <li class="mx-1">
                <img class="rounded-full h-16 w-16 flex bg-teal-400 m-2" src="/img/perfil/{{ auth()->user()->foto_perfil }}" alt="">
            </li>
        @else
            <li class="mx-4">
                <img src="/img/perfil/usuario.png" alt="" height="50" width="50">
            </li>

        @endif
        <li class="mx-6 my-3">
          <a href="{{ route('login.destroy') }}" class="font-bold
          py-3 px-4 rounded-md bg-red-500 hover:bg-red-600">Cerrar sesion</a>
        </li>
      @else
        <li class="mx-6 my-2">
          <a href="{{ route('login') }}" class="font-semibold
          hover:bg-indigo-700 py-3 bg-green-500 px-4 rounded-md">Conectarse</a>
        </li>
        <li class="my-2">
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
