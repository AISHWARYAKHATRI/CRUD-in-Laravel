<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customers;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customers::all();
        return view('customer-view', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        echo "<pre>";
        print_r($request->all());

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'gender' => 'required',
            'city' => 'required',
            'phone-no' => 'required|digits:10',
            'dob' => 'required',
            'languages' => 'required',
            'image' => 'required'
        ]);
        
        $customer = new Customers;
        $customer->name = $request['name'];
        $customer->email = $request['email'];
        $customer->gender = $request['gender'];
        $customer->city = $request['city'];
        $customer->phnno = $request['phone-no'];
        $customer->dob = $request['dob'];
        $customer->languages = json_encode($request['languages']);
        if($request->hasfile('image')){
            $file = $request->file('image');
            $fileext = $file->getClientOriginalExtension();
            $filename=time().'.'.$fileext;
            $file->move('public/Image/', $filename);
            $customer->image = $filename; 
        }
        $customer->save();
        return redirect('form/show');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customers = Customers::all();
        $data = compact('customers');
        return view('customer-view')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customers::find($id);
        if(is_null($customer)){
            return redirect('form/show');
        }else{
            $data = compact('customer');
            return view('customer-edit')->with($data);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'gender' => 'required',
            'city' => 'required',
            'phnno' => 'required|digits:10',
            'dob' => 'required',
            'languages' => 'required',
            // 'image' => 'required'
        ]);

        $customer = Customers::find($id); 
        $customer->name = $request['name'];
        $customer->email = $request['email'];
        $customer->gender = $request['gender'];
        $customer->city = $request['city'];
        $customer->phnno = $request['phnno'];
        $customer->dob = $request['dob'];
        $customer->languages = json_encode($request['languages']);
        if($request->hasfile('image')){
            $file = $request->file('image');
            $fileext = $file->getClientOriginalExtension();
            $filename=time().'_.'.$fileext;
            echo $filename;
            $file->move('public/Image/', $filename);
            $customer->image = $filename; 
        }
        $customer->save();
        return redirect('form/show')->with('message', 'Record Updated!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function delete($id){ 
        $customer  = Customers::find($id); // find the particulr id in customer modal. Find targets the primary key.
        if(!is_null($customer)){
            $customer->delete();
        }
        return redirect('form/view')->with('message', 'Record Deleted!');
    }

    public function profile($id){
        $customer = Customers::find($id);
        $data = compact('customer');
        return view('customer-profile')->with($data);
    }

}

