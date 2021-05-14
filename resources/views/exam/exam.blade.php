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
            <span id="displayTime"></span>
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
                                <input type="radio" name="{{ $question->id }}" value="{{ $option->answer }}" class="mr-2" @if($loop->last) checked @endif>
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
                        <math-field virtual-keyboard-mode=manual id="formula" class="border border-gray-600 rounded-md focus:outline-none math-field-class"></math-field>
                        <input type="hidden" name="{{ $question->id }}">
                    @endif
                </div>
            </div>
        @endforeach

        {{-- Submit button --}}
        <button type="submit" class="block bg-red-500 hover:bg-red-600 focus:bg-red-600 focus:outline-none text-white py-2 px-10 rounded-md text-sm font-semibold mx-auto">Finish exam</button>

    </form>
</div>

<?php


if(!isset($_SESSION['countdown'])){
    $time =($exam->length )*60;
    $_SESSION['countdown'] = $time;
    $_SESSION['time_started'] = time();
}


$now = time();

$timeSince = $now - $_SESSION['time_started'];

$remainingSeconds = abs($_SESSION['countdown'] - $timeSince);

echo "<div hidden id=\"examTime\">{$remainingSeconds}</div>";

if($remainingSeconds < 1){
   session_destroy();
}
?>

<script type="text/javascript" src="//unpkg.com/mathlive/dist/mathlive.min.js"></script>
<script type="text/javascript" src="{{ asset('js/drawing.js') }}"></script>
<script type="text/javascript">
    const formulas = document.querySelectorAll('.math-field-class');
    formulas.forEach(formula => {
        formula.addEventListener('input',(ev) => {
            formula.nextElementSibling.value = ev.target.value;
        });
    });

    const token = document.querySelector('div[id=examTime]').textContent

    var d1 = new Date ()   
    console.log(d1);
    d1.setSeconds ( d1.getSeconds() + parseInt(token) );
    console.log(d1);
    
    var x = setInterval(function() {
    var now = new Date().getTime();
    var distance = d1 - now;
        

    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
        
    
    document.getElementById("displayTime").innerText =  hours + "h "
    + minutes + "m " + seconds + "s ";
        

    if (distance < 1) {
        clearInterval(x);
        document.getElementById("examForm").submit();
    }
    }, 1000);

</script>

@endsection