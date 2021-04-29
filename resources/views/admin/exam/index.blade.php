@extends('layouts.admin')
@section('title', 'Admin - question all')
@section('content')

<div class="bg-white p-5 m-5 rounded-lg">
    <h4 class="font-semibold mb-3">All Exams</h4>

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
            <tr>
                <td class="py-3 px-4 border border-gray-200">1</td>
                <td class="py-3 px-4 border border-gray-200 max-w-xs overflow-hidden whitespace-nowrap">Párovanie správnych odpovedí (body za ich správnosť automaticky priraďuje aplikácia)</td>
                <td class="py-3 px-4 border border-gray-200">pairing</td>
                <td class="border border-gray-200">
                    <div class="flex content-center justify-center">
                        <a href="#" class="px-1 mr-1 text-yellow-500 hover:text-yellow-600"><i class="far fa-edit"></i></a>
                        <a href="#" class="px-1 text-red-500 hover:text-red-600"><i class="far fa-trash-alt"></i></a>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>

</div>


@endsection