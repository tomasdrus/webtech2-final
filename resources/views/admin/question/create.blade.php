@extends('layouts.admin')
@section('title', 'Admin - question create')
@section('content')

<div class="bg-white p-5 m-5 rounded-lg">
    <h4 class="font-semibold mb-3">Create new question</h4>

    <form action="{{route('admin.question.save')}}" method="POST" >

        @if (Session::get('success'))
            <p>{{ Session::get('success') }}</p>
        @endif

        @if (Session::get('error'))
            <p>{{ Session::get('error') }}</p>
        @endif
    
        {{-- question type -> classic, select, pairing, drawing, math --}}
        <label class="admin__label">Question type
            <span class="text-red-500 ml-1">@error('type') {{$message}} @enderror</span>

            <select name="type" id="type" class="admin__select">
                <option value="classical">classical</option>
                <option value="selecting">selecting</option>
                <option value="pairing">pairing</option>
                <option value="drawing">drawing</option>
                <option value="mathematical">mathematical</option>
              </select> 
        </label>
                
        {{-- question text --}}
        <label class="admin__label">Question text
            <span class="text-red-500 ml-1">@error('name') {{$message}} @enderror</span>
            <input type="text" name="name" value="{{ old('name') }}" class="admin__input">
        </label>

        {{-- type classical --}}
        <section id="classical" class="type__sections">
            <label class="admin__label">Correct answer
                <span class="text-red-500 ml-1">@error('answer') {{$message}} @enderror</span>
                <input type="text" name="answer" value="{{ old('answer') }}" class="admin__input">
            </label>
        </section>

        {{-- type selecting --}}
        <section id="selecting" class="type__sections hidden">
            <div class="flex gap-3 items-end mb-5">
                <label class="admin__label">
                    <span class="part__first">Answer option 1</span>
                    <span class="text-red-500 ml-1">@error('options[]') {{$message}} @enderror</span>
                    <input type="text" name="options[]" value="{{ old('options[]') }}" class="admin__input mb-0">
                </label>
                <input type="checkbox" name="rightness1" class="block cursor-pointer w-5 h-5 my-1.5 border border-gray-500">
                <button type="button" class="py-1 text-xl text-red-500 hover:text-red-600 cursor-pointer focus:outline-none"><i class="far fa-trash-alt"></i></button>
            </div>

            <button type="button" id="selectingAdd" class="w-full rounded-md py-1.5 transition duration-100 text-sm text-green-600 border border-green-600 hover:bg-green-600 hover:text-white mb-5">Add new option field</button>
        </section>

        {{-- type pairing --}}
        <section id="pairing" class="type__sections hidden">
            <div class="flex gap-3 items-center lg:items-end mb-5">
                <div class="flex flex-col lg:flex-row gap-3 w-full">
                    <label class="admin__label">
                        <span class="part__first">Option 1</span>
                        <span class="text-red-500 ml-1">@error('pairOptions[]') {{$message}} @enderror</span>
                        <input type="text" name="pairOptions[]" value="{{ old('pairOptions[]') }}" class="admin__input mb-0">
                    </label>
                    
                    <label class="admin__label">
                        <span class="part__second">Option 1 answer</span>
                        <span class="text-red-500 ml-1">@error('pairAnswers[]') {{$message}} @enderror</span>
                        <input type="text" name="pairAnswers[]" value="{{ old('pairAnswers[]') }}" class="admin__input mb-0">
                    </label>
                </div>
                <button type="button" class="pt-6 lg:py-1 text-xl text-red-500 hover:text-red-600 cursor-pointer focus:outline-none"><i class="far fa-trash-alt"></i></button>
            </div>

            <button type="button" id="pairingAdd" class="w-full rounded-md py-1.5 transition duration-100 text-sm text-green-600 border border-green-600 hover:bg-green-600 hover:text-white mb-5">Add new option field</button>
        </section>

        {{-- submit button --}}
        <button type="submit" class="admin__button__submit">Create question</button>

        @csrf
    </form>

</div>

@endsection

@section('script')
<script>
    /* Toggle different question type showing */
    const typeSelect = document.getElementById('type');
    const typeSections = document.querySelectorAll('.type__sections');

    typeSelect.addEventListener('change', () => {
        typeSections.forEach( (section) => {
            if(typeSelect.value === section.id){
                section.classList.remove('hidden');
                return;
            }
            section.classList.add('hidden');
        });
    })

    /* Functions for dynamically adding elements */
    const indexingPairing = (containerId) => {
        const container = document.querySelectorAll(`#${containerId} > :not(button)`);
        container.forEach((item, index) => {
            item.querySelector('.part__first').innerHTML = `Option ${index + 1}`;
            item.querySelector('.part__second').innerHTML = `Option ${index + 1} answer`;
        })
    }

    const indexingSelecting = (containerId) => {
        const container = document.querySelectorAll(`#${containerId} > :not(button)`);
        container.forEach((item, index) => {
            item.querySelector('span').innerHTML = `Answer option ${index + 1}`;
            item.querySelector('input[type="checkbox"]').setAttribute('name', `rightness${index + 1}`)
        })
    }

    dynamicElementsAdding('pairing', 'pairingAdd', indexingPairing);
    dynamicElementsAdding('selecting', 'selectingAdd', indexingSelecting);

</script>
@endsection