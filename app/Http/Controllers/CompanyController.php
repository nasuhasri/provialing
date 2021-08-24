<?php

namespace App\Http\Controllers;

use App\Company;
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

    // store data into database
    public function store( Request $request ) {
        //dd($request);
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        $company = Company::create($request->all());

        // store logo image
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

    public function update(Request $request, $id) {
        $company = Company::findOrFail($id);

        $validated_data = $request->validate([
            'name' => 'required',
            'email' => 'required|email'
        ]);

        $company->name = $request->name;
        $company->email = $request->email;
        $company->logo = $request->logo;
        $company->website = $request->website;

        // $val = Validator:make($request->all, [
        //     'imgUpload1' => 'required',
        // ]);

        // if($val->fails()) {
        // return redirect()->back()->with(['message' => 'No file received']);
        // }
        // else {
        //     $file = $request->file('imgUpload1')->store('images');
        //     return redirect()->back();
        // }

        
        if($request->has('logo')){
            // $request->photo->store('images', 'public');
            $company->logo = $request->file('logo')->store('images', 'public');
            // $company->update([ 'logo' => $request->file('logo')->store('images', 'public') ]);
            // Storage::putFile('logo', new File('/app/to/photo'), 'public');
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
