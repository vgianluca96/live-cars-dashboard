@extends('layouts.admin')

@section('content')

<div class="container py-4">

    <div class="py-2">
        <h1>Insert a new car</h1>
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

    <form action="{{route('admin.cars.store')}}" method="POST" enctype="multipart/form-data">

        @csrf

        <div class="mb-3">
            <label for="image" class="form-label">image</label>
            <input type="file" id="image" name="image" class="form-control">
        </div>

        <div class="mb-3">
            <label for="model" class="form-label">Model</label>
            <input type="text" id="model" name="model" class="form-control" value="{{old('model')}}">
        </div>

        <div class="mb-3">
            <label for="brand" class="form-label">brand</label>
            <input type="text" id="brand" name="brand" class="form-control" value="{{old('brand')}}">
        </div>

        <div class="mb-3">
            <label for="transmission" class="form-label">Category</label>
            <select name="transmission" id="transmission" class="form-select">
                @foreach($categories as $category)
                <option value="{{$category->name}}">
                    {{$category->name}}
                </option>
                @endforeach
            </select>
        </div>
        
        
        <div class="mb-3">
            <label for="price" class="form-label">price</label>
            <input type="number" id="price" name="price" class="form-control" value="{{old('price')}}">
        </div>

        <div class="mb-3">
            <label for="seats" class="form-label">seats</label>
            <input type="number" id="seats" name="seats" class="form-control" value="{{old('seats')}}">
        </div>

        <div class="mb-3">
            <label for="transmission" class="form-label">transmission</label>
            <select name="transmission" id="transmission" class="form-select">
                <option value="manual">
                    manual
                </option>
                <option value="automatic">
                    automatic
                </option>
            </select>
        </div>

        <div class="mb-3">
            <label for="fuel_type" class="form-label">fuel_type</label>
            <select name="fuel_type" id="fuel_type" class="form-select">
                <option value="diesel">
                    diesel
                </option>
                <option value="petrol">
                    petrol
                </option>
                <option value="electric">
                    electric
                </option>
            </select>
        </div>

        <div class="mb-3">
            <label for="notes" class="form-label">notes</label>
            <textarea name="notes" id="notes" class="form-control">{{old('notes')}}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">create</button>

    </form>
</div>

@endsection