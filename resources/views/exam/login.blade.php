@extends('layouts.master')
@section('title', 'Test - login')
@section('content')

<div class="flex items-center justify-center h-screen">
    <form action="{{route('exam.check')}}" method="post" class="p-8 max-w-md flex-grow bg-white rounded-xl">

        <h1 class="text-xl mb-7 text-gray-900 text-center font-bold">Admin login</h1>

        @if (Session::get('error'))
            <p>{{ Session::get('error') }}</p>
        @endif
    
        <label class="font-semibold text-sm text-gray-900 mb-2 block">Test token
            <span class="text-red-500 ml-1">@error('token') {{$message}} @enderror</span>
        </label>
        <input type="text" name="token" value="{{ old('token') }}" class="auth__input">

        <label for="forename" class="font-semibold text-sm text-gray-900 mb-2 block">Forename
            <span class="text-red-500 ml-1">@error('forename') {{$message}} @enderror</span>
        </label>
        <input type="text" name="forename" value="{{ old('forename') }}" class="auth__input">
    
        <label for="surname" class="font-semibold text-sm text-gray-900 mb-2 block">surname
            <span class="text-red-500 ml-1">@error('surname') {{$message}} @enderror</span>
        </label>
        <input type="text" name="surname" value="{{ old('surname') }}" class="auth__input">

        <label for="ais" class="font-semibold text-sm text-gray-900 mb-2 block">ais
            <span class="text-red-500 ml-1">@error('ais') {{$message}} @enderror</span>
        </label>
        <input type="number" name="ais" value="{{ old('ais') }}" class="auth__input">
    
        @csrf

        <button type="submit" class="auth__button">Login</button>
    </form>
</div>

@endsection