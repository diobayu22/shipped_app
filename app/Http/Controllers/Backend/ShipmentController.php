<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Container;
use App\Models\Shipment;
use App\Models\Item;

class ShipmentController extends Controller
{
    public function AllShipment()
    {

        $shipment = Shipment::latest()->get();
        return view('backend.shipment.all_shipment', compact('shipment'));
    } // End Method 

    public function AddShipment()
    {

        $shipment = Shipment::latest()->get();
        $item = Item::latest()->get();
        $container = Container::latest()->get();
        return view('backend.shipment.add_shipment', compact('shipment', 'item', 'container'));
    } // End Method 

    public function StoreShipment(Request $request)
    {

        $validateData = $request->validate(
            [
                'name' => 'required|unique:containers|max:200',
                'container_id' => 'required',
                'item_id' => 'required',
                'qty' => 'required',
                'weight' => 'required',
                'date' => 'required',
                'status' => 'required'

            ],

            [
                'name.required' => 'This Item Name Field Is Required',
            ]

        );



        Shipment::insert([

            'name' => $request->name,
            'container_id' => $request->container_id,
            'item_id' => $request->item_id,
            'qty' => $request->qty,
            'weight' => $request->weight,
            'date' => $request->date,
            'status' => $request->status



        ]);

        $notification = array(
            'message' => 'Shipment Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.shipment')->with($notification);
    } // End Method 

    public function SendShipment($id)
    {


        $shipment =  Shipment::findOrFail($id);
        $container = Container::latest()->get();
        $item = Item::latest()->get();
        return view('backend.shipment.view_shipment', compact('shipment', 'container', 'item'));
    } // End Method 

    public function UpdateStatus(Request $request)
    {

        $shipment_id = $request->id;

        Shipment::findOrFail($shipment_id)->update(['status' => 'shipped']);

        $notification = array(
            'message' => 'Order Done Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.shipment')->with($notification);
    } // End Method 

}
