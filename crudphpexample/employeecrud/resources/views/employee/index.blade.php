@extends('layouts.main')
@section('content-title')
 
    Employees List

@endsection

@section('content')

<center>
    <div class="card sticky-xl-top fixed-top">
        <div class="card-header d-flex justify-content-center ">
            Employees List 
            {{-- <div>
                <a class="btn btn-success" href="{{ route('home') }}">Return to Home</a>
                <a class="btn btn-danger" href="{{ route('logout') }}">Logout</a>
            </div> --}}

        </div>
    </div>
    <br><br>
    <div class="card">
        <div class="card-header">
            <h1>Employee List</h1>
            <a class="btn btn-warning" href="{{ route('employee.create') }}">Add a new Student</a>
        </div>
        <div class="card-body">
        <table class="table table-striped table-hover">

            <tr>
                <th scope="col">Employee ID</th>
                <th scope="col">Employee Name</th>
                <th scope="col">Employee Gender</th>
                <th scope="col">Employee Suffix</th>
                <th colspan="3">Address </th>
                <th scope="col">Birthdate </th>
                <th colspan="2" > Actions </th>
            </tr>
            @foreach ($employeeData  as $employee)
                <tr>
                    <td>{{ $employee->id }}</td>
                    <td>{{ $employee->lname }}, {{ $employee->fname }}</td>
                    <td>{{ $employee->gender_id }}</td>
                    <td>{{ $employee->suffix_id }}</td>
                    <td colspan="3">{{ $employee->address }}</td>
                    <td>{{ date('F d, Y', strtotime($employee->birthdate)) }}</td>
                    <td>
                        <a class="btn btn-success" href="{{ route('employee.show', $employee->id) }}">View</a>
                        <a class="btn btn-primary" href="{{ route('employee.edit', $employee->id) }}">Edit</a>
                        <a class="btn btn-danger" href="{{ route('employee.delete', $employee->id) }}">Delete</a>
                    </td>

                </tr>
            @endforeach
            {{-- <tr>
                <td colspan="7" id="nav-links">{{ $employeeCollection->links() }}</td>
            </tr> --}}
        </table>
        </div>
    </div>
</center>

@endsection




@section('scripts')

@stop