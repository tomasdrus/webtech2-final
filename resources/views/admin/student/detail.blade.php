@extends('layouts.admin')
@section('title', 'Admin - student exam detail')
@section('content')

<div class="bg-white p-5 m-5 rounded-lg">
    <h4 class="font-semibold mb-5">Check student exam: <span class="text-blue-500 font-bold text-lg">{{ $questions->student->forename }} {{ $questions->student->surname }} {{ $questions->student->ais }}</span></h4>

    <form action="{{ route('admin.student.change')}}" method="post">

        @csrf
        @foreach ($questions as $question)
        <div class="flex">
            <span class="font-semibold w-10">{{ $loop->iteration }}.</span>
            <div class="w-full mb-5">
                <h2 class="font-semibold mb-3">{{ $question->name }}</h2>
                {{-- Question type 1 --}}
                @if ($question->type == 'classical' || $question->type == 'selecting')
                <div class="flex justify-between ml-5">
                    <p>
                        <span class="font-semibold mr-3">Answer: </span>
                        @if ($question->answer->answer == null)No answer was submitted @endif
                        {{$question->answer->answer}}
                    </p>
                    <label>
                        Rightness:
                        <input type="hidden" value="0" name="answer[{{ $question->answer->id }}-{{ $question->type }}]">
                        <input type="checkbox" value="1" name="answer[{{ $question->answer->id }}]" @if($question->answer->rightness) checked @endif>
                    </label>
                </div>
                @endif

                @if ($question->type == 'pairing')
                @foreach ($question->pairs as $pair)
                <div class="flex justify-between ml-5 mb-1">
                    <p><span class="font-semibold mr-3">Answer: </span>{{$pair->option}}<span class="text-xl text-blue-500 font-semibold mx-1">~</span>{{$pair->answer}}</p>
                    <label>
                        Rightness:
                        <input type="hidden" value="0" name="answer[{{ $pair->id }}-{{ $question->type }}]">
                        <input type="checkbox" value="1" name="answer[{{ $pair->id }}]" @if($pair->rightness) checked @endif>
                    </label>
                </div>
                @endforeach
                @endif

                @if ($question->type == 'drawing')
                <div class="flex justify-between ml-5">
                    <p>
                        <span class="font-semibold mr-3">Answer: </span>
                        @if ($question->answer->answer == null)No answer was submitted @endif
                    </p>
                    <label>
                        Rightness:
                        <input type="hidden" value="0" name="answer[{{ $question->answer->id }}-{{ $question->type }}]">
                        <input type="checkbox" value="1" name="answer[{{ $question->answer->id }}]" @if($question->answer->rightness) checked @endif>
                    </label>
                </div>
                @if ($question->answer->answer != null)<img src="{{$question->answer->answer}}" /> @endif
                @endif

                @if ($question->type == 'mathematical')
                <div class="flex justify-between ml-5">
                    <p>
                        <span class="font-semibold mr-3">Answer: </span>
                        @if ($question->answer->answer == null)No answer was submitted @endif
                        \[{{$question->answer->answer}}\]
                    </p>
                    <label>
                        Rightness:
                        <input type="hidden" value="0" name="answer[{{ $question->answer->id }}-{{ $question->type }}]">
                        <input type="checkbox" value="1" name="answer[{{ $question->answer->id }}]" @if($question->answer->rightness) checked @endif>
                    </label>
                </div>
                @endif

            </div>
        </div>
        @endforeach

        {{-- Submit button --}}
        <button type="submit" class="block bg-blue-500 hover:bg-blue-600 focus:bg-blue-600 focus:outline-none text-white py-2 px-10 rounded-md text-sm font-semibold mx-auto">Save correction</button>

    </form>
</div>
<script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
<script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3.0.1/es5/tex-mml-chtml.js"></script>

@endsection