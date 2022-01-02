<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CityStoreRequest;
use App\Models\City;

class CityController extends Controller
{
    public function index(Request $request){
        $cities = City::all();
        if($request->has('search')){
            $cities = City::whire('name','like',"%{$request->search}%")->get();
        }
        return view("cities.index", compact('cities'));
    }

    public function create(){
        return view('cities.create');
    }

    public function store(CityStoreRequest $request){
        City::create($request->validated());
        return redirect()->route('cities.index')->with('message','City Created Successfully.');
    }

    public function edit(City $city){
        return view('cities.edit', compact('city'));
    }

    public function update(CityStoreRequest $request, City $city){
        $city->update($request->validated());
        return redirect()->route('cities.index')->with('message','City Updated Successfully.');
    }

    public function destroy(City $city){
        $city->delete();
        return redirect()->route('cities.index')->with('message','City Deleted Successfully.');
    }
}
