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

        {{-- Question type 1 --}}
        <div class="grid grid-cols-question mb-10">
            <span class="font-semibold">1.</span>
            <div>
                <h2 class="font-semibold mb-3">Otázky s otvorenou krátkou odpoveďou (body za ich správnosť automaticky priraďuje aplikácia; v prípade zlého vyhodnotenia, učiteľ môže túto odpoveď prebodovať)</h2>

                <label for="answer1" class="block mb-2">Write the answer:</label>
                <input type="text" name="answer1" id="answer1" value="" class="border border-gray-600 rounded-md px-3 py-1.5 text-sm w-full focus:outline-none focus:ring-1 focus:ring-blue-600" >
            </div>
        </div>

        {{-- Question type 2 --}}
        <div class="grid grid-cols-question mb-10">
            <span class="font-semibold">2.</span>
            <div>
                <h2 class="font-semibold mb-3">Otázky s otvorenou krátkou odpoveďou (body za ich správnosť automaticky priraďuje aplikácia; v prípade zlého vyhodnotenia, učiteľ môže túto odpoveď prebodovať)</h2>

                <p class="block mb-2">Choose the answer</p>

                <label class="block mb-2">
                    <input type="radio" name="age" value="1" class="mr-2">
                    Absolútne netuším čo je správna odpoveď
                </label>

                <label class="block mr-2">
                    <input type="radio" name="age" value="2" class="mr-2">
                    Na tento test som sa vôbec neučil
                </label>
            </div>
        </div>

        {{-- Question type 3 --}}
        <div class="grid grid-cols-question mb-10">
            <span class="font-semibold">3.</span>
            <div>
                <h2 class="font-semibold mb-3">Párovanie správnych odpovedí (body za ich správnosť automaticky priraďuje aplikácia)</h2>

                <p class="block mb-2">Choose correct answers</p>

                <div class="mb-3">
                    <label for="cars">Lorem ipsum dolor sit amet:</label>
                    <select name="cars" id="cars">
                        <option value="volvo">Volvo</option>
                        <option value="saab">Saab</option>
                    </select>
                </div>

                <div>
                    <label for="cars">Lorem, ipsum dolor:</label>
                    <select name="cars" id="cars">
                        <option value="volvo">Volvo fagag a</option>
                        <option value="saab">Saab</option>
                    </select>
                </div>

            </div>
        </div>

        {{-- Question type 4 --}}
        <div class="grid grid-cols-question mb-10">
            <span class="font-semibold">4.</span>
            <div class="overflow-hidden">
                <h2 class="font-semibold mb-3">Otázka vyžaduje nakreslenie obrázku (body za ich správnosť priraďuje učiteľ)</h2>

                <p class="block mb-2">
                    Draw the answer:
                    <button type="button" class="drawing__reset bg-yellow-500 hover:bg-yellow-600 focus:bg-yellow-600 focus:outline-none text-white py-0.5 px-2 ml-1 rounded-md text-sm">Reset</button>
                </p>
                <canvas class="border border-gray-600 rounded-md drawing__canvas cursor-pointer"></canvas>
                <input type="hidden" name="obrazok" class="drawing__input">
            </div>
        </div>

        {{-- Question type 5 --}}
        <div class="grid grid-cols-question mb-10">
            <span class="font-semibold">5.</span>
            <div class="overflow-hidden">
                <h2 class="font-semibold mb-3">Otázka vyžaduje napísanie matematického výrazu (body za ich správnosť priraďuje učiteľ)</h2>

                <p class="block mb-2">Make correct answer</p>

            </div>
        </div>

        {{-- Submit button --}}
        <button type="submit" class="block bg-red-500 hover:bg-red-600 focus:bg-red-600 focus:outline-none text-white py-2 px-10 rounded-md text-sm font-semibold mx-auto">Finish exam</button>

    </form>
</div>

<script type="text/javascript" src="{{ asset('js/drawing.js') }}"></script>

@endsection