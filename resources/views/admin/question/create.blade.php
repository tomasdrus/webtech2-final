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
        <section id="classical" class="type__sections hidden">
            <label class="admin__label">Correct answer
                <span class="text-red-500 ml-1">@error('testAnswer') {{$message}} @enderror</span>
                <input type="text" name="testAnswer" value="{{ old('testAnswer') }}" class="admin__input">
            </label>
        </section>

        {{-- type selecting --}}
{{--         <section id="selecting" class="type__sections">
            <div class="flex items-end mb-5">
                <label class="admin__label flex-1">Answer option 1
                    <span class="text-red-500 ml-1">@error('option[]') {{$message}} @enderror</span>
                    <input type="text" name="option[]" value="{{ old('option[]') }}" class="admin__input mb-0">
                </label>
                <input type="checkbox" name="rightness1" class="block cursor-pointer w-5 h-5 mb-2 ml-2 border border-gray-500">
                <button class="pr-0 py-1.5 pl-3 text-lg leading-6 text-red-500 hover:text-red-600  cursor-pointer"><i class="far fa-trash-alt"></i></button>
            </div>
        </section> --}}

        <section id="selecting" class="type__sections">
            <label class="admin__label mb-5 selecting__option">
                <span>Answer option 1</span>
                <span class="text-red-500 ml-1">@error('option[]') {{$message}} @enderror</span>
                <div class="flex items-center gap-3 mt-2">
                    <input type="text" name="option[]" value="{{ old('option[]') }}" class="admin__input my-0">
                    <input type="checkbox" name="rightness1" class="block cursor-pointer w-5 h-5 border border-gray-500">
                    <button type="button" class="option__delete text-xl text-red-500 hover:text-red-600 cursor-pointer outline-none"><i class="far fa-trash-alt"></i></button>
                </div>
            </label>

            <button type="button" id="optionAdd" class="w-full rounded-md py-1.5 transition duration-100 text-sm text-green-600 border border-green-600 hover:bg-green-600 hover:text-white mb-5">Add new option field</button>
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

        @csrf
    </form>

</div>

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

    /* Option add new field */
    const optionAddButton = document.getElementById('optionAdd');
    const selectingContainer = document.getElementById('selecting');

    optionAddButton.addEventListener('click', () => {
        let elementCopy = optionAddButton.previousElementSibling.cloneNode(true);
        selectingContainer.insertBefore(elementCopy, optionAddButton);

        changeIndexing();
        updateOptionDeleteListeners();
    })

    /* Option numbering */
    const changeIndexing = () => {
        const options = document.querySelectorAll('.selecting__option');
        options.forEach((option, index) => {
            option.querySelector('span').innerHTML = `Answer option ${index + 1}`;
            option.querySelector('input[type="checkbox"]').setAttribute('name', `rightness${index + 1}`)
        })
    }

    /* Option delete field */
    const updateOptionDeleteListeners = () => {
        const optionDeleteButtons = document.querySelectorAll('.option__delete');
        const minOptions = 1;

        optionDeleteButtons.forEach((button) => {
            button.addEventListener('click', () => {
                if(document.querySelectorAll('.option__delete').length <= minOptions){
                    return;
                }
                button.parentElement.parentElement.remove();
                changeIndexing();
            })
        });
    }

    updateOptionDeleteListeners();
    
</script>

@endsection