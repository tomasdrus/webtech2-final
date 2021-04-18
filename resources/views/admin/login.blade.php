@extends('layouts.master')
@section('title', 'Admin - login')
@section('content')

<div class="container">
    <form class="login__form box" action="{{route('admin.check')}}" method="post">
        <h2 class="text-center">Admin login</h2>

        @if (Session::get('error'))
            <p>{{ Session::get('error') }}</p>
        @endif

        @csrf

        <label class="label" for="email">Email: 
            <span class="label__error">@error('email') {{$message}} @enderror</span>
        </label>
        <input class="input" type="email" name="email" id="email" value="{{ old('email') }}">

        <label class="label" for="password">Password: 
            <span class="label__error">@error('password') {{$message}} @enderror</span>
        </label>
        <input class="input" type="password" name="password" id="password" value="{{ old('password') }}">

        <p class="mb-20">Don`t have an account? <a href="{{route('admin.registration')}}">Register here</a>.</p>
        
        <button class="btn btn--w100" type="submit">Login</button>        
    </form>
</div>
@endsection