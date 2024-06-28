<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees=Employee::all();
//        var_dump($employees);die;
        return view('employees.index',compact('employees'));
    }

    public function create()
    {
        return view('employees.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required ',
            'password'=>'required'
        ]);

        $employees=Employee::create($request->all());

    }

    public function show(Employee $employee)
    {
        return view('employees.show',compact('employee'));
    }

    public function edit(Employee $employee)
    {
        return view('employees.edit',compact('employee'));
    }

    public function update(Employee $employee)
    {
//        dd(\request()->all());
        request()->validate([
            'name'=>'required',
            'email'=>'required ',
            'password'=>'required'
        ]);
        $employee->update(\request()->all());

    }

    public function destroy(Employee $employee)
    {

        $employee->delete();
        return redirect()->route('employees.index');
    }
}
