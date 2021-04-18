@extends('layouts.master')
@section('title', 'Test - login')
@section('content')

<div class="container">
    <form class="login__form box" action="" method="post">
        <h2 class="text-center">Test login</h2>

        @csrf

        <label class="label" for="code">Test code: <span class="label__error"></span></label>
        <input class="input" type="text" name="code" id="code" value="">

        <label class="label" for="forename">Forename: <span class="label__error"></span></label>
        <input class="input" type="text" name="forename" id="forename" value="">

        <label class="label" for="surname">Surname: <span class="label__error"></span></label>
        <input class="input" type="text" name="surname" id="surname" value="">
        
        <button class="btn btn--w100" type="submit">Login</button>        
    </form>
</div>
@endsection