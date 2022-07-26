@extends('layouts.tampilan')

@section('header')
<h2 class="font-semibold text-xl text-gray-800 leading-tight">tambah user</h2>
@endsection

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!--validation errors-->
                <form  method="POST" action="{{route('user.store')}}">
                @csrf 

                <!--name-->
                <div>
                <label class="block text-sm font-medium text-gray-700" for="nama">nama</label>

                <input 
                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 
                focus:ring focus:ring-indigo-200 focus:ring-opacity-50" 
                type="text" name="nama" placeholder="masukan nama" value="{{old('nama')}}">

                @error('nama')
                <span class="text-red-600 text-sm">
                {{$message}}
                </span>
                @enderror
                </div>

                <!--alamat-->
                <div class="mt-4">
                <label class="block text-sm font-medium text-gray-700" for="text-area">alamat</label>

                <textarea id="text-area"
                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 
                focus:ring focus:ring-indigo-200 focus:ring-opacity-50" 
                type="text-area" name="text-area" placeholder="masukan alamat" value="{{old('text-area')}}"></textarea>

                @error('email')
                <span class="text-red-600 text-sm">
                {{$message}}
                </span>
                @enderror
                </div>

                <!--No telp-->
                <div>
                <label class="block text-sm font-medium text-gray-700" for="telepon">telepon</label>

                <input 
                
                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 
                focus:ring focus:ring-indigo-200 focus:ring-opacity-50" 
                type="telp" name="telepon" placeholder="masukan No telp" value="{{old('telepon')}}">

                @error('telepon')
                <span class="text-red-600 text-sm">
                {{$message}}
                </span>
                @enderror
                </div>

                    <!--email-->
                <div class="mt-4">
                <label class="block text-sm font-medium text-gray-700" for="email">email</label>

                <input id="email"
                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 
                focus:ring focus:ring-indigo-200 focus:ring-opacity-50" 
                type="email" name="email" placeholder="masukan email" value="{{old('email')}}">

                @error('email')
                <span class="text-red-600 text-sm">
                {{$message}}
                </span>
                @enderror
                </div>

                <!--password-->
                <div>
                <label class="block text-sm font-medium text-gray-700" for="password">password</label>

                <input 
                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 
                focus:ring focus:ring-indigo-200 focus:ring-opacity-50" 
                type="password" name="password" placeholder="masukan password" value="{{old('password')}}">

                @error('password')
                <span class="text-red-600 text-sm">
                {{$message}}
                </span>
                @enderror
                </div>
                <!--role-->
                <div class="mt-4">
                <label class="block text-sm font-medium text-gray-700" for="role">role</label>

                <select name="role"
                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 
                focus:ring focus:ring-indigo-200 focus:ring-opacity-50" id="role" value="old('role')" require>
                    <option value="admin">admin</option>
                    <option value="kasir">kasir</option>
                    <option value="karyawan">karyawan</option>
                    <option value="user">user</option>
        </select>
                @error('role')
                <span class="text-red-600 text-sm">
                {{$message}}
                </span>
                @enderror
                </div>
                <div>

                <div class="flex-item-center justify-end mt-4">

                <x-button class="ml-4">
                simpan data
                </x-button>
                
                </div>
                </form>
                </div>
                </div>
                </div>
                </div>
                @endsection 