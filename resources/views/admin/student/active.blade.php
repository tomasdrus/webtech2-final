@extends('layouts.admin')
@section('title', 'Admin - active student exams')
@section('content')

<div class="bg-white p-5 m-5 rounded-lg">
    <h4 class="font-semibold mb-3">Active student exams</h4>

    @if (Session::get('success'))
        <p class="px-4 py-3 mb-3 bg-green-200 text-green-800 rounded">{{ Session::get('success') }}</p>
    @endif

    @if (Session::get('error'))
        <p class="px-4 py-3 mb-3 bg-red-200 text-red-800 rounded">{{ Session::get('error') }}</p>
    @endif

    <table class="w-full bg-white border border-gray-200">
        <thead class="bg-gray-200 text-gray-700 text-sm uppercase font-semibold text-left">
            <tr>
                <th class="py-3 px-4 font-semibold text-sm w-5">ID</th>
                <th class="py-3 px-4 font-semibold text-sm">Student name</th>
                <th class="py-3 px-4 font-semibold text-sm text-center">Student AIS</th>
                <th class="py-3 px-4 font-semibold text-sm text-center">Exam ID</th>
                <th class="py-3 px-4 font-semibold text-sm text-center w-20">Detail</th>
            </th></tr>
        </thead>
        <tbody class="text-gray-600">

            @forelse($studentExams as $studentExam)
            <tr>
                <td class="py-3 px-4 border border-gray-200">{{ $studentExam->id }}</td>
                <td class="py-3 px-4 border border-gray-200">{{ $studentExam->forename }} {{ $studentExam->surname }}</td>
                <td class="py-3 px-4 border border-gray-200 text-center">{{ $studentExam->ais }}</td>
                <td class="py-3 px-4 border border-gray-200 text-center">{{ $studentExam->exam_id }}</td>
                <td class="border border-gray-200 text-center">
                    <a href="{{ route('admin.student.detail',['id' => $studentExam->id])}}" class="px-1 text-blue-500 hover:text-blue-600"><i class="far fa-eye"></i></a>   
                </td>
            </tr>
            @empty
                <tr>
                    <td class="py-3 px-4 border border-gray-200 text-center text-yellow-500">X</td>
                    <td class="py-3 px-4 border border-gray-200 text-yellow-500">none</td>
                    <td class="py-3 px-4 border border-gray-200 text-center text-yellow-500">none</td>
                    <td class="py-3 px-4 border border-gray-200 text-center text-yellow-500">none</td>
                    <td class="py-3 px-4 border border-gray-200 text-center text-yellow-500">none</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</div>


@endsection