@extends('layouts.main')

@section('content-title')
    About Employee  {{ $employeeData->lname}}, {{ $employeeData->fname }} {{$employeeData->mname}}

@endsection

@section ('content')
<center>
    <div class="m-5 card">
        <div class="p-5 card-header bg-primary text-white">
            <h1>Employee Information</h1>
        </div>
        <div class="p-5 card-body">
            <table>
                <tr>
                    <th>Employee Id</th>
                    <td>{{ $employeeData->id}}</td>
                </tr>
                <tr>
                    <th>Employee Name</th>
                    <td>{{ $employeeData->lname }}, {{ $employeeData->fname }} {{$employeeData->mname}}</td>
                </tr>
                <tr>
                    <th>Employee Gender</th>
                    <td>{{ $employeeData->gender_name }}</td>
                </tr>
                <tr>
                    <th>Employee Suffix</th>
                    <td>{{ $employeeData->suffix_name }}</td>
                </tr>
                <tr>
                    <th>Employee Address</th>
                    <td>{{ $employeeData->address }}</td>
                </tr>
                <tr>
                    <th>Employee Birthdate</th>
                    <td>{{ date('F d, Y', strtotime($employeeData->birthdate)) }}</td>
                </tr>
                
            </table><br>
            <a class="btn btn-primary" href="{{ route('employee.edit', $employeeData->id) }}">Edit</a>
            <a class="btn btn-success" href="{{ route('employee.all') }}">Return to List</a>
            <a class="btn btn-danger" href="{{ route('employee.delete', $employeeData->id) }}">Delete</a>
        </div>
    </div>
</center>

@endsection