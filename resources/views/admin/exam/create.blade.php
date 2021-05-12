@extends('layouts.admin')
@section('title', 'Admin - create exam')
@section('content')

<div class="bg-white p-5 m-5 rounded-lg">
    <h4 class="font-semibold mb-3">Create new exam</h4>

    <form action="{{route('admin.exam.save')}}" method="POST">

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

        {{-- exam token --}}
        <label class="admin__label">Exam token
            <span class="text-red-500 ml-1">@error('token') {{$message}} @enderror</span>
            <input type="text" name="token" value="{{ old('token') }}" class="admin__input">
        </label>

        {{-- exam length --}}
        <label class="admin__label">Exam length in minutes
            <span class="text-red-500 ml-1">@error('length') {{$message}} @enderror</span>
            <input type="number" name="length" min="1" max="600" value="{{ old('length') }}" class="admin__input">
        </label>

        {{-- exam questions select --}}
        <section id="question">
            <div class="flex gap-3 items-end mb-5">
                <label class="admin__label">
                    <span class="part__first">Select question 1</span>
                    <span class="text-red-500 ml-1">@error('question[]') {{$message}} @enderror</span>

                    <select name="questions[]" class="admin__select mb-0">
                        @forelse($questions as $question)
                            <option value="{{ $question->id }}">{{ $question->id }} | {{ $question->type }} | {{ $question->name }}</option>
                        @empty
                            <option value="3">No questions found</option>
                        @endforelse
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

@endsection

@section('script')

<script>
    const indexingQuestion = (containerId) => {
        const container = document.querySelectorAll(`#${containerId} > :not(button)`);
        container.forEach((item, index) => {
            item.querySelector('span').innerHTML = `Select question ${index + 1}`;
        })
    }

    dynamicElementsAdding('question', 'questionAdd', indexingQuestion);
</script>

@endsection

