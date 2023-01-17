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
                                <th><label for="gender">Gender:</label></th>
                                <td colspan="2"><select name="gender" id="gender">
                                        @php
                                            $count = 1;
                                        @endphp
                                        @foreach ($gender as $item => $words)
                                            @if ($count == 1 and old('gender') != $item)
                                                <option value="{{ $item }}" selected>{{ $words }}</option>
                                            @elseif(old('gender') == $item)
                                                <option value="{{ $item }}" selected>{{ $words }}</option>
                                            @else
                                                <option value="{{ $item }}">{{ $words }}</option>
                                            @endif
                                            @php
                                                $count++;
                                            @endphp
                                        @endforeach
                                    </select></td>
                                <td>
                                    @foreach ($errors->get('gender') as $errorMessage)
                                        <span>{{ $errorMessage }}</span>
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <th><label for="suffix">Suffix:</label></th>
                                <td colspan="2"><select name="suffix" id="suffix" value="{{ old('suffix') }}">
                                        @php
                                            $count = 1;
                                        @endphp
                                        @foreach ($suffix as $item => $words)
                                            @if ($count == 1 and old('suffix') != $item)
                                                <option value="{{ $item }}" selected>{{ $words }}</option>
                                            @elseif(old('suffix') == $item)
                                                <option value="{{ $item }}" selected>{{ $words }}</option>
                                            @else
                                                <option value="{{ $item }}">{{ $words }}</option>
                                            @endif
                                            @php
                                                $count++;
                                            @endphp
                                        @endforeach
                                    </select></td>
                                <td>
                                    @foreach ($errors->get('suffix') as $errorMessage)
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
