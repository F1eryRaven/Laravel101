<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Exception;
use Faker\Provider\Company as ProviderCompany;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;


class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = DB::table('companies')->select('companies.Name', 'companies.Email','companies.Website','companies.LogoLocation', 'companies.id')->simplepaginate(10);
        return view('CP-index', compact("companies"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('CP-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     $image= $request->file('image');
        if(!$image != '')
        {
            $request->validate(['Name' => 'required|max:255',
            'Email' => 'required|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'Website' => 'Max:30']);
            $image_name= rand().'.'. $image->getClientOriginalExtension();
            $image-> store(public_path('images'), $image_name); 
        }
        else {
            $request->validate([
            'Name' => 'required|max:255',
            'Email' => 'required|max:255',
            'Website' => 'Max:30']);
        } 
        $form_Data= array(
            'Name' => $request->Name,
            'Email'=> $request->Email,
            'LogoLocation' => $image,
            'Website'=> $request->Website
            
        );
        Company::store($form_Data);
        return redirect('/companies')->with('success', 'Data updated successfully'); 
         
            
    
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
        $companies=Company::findOrFail($id);
        return view('CP-edit',compact('companies'));
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
        $image= $request->file('image');
        if(!$image != '')
        {
            $request->validate(['Name' => 'required|max:255',
            'Email' => 'required|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'Website' => 'Max:30']);
            $image_name= rand().'.'. $image->getClientOriginalExtension();
            $image-> store(public_path('images'), $image_name); 
        }
        else {
            $request->validate([
            'Name' => 'required|max:255',
            'Email' => 'required|max:255',
            'Website' => 'Max:30']);
        } 
        $form_Data= array(
            'Name' => $request->Name,
            'Email'=> $request->Email,
            'LogoLocation' => $image,
            'Website'=> $request->Website
            
        );
        Company::where('ID','=',$id)->update($form_Data);
        return redirect('/companies')->with('success', 'Data updated successfully'); 
         
            
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Company = Company::findOrFail($id);
        $Company->delete();

        return redirect('/companies')->with('completed', 'Company has been deleted');
    }
}
