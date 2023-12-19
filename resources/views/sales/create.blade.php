@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>Add Sale</h1>

        @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('sales.store') }}" method="post">
            @csrf

            <div class="mb-3">
                <label for="product_name" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="product_name" name="product_name" required>
            </div>

            <div class="mb-3">
                <label for="quantity" class="form-label">Quantity</label>
                <input type="number" class="form-control" id="quantity" name="quantity" required min="1">
            </div>

            {{-- <div class="mb-3">
                <label for="amount" class="form-label">Amount</label>
                <input type="number" class="form-control" id="amount" name="amount" required min="1">
            </div> --}}

            <button type="submit" class="btn btn-primary">Add Sale</button>
        </form>
    </div>
@endsection
