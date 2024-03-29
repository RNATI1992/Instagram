@extends('layouts.app')

@section('titulo', 'Login')

@section('content')

  <div class="block mx-auto my-12 p-5 bg-red w-1/4 border border-gray-200
  rounded-lg shadow-lg">

 <h1 class="text-5xl text-center pt-5">Iniciar Sesión</h1>
 <p class="text-red-400 text-xs text-center mt-3"> Los campos con asterisco son obligatorios (*) </p>
@if (session('success'))
    <p class="border border-green-500 rounded-md bg-green-100 w-full
      text-green-600 p-2 my-2">{{ session('success') }}</p>
@endif
  <form class="mt-4" method="POST" action="{{ route('login.pag_inicio_usuario') }}">
    @csrf

    <input type="email" class="border border-gray-200 rounded-md bg-gray-200 w-full
    text-lg placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="Email *"
    id="email" name="email">

    @error('email')
      <p class="border border-red-500 rounded-md bg-red-100 w-full
      text-red-600 p-2 my-2">* {{ $message }}</p>
    @enderror

    <input type="password" class="border border-gray-200 rounded-md bg-gray-200 w-full
    text-lg placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="Password *"
    id="password" name="password">

    @error('password')
      <p class="border border-red-500 rounded-md bg-red-100 w-full
      text-red-600 p-2 my-2">* {{ $message }}</p>
    @enderror

    <button type="submit" class="rounded-md bg-green-500 w-full text-lg
    text-white font-semibold p-2 my-3 hover:bg-green-600">Entrar</button>


  </form>


</div>

@endsection
