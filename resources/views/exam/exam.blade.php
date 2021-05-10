@extends('layouts.master')
@section('title', 'home')
@section('content')

<header class="fixed top-0 bg-white w-full py-4 shadow-md">
    <div class="container max-w-screen-xl mx-auto px-4">
        <div class="flex justify-between px-2">
            <span>{{ $student->forename }} {{ $student->surname }} {{ $student->ais }}</span>
            <span>90 min 30sec</span>
        </div>
    </div>
</header>

<div class="container max-w-screen-xl mx-auto px-4 my-20">
    <form action="{{ route('exam.finish')}}" method="post" class="bg-white p-7 rounded-md">

        @csrf
        
        {{-- Heading --}}
        <h2 class="text-xl text-center font-semibold mb-10">Test z matematiky :)</h2>

        @foreach ($questions as $question)
            <div class="grid grid-cols-question mb-10">
                <span class="font-semibold">{{ $question->id }}</span>
                <div>
                    <h2 class="font-semibold mb-3">{{ $question->name }}</h2>

                    {{-- Question type 1 --}}
                    @if ($question->type == 'classical')
                        <label class="block">Write the answer:
                            <input type="text" name="{{ $question->id }}" class="border border-gray-600 rounded-md px-3 py-1.5 text-sm w-full focus:outline-none focus:ring-1 focus:ring-blue-600 mt-2">
                        </label>
                    @endif

                    {{-- Question type 2 --}}
                    @if ($question->type == 'selecting')
                        <p class="block mb-2">Choose the answer</p>
                        @foreach ($question->options as $option)
                            <label class="block mb-2">
                                <input type="radio" name="{{ $question->id }}" value="{{ $option->id }}" class="mr-2">
                                {{ $option->answer }}
                            </label>
                        @endforeach
                    @endif

                    {{-- Question type 3 --}}
                    @if ($question->type == 'pairing')
                        <p class="block mb-2">Choose correct answers</p>

                        @foreach ($question->pairs as $pair)
                            <div class="mb-3">
                                <label>{{ $pair->option }}
                                    <select name="{{ $question->id }}-{{ $pair->id }}">
                                        @foreach ($question->pairs as $pair)
                                            <option value="{{ $pair->id }}">{{ $pair->answer }}</option>          
                                        @endforeach
                                    </select>
                                </label>
                            </div>
                        @endforeach
                    @endif

                    {{-- Question type 4 --}}
                    @if ($question->type == 'drawing')
                        <p class="block mb-2">
                            Draw the answer:
                            <button type="button" class="drawing__reset bg-yellow-500 hover:bg-yellow-600 focus:bg-yellow-600 focus:outline-none text-white py-0.5 px-2 ml-1 rounded-md text-sm">Reset</button>
                        </p>
                        <canvas class="border border-gray-600 rounded-md drawing__canvas cursor-pointer"></canvas>
                        <input type="hidden" name="{{ $question->id }}" class="drawing__input">
                    @endif

                    {{-- Question type 5 --}}
                    @if ($question->type == 'mathematical')
                        <p class="block mb-2">Make correct answer</p>
                        <input type="hidden" name="{{ $question->id }}" class="drawing__input">
                    @endif
                </div>
            </div>
        @endforeach

        {{-- Submit button --}}
        <button type="submit" class="block bg-red-500 hover:bg-red-600 focus:bg-red-600 focus:outline-none text-white py-2 px-10 rounded-md text-sm font-semibold mx-auto">Finish exam</button>

    </form>
</div>

<script type="text/javascript" src="{{ asset('js/drawing.js') }}"></script>

@endsection