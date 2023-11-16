@extends('layouts.admin')

@section('content')

<div class="container py-4">

    <div class="py-2">
        <h1>Update {{$car->brand}} {{$car->model}}</h1>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger">
        Attention
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>        
    </div>
    @endif

    <form action="{{route('admin.cars.update', $car->id)}}" method="POST" enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="image" class="form-label">image</label>
            <input type="file" id="image" name="image" class="form-control">
        </div>

        <div class="mb-3">
            <label for="model" class="form-label">Model</label>
            <input type="text" id="model" name="model" class="form-control" value="{{old('model',$car->model)}}">
        </div>

        <div class="mb-3">
            <label for="brand" class="form-label">brand</label>
            <input type="text" id="brand" name="brand" class="form-control" value="{{old('brand',$car->brand)}}">
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">price</label>
            <input type="number" id="price" name="price" class="form-control" value="{{old('price',$car->price)}}">
        </div>

        <div class="mb-3">
            <label for="seats" class="form-label">seats</label>
            <input type="number" id="seats" name="seats" class="form-control" value="{{old('seats',$car->seats)}}">
        </div>

        <div class="mb-3">
            <label for="transmission" class="form-label">transmission</label>
            <select name="transmission" id="transmission" class="form-select">
                <option value="manual" {{$car->transmission == 'manual' ? 'selected' : ''}}>
                    manual
                </option>
                <option value="automatic" {{$car->transmission == 'automatic' ? 'selected' : ''}}>
                    automatic
                </option>
            </select>
        </div>

        <div class="mb-3">
            <label for="fuel_type" class="form-label">fuel_type</label>
            <select name="fuel_type" id="fuel_type" class="form-select">
                <option value="diesel" {{$car->fuel_type == 'diesel' ? 'selected' : ''}}>
                    diesel
                </option>
                <option value="petrol" {{$car->fuel_type == 'petrol' ? 'selected' : ''}}>
                    petrol
                </option>
                <option value="electric" {{$car->fuel_type == 'electric' ? 'selected' : ''}}>
                    electric
                </option>
            </select>
        </div>

        <div class="mb-3">
            <label for="notes" class="form-label">notes</label>
            <textarea name="notes" id="notes" class="form-control">{{old('notes',$car->notes)}}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">update</button>

    </form>
</div>

@endsection