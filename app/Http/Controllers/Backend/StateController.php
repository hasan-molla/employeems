<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StateStoreRequest;
use App\Models\State;

class StateController extends Controller
{
    public function index(){
        $states = State::all();
        return view('states.index', compact('states'));
    }

    public function create(){
        return view('states.create');
    }

    public function store(StateStoreRequest $request){
        State::create($request->validated());
        return redirect()->route('states.index')->with('message','State Created Successfully.');
    }

    public function edit(State $state){
        return view('states.edit',compact('state'));
    }

    public function update(StateStoreRequest $request, State $state){
        $state->update($request->validated());
        return redirect()->route('states.index')->with('message','Updated Created Successfully.');

    }

    public function destroy(State $state){
        $state->delete();
        return redirect()->route('states.index')->with('message','State Deleted Successfully.');
    }
}
