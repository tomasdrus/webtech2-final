@extends('layouts.master')
@section('title', 'Admin - login')
@section('content')

<div class="flex items-center justify-center h-screen">
    <form action="{{route('admin.check')}}" method="post" class="p-8 max-w-md flex-grow bg-white rounded-xl">

        <h1 class="text-xl mb-7 text-gray-900 text-center font-bold">Admin login</h1>

        @if (Session::get('error'))
            <p>{{ Session::get('error') }}</p>
        @endif
    
        <label for="email" class="font-semibold text-sm text-gray-900 mb-2 block">Email
            <span class="text-red-500 ml-1">@error('email') {{$message}} @enderror</span>
        </label>
        <input type="email" name="email" value="{{ old('email') }}" class="auth__input">
    
        <label for="password" class="font-semibold text-sm text-gray-900 mb-2 block">Password
            <span class="text-red-500 ml-1">@error('password') {{$message}} @enderror</span>
        </label>
        <input type="password" name="password" value="{{ old('password') }}" class="auth__input">
    
        @csrf

        <p class="mb-5 text-gray-900 text-sm">Don`t have an account? 
            <a href="{{route('admin.registration')}}" class="text-blue-500 hover:text-blue-600 font-semibold">register here</a>.
        </p>
    
        <button type="submit" class="auth__button">Login</button>
    </form>
</div>

@endsection