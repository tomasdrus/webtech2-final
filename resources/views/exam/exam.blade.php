@extends('layouts.master')
@section('title', $exam->name)
@section('content')

<?php
session_start();
?>
<header class="fixed top-0 bg-white w-full py-4 shadow-md">
    <div class="container max-w-screen-xl mx-auto px-4">
        <div class="flex justify-between px-2">
            <span>{{ $student->forename }} {{ $student->surname }} {{ $student->ais }}</span>
          
            <p id="displayTime"></p>
            
        </div>
    </div>
</header>

<div class="container max-w-screen-xl mx-auto px-4 my-20">
    <form action="{{ route('exam.finish')}}" method="post" class="bg-white p-7 rounded-md" id="examForm">

        @csrf
        
        {{-- Heading --}}
        <h2 class="text-xl text-center font-semibold mb-10">{{ $exam->name }}</h2>

        @foreach ($questions as $question)
            <div class="grid grid-cols-question mb-10">
                <span class="font-semibold">{{ $loop->iteration }}.</span>
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
                                <input type="radio" name="{{ $question->id }}" value="{{ $option->answer }}" class="mr-2">
                                {{ $option->answer }}
                            </label>
                        @endforeach
                    @endif

                    {{-- Question type 3 --}}
                    @if ($question->type == 'pairing')
                        <p class="block mb-2">Choose correct answers</p>

                        <ul class="list-disc ml-4">
                            @foreach ($question->pairs as $pairs)
                                <li class="py-1.5">
                                    <label>{{ $pairs->option }}
                                        <select name="{{ $question->id }}-{{ $pairs->id }}" class="border border-gray-600 rounded-md px-2 py-1 cursor-pointer ml-3">
                                            @foreach ($question->pairs as $pair)
                                                <option value="{{ $pairs->option }}~{{ $pair->answer }}">{{ $pair->answer }}</option>          
                                            @endforeach
                                        </select>
                                    </label>
                                </li>
                            @endforeach
                        </ul>
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
        <button type="submit" id='sendExam'  href="logout.php" class="block bg-red-500 hover:bg-red-600 focus:bg-red-600 focus:outline-none text-white py-2 px-10 rounded-md text-sm font-semibold mx-auto">Finish exam</button>

    </form>
</div>

<script type="text/javascript" src="{{ asset('js/drawing.js') }}"></script>

<?php


if(!isset($_SESSION['countdown'])){
    $time =($exam->length )*60;
    $_SESSION['countdown'] = $time;
    $_SESSION['time_started'] = time();
}

//Get the current timestamp.
$now = time();

//Calculate how many seconds have passed since
//the countdown began.
$timeSince = $now - $_SESSION['time_started'];

//How many seconds are remaining?
$remainingSeconds = abs($_SESSION['countdown'] - $timeSince);

//Print out the countdown.
echo "<div hidden id=\"examTime\">{$remainingSeconds}</div>";


//Check if the countdown has finished.
if($remainingSeconds < 1){
   //Finished! Do something.
   session_destroy();
}
?>
<script type="text/javascript" src="{{ asset('js/countdown.js') }}"></script>
@endsection