<?php

namespace App\Http\Controllers;

use App\Company;
use App\Http\Requests\CompanyRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class CompanyController extends Controller
{
    public function index(){

        $companies = Company::select([ 'id', 'name', 'logo', 'email', 'website' ])->paginate(10);

        return view('company.listing', [
            'companies' => $companies
        ]);

    }

    public function create() {
		return view('company.create');
	}

    /* store data into database */
    // Method 1: use Request 
    // public function store( Request $request ) {
    //     //dd($request);
    //     $request->validate([
    //         'name' => 'required',
    //         'email' => 'required|email',
    //     ]);

    //     $company = Company::create($request->all());

    //     // store logo image
    //     if($request->has('logo')){
    //         $company->update([ 'logo' => $request->file('logo')->store('images', 'public') ]);
    //     }

    //     return redirect()->route('company-listing')->with('success', 'Company has been created successfully.');
    // }

    // Method 2: use CompanyRequest
    public function store(CompanyRequest $request) {
        // validate only what has been defined in CompanyRequest
        $request->validated();

        // store validated data as a new record
        $company = Company::create($request->all());

        if($request->has('logo')){
            $company->update([ 'logo' => $request->file('logo')->store('images', 'public') ]);
        }

        return redirect()->route('company-listing')->with('success', 'Company has been created successfully.');
    }

    public function edit($id) {
        $company = Company::findOrFail($id);

        return view('company.edit', [
            'company' => $company
        ]);
    }

    public function update(CompanyRequest $request, $id) {
        $company = Company::findOrFail($id);

        $company->name = $request->name;
        $company->email = $request->email;
        $company->website = $request->website;
        
        if($request->has('logo')){
            $company->update([ 'logo' => $request->file('logo')->store('images', 'public') ]);
        }

        $company->save();

        return redirect()->route('company-listing')->with('success', 'Company has been updated successfully');
    }

    public function destroy($id){
        $company = Company::findOrFail($id);

        $company->delete();

        return redirect()->route('company-listing')->with('success', 'Company has been deleted successfully');
    }
}
