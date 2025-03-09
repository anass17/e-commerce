@extends('layouts.app')

@section('content')
<div class="container mx-auto py-6">
    <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-2xl font-semibold text-center mb-6">Add New Product</h2>

        <!-- Display Validation Errors -->
        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-4 mb-6 rounded-lg">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Product Form -->
        <form action="{{ route('products.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-medium">Product Name</label>
                <input type="text" id="name" name="name" class="w-full p-2 border border-gray-300 rounded-lg" value="{{ old('name') }}" required>
            </div>

            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-medium">Product Description</label>
                <textarea id="description" name="description" class="w-full p-2 border border-gray-300 rounded-lg" required>{{ old('description') }}</textarea>
            </div>

            <div class="mb-4">
                <label for="price" class="block text-gray-700 font-medium">Price</label>
                <input type="text" id="price" name="price" class="w-full p-2 border border-gray-300 rounded-lg" value="{{ old('price') }}" required>
            </div>

            <div class="mb-4">
                <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700">Add Product</button>
            </div>
        </form>
    </div>
</div>
@endsection
