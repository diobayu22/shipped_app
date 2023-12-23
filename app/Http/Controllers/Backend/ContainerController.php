<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Container;
use Illuminate\Http\Request;

class ContainerController extends Controller
{
    public function AllContainer()
    {

        $container = Container::latest()->get();
        return view('backend.container.all_container', compact('container'));
    } // End Method 


    public function AddContainer()
    {
        return view('backend.container.add_container');
    } // End Method 


    public function StoreContainer(Request $request)
    {

        $validateData = $request->validate(
            [
                'name' => 'required|unique:containers|max:200',
                'descreption' => 'required',
                'max_weight' => 'required',
                'weight' => 'required',

            ],

            [
                'name.required' => 'This Employee Name Field Is Required',
            ]

        );



        Container::insert([

            'name' => $request->name,
            'descreption' => $request->descreption,
            'max_weight' => $request->max_weight,
            'weight' => $request->weight,



        ]);

        $notification = array(
            'message' => 'Container Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.container')->with($notification);
    } // End Method 

    public function EditContainer($id)
    {

        $container = Container::findOrFail($id);
        return view('backend.container.edit_container', compact('container'));
    } // End Method 

    public function UpdateContainer(Request $request)
    {

        $container_id = $request->id;

        Container::findOrFail($container_id)->update([


            'name' => $request->name,
            'descreption' => $request->descreption,
            'max_weight' => $request->max_weight,

            'weight' => $request->weight,
        ]);


        $notification = array(
            'message' => 'Container Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.container')->with($notification);
    } // End Method

    public function DeleteContainer($id)
    {

        Container::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Container Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // End Method 
}
