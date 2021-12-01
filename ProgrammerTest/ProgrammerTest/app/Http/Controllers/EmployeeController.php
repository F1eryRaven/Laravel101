<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Exception;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = DB::table('employees')
            ->join('companies', function ($join) {
                $join->on('employees.CompanyID', '=', 'companies.id');
            })->select('employees.id','employees.FirstName', 'employees.LastName', 'employees.Email', 'employees.PhoneNumber', 'companies.Name')->Simplepaginate(10);
        return view('EP-index', compact("employees"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('EP-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'FirstName' => 'required|max:255',
            'LastName' => 'required|max:255',
            'Email' => 'required|max:255',
            'PhoneNumber' => 'required|regex:/[0-9]{9}/',
            'Company' => 'Max:30'
        ]);
        
            $data = $request->input();
            
                $employee = new Employee();
                $employee->FirstName = $data['FirstName'];
                $employee->LastName = $data['LastName'];
                $employee->Email = $data['Email'];
                $employee->PhoneNumber = $data['PhoneNumber'];
                $employee->CompanyID = $data['CompanyID'];
                $employee->save();
                return redirect('/employees')->with('completed', 'Employee has been saved!');
            
            
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee=Employee::findOrFail($id);
        return view('EP-edit',compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Make rules and check them return to previous page if any error occur
              
                $request->validate([
                    'FirstName' => 'required|max:255',
                    'LastName' => 'required|max:255',
                    'Email' => 'required|max:255',
                    'PhoneNumber' => 'required|regex:/[0-9]{9}/',
                    'Company' => 'Max:30',
                ]);
                $form_Data=array(
                    'FirstName'=>  $request->FirstName,
                    'LastName'=> $request->LastName,
                    'Email'=> $request->Email,
                    'PhoneNumber'=> $request->PhoneNumber,
                    'Company' => $request-> Company
                );
                $employee = new Employee();
                $employee->where('ID','=',$id)->update($form_Data);
                return redirect('/employees')->with('completed', 'Employee has been saved!');
             
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Employee = Employee::findOrFail($id);
        $Employee->delete();

        return redirect('/employees')->with('completed', 'Employee has been deleted');
    }
}
