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
        <h2 class="text-center mb-3">Test results</h2>
        @if(isset($id))
        <form action="{{ route('admin.pdf.generate',['id' => $id])}} " method="GET">
            @csrf
            <button type="submit" class="px-1">Export PDF</button>
        </form>
        @endif
        <div class="d-flex justify-content-end mb-4">

        </div>

        @foreach($tests as $test)
        <h3 class="text-lg text-red-500 hover:text-red-600">AIS id: {{$test->ais}}</h3>
        @foreach($test->questions_with_answers as $questions_with_answers)
        <p>{{$questions_with_answers->question}}: {{$questions_with_answers->answer}}</p>
        @endforeach
        </br>
        @endforeach

    </div>

    <script src=" {{ asset('js/app.js') }}" type="text/js">
            </script>
</body>

</html>