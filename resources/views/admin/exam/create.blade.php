@extends('layouts.admin')
@section('title', 'Admin - question create')
@section('content')

<div class="bg-white p-5 m-5 rounded-lg">
    <h4 class="font-semibold mb-3">Create new exam</h4>

    <form action="{{route('admin.exam.save')}}" method="POST" >

        @if (Session::get('success'))
            <p>{{ Session::get('success') }}</p>
        @endif

        @if (Session::get('error'))
            <p>{{ Session::get('error') }}</p>
        @endif

        {{-- exam name --}}
        <label class="admin__label">Exam name
            <span class="text-red-500 ml-1">@error('name') {{$message}} @enderror</span>
            <input type="text" name="name" value="{{ old('name') }}" class="admin__input">
        </label>

        {{-- exam code --}}
        <label class="admin__label">Exam code
            <span class="text-red-500 ml-1">@error('code') {{$message}} @enderror</span>
            <input type="text" name="code" value="{{ old('code') }}" class="admin__input">
        </label>

        {{-- exam time --}}
        <label class="admin__label">Exam time in minutes
            <span class="text-red-500 ml-1">@error('time') {{$message}} @enderror</span>
            <input type="number" name="time" min="1" max="600" value="{{ old('time') }}" class="admin__input">
        </label>

        {{-- exam questions select --}}
        <div class="flex mb-5">
            <label class="admin__label">Select question
                <span class="text-red-500 ml-1">@error('type') {{$message}} @enderror</span>
    
                <select name="type" id="type" class="admin__select mb-0">
                    <option value="1">id 1 |typ otazky cislo jedna </option>
                    <option value="2">id 2 |typ otazky cislo dva </option>
                    <option value="3">id 3 |typ otazky cislo tri </option>
                </select> 
            </label>
            <a class="pr-0 py-1.5 pl-3 text-lg leading-6 text-red-500 hover:text-red-600 self-end cursor-pointer"><i class="far fa-trash-alt"></i></a>
        </div>

        {{-- submit button --}}
        <button type="submit" class="admin__button__submit">Create exam</button>

        @csrf
    </form>

</div>


@endsection