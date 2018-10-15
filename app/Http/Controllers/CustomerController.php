<?php

namespace App\Http\Controllers;

use App\Model\City;
use App\Model\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(){
        $customers = Customer::paginate(5);
        $cities = City::all();
        return view('customer.list', compact('customers' , 'cities'));
    }

    public function create(){
        $cities = City::all();
        return view('customer.create', compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request){
        $customer = new Customer();
        $customer->name     = $request->input('name');
        $customer->email    = $request->input('email');
        $customer->dob      = $request->input('dob');
        $customer->city_id = $request->input('city_id');
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
        $customer = Customer::findOrFail($id);
        $cities = City::all();
        return view('customer.edit', compact('customer', "cities"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id){
        $customer = customer::findOrFail($id);
        $customer->name     = $request->input('name');
        $customer->email    = $request->input('email');
        $customer->dob      = $request->input('dob');
        $customer->city_id  = $request->input('city_id');
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
    public function delete($id){
        $customer = customer::findOrFail($id);
        $customer->delete();

        //xoa xong quay ve trang danh sach khach hang
        return redirect()->route('customers.index');
    }

    public function filterByCity(Request $request){
        $idCity = $request->input('city_id');

        //kiem tra city co ton tai khong
        $cityFilter = City::findOrFail($idCity);

        //lay ra tat ca customer cua cityFiler
        $customers = Customer::where('city_id', $cityFilter->id)->paginate(5);
        $totalCustomerFilter = count($customers);
        $cities = City::all();

        return view('customer.list', compact('customers', 'cities', 'totalCustomerFilter', 'cityFilter'));
    }

    public function search(Request $request)

    {

        $keyword = $request->input('keyword');

        if (!$keyword) {

            return redirect()->route('customers.index');

        }

        $customers = Customer::where('name', 'LIKE', '%' . $keyword . '%')

            ->paginate(5);

        $cities = City::all();

        return view('customer.list', compact('customers', 'cities'));

    }

}
