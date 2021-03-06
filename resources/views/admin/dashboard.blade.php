@extends('layouts.admin')
@section('title', 'Admin - dashboard')
@section('content')

<div class="bg-white p-5 m-5 rounded-lg">
    <h4 class="font-semibold">Admin registration token: <span class="text-blue-500">budemadmin</span></h4>
</div>

<div class="bg-white p-5 m-5 mt-0 rounded-lg">
    <h4 class="font-semibold mb-3">Activate exams</h4>

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
                <th class="py-3 px-4 font-semibold text-sm text-center w-20">token</th>
                <th class="py-3 px-4 font-semibold text-sm text-center w-24">status</th>
                <th class="py-3 px-4 font-semibold text-sm text-center w-20">action</th>
            </th></tr>
        </thead>
        <tbody class="text-gray-600">

            @forelse($exams as $exam)
            <tr>
                <td class="py-3 px-4 border border-gray-200">{{ $exam->id }}</td>
                <td class="py-3 px-4 border border-gray-200 max-w-xs overflow-hidden whitespace-nowrap">{{ $exam->name }}</td>
                <td class="py-3 px-4 border border-gray-200 text-center">{{ $exam->token }}</td>
                <td class="py-3 px-4 border border-gray-200 text-center {{ $exam->active == 1 ? 'text-green-500' : 'text-red-500' }}">
                    @if ($exam->active == 1)
                        active
                    @else
                        stopped
                    @endif
                </td>
                <td class="border border-gray-200 text-center">
                    <form action="{{ route('admin.exam.update',['id' => $exam->id])}} " method="POST">
                        @method('PATCH')
                        @csrf
                        @if ($exam->active == 0)
                            <button type="submit" class="px-1 text-green-500 hover:text-green-600"><i class="fad fa-play"></i></button>
                        @else
                            <button type="submit" class="px-1 text-red-500 hover:text-red-600"><i class="fad fa-stop"></i></button>
                        @endif          
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