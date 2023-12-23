<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;

class SupplierController extends Controller
{
    public function AllSupplier()
    {

        $supplier = Supplier::latest()->get();
        return view('backend.supplier.all_supplier', compact('supplier'));
    } // End Method 


    public function AddSupplier()
    {
        return view('backend.supplier.add_supplier');
    } // End Method 


    public function StoreSupplier(Request $request)
    {

        $validateData = $request->validate(
            [
                'name' => 'required|unique:containers|max:200',
                'descreption' => 'required',
                'address' => 'required',
                'phone' => 'required',


            ],

            [
                'name.required' => 'This Supplier Name Field Is Required',
            ]

        );



        Supplier::insert([

            'name' => $request->name,
            'descreption' => $request->descreption,
            'address' => $request->address,
            'phone' => $request->phone,



        ]);

        $notification = array(
            'message' => 'Supplier Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.supplier')->with($notification);
    } // End Method 

    public function EditSupplier($id)
    {

        $supplier = Supplier::findOrFail($id);
        return view('backend.supplier.edit_supplier', compact('supplier'));
    } // End Method 

    public function UpdateSupplier(Request $request)
    {

        $supplier_id = $request->id;

        Supplier::findOrFail($supplier_id)->update([


            'name' => $request->name,
            'descreption' => $request->descreption,
            'address' => $request->address,
            'phone' => $request->phone,

        ]);


        $notification = array(
            'message' => 'Uom Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.supplier')->with($notification);
    } // End Method

    public function DeleteSupplier($id)
    {

        Supplier::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Supplier Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // End Method 
}
