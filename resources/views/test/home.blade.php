@extends('layouts.master')
@section('title', 'home')
@section('content')

<div class="test__head">
    <div class="container">
        <div class="test__head__content">
            <span class="test__head__student">Tomáš Drus 97758</span>
            <span class="test__head__time">90 min 30sec</span>
        </div>
    </div>
</div>

<div class="container">
    <form action="" class="test__form">
        <h1 class="test__heading">Test z matematiky :)</h1>

        <div class="test__question">
            <span class="test__question__number">1.</span>
            <div class="test__question__content">
                <h2 class="test__question__heading">Otázky s otvorenou krátkou odpoveďou (body za ich správnosť automaticky priraďuje aplikácia; v prípade zlého vyhodnotenia, učiteľ môže túto odpoveď prebodovať)</h2>

                <label class="test__question__subheading" for="answer1">Answer:</label>
                <input class="test__question__input" type="text" name="answer1" id="answer1" value="">
            </div>
        </div>

        <div class="test__question">
            <span class="test__question__number">2.</span>
            <div class="test__question__content">
                <h2 class="test__question__heading">Otázky s výberom správnej odpovede (body za ich správnosť automaticky priraďuje aplikácia)</h2>

                <span class="test__question__subheading" for="answer1">Select from answers:</span>
                
                <label class="test__question__answear">
                    <input type="radio" name="age" value="60">
                    Absolútne netuším čo je správna odpoveď
                </label>

                <label class="test__question__answear">
                    <input type="radio" name="age" value="60">
                    Na tento test som sa vôbec neučil
                </label>

                <label class="test__question__answear">
                    <input type="radio" name="age" value="60">
                    Zisťujem že môj život nemá vôbec zmysel
                </label>
            </div>
        </div>

        <div class="test__question">
            <span class="test__question__number">3.</span>
            <div class="test__question__content">
                <h2 class="test__question__heading">Párovanie správnych odpovedí (body za ich správnosť automaticky priraďuje aplikácia)</h2>

                <span class="test__question__subheading" for="answer1">Pair right answers:</span>
            </div>
        </div>

        <div class="test__question">
            <span class="test__question__number">4.</span>
            <div class="test__question__content">
                <h2 class="test__question__heading">Otázka vyžaduje nakreslenie obrázku (body za ich správnosť priraďuje učiteľ)</h2>

                <span class="test__question__subheading" for="answer1">Draw the answer:</span>
            </div>
        </div>

        <div class="test__question">
            <span class="test__question__number">5.</span>
            <div class="test__question__content">
                <h2 class="test__question__heading">Otázka vyžaduje napísanie matematického výrazu (body za ich správnosť priraďuje učiteľ)</h2>

                <span class="test__question__subheading" for="answer1">Make the answer:</span>
            </div>
        </div>

        <button class="test__button" type="submit">End test</button>
    </form>
</div>

@endsection