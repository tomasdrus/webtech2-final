@extends('layouts.admin')
@section('title', 'Admin - question create')
@section('content')

<div class="bg-white p-5 m-5 rounded-lg">
    <h4 class="font-semibold mb-3">Create new exam</h4>

    <form action="{{route('admin.exam.save')}}" method="POST" >

        @if (Session::get('success'))
            <p>{{ Session::get('success') }}</p>
        @endif

        @if (Session::get('error'))
            <p>{{ Session::get('error') }}</p>
        @endif

        {{-- exam name --}}
        <label class="admin__label">Exam name
            <span class="text-red-500 ml-1">@error('name') {{$message}} @enderror</span>
            <input type="text" name="name" value="{{ old('name') }}" class="admin__input">
        </label>

        {{-- exam code --}}
        <label class="admin__label">Exam code
            <span class="text-red-500 ml-1">@error('code') {{$message}} @enderror</span>
            <input type="text" name="code" value="{{ old('code') }}" class="admin__input">
        </label>

        {{-- exam time --}}
        <label class="admin__label">Exam time in minutes
            <span class="text-red-500 ml-1">@error('time') {{$message}} @enderror</span>
            <input type="number" name="time" min="1" max="600" value="{{ old('time') }}" class="admin__input">
        </label>

        {{-- exam questions select --}}
        <section id="question">
            <div class="flex gap-3 items-end mb-5">
                <label class="admin__label">
                    <span class="part__first">Select question 1</span>
                    <span class="text-red-500 ml-1">@error('question[]') {{$message}} @enderror</span>
                    <select name="question[]" class="admin__select mb-0">
                        <option value="1">id 1 |typ otazky cislo jedna </option>
                        <option value="2">id 2 |typ otazky cislo dva </option>
                        <option value="3">id 3 |typ otazky cislo tri </option>
                    </select> 
                </label>
                <button type="button" class="py-1 text-xl text-red-500 hover:text-red-600 cursor-pointer focus:outline-none"><i class="far fa-trash-alt"></i></button>
            </div>

            <button type="button" id="questionAdd" class="w-full rounded-md py-1.5 transition duration-100 text-sm text-green-600 border border-green-600 hover:bg-green-600 hover:text-white mb-5">Add new question</button>
        </section>


        {{-- submit button --}}
        <button type="submit" class="admin__button__submit">Create exam</button>

        @csrf
    </form>

</div>

<script>
    /* Adding and removing */
    const dynamicElementsAdding = (containerId, buttonAddId, functionIndexing) => {
        const container = document.getElementById(containerId);
        const buttonAdd = document.getElementById(buttonAddId);
        const buttonDelFirst = document.querySelector(`#${containerId} > :not(button) button`)

        const functionDel = (e) => {
            if(document.querySelectorAll(`#${containerId} > :not(button)`).length <= 1){
                return;
            }
            e.target.parentElement.remove();
            functionIndexing(containerId);
        }

        buttonDelFirst.addEventListener('click', functionDel);

        buttonAdd.addEventListener('click', () => {
            const elementCopy = buttonAdd.previousElementSibling.cloneNode(true);
            const buttonDel = elementCopy.querySelector('button');

            buttonDel.addEventListener('click', functionDel);
            container.insertBefore(elementCopy, buttonAdd);
            functionIndexing(containerId);
        })
    }

    const indexingQuestion = (containerId) => {
        const container = document.querySelectorAll(`#${containerId} > :not(button)`);
        container.forEach((item, index) => {
            item.querySelector('span').innerHTML = `Select question ${index + 1}`;
        })
    }

    dynamicElementsAdding('question', 'questionAdd', indexingQuestion);
</script>


@endsection