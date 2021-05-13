@extends('layouts.admin')
@section('title', 'Admin - all exams')
@section('content')

<div class="bg-white p-5 m-5 rounded-lg">
    <h4 class="font-semibold mb-3">All Exams</h4>

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
                <th class="py-3 px-4 font-semibold text-sm text-center w-24">length</th>
                <th class="py-3 px-4 font-semibold text-sm text-center w-24">PDF</th>
                <th class="py-3 px-4 font-semibold text-sm text-center w-24">CSV</th>
                </th>
            </tr>
        </thead>
        <tbody class="text-gray-600">

            @forelse($exams as $exam)
            <tr>
                <td class="py-3 px-4 border border-gray-200">{{ $exam->id }}</td>
                <td class="py-3 px-4 border border-gray-200 max-w-xs overflow-hidden whitespace-nowrap">{{ $exam->name }}</td>
                <td class="py-3 px-4 border border-gray-200 text-center">{{ $exam->length }} m</td>
                <td class="border border-gray-200 text-center">
                    <form action="{{ route('admin.pdf.show',['id' => $exam->id])}} " method="GET">
                        @csrf
                        <button type="submit" class="px-1 text-blue-500 hover:text-blue-600"><i class="far fa-file-pdf"></i></button>
                    </form>
                </td>
                <td class="border border-gray-200 text-center">
                    <form action="{{ route('admin.csv.show',['id' => $exam->id])}} " method="GET">
                        @csrf
                        <button type="submit" class="px-1 text-green-500 hover:text-green-600"><i class="far fa-file-csv"></i></button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td class="py-3 px-4 border border-gray-200 text-center text-yellow-500">X</td>
                <td class="py-3 px-4 border border-gray-200 text-yellow-500">No exams found in database</td>
                <td class="py-3 px-4 border border-gray-200 text-center text-yellow-500">none</td>
                <td class="py-3 px-4 border border-gray-200 text-center text-yellow-500">none</td>
                <td class="py-3 px-4 border border-gray-200 text-center text-yellow-500">none</td>
            </tr>
            @endforelse
        </tbody>
    </table>

</div>


@endsection