@extends('layouts.main')
@section('content-title')
    Create Employee

@endsection

@section('content')
    <section id="creation-form">
        <div class="m-5 card">
            <div class=" p-5 bg-warning card-header">
                <h1>Add employee Information</h1>
            </div>

            <div class=" p-5 card-body">
                <form action="{{ route('employee.store') }}" method="post">
                    {{ csrf_field() }}
                    {{-- <input type="hidden" name="_token" value='{{ csrf_token() }}'> --}}

                    <center>
                        <table>
                            <tr>
                                <th><label for="fname">First Name:</label></th>
                                <td colspan="2"><input type="text" name='fname' id='fname'
                                        value="{{ old('fname') }}"></td>
                                <td>
                                    @foreach ($errors->get('fname') as $errorMessage)
                                        <span>{{ $errorMessage }}</span>
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <th><label for="mname">
                                        Middle Name (optional): </label></th>
                                <td colspan="2"><input type="text" name='mname' id='mname'></td>
                            </tr>
                            <tr>
                                <th><label for="lname">
                                        Last Name:</label></th>
                                <td colspan="2"><input type="text" name='lname' id='lname'
                                        value="{{ old('lname') }}"></td>
                                <td>
                                    @foreach ($errors->get('lname') as $errorMessage)
                                        <span>{{ $errorMessage }}</span>
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <th><label for="gender_id">Gender:</label></th>
                                <td colspan="2"><select name="gender_id" id="gender_id" >
                                    <option selected>--Select--</option>
                                        @foreach ($gender as $genders)
                                            <option value= '{{$genders['id']}}'> {{ $genders['gender_name'] }}</option>
                                        @endforeach
                                    </select></td>
                                <td>
                                    @foreach ($errors->get('gender_id') as $errorMessage)
                                        <span>{{ $errorMessage }}</span>
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <th><label for="suffix_id">suffix_id:</label></th>
                                <td colspan="2"><select name="suffix_id" id="suffix_id" value="{{ old('suffix') }}">
                                    <option selected>--Select--</option>
                                        @foreach ($suffix as $suffixes)
                                            <option value= '{{$suffixes['id']}}'> {{ $suffixes['suffix_name'] }}</option>
                                        @endforeach
                                    </select></td>
                                <td>
                                    @foreach ($errors->get('suffix_id') as $errorMessage)
                                        <span>{{ $errorMessage }}</span>
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <th><label for="address">Employee Address</label></th>
                                <td colspan="2"> <input type="text" name='address' id='address'
                                        value="{{ old('address') }}">
                                </td>
                                <td>
                                    @foreach ($errors->get('address') as $errorMessage)
                                        <span>{{ $errorMessage }}</span>
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <th><label for="birthdate">
                                        Birthdate:</label></th>
                                <td colspan="2"><input type="date" name='birthdate' id='birthdate'
                                        value="{{ old('birthdate') }}">
                                </td>
                                <td>
                                    @foreach ($errors->get('birthdate') as $errorMessage)
                                        <span>{{ $errorMessage }}</span>
                                    @endforeach
                                </td>

                            </tr>

                        </table>
                        <button type='submit' class="btn btn-lg btn-primary">
                            Add employee
                        </button>
                        <button type='reset' class="btn btn-lg btn-danger">
                            Clear Values
                        </button>
                        <a class="btn btn-lg btn-success" href="{{ route('employee.all') }}">
                            Cancel
                        </a>

                </form>

                </center>
            </div>
        </div>
    </section>


@endsection




@section('scripts')

@stop
