@extends('layouts.main')

@section('content-title')
    Remove Employee {{ $employeeData->lname }}, {{ $employeeData->fname }} {{ $employeeData->mname }}?
@endsection

@section('content')
    <center>
        <div class="m-5 card">
            <div class="p-5 card-header bg-danger text-white">
                <h2>Delete Employee {{ $employeeData->lname }}, {{ $employeeData->fname }} {{ $employeeData->mname }}'s
                    Account? </h2>
            </div>
            <div class="p-5 card-body">
                <table>
                    <tr>
                        <th>Employee Id</th>
                        <td>{{ $employeeData->id }}</td>
                    </tr>
                    <tr>
                        <th>Employee Name</th>
                        <td>{{ $employeeData->lname }}, {{ $employeeData->fname }} {{ $employeeData->mname }}</td>
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
                <h3> Do you wish to remove this employee's account? </h3>

                <a class="btn btn-outline-danger btn-block" href="{{ route('employee.destroy', $employeeData->id) }}">
                    <h1>Yes</h1>
                </a>
                <a class="btn btn-outline-primary btn-block"
                    href="
                {{ route('employee.show', $employeeData->id) }}">
                    <h1>No</h1>
                </a>
            </div>
        </div>
    </center>
@endsection
