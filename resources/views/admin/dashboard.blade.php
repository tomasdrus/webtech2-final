@extends('layouts.admin')
@section('title', 'Admin - dashboard')
@section('content')

<div class="bg-white p-5 m-5 rounded-lg">
    <h4 class="font-semibold mb-3">Active exams</h4>

    <table class="w-full bg-white border border-gray-200">
        <thead class="bg-gray-200 text-gray-700 text-sm uppercase font-semibold text-left">
            <tr>
                <th class="py-3 px-4 font-semibold text-sm w-5">Id</th>
                <th class="py-3 px-4 font-semibold text-sm">name</th>
                <th class="py-3 px-4 font-semibold text-sm text-center w-24">status</th>
                <th class="py-3 px-4 font-semibold text-sm text-center w-24">actions</th>
            </th></tr>
        </thead>
        <tbody class="text-gray-600">
{{--             <tr>
                <td class="py-3 px-4 border border-gray-200">1</td>
                <td class="py-3 px-4 border border-gray-200 max-w-xs overflow-hidden whitespace-nowrap">Zápočtový test z matematiky</td>
                <td class="py-3 px-4 border border-gray-200 text-center text-green-500">active</td>
                <td class="border border-gray-200">
                    <div class="flex content-center justify-center">
                        <a href="#" class="px-1 mr-1 text-green-500 hover:text-green-600"><i class="fad fa-play"></i></a>
                        <a href="#" class="px-1 text-red-500 hover:text-red-600"><i class="fad fa-stop"></i></a>
                    </div>
                </td>
            </tr> --}}
            @forelse($exams as $exam)
            <tr>
                <td class="py-3 px-4 border border-gray-200">{{ $exam->id }}</td>
                <td class="py-3 px-4 border border-gray-200 max-w-xs overflow-hidden whitespace-nowrap">{{ $exam->name }}</td>
                <td class="py-3 px-4 border border-gray-200 {{ $exam->active == 1 ? 'text-green-500' : 'text-red-500' }}">
                    @if ($exam->active == 1)
                        active
                    @else
                        stopped
                    @endif
                </td>
                <td class="border border-gray-200">
                    @if ($exam->active == 1)
                        <a href="#" class="px-1 text-green-500 hover:text-green-600"><i class="fad fa-play"></i></a>
                    @else
                        <a href="#" class="px-1 text-red-500 hover:text-red-600"><i class="fad fa-stop"></i></a>
                    @endif
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