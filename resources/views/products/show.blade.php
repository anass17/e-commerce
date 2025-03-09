@extends('app')

@section('content')
<div class="container mx-auto py-6 px-5">
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <!-- Left Column for Search and Filters -->
        <div class="col-span-1 md:col-span-1">
            <div class="bg-white p-4 rounded-lg shadow-lg">
                <h5 class="text-xl font-semibold mb-4">Search & Filters</h5>

                <!-- Search Form -->
                <form action="{{ route('products.index') }}" method="GET">
                    <div class="mb-4">
                        <label for="search" class="block text-gray-700 font-medium">Search Products</label>
                        <input type="text" class="w-full p-2 mt-1 border border-gray-300 rounded-lg" 
                               id="search" name="search" value="{{ request('search') }}">
                    </div>

                    <h6 class="text-lg font-medium mb-3">Filters</h6>
                    
                    <!-- Price Filters -->
                    <div class="mb-4">
                        <div class="flex items-center mb-2">
                            <input class="form-checkbox text-indigo-600" type="checkbox" id="priceUnder20" name="priceUnder20" 
                                   {{ request('priceUnder20') ? 'checked' : '' }}>
                            <label for="priceUnder20" class="ml-2">Under $20</label>
                        </div>
                        <div class="flex items-center">
                            <input class="form-checkbox text-indigo-600" type="checkbox" id="priceOver20" name="priceOver20" 
                                   {{ request('priceOver20') ? 'checked' : '' }}>
                            <label for="priceOver20" class="ml-2">Over $20</label>
                        </div>
                    </div>

                    <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700">Apply Filters</button>
                </form>
            </div>
        </div>

        <!-- Right Column for Products -->
        <div class="col-span-1 md:col-span-3">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($products as $product)
                    <div class="bg-white p-4 rounded-lg shadow-lg">
                        <h5 class="text-xl font-semibold mb-2">{{ $product->name }}</h5>
                        <p class="text-gray-600 mb-2">{{ $product->description }}</p>
                        <p class="text-blue-600 font-semibold">{{ $product->price }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
