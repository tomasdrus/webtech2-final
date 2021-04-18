@extends('layouts.master')
@section('title', 'Admin - registration')
@section('content')

<div class="container">
    <form class="login__form box" action="{{route('admin.save')}}" method="post">
        <h2 class="text-center">Admin registration</h2>

        @if (Session::get('success'))
            <p>{{ Session::get('success') }}</p>
        @endif

        @if (Session::get('error'))
            <p>{{ Session::get('error') }}</p>
        @endif

        @csrf

        <label class="label" for="forename">Forename: 
            <span class="label__error">@error('forename') {{$message}} @enderror</span>
        </label>
        <input class="input" type="text" name="forename" id="forename" value="{{ old('forename') }}">

        <label class="label" for="surname">Surname: 
            <span class="label__error">@error('surname') {{$message}} @enderror</span>
        </label>
        <input class="input" type="text" name="surname" id="surname" value="{{ old('surname') }}">

        <label class="label" for="email">Email: 
            <span class="label__error">@error('email') {{$message}} @enderror</span>
        </label>
        <input class="input" type="email" name="email" id="email" value="{{ old('email') }}">

        <label class="label" for="password">Password: 
            <span class="label__error">@error('password') {{$message}} @enderror</span>
        </label>
        <input class="input" type="password" name="password" id="password" value="">
        
        <label class="label" for="token">Token: 
            <span class="label__error">@error('token') {{$message}} @enderror</span>
        </label>
        <input class="input" type="token" name="token" id="token" value="{{ old('token') }}">

        <button class="btn btn--w100" type="submit">Register</button>        
    </form>
</div>
@endsection