<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\Uom;
use App\Models\Item;

class ItemController extends Controller
{
    public function AllItem()
    {

        $ittem = Item::latest()->get();
        return view('backend.item.all_item', compact('ittem'));
    } // End Method 

    public function AddItem()
    {

        $uom = Uom::latest()->get();
        $supplier = Supplier::latest()->get();
        return view('backend.item.add_item', compact('uom', 'supplier'));
    } // End Method 

    public function StoreItem(Request $request)
    {

        $validateData = $request->validate(
            [
                'name' => 'required|unique:containers|max:200',
                'uom_id' => 'required',
                'weight' => 'required',
                'supplier_id' => 'required'

            ],

            [
                'name.required' => 'This Item Name Field Is Required',
            ]

        );



        Item::insert([

            'name' => $request->name,
            'uom_id' => $request->uom_id,
            'weight' => $request->weight,
            'supplier_id' => $request->supplier_id



        ]);

        $notification = array(
            'message' => 'Item Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.item')->with($notification);
    } // End Method 

    public function EditItem($id)
    {

        $item = Item::findOrFail($id);
        $supplier = Supplier::latest()->get();
        $uom = Uom::latest()->get();
        return view('backend.item.edit_item', compact('item', 'supplier', 'uom'));
    } // End Method 

    public function UpdateItem(Request $request)
    {

        $item_id = $request->id;

        Item::findOrFail($item_id)->update([


            'name' => $request->name,
            'uom_id' => $request->uom_id,
            'weight' => $request->weight,
            'supplier_id' => $request->supplier_id

        ]);


        $notification = array(
            'message' => 'Item Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.item')->with($notification);
    } // End Method

    public function DeleteItem($id)
    {

        Item::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Item Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // End Method 
}
