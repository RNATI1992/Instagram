@extends('layouts.app')

@section('titulo', 'Registro')

@section('content')

  <div class="mx-12 my-12 p-5 bg-red w-1/1 border border-gray-200
  rounded-lg shadow-lg">

  <h1 class="text-5xl text-center ">Perfil</h1>
  <p class="text-red-400 text-xs text-center mt-3"> Los campos con asterisco no se pueden modificar (*) </p>

  <form class="flex flex-wrap mt-4 justify-center w-1/1" method="POST" action="{{ route('perfil.actualizar') }}"  enctype="multipart/form-data">
    @csrf
    <div class="flex flex-wrap w-2/3">
        <div class="my-3 w-2/5 mx-5">
            <label class="font-bold">Nombre</label>
            <input type="text" class="text-red-400 border border-gray-200 rounded-md bg-gray-200 w-full
            text-lg placeholder-gray-900 p-2 my-2 focus:bg-white" value="{{ auth()->user()->name }}"
            id="new_name" name="new_name">
            @error('new_name')
                <p class="border border-red-500 rounded-md bg-red-100 w-full
                text-red-600 p-2 my-2">* {{ $message }}</p>
            @enderror
        </div>

        <div class="my-3 w-2/5 mx-5">
            <label class="font-bold">Apellidos</label>
            <input type="text" class="text-red-400 border border-gray-200 rounded-md bg-gray-200 w-full
            text-lg placeholder-gray-900 p-2 my-2 focus:bg-white" value="{{ auth()->user()->surname }}"
            id="new_surname" name="new_surname">
            @error('new_surname')
                <p class="border border-red-500 rounded-md bg-red-100 w-full
                text-red-600 p-2 my-2">* {{ $message }}</p>
            @enderror
        </div>

        <div class="my-3 w-2/5 mx-5">
            <label class="font-bold">Nick <span class="text-red-400">*</span></label>
            <input type="text" class="text-red-400 border border-gray-200 rounded-md bg-gray-200 w-full
            text-lg placeholder-gray-900 p-2 my-2 focus:bg-white" value="{{ auth()->user()->nick }}"
            id="new_nick" name="new_nick" disabled>
            @error('new_nick')
                <p class="border border-red-500 rounded-md bg-red-100 w-full
                text-red-600 p-2 my-2">* {{ $message }}</p>
            @enderror
        </div>

        <div class="my-3 w-2/5 mx-5">
            <label class="font-bold">Email <span class="text-red-400">*</span></label>
            <input type="email" class="text-red-400 border border-gray-200 rounded-md bg-gray-200 w-full
            text-lg placeholder-gray-900 p-2 my-2 focus:bg-white" value="{{ auth()->user()->email }}"
            id="new_email" name="new_email" disabled>
            @error('new_email')
                <p class="text-red-400 border border-red-500 rounded-md bg-red-100 w-full
                text-red-600 p-2 my-2">* {{ $message }}</p>
            @enderror
        </div>

        <div class="my-3 w-2/5 mx-5">
            <label class="font-bold">New Password</label>
            <input type="password" class="border border-gray-200 rounded-md bg-gray-200 w-full
            text-lg placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="New Password"
            id="new_password" name="new_password">
            @error('new_password')
                <p class="border border-red-500 rounded-md bg-red-100 w-full
                text-red-600 p-2 my-2">* {{ $message }}</p>
            @enderror
        </div>

        <div class="my-3 w-2/5 mx-5">
            <label class="font-bold">New Password confirmation</label>
            <input type="password" class="border border-gray-200 rounded-md bg-gray-200
            w-full text-lg placeholder-gray-900 p-2 my-2 focus:bg-white"
            placeholder="New Password confirmation *" id="new_password_confirmation"
            name="new_password_confirmation">
            @error('new_password_confirmation')
                <p class="border border-red-500 rounded-md bg-red-100 w-full
                text-red-600 p-2 my-2">* {{ $message }}</p>
            @enderror
        </div>

        <div class="my-3 w-2/5 mx-5">
            <label class="font-bold">Foto Perfil</label>
            <input type="file" class="border border-gray-200 rounded-md bg-gray-200 w-full
            text-lg placeholder-gray-900 p-2 my-2 focus:bg-white" id="new_foto_perfil" name="new_foto_perfil">
        </div>

        <div class="my-3 w-2/5 mx-5">
            <button type="submit" class="rounded-md bg-indigo-500 text-lg
            text-white font-semibold p-2 my-3 hover:bg-indigo-600 w-1/2">Actualizar</button>
            <a href="{{ route('login.destroy') }}" class="font-bold text-white
            py-3 px-4 rounded-md bg-red-500 hover:bg-red-600">Cerrar sesion</a>
        </div>



    </div>
    <div class="my-20">
        <img class="rounded-full h-48 w-48 flex bg-teal-400 m-2" src="/img/perfil/{{ auth()->user()->foto_perfil }}" alt="">
    </div>



  </form>




</div>

@endsection
