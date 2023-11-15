@extends('layouts.admin')

@section('content')

<h1>All cars</h1>

<div class="card">
    <div class="table-responsive">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Image</th>
                <th scope="col">Model</th>
                <th scope="col">Brand</th>
                <th scope="col">Fuel type</th>
                <th scope="col">Price</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
                @forelse ($cars as $car)
                <tr>
                  <th scope="row">
                    <img src="{{asset('storage/' . $car->image)}}" alt="">
                  </th>
                  <td>{{$car->model}}</td>
                  <td>{{$car->brandl}}</td>
                  <td>{{$car->fuel_type}}</td>
                  <td>{{$car->price}}</td>
                  <td>
                    <a href="" class="btn btn-primary">View</a>
                    <a href="" class="btn btn-primary">Edit</a>
                  </td>
                </tr>
                    
                @empty
                    
                @endforelse
              
            </tbody>
          </table>    
    </div>
</div>

@endsection