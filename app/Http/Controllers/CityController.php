<?php

namespace App\Http\Controllers;

use App\Model\City;
use Illuminate\Http\Request;
use App\Model\Customer;

class CityController extends Controller
{
    public function index(){
        $cities = City::all();
        return view('city.list_city', compact('cities'));
    }

    public function create(){
        return view("city.create_city");
    }

    public function store(Request $request){
        $cities = new City();
        $cities->id = $request->id;
        $cities->name = $request->name;
        $cities->save();
        return redirect()->route('cities.index');
    }

    public function edit($id){
        $city = City::findOrFail($id);
        return view('city.edit_city', compact('city'));
    }

    public function update(Request $request, $id){
        $cities = City::findOrFail($id);

        $cities->id = $request->id;
        $cities->name = $request->name;
        $cities->save();

        return redirect()->route('cities.index');
    }

    public function delete($id){
        $city = City::findOrFail($id);
        $city->customers()->delete();

        return redirect()->route('cities.index');
    }
}
