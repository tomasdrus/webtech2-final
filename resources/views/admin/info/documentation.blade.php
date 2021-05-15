@extends('layouts.admin')
@section('title', 'Admin - documentation')
@section('content')

<div class="bg-white p-5 m-5 rounded-lg">
    <h4 class="font-semibold mb-3">Tasks list</h4>

    <table class="w-full bg-white border border-gray-200">
        <thead class="bg-gray-200 text-gray-700 text-sm uppercase font-semibold text-left">
            <tr>
                <th class="py-3 px-4 font-semibold text-sm w-5">Package</th>
                <th class="py-3 px-4 font-semibold text-sm text-center">aaa</th>
                <th class="py-3 px-4 font-semibold text-sm text-center">bb</th>
                <th class="py-3 px-4 font-semibold text-sm text-center">cc</th>
                <th class="py-3 px-4 font-semibold text-sm text-center">dd</th>
                </th>
            </tr>
        </thead>
        <tbody class="text-gray-600">
            <tr>
                <td class="py-3 px-4 border border-gray-200">xxx</td>
                <td class="py-3 px-4 border border-gray-200 text-center">xx</td>
                <td class="py-3 px-4 border border-gray-200 text-center">xx</td>
                <td class="py-3 px-4 border border-gray-200 text-center">xx</td>
                <td class="py-3 px-4 border border-gray-200 text-center">xx</td>
            </tr>
        </tbody>
    </table>

</div>

@endsection