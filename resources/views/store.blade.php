@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Add New Sale</h1>

        @if(session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="product" class="form-label">Select Product</label>
                <select class="form-select" id="product" name="product" required>
                    @foreach($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }} - ${{ $product->price }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="quantity" class="form-label">Quantity</label>
                <input type="number" class="form-control" id="quantity" name="quantity" required min="1">
            </div>
            <button type="submit" class="btn btn-primary">Add Sale</button>
        </form>
    </div>
@endsection
