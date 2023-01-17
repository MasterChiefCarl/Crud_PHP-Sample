<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Gender;
use App\Suffix;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class EmployeeController extends Controller
{

    private $suffix = [
        '0' => '--Select--',
        '1' => ' (None)',
        '2' => 'Sr.',
        '3' => 'Jr.',
        '4' => 'III',
        '5' => 'IV',
        '6' => 'V'
    ];

    private $genders = [
        '0' => '--Select--',
        '1' => 'Male',
        '2' => 'Female',
        '3' => 'Others'
    ];

    public function index (){
        return view("employee.index");
    }

    public function showAll() {
        $employeeData = Employee::all();
        
        return view("employee.index", compact('employeeData'));
    }

    public function show($id) {
        $employeeData = Employee::where('id', $id)->first();
        return view("employee.show", compact('employeeData'));
    }

    public function create() {
        $gender = $this->genders;
        $suffix = $this->suffix;
        return view("employee.create", compact('gender','suffix'));
    }

    public function store(Request $request) {

        $rules = [
            'gender' => 'required|required_if:type_id,==,0',
            'fname' => 'required',
            'lname' => 'required',
            'address' => 'required',
            'birthdate' => 'required',
            'suffix'    => 'required|required_if:type_id,==,0',

        ];

        $messages = [
            'gender.required' => 'Please supply gender.',
            'fname.required' => 'The First Name should not be empty.',
            'lname.required' => 'The Last Name should not be empty.',
            'address.required' => 'The Address should not be empty.',
            'birthdate.required' => 'The Birthdate should not be empty.',
            'suffix.required' => 'The Suffix should not be empty.',
        ];

        $validation = Validator::make($request->input(), $rules, $messages);

        if ($validation->fails()) {    //$validation->passes()
            return redirect()->back()->withInput()->withErrors($validation);
        } else {

            $newEmp = new Employee;

            $newEmp->create([
                'fname' => $request->fname,
                'mname' => $request->mname,
                'lname' => $request->lname,
                'gender_id' => $request->gender,
                'suffix_id' => $request->suffix,
                'address' => $request->address,
                'birthdate' => $request->birthdate,
            ]);

            return redirect()->route('employee.index');
        }
        
        return redirect()->route('employee.index');
    }

    public function edit($id) {
        $gender = $this->genders;
        $suffix = $this->suffix;
        $employeeData = Employee::where('id', $id)->first();
        return view("employee.edit", compact('employeeData', 'gender', 'suffix'));
    }

    public function update(Request $request, $id){

        $rules = [
            'fname' => 'required',
            'lname' => 'required',
        ];

        $messages = [
            'fname.required' => 'The First Name should not be empty.',
            'lname.required' => 'The Last Name should not be empty.',
        ];

        $validation = Validator::make($request->input(), $rules, $messages);

        if ($validation->fails()) {    //$validation->passes()
            return redirect()->back()->withErrors($validation);
        } else {

            $updateEmp = Employee::findOrFail($id);

            

            $updateEmp->update([
                'fname' => $request->fname,
                'mname' => $request->mname,
                'lname' => $request->lname,
                'gender_id' => $request->gender,
                'suffix_id' => $request->suffix,
                'address' => $request->address,
                'birthdate' => $request->birthdate,
            ]);

            return redirect()->route('employee.index');
        }
    }

    public function delete ($id){
        $employeeData = Employee::where('id', $id)->first();
        return view("employee.delete", compact('employeeData'));
    }
    
    public function destroy ($id){
        $employeeData = Employee::findOrFail($id);
        if ($employeeData) {
            echo 'Deleting student information.';
            $employeeData->delete();
            return redirect()->to(route('employee.all'));
        }
    }


    
}
