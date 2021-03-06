@extends('layouts.admin')
@section('title', 'Admin - all questions')
@section('content')

<div class="bg-white p-5 m-5 rounded-lg">
    <h4 class="font-semibold mb-3">All questions</h4>

    @if (Session::get('success'))
    <p class="px-4 py-3 mb-3 bg-green-200 text-green-800 rounded">{{ Session::get('success') }}</p>
    @endif

    @if (Session::get('error'))
    <p class="px-4 py-3 mb-3 bg-red-200 text-red-800 rounded">{{ Session::get('error') }}</p>
    @endif

    <table class="w-full bg-white border border-gray-200">
        <thead class="bg-gray-200 text-gray-700 text-sm uppercase font-semibold text-left">
            <tr>
                <th class="py-3 px-4 font-semibold text-sm w-5">Id</th>
                <th class="py-3 px-4 font-semibold text-sm">name</th>
                <th class="py-3 px-4 font-semibold text-sm text-center w-24">type</th>
            </th></tr>
        </thead>
        <tbody class="text-gray-600">
            @forelse($questions as $question)
            <tr>
                <td class="py-3 px-4 border border-gray-200">{{ $question->id }}</td>
                <td class="py-3 px-4 border border-gray-200 max-w-xs overflow-hidden whitespace-nowrap">{{ $question->name }}</td>
                <td class="py-3 px-4 border border-gray-200 text-center">{{ $question->type }}</td>
            </tr>
            @empty
                <tr>
                    <td class="py-3 px-4 border border-gray-200 text-center text-yellow-500">X</td>
                    <td class="py-3 px-4 border border-gray-200 text-yellow-500">No exams found in database</td>
                    <td class="py-3 px-4 border border-gray-200 text-center text-yellow-500">none</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</div>


@endsection