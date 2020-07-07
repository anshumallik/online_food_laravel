<?php

namespace App\Http\Controllers;

use App\User;
use App\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class VendorController extends Controller
{

    public function index()
    {
        $vendors = Vendor::all();
        return view('admin.vendor.index',compact('vendors'))->with('id');
    }


    public function create()
    {
        return view('admin.vendor.create');
    }


    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|same:confirm-password',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        if ($validator->passes()) {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();
            $user->assignRole(['Vendor']);
        }

        $validator = Validator::make($request->all(), [
            'country' => 'required',
            'city' => 'required',
            'zip' => 'required',
            'phone' => 'required',
            'logo' => 'mimes:jpeg,png,jpg|max:10000'

        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }


        if ($validator->passes()) {
            $image = $request->file('logo');
            if (isset($image)) {
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                if (!file_exists('images/vendor')) {
                    mkdir('images/vendor', 0777, true);
                }
                $image->move('images/vendor', $imageName);
            }
            $vendor = new Vendor();
            $vendor->user_id =$user->id ;
            $vendor->city = $request->city;
            $vendor->phone = $request->phone;
            $vendor->logo = $imageName;
            $vendor->country = $request->country;
            $vendor->zip = $request->zip;
//            dd($vendor);
            $vendor->save();
        }

        $notification = array(
            'message' => 'Vendor created Successfully',
            'alert-type' => "success"
        );
        return redirect()->route('vendors.index')
            ->with($notification);


    }

    public function changeStatus(Request $request)
    {
        $user = Vendor::find($request->id);
        $user->status = $request->status;
        $user->save();

        return response()->json(['success'=>'Status change successfully.']);
    }




    public function show(Vendor $vendor)
    {
        //
    }

    public function edit(Vendor $vendor)
    {
        return view('vendor.edit',compact('vendor'));
    }


    public function update(Request $request, Vendor $vendor)
    {
        //
    }


    public function destroy(Vendor $vendor)
    {
        //
    }
}
