<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function AllUser()
    {

        $user = User::latest()->get();
        return view('backend.user.all_user', compact('user'));
    } // End Method 

    public function AddUser()
    {
        return view('backend.user.add_user');
    } // End Method 

    public function AddSupplier()
    {
        return view('backend.supplier.add_supplier');
    } // End Method 


    public function StoreUser(Request $request)
    {

        $validateData = $request->validate(
            [
                'name' => 'required|unique:users|max:200',
                'email' => 'required|unique:users|max:200',
                'phone' => 'required',
                // 'role' => 'role',
                'password' => [
                    'required',
                    'min:8',
                ],


            ],

            [
                'name.required' => 'This User Name Field Is Required',
            ]

        );



        User::insert([

            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'role' => $request->role,
            'password' => Hash::make($request->password),



        ]);

        $notification = array(
            'message' => 'User Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.user')->with($notification);
    } // End Method 

    public function DeleteUser($id)
    {

        User::findOrFail($id)->delete();

        $notification = array(
            'message' => 'User Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // End Method 
}
