@extends('layouts.admin')
@section('title', 'Admin - all questions')
@section('content')

<div class="bg-white p-5 m-5 rounded-lg">
    <h4 class="font-semibold mb-3">All questions</h4>

    <table class="w-full bg-white border border-gray-200">
        <thead class="bg-gray-200 text-gray-700 text-sm uppercase font-semibold text-left">
            <tr>
                <th class="py-3 px-4 font-semibold text-sm w-5">Id</th>
                <th class="py-3 px-4 font-semibold text-sm">name</th>
                <th class="py-3 px-4 font-semibold text-sm w-24">type</th>
                <th class="py-3 px-4 font-semibold text-sm text-right w-24">Actions</th>
            </th></tr>
        </thead>
        <tbody class="text-gray-600">
            @forelse($questions as $question)
            <tr>
                <td class="py-3 px-4 border border-gray-200">{{ $question->id }}</td>
                <td class="py-3 px-4 border border-gray-200 max-w-xs overflow-hidden whitespace-nowrap">{{ $question->name }}</td>
                <td class="py-3 px-4 border border-gray-200">{{ $question->type }}</td>
                <td class="border border-gray-200">
                    <div class="flex content-center justify-center">
                        <a href="#" class="px-1 mr-1 text-yellow-500 hover:text-yellow-600"><i class="far fa-edit"></i></a>
                        <a href="#" class="px-1 text-red-500 hover:text-red-600"><i class="far fa-trash-alt"></i></a>
                    </div>
                </td>
            </tr>
            @empty
                <tr>
                    <td>žiadne otazky</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</div>


@endsection