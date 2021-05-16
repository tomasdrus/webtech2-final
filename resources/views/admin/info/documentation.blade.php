@extends('layouts.admin')
@section('title', 'Admin - documentation')
@section('content')

<div class="bg-white p-5 m-5 rounded-lg">
    <h4 class="font-semibold mb-3">Documentation</h4>

    <table class="w-full bg-white border border-gray-200">
        <thead class="bg-gray-200 text-gray-700 text-sm uppercase font-semibold text-left">
            <tr>
                <th class="py-3 px-4 font-semibold text-sm w-5">parts </th>
                <th class="py-3 px-4 font-semibold text-sm text-center">Package</th>
                </th>
            </tr>
        </thead>
        <tbody class="text-gray-600">
            <tr>
                <td class="py-3 px-4 border border-gray-200">math</td>
                <td class="py-3 px-4 border border-gray-200 text-center">https://mathlive.io/</td>
            </tr>
            <tr>
                <td class="py-3 px-4 border border-gray-200">pdf</td>
                <td class="py-3 px-4 border border-gray-200 text-center"> https://github.com/barryvdh/laravel-dompdf</td>
            </tr>
            <tr>
                <td class="py-3 px-4 border border-gray-200">csv</td>
                <td class="py-3 px-4 border border-gray-200 text-center">Použili sme: fputcsv</td>
            </tr>
            <tr>
                <td class="py-3 px-4 border border-gray-200">image</td>
                <td class="py-3 px-4 border border-gray-200 text-center">javascript</td>
            </tr>
            <tr>
                <td class="py-3 px-4 border border-gray-200">icons</td>
                <td class="py-3 px-4 border border-gray-200 text-center">https://fontawesome.com/v4.7.0/icons/</td>
            </tr>
            <tr>
                <td class="py-3 px-4 border border-gray-200">CSS</td>
                <td class="py-3 px-4 border border-gray-200 text-center">https://tailwindcss.com/</td>

            </tr>
        </tbody>
    </table>

</div>

@endsection