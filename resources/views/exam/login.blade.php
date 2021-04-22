@extends('layouts.master')
@section('title', 'Test - login')
@section('content')

<div class="flex items-center justify-center h-screen">
    <form action="" method="post" class="p-8 max-w-md flex-grow bg-white rounded-xl">

        <h1 class="text-xl mb-7 text-gray-700 text-center font-bold">Exam login</h1>
    
        <label for="examcode" class="font-semibold text-sm text-gray-600 mb-2 block">Exam code
            <span class="text-red-500 ml-1"></span>
        </label>
        <input type="text" name="examcode" value="" class="border border-gray-600 rounded-md px-3 py-2 mb-5 text-sm w-full focus:outline-none focus:ring-1 focus:ring-blue-600">
    
        <label for="forename" class="font-semibold text-sm text-gray-600 mb-2 block">Forename
            <span class="text-red-500 ml-1"></span>
        </label>
        <input type="text" name="forename" value="" class="border border-gray-600 rounded-md px-3 py-2 mb-5 text-sm w-full focus:outline-none focus:ring-1 focus:ring-blue-600">
    
        <label for="surname" class="font-semibold text-sm text-gray-600 mb-2 block">Surname
            <span class="text-red-500 ml-1"></span>
        </label>
        <input type="text" name="surname" value="" class="border border-gray-600 rounded-md px-3 py-2 mb-5 text-sm w-full focus:outline-none focus:ring-1 focus:ring-blue-600">
    
        <label for="aisid" class="font-semibold text-sm text-gray-600 mb-2 block">Ais id
            <span class="text-red-500 ml-1"></span>
        </label>
        <input type="text" name="aisid" value="" class="border border-gray-600 rounded-md px-3 py-2 mb-6 text-sm w-full focus:outline-none focus:ring-1 focus:ring-blue-600">
    
        @csrf
    
        <button type="submit" class="bg-blue-500 hover:bg-blue-600 focus:bg-blue-600 focus:outline-none text-white w-full py-2.5 rounded-md text-sm font-semibold">Start exam</button>
    </form>
</div>

@endsection