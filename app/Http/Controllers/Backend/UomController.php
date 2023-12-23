<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Uom;
use Illuminate\Http\Request;

class UomController extends Controller
{
    public function AllUom()
    {

        $uom = Uom::latest()->get();
        return view('backend.uom.all_uom', compact('uom'));
    } // End Method 

    public function AddUom()
    {
        return view('backend.uom.add_uom');
    } // End Method 


    public function StoreUom(Request $request)
    {

        $validateData = $request->validate(
            [
                'name' => 'required|unique:containers|max:200',
                'descreption' => 'required',


            ],

            [
                'name.required' => 'This UOM Name Field Is Required',
            ]

        );



        Uom::insert([

            'name' => $request->name,
            'descreption' => $request->descreption,




        ]);

        $notification = array(
            'message' => 'UOM Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.uom')->with($notification);
    } // End Method 

    public function EditUom($id)
    {

        $uom = Uom::findOrFail($id);
        return view('backend.uom.edit_uom', compact('uom'));
    } // End Method 

    public function UpdateUom(Request $request)
    {

        $uom_id = $request->id;

        Uom::findOrFail($uom_id)->update([


            'name' => $request->name,
            'descreption' => $request->descreption,

        ]);


        $notification = array(
            'message' => 'Uom Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.uom')->with($notification);
    } // End Method

    public function DeleteUom($id)
    {

        Uom::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Uom Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // End Method 
}
