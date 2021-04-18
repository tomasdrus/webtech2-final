@extends('layouts.admin')
@section('title', 'Admin - dashboard')
@section('name', $LoggedTeacherInfo['forename'] . ' ' . $LoggedTeacherInfo['surname'])
@section('content')

<div class="container">
    <div class="card">
        <h3 class="card__heading">Active tests</h3>

        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Code</th>
                    <th>Time</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Zápočet OS</td>
                    <td>ZT24H3</td>
                    <td>90 min</td>
                    <td>not active</td>
                </tr>
            </tbody>
        </table>

        <label for="name" class="label">Test name</label>
        <input type="text" class="input" id="name">
        <p>{{$LoggedTeacherInfo['forename']}}</p>

    </div>

    
</div>


@endsection