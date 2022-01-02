@extends('layouts.main')

@section('content')
    <div class="container">
        <!-- Page Heading -->
        {{-- <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-0">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        </div> --}}
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    @if (session()->has('message'))
                        <span class="alert alert-success">
                            {{session('message')}}
                        </span>
                    @endif
                    <div class="card-header d-flex justify-content-between">
                        <h4>{{ __('State Details') }}</h4>
                        <form
                            class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" action="{{route('states.index')}}" method="GET">
                            <div class="input-group">
                                <input type="search" name="search" class="form-control bg-light border-0 small" placeholder="Search for..."
                                    aria-label="Search" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                        <a href="{{route('states.create')}}" class="btn btn-primary">Create User</a>
                    </div>

                    <div class="card-body">
                        <table class="table table-dark table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Serial No</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($states as $state)
                                    <tr>
                                        <th scope="row">{{$state->id}}</th>
                                        <td>{{$state->name}}</td>
                                        <td class="d-flex">
                                            <a href="{{route('states.edit',$state->id)}}" class="btn btn-sm btn-primary mr-1">Edit</a>
                                            <form action="{{route('states.destroy',$state->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection