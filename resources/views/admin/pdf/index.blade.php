<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Generate PDF</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center text-2xl text-blue-500 mb-3">Test results</h2>
        @if(isset($id))
        <form action="{{ route('admin.pdf.generate',['id' => $id])}} " method="GET">
            @csrf
            <button type="submit" class="block bg-blue-500 hover:bg-blue-600 focus:bg-blue-600 focus:outline-none text-white py-2 px-10 rounded-md text-sm font-semibold mx-auto">Export to pdf (may take 30sec)</button>
        </form>
        @endif
        <div class="d-flex justify-content-end mb-4">

        </div>

        @foreach($tests as $test)
        <span class="text-blue-500 font-bold text-lg mb-3 inline-block w-full border-t-2 border-blue-500 pt-3">{{ $test->student->forename }} {{ $test->student->surname }} {{ $test->student->ais }}</span>
            @foreach ($test as $question)
                <div class="flex">
                    <span class="font-semibold w-10">{{ $loop->iteration }}.</span>
                    <div class="w-full mb-4">
                        <h2 class="font-semibold mb-2">{{ $question->name }}</h2>
                        {{-- Question type 1 --}}
                        @if ($question->type == 'classical' || $question->type == 'selecting')
                            <p>
                                <span class="font-semibold mr-3">Answer: </span>
                                @if ($question->answer->answer == null)No answer was submitted @endif
                                {{$question->answer->answer}}
                            </p>
                        @endif

                        @if ($question->type == 'pairing')
                            @foreach ($question->pairs as $pair)
                                <p><span class="font-semibold mr-3">Answer: </span>{{$pair->option}}<span class="text-xl text-blue-500 font-semibold mx-1">~</span>{{$pair->answer}}</p>
                            @endforeach
                        @endif

                        @if ($question->type == 'drawing')
                            <p>
                                <span class="font-semibold mr-3">Answer: </span>
                                @if ($question->answer->answer == null)No answer was submitted @endif
                            </p>
                            @if ($question->answer->answer != null)<img src="{{$question->answer->answer}}"/> @endif
                        @endif

                        @if ($question->type == 'mathematical')
                            <p>
                                <span class="font-semibold mr-3">Answer: </span>
                                @if ($question->answer->answer == null)No answer was submitted @endif
                                @if ($question->answer->answer != null) \[{{$question->answer->answer}}\] @endif
                            </p>
                        @endif

                    </div>
                </div>
            @endforeach
        @endforeach

    </div>

    <script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
    <script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3.0.1/es5/tex-mml-chtml.js"></script>
    <script src=" {{ asset('js/app.js') }}" type="text/js"></script>
</body>

</html>
{{-- <h3 class="text-lg text-red-500 hover:text-red-600">AIS id: {{$test->ais}}</h3> --}}



{{-- @foreach($test->questions_with_answers as $questions_with_answers)
    @if ($questions_with_answers->type == 'pairing')
        <p>{{$questions_with_answers->question}} : {{$questions_with_answers->answer}}</p>
        @continue
    @endif

    @if ($questions_with_answers->type == 'drawing')
        <img src="{{$questions_with_answers->answer}}">
        @continue
    @endif

    @if ($questions_with_answers->type == 'mathematical')
        \[{{$questions_with_answers->answer}}\]
        @continue
    @endif

    <p>{{$questions_with_answers->answer}}</p>

@endforeach
 --}}