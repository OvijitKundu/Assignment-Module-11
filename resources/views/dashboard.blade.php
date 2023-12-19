@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Sales Dashboard</h1>

        @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="row mb-4">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Today's Sales</h5>
                        <p class="card-text">{{ $todaySales }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Yesterday's Sales</h5>
                        <p class="card-text">{{ $yesterdaySales }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">This Month's Sales</h5>
                        <p class="card-text">{{ $thisMonthSales }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Last Month's Sales</h5>
                        <p class="card-text">{{ $lastMonthSales }}</p>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="mb-3">Product List</h2>

        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->quantity }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <a href="{{ route('store.create') }}" class="btn btn-primary">Add Sale</a>
        <a href="{{ route('create') }}" class="btn btn-primary">Add Product</a>

    </div>
@endsection
