@extends('layouts.tampilan')

@section('header')
<h2>manajemen user</h2>
@endsection

@section('content')

    <div class="py-12">
        @if(session()->has('message'))
        <div class="p-3 rounded bg-green-500 text-greeb-100my-2">
            {{session('message')}}
        </div>
        @endif
        <div class ="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-start mt-10">
        <a href = "{{route('user.create')}}">
        <x-button class="ml-4">
        tambah user
        </x-button>
        </a>
        </div>

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b  border-gray-200">

            <div class="relative overflow-x-auto shadow-md sm:ronded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-500 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                no
                </th>
                <th scope="col" class="px-6 py-3">
                nama
                </th>
            
                <th scope="col" class="px-6 py-3">
               nomor
                </th>
                
                <th scope="col" class="px-6 py-3">
                role
                </th>
                <th scope="col" class="px-6 py-3">
                Alamat
                </th>
                <th scope="col" class="px-6 py-3">
                telepon
                </th>
                <th scope="col" class="px-6 py-3">
                edit
                </th>
                
            </tr>
            </thead>

            <tbody>
            @foreach($user as $user)
            <tr>
            <td class="px-6 py-4">
            {{$loop->iteration}}
            </td>
            <td class="px-6 py-4">
            {{$user->name}}
            </td>
            <td class="px-6 py-4">
            {{$user->email}}
            </td>
            <td class="px-6 py-4">
            {{$user->role}}
            </td>
            <td class="px-6 py-4">
            {{$user->Alamat}}
            </td>
            <td class="px-6 py-4">
            {{$user->telepon}}
            </td>
            <td class="px-6 py-4text-right">
            <a href="{{route('user.edit',$user->id)}}" class="font-medium text-blue-600 dark:text-blue-500 hover:undrline">edit</a>
            <form action="{{route('user.delete',$user->id)}}" method="POST">
            @csrf
            @method('DELETE')

            <button type="submit">hapus </button>
            </form>
                </td>
        <tr>
     @endforeach
            </tbody>
            </table>
            </div>
            </div>
        </div>
    </div>
@endsection