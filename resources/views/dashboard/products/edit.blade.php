<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">


                @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
                <form class="bg-white p-6 rounded-lg shadow-md" action="{{ route('products.update',['product' => $product->id]) }}" method="POST" enctype="multipart/form-data">
                    
                    @csrf
                    @method('PUT')
                    <h2 class="text-lg font-medium mb-4">Create Product</h2>
                        <div class="mb-4">
                            <label class="block font-medium mb-2" for="product-name">Name</label>
                            <input class="border border-gray-400 p-2 w-full" value="{{ $product->name }}" type="text" id="product-name" name="name" >
                        </div>

                        <div class="mb-4">
                            <label class="block font-medium mb-2" for="product-name">Qty</label>
                            <input class="border border-gray-400 p-2 w-full" value="{{ $product->qty }}" type="text" id="product-name" name="qty" >
                        </div>

                        <div class="mb-4">
                            <label class="block font-medium mb-2" for="product-name">Price</label>
                            <input class="border border-gray-400 p-2 w-full" value="{{ $product->price }}" type="text" id="product-name" name="price" >
                        </div>

                        <div class="mb-4">
                            <label class="block font-medium mb-2" for="product-name">Storage</label>
                            <input class="border border-gray-400 p-2 w-full" value="{{ $product->storage }}" type="text" id="product-name" name="storage" >
                        </div>

                        <div class="mb-4">
                            <label class="block font-medium mb-2" for="product-color">Color</label>
                            <input class="border border-gray-400 " value="{{ $product->color }}" type="color" id="product-color" name="color" >
                        </div>

                        <div class="mb-4">
                            <label class="block font-medium mb-2" for="product-description">Description</label>
                            <textarea class="border border-gray-400 p-2 w-full" value="{{ $product->description }}" id="product-description" name="description" rows="4" ></textarea>
                        </div>
                       

                        <div class="mb-4">
                            <span>Current Img</span>
                            <img src="{{ asset('storage/products/'.$product->image) }}" width="90px" >
                            <label class="block font-medium mb-2" for="product-image">Image</label>
                            <input class="border border-gray-400 p-2 w-full" type="file" value="{{ $product->image }}" id="product-image" name="image" accept="image/*" >
                        </div>

                    <button type="submit">Update</button>
                </form>


            </div>
        </div>
    </div>
</x-app-layout>
