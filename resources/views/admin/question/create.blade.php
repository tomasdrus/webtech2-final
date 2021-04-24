@extends('layouts.admin')
@section('title', 'Admin - question create')
@section('content')

<div class="bg-white p-5 m-5 rounded-lg">
    <h4 class="font-semibold mb-3">Create new question</h4>

    <form action="" >

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
            <label for="answer" class="admin__label">Correct answer
                <span class="text-red-500 ml-1">@error('answer') {{$message}} @enderror</span>
                <input type="text" name="answer" id="answer" value="{{ old('answer') }}" class="admin__input">
            </label>
        </section>

        {{-- type selecting --}}
        <section id="selecting" class="type__sections hidden">
            <div class="flex mb-5">
                <label class="admin__label flex-1">Answer option 1
                    <span class="text-red-500 ml-1">@error('option1') {{$message}} @enderror</span>
                    <input type="text" name="option1" value="{{ old('option1') }}" class="admin__input mb-0">
                </label>
                <input type="checkbox" name="option1check" class="block cursor-pointer w-5 ml-2 mt-7 border border-gray-500">
            </div>

            <div class="flex mb-5">
                <label class="admin__label flex-1">Answer option 2
                    <span class="text-red-500 ml-1">@error('option2') {{$message}} @enderror</span>
                    <input type="text" name="option2" value="{{ old('option2') }}" class="admin__input mb-0">
                </label>
                <input type="checkbox" name="option2check" class="block cursor-pointer w-5 ml-2 mt-7 border border-gray-500">
            </div>
        </section>

        {{-- type pairing --}}
        <section id="pairing" class="type__sections hidden">
            <div class="lg:grid grid-cols-2 gap-5">
                <label for="answer" class="admin__label">Option 1
                    <span class="text-red-500 ml-1">@error('answer') {{$message}} @enderror</span>
                    <input type="text" name="answer" id="answer" value="{{ old('answer') }}" class="admin__input">
                </label>
                
                <label for="answer" class="admin__label">Option 1 answer
                    <span class="text-red-500 ml-1">@error('answer') {{$message}} @enderror</span>
                    <input type="text" name="answer" id="answer" value="{{ old('answer') }}" class="admin__input">
                </label>
            </div>

            <div class="lg:grid grid-cols-2 gap-5">
                <label for="answer" class="admin__label">Option 2
                    <span class="text-red-500 ml-1">@error('answer') {{$message}} @enderror</span>
                    <input type="text" name="answer" id="answer" value="{{ old('answer') }}" class="admin__input">
                </label>
                
                <label for="answer" class="admin__label">Option 2 answer
                    <span class="text-red-500 ml-1">@error('answer') {{$message}} @enderror</span>
                    <input type="text" name="answer" id="answer" value="{{ old('answer') }}" class="admin__input">
                </label>
            </div>
        </section>

        {{-- submit button --}}
        <button type="submit" class="admin__button__submit">Create question</button>

    </form>

</div>

<script>
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
</script>

@endsection