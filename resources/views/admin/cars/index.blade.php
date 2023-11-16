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
                    <img src="{{asset('storage/' . $car->image)}}" alt="" width="100">
                  </th>
                  <td>{{$car->model}}</td>
                  <td>{{$car->brandl}}</td>
                  <td>{{$car->fuel_type}}</td>
                  <td>{{$car->price}}</td>
                  <td>
                    <a href="{{route('admin.cars.show', $car->id)}}" class="btn btn-primary">View</a>
                    <a href="{{route('admin.cars.edit', $car->id)}}" class="btn btn-secondary">Edit</a>
                    <form action="{{route('admin.cars.destroy', $car->id)}}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit"class="btn btn-danger">
                        Delete
                      </button>
                    </form>
                  </td>
                </tr>
                    
                @empty
                <tr>
                  No cars found
                </tr>
                    
                @endforelse
              
            </tbody>
          </table>    
    </div>
    {{$cars->links('pagination::bootstrap-5')}}
</div>

@endsection