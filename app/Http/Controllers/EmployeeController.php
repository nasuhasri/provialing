<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    public function index() {
        // Cara 1:
        // $employees = Employee::select([ 'id', 'first_name', 'last_name', 'email', 'phone', 'comp_id'])
        //     ->paginate(10);

        // Cara 2: getCompany nama function di Employee model
        // $employees = Employee::with('getCompany')->get();

        // Cara 3:
        // $employees = DB::table('employees')
        //     ->join('companies', 'employees.comp_id', '=', 'companies.id')
        //     ->select('employees.*', 'companies.name')
        //     ->get();

        $employees = DB::table('employees')
            ->leftJoin('companies', 'employees.comp_id', '=', 'companies.id')
            ->select('employees.*', 'companies.name')
            ->get();

        /* Ni tak dapat dikenal pasti sbb apa tak jadi */
        // $employees = Employee::select(['employees.id', 'employees.first_name', 'employees.last_name', 'employees.email', 'employees.phone'])
        //     ->join('companies as comp', function ($join) {
        //         $join->on('employees.comp_id', '=', 'comp.id');
        //     })
        //     ->get();


        return view('employee.listing', [
            'employees' => $employees
        ]);
    }

    public function create() {
        // get all companies name so employees can select any company
        $companies = DB::table('companies')->select(['id', 'name'])->get();

        return view('employee.create', [
            'companies' => $companies
        ]);
    }

    public function store(Request $request) {

        // dd($request);

        $validated_data = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone' => 'numeric|min:5',
            'comp_id' => 'nullable'
        ]);
        

        $employee = Employee::create($validated_data);
        // $employee = Employee::create($request->all());

        return redirect()->route('employee-listing')->with('success', 'Employee successfully created');
    }

    public function edit($id) {
        $employee = Employee::findOrFail($id);

        return view('employee.edit', [
            'employee' => $employee
        ]);
    }

    public function update(Request $request, $id) {
        $employee = Employee::findOrFail($id);

        $request->validate([
            'first_name' => 'required|min:4',
            'email' => 'required|email',
            'phone' => 'numeric|min:5'
        ]);

        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->email = $request->email;
        $employee->phone = $request->phone;

        $employee->save();

        return redirect()->route('employee-listing')->with('success', 'Employee successfully updated.');
    }

    public function destroy($id){
        $employee = Employee::findOrFail($id);

        $employee->delete();

        return redirect()->route('employee-listing')->with('success', 'Employee successfully deleted.');
    }
    
}
