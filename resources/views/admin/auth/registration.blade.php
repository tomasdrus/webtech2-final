@extends('layouts.master')
@section('title', 'Admin - registration')
@section('content')


<div class="flex items-center justify-center h-screen">
    <form action="{{route('admin.save')}}" method="post" class="p-8 max-w-md flex-grow bg-white rounded-xl">

        <h1 class="text-xl mb-7 text-gray-900 text-center font-bold">Admin registration</h1>

        @if (Session::get('success'))
            <p>{{ Session::get('success') }}</p>
        @endif

        @if (Session::get('error'))
            <p>{{ Session::get('error') }}</p>
        @endif
    
        <label for="forename" class="font-semibold text-sm text-gray-900 mb-2 block">Forename
            <span class="text-red-500 ml-1">@error('forename') {{$message}} @enderror</span>
        </label>
        <input type="text" name="forename" value="{{ old('forename') }}" class="border border-gray-600 rounded-md px-3 py-2 mb-5 text-sm w-full focus:outline-none focus:ring-1 focus:ring-blue-600">

        <label for="surname" class="font-semibold text-sm text-gray-900 mb-2 block">Surname
            <span class="text-red-500 ml-1">@error('surname') {{$message}} @enderror</span>
        </label>
        <input type="text" name="surname" value="{{ old('surname') }}" class="border border-gray-600 rounded-md px-3 py-2 mb-5 text-sm w-full focus:outline-none focus:ring-1 focus:ring-blue-600">

        <label for="email" class="font-semibold text-sm text-gray-900 mb-2 block">Email
            <span class="text-red-500 ml-1">@error('email') {{$message}} @enderror</span>
        </label>
        <input type="email" name="email" value="{{ old('email') }}" class="border border-gray-600 rounded-md px-3 py-2 mb-5 text-sm w-full focus:outline-none focus:ring-1 focus:ring-blue-600">
    
        <label for="forename" class="font-semibold text-sm text-gray-900 mb-2 block">Password
            <span class="text-red-500 ml-1">@error('password') {{$message}} @enderror</span>
        </label>
        <input type="password" name="password" value="{{ old('password') }}" class="border border-gray-600 rounded-md px-3 py-2 mb-5 text-sm w-full focus:outline-none focus:ring-1 focus:ring-blue-600">

        <label for="token" class="font-semibold text-sm text-gray-900 mb-2 block">Registration token
            <span class="text-red-500 ml-1">@error('token') {{$message}} @enderror</span>
        </label>
        <input type="text" name="token" value="{{ old('token') }}" class="border border-gray-600 rounded-md px-3 py-2 mb-5 text-sm w-full focus:outline-none focus:ring-1 focus:ring-blue-600">
    
        @csrf

        <p class="mb-5 text-gray-900 text-sm">Already have an account? 
            <a href="{{route('admin.login')}}" class="text-blue-500 hover:text-blue-600 font-semibold">login here</a>.
        </p>
    
        <button type="submit" class="bg-blue-500 hover:bg-blue-600 focus:bg-blue-600 focus:outline-none text-white w-full py-2.5 rounded-md text-sm font-semibold ">Register</button>
    </form>
</div>

@endsection