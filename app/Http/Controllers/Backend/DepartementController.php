<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Departement;
use Illuminate\Http\Request;

class DepartementController extends Controller
{
    public function AllDepartement()
    {

        $departement = Departement::latest()->get();
        return view('backend.departement.all_departement', compact('departement'));
    } // End Method 


    public function AddDepartement()
    {
        return view('backend.departement.add_departement');
    } // End Method 


    public function StoreDepartement(Request $request)
    {

        $validateData = $request->validate(
            [
                'name' => 'required|unique:containers|max:200',
                'descreption' => 'required',


            ],

            [
                'name.required' => 'This Depaertement Name Field Is Required',
            ]

        );



        Departement::insert([

            'name' => $request->name,
            'descreption' => $request->descreption,




        ]);

        $notification = array(
            'message' => 'Departement Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.departement')->with($notification);
    } // End Method 

    public function EditDepartement($id)
    {

        $departement = Departement::findOrFail($id);
        return view('backend.departement.edit_departement', compact('departement'));
    } // End Method 

    public function UpdateDepartement(Request $request)
    {

        $departement_id = $request->id;

        Departement::findOrFail($departement_id)->update([


            'name' => $request->name,
            'descreption' => $request->descreption,

        ]);


        $notification = array(
            'message' => 'Departement Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.departement')->with($notification);
    } // End Method

    public function DeleteDepartement($id)
    {

        Departement::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Departement Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // End Method 
}
