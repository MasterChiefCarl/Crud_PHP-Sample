<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Gender;
use App\Suffix;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class WebViewController extends Controller
{
    public function showAll()
    {
        $employeeData = Employee::join('genders',  'employees.gender_id', '=', 'genders.id')
            ->leftJoin('suffixes', 'employees.suffix_id', '=', 'suffixes.id')
            ->select('genders.gender_name', 'suffixes.suffix_name', 'employees.id', 'lname', 'fname', 'mname', 'address', 'birthdate')
            ->get();

        return view("employee.index", compact('employeeData'));
    }

    public function show($id)
    {
        $employeeData = Employee::where('employees.id', $id)
            ->join('genders',  'employees.gender_id', '=', 'genders.id')
            ->leftJoin('suffixes', 'employees.suffix_id', '=', 'suffixes.id')
            ->select('genders.gender_name', 'suffixes.suffix_name', 'employees.id', 'lname', 'fname', 'mname', 'address', 'birthdate')->get()->first();

        // dd($employeeData);

        return view("employee.show", compact('employeeData'));
    }

    public function create()
    {
        $gender = Gender::all();
        $suffix = Suffix::all();
        return view("employee.create", compact('gender', 'suffix'));
    }

    public function store(Request $request)
    {

        $rules = [
            'gender_id' => 'required',
            'fname' => 'required',
            'lname' => 'required',
            'address' => 'required',
            'birthdate' => 'required',
        ];

        $messages = [
            'gender_id.required' => 'Please supply gender.',
            'fname.required' => 'The First Name should not be empty.',
            'lname.required' => 'The Last Name should not be empty.',
            'address.required' => 'The Address should not be empty.',
            'birthdate.required' => 'The Birthdate should not be empty.',
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

    public function edit($id)
    {
        $gender = Gender::all();
        $suffix = Suffix::all();
        $employeeData = Employee::where('id', $id)->first();
        return view("employee.edit", compact('employeeData', 'gender', 'suffix'));
    }

    public function update(Request $request, $id)
    {

        $rules = [
            'gender_id' => 'required',
            'fname' => 'required',
            'lname' => 'required',
            'address' => 'required',
            'birthdate' => 'required',
        ];

        $messages = [
            'gender_id.required' => 'Please supply gender.',
            'fname.required' => 'The First Name should not be empty.',
            'lname.required' => 'The Last Name should not be empty.',
            'address.required' => 'The Address should not be empty.',
            'birthdate.required' => 'The Birthdate should not be empty.',
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

    public function delete($id)
    {
        $employeeData = Employee::where('employees.id', $id)
            ->join('genders',  'employees.gender_id', '=', 'genders.id')
            ->leftJoin('suffixes', 'employees.suffix_id', '=', 'suffixes.id')
            ->select('genders.gender_name', 'suffixes.suffix_name', 'employees.id', 'lname', 'fname', 'mname', 'address', 'birthdate')->get()->first();

        return view("employee.delete", compact('employeeData', 'fromList'));
    }

    public function destroy($id)
    {
        $employeeData = Employee::findOrFail($id);
        if ($employeeData) {
            echo 'Deleting student information.';
            $employeeData->delete();
            return redirect()->to(route('employee.all'));
        }
    }

}
