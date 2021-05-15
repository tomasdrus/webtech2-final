@extends('layouts.admin')
@section('title', 'Admin - tasks list')
@section('content')

<div class="bg-white p-5 m-5 rounded-lg">
    <h4 class="font-semibold mb-3">Tasks list</h4>

    <table class="w-full bg-white border border-gray-200">
        <thead class="bg-gray-200 text-gray-700 text-sm uppercase font-semibold text-left">
            <tr>
                <th class="py-3 px-4 font-semibold text-sm">Task</th>
                <th class="py-3 px-4 font-semibold text-sm text-center">Tomáš</th>
                <th class="py-3 px-4 font-semibold text-sm text-center">Alan</th>
                <th class="py-3 px-4 font-semibold text-sm text-center">Samo</th>
                <th class="py-3 px-4 font-semibold text-sm text-center">Filip</th>
                <th class="py-3 px-4 font-semibold text-sm text-center">Ján</th>
            </tr>
        </thead>
        <tbody class="text-gray-600">
            <tr>
                <td class="py-3 px-4 border border-gray-200">Login / registration</td>
                <td class="py-3 px-4 border border-gray-200 text-center text-blue-500"><i class="far fa-check-square"></i></td>
                <td class="py-3 px-4 border border-gray-200 text-center text-blue-500"><i class="far fa-check-square"></i></td>
                <td class="py-3 px-4 border border-gray-200 text-center text-blue-500"><i class="far fa-check-square"></i></td>
                <td class="py-3 px-4 border border-gray-200 text-center text-blue-500"><i class="far fa-check-square"></i></td>
                <td class="py-3 px-4 border border-gray-200 text-center text-blue-500"><i class="far fa-check-square"></i></td>
            </tr>
            <tr>
                <td class="py-3 px-4 border border-gray-200">Questions with answer</td>
                <td class="py-3 px-4 border border-gray-200 text-center text-blue-500"></td>
                <td class="py-3 px-4 border border-gray-200 text-center text-blue-500"></td>
                <td class="py-3 px-4 border border-gray-200 text-center text-blue-500"><i class="far fa-check-square"></i></td>
                <td class="py-3 px-4 border border-gray-200 text-center text-blue-500"></td>
                <td class="py-3 px-4 border border-gray-200 text-center text-blue-500"></td>
            </tr>
            <tr>
                <td class="py-3 px-4 border border-gray-200">Questions with pairs</td>
                <td class="py-3 px-4 border border-gray-200 text-center text-blue-500"><i class="far fa-check-square"></i></td>
                <td class="py-3 px-4 border border-gray-200 text-center text-blue-500"></td>
                <td class="py-3 px-4 border border-gray-200 text-center text-blue-500"></td>
                <td class="py-3 px-4 border border-gray-200 text-center text-blue-500"></td>
                <td class="py-3 px-4 border border-gray-200 text-center text-blue-500"></td>
            </tr>
            <tr>
                <td class="py-3 px-4 border border-gray-200">Questions with options</td>
                <td class="py-3 px-4 border border-gray-200 text-center text-blue-500"></td>
                <td class="py-3 px-4 border border-gray-200 text-center text-blue-500"><i class="far fa-check-square"></i></td>
                <td class="py-3 px-4 border border-gray-200 text-center text-blue-500"></td>
                <td class="py-3 px-4 border border-gray-200 text-center text-blue-500"></td>
                <td class="py-3 px-4 border border-gray-200 text-center text-blue-500"></td>
            </tr>
            <tr>
                <td class="py-3 px-4 border border-gray-200">Questions with drawing</td>
                <td class="py-3 px-4 border border-gray-200 text-center text-blue-500"></td>
                <td class="py-3 px-4 border border-gray-200 text-center text-blue-500"></td>
                <td class="py-3 px-4 border border-gray-200 text-center text-blue-500"></td>
                <td class="py-3 px-4 border border-gray-200 text-center text-blue-500"></td>
                <td class="py-3 px-4 border border-gray-200 text-center text-blue-500"><i class="far fa-check-square"></i></td>
            </tr>
            <tr>
                <td class="py-3 px-4 border border-gray-200">Questions with math</td>
                <td class="py-3 px-4 border border-gray-200 text-center text-blue-500"></td>
                <td class="py-3 px-4 border border-gray-200 text-center text-blue-500"></td>
                <td class="py-3 px-4 border border-gray-200 text-center text-blue-500"></td>
                <td class="py-3 px-4 border border-gray-200 text-center text-blue-500"><i class="far fa-check-square"></i></td>
                <td class="py-3 px-4 border border-gray-200 text-center text-blue-500"></td>
            </tr>
            <tr>
                <td class="py-3 px-4 border border-gray-200">Exam finish</td>
                <td class="py-3 px-4 border border-gray-200 text-center text-blue-500"><i class="far fa-check-square"></i></td>
                <td class="py-3 px-4 border border-gray-200 text-center text-blue-500"></td>
                <td class="py-3 px-4 border border-gray-200 text-center text-blue-500"></td>
                <td class="py-3 px-4 border border-gray-200 text-center text-blue-500"><i class="far fa-check-square"></i></td>
                <td class="py-3 px-4 border border-gray-200 text-center text-blue-500"><i class="far fa-check-square"></i></td>
            </tr>
            <tr>
                <td class="py-3 px-4 border border-gray-200">Exams activation</td>
                <td class="py-3 px-4 border border-gray-200 text-center text-blue-500"><i class="far fa-check-square"></i></td>
                <td class="py-3 px-4 border border-gray-200 text-center text-blue-500"></td>
                <td class="py-3 px-4 border border-gray-200 text-center text-blue-500"></td>
                <td class="py-3 px-4 border border-gray-200 text-center text-blue-500"></td>
                <td class="py-3 px-4 border border-gray-200 text-center text-blue-500"></td>
            </tr>
            <tr>
                <td class="py-3 px-4 border border-gray-200">Multiple exams & info</td>
                <td class="py-3 px-4 border border-gray-200 text-center text-blue-500"><i class="far fa-check-square"></i></td>
                <td class="py-3 px-4 border border-gray-200 text-center text-blue-500"><i class="far fa-check-square"></i></td>
                <td class="py-3 px-4 border border-gray-200 text-center text-blue-500"><i class="far fa-check-square"></i></td>
                <td class="py-3 px-4 border border-gray-200 text-center text-blue-500"><i class="far fa-check-square"></i></td>
                <td class="py-3 px-4 border border-gray-200 text-center text-blue-500"><i class="far fa-check-square"></i></td>
            </tr>
            <tr>
                <td class="py-3 px-4 border border-gray-200">Export PDF</td>
                <td class="py-3 px-4 border border-gray-200 text-center text-blue-500"><i class="far fa-check-square"></i></td>
                <td class="py-3 px-4 border border-gray-200 text-center text-blue-500"><i class="far fa-check-square"></i></td>
                <td class="py-3 px-4 border border-gray-200 text-center text-blue-500"><i class="far fa-check-square"></i></td>
                <td class="py-3 px-4 border border-gray-200 text-center text-blue-500"></td>
                <td class="py-3 px-4 border border-gray-200 text-center text-blue-500"></td>
            </tr>
            <tr>
                <td class="py-3 px-4 border border-gray-200">Export CSV</td>
                <td class="py-3 px-4 border border-gray-200 text-center text-blue-500"></td>
                <td class="py-3 px-4 border border-gray-200 text-center text-blue-500"><i class="far fa-check-square"></i></td>
                <td class="py-3 px-4 border border-gray-200 text-center text-blue-500"><i class="far fa-check-square"></i></td>
                <td class="py-3 px-4 border border-gray-200 text-center text-blue-500"></td>
                <td class="py-3 px-4 border border-gray-200 text-center text-blue-500"></td>
            </tr>
            <tr>
                <td class="py-3 px-4 border border-gray-200">Docker</td>
                <td class="py-3 px-4 border border-gray-200 text-center text-blue-500"></td>
                <td class="py-3 px-4 border border-gray-200 text-center text-blue-500"></td>
                <td class="py-3 px-4 border border-gray-200 text-center text-blue-500"><i class="far fa-check-square"></i></td>
                <td class="py-3 px-4 border border-gray-200 text-center text-blue-500"><i class="far fa-check-square"></i></td>
                <td class="py-3 px-4 border border-gray-200 text-center text-blue-500"></td>
            </tr>
            <tr>
                <td class="py-3 px-4 border border-gray-200">Database design</td>
                <td class="py-3 px-4 border border-gray-200 text-center text-blue-500"><i class="far fa-check-square"></i></td>
                <td class="py-3 px-4 border border-gray-200 text-center text-blue-500"><i class="far fa-check-square"></i></td>
                <td class="py-3 px-4 border border-gray-200 text-center text-blue-500"><i class="far fa-check-square"></i></td>
                <td class="py-3 px-4 border border-gray-200 text-center text-blue-500"><i class="far fa-check-square"></i></td>
                <td class="py-3 px-4 border border-gray-200 text-center text-blue-500"><i class="far fa-check-square"></i></td>
            </tr>
            <tr>
                <td class="py-3 px-4 border border-gray-200">UI and UX design</td>
                <td class="py-3 px-4 border border-gray-200 text-center text-blue-500"><i class="far fa-check-square"></i></td>
                <td class="py-3 px-4 border border-gray-200 text-center text-blue-500"></td>
                <td class="py-3 px-4 border border-gray-200 text-center text-blue-500"></td>
                <td class="py-3 px-4 border border-gray-200 text-center text-blue-500"></td>
                <td class="py-3 px-4 border border-gray-200 text-center text-blue-500"></td>
            </tr>
        </tbody>
    </table>

</div>

@endsection