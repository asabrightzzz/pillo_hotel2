<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $employee = Employee::all();
    return view('employee.index', compact('employee'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employee.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    $request->validate([
        'name' => 'required|string|max:255',
        'phone' => 'required|string|max:20',
        'email' => 'required|email|unique:employees,email',
        'password' => 'required|string|min:6',
        'gender' => 'nullable|string'
    ]);

    // simpan data
    Employee::create([
        'name' => $request->name,
        'phone' => $request->phone,
        'email' => $request->email,
        'password' => bcrypt($request->password), // jangan plain text ya
        'gender' => $request->gender
    ]);

    return redirect()->route('employee.index')->with('success', 'Employee added successfully!');      
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        return view('employees.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        $employee->name      = $request->code;
        $employee->phone  = $request->guest_id;
        $employee->email    = $request->status;
        $employee->password   = $request->voucher;
        $employee->password   = $request->voucher;
        $employee->update();

        return redirect('employee');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()->route('employee.index')
        ->with('success', 'Employee berhasil dihapus');
    }
}
