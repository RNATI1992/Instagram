@extends('layouts.app')

@section('titulo', 'Registro')

@section('content')

  <div class="block mx-auto my-12 p-5 bg-red w-1/3 border border-gray-200
  rounded-lg shadow-lg">

  <h1 class="text-5xl text-center ">Registro</h1>
  <p class="text-red-400 text-xs text-center mt-3"> Los campos con asterisco son obligatorios (*) </p>

  <form class="mt-4" method="POST" action=""  enctype="multipart/form-data">
    @csrf

    <p class="text-red-400 text-xs text-left mt-3"> Nombre: (*) </p>
    <input type="text" class="text-red-400 border border-gray-200 rounded-md bg-gray-200 w-full
    text-lg placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="Nombre *"
    id="name" name="name">

    @error('name')
      <p class="border border-red-500 rounded-md bg-red-100 w-full
      text-red-600 p-2 my-2">* {{ $message }}</p>
    @enderror

    <p class="text-red-400 text-xs text-left mt-3"> Apellido: (*) </p>
    <input type="text" class="text-red-400 border border-gray-200 rounded-md bg-gray-200 w-full
    text-lg placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="Apellido *"
    id="surname" name="surname">

    @error('surname')
      <p class="border border-red-500 rounded-md bg-red-100 w-full
      text-red-600 p-2 my-2">* {{ $message }}</p>
    @enderror

    <p class="text-red-400 text-xs text-left mt-3"> Nick: (*) </p>
    <input type="text" class="text-red-400 border border-gray-200 rounded-md bg-gray-200 w-full
    text-lg placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="Nick *"
    id="nick" name="nick">

    @error('nick')
      <p class="border border-red-500 rounded-md bg-red-100 w-full
      text-red-600 p-2 my-2">* {{ $message }}</p>
    @enderror

    <p class="text-red-400 text-xs text-left mt-3"> Email: (*) </p>
    <input type="email" class="text-red-400 border border-gray-200 rounded-md bg-gray-200 w-full
    text-lg placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="Email *"
    id="email" name="email">

    @error('email')
      <p class="text-red-400 border border-red-500 rounded-md bg-red-100 w-full
      text-red-600 p-2 my-2">* {{ $message }}</p>
    @enderror

    <p class="text-red-400 text-xs text-left mt-3"> Password: (*) </p>
    <input type="password" class="border border-gray-200 rounded-md bg-gray-200 w-full
    text-lg placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="Password"
    id="password" name="password">

    @error('password')
      <p class="border border-red-500 rounded-md bg-red-100 w-full
      text-red-600 p-2 my-2">* {{ $message }}</p>
    @enderror


    <input type="password" class="border border-gray-200 rounded-md bg-gray-200
    w-full text-lg placeholder-gray-900 p-2 my-2 focus:bg-white"
    placeholder="Password confirmation" id="password_confirmation"
    name="password_confirmation">


    <input type="file" class="border border-gray-200 rounded-md bg-gray-200 w-full
    text-lg placeholder-gray-900 p-2 my-2 focus:bg-white" id="Imagen" name="Imagen">

    <button type="submit" class="rounded-md bg-indigo-500 w-full text-lg
    text-white font-semibold p-2 my-3 hover:bg-indigo-600">Registrarse</button>

  </form>


</div>

@endsection
