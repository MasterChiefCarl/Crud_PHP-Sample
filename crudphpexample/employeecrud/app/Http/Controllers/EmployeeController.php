<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Gender;
use App\Suffix;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class EmployeeController extends Controller
{

    // private $suffix = [
    //     '0' => '--Select--',
    //     '1' => ' (None)',
    //     '2' => 'Sr.',
    //     '3' => 'Jr.',
    //     '4' => 'III',
    //     '5' => 'IV',
    //     '6' => 'V'
    // ];

    // private $genders = [
    //     '0' => '--Select--',
    //     '1' => 'Male',
    //     '2' => 'Female',
    //     '3' => 'Others'
    // ];

    public function index()
    {
        $employeeData = Employee::join('genders',  'employees.gender_id', '=', 'genders.id')
            ->leftJoin('suffixes', 'employees.suffix_id', '=', 'suffixes.id')
            ->select('genders.gender_name', 'suffixes.suffix_name', 'employees.id', 'lname', 'fname', 'mname', 'address', 'birthdate')
            ->get();

        return view("employee.index", compact('employeeData'));
    }

    
}
