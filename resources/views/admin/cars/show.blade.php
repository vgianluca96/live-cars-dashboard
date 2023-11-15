@extends('layouts.admin')

@section('content')

<div class="container py-4">
    <ul>
        <li>{{$car->model}}</li>
        <li>{{$car->brand}}</li>
    </ul>
</div>

@endsection