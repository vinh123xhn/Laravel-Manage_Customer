<?php

namespace App\Http\Controllers;

use App\Model\customerModel;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(){
        $customers = customerModel::all();
        return view('list', compact('customers'));
    }

    public function create(){
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request){
        $customer = new customerModel();
        $customer->name     = $request->input('name');
        $customer->email    = $request->input('email');
        $customer->dob      = $request->input('dob');
        $customer->save();
        
        //tao moi xong quay ve trang danh sach khach hang
        return redirect()->route('customers.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id){
        $customer = customerModel::findOrFail($id);
        return view('edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id){
        $customer = customerModel::findOrFail($id);
        $customer->name     = $request->input('name');
        $customer->email    = $request->input('email');
        $customer->dob      = $request->input('dob');
        $customer->save();

        //cap nhat xong quay ve trang danh sach khach hang
        return redirect()->route('customers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id){
        $customer = customerModel::findOrFail($id);
        $customer->delete();

        //xoa xong quay ve trang danh sach khach hang
        return redirect()->route('customers.index');
    }

}
