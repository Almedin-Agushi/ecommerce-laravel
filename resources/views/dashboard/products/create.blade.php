<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <form class="bg-white p-6 rounded-lg shadow-md" action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <h2 class="text-lg font-medium mb-4">Create Product</h2>
                        <div class="mb-4">
                            <label class="block font-medium mb-2" for="product-name">Name</label>
                            <input class="border border-gray-400 p-2 w-full" type="text" id="product-name" name="name" required>
                        </div>

                        <div class="mb-4">
                            <label class="block font-medium mb-2" for="product-name">Qty</label>
                            <input class="border border-gray-400 p-2 w-full" type="text" id="product-name" name="qty" required>
                        </div>

                        <div class="mb-4">
                            <label class="block font-medium mb-2" for="product-name">Price</label>
                            <input class="border border-gray-400 p-2 w-full" type="text" id="product-name" name="price" required>
                        </div>

                        <div class="mb-4">
                            <label class="block font-medium mb-2" for="product-name">Storage</label>
                            <input class="border border-gray-400 p-2 w-full" type="text" id="product-storage" name="storage" required>
                        </div>

                        <div class="mb-4">
                            <label class="block font-medium mb-2" for="product-color">Color</label>
                            <input class="border border-gray-400 " type="color" id="color" value="#000000" name="color" required>
                        </div>


                        <label for="categories" class="block mb-2 text-sm font-medium text-gray-900 ">Category</label>
                            <select id="categories" name="category_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        
        
                        <div class="mb-4">
                            <label class="block font-medium mb-2" for="product-description">Description</label>
                            <textarea class="border border-gray-400 p-2 w-full" id="product-description" name="description" rows="4" required></textarea>
                        </div>
                        
                        <div class="mb-4">
                            <label class="block font-medium mb-2" for="product-image">Image</label>
                            <input class="border border-gray-400 p-2 w-full" type="file" id="product-image" name="image" accept="image/*" required>
                        </div>
                    <button type="submit">Create</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
