<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Slides') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <!-- <form action="" method="post">
                    @csrf
                    @method('PUT')
                    <input type="text" name="title" placeholder="enter title">
                    <input type="text" name="subtitle" placeholder="subtitle">
                    <input type="file" name="image">
                    <button type="submit">Submit</button>
                </form>



                <form class="bg-white p-6 rounded-lg shadow-md" action="" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <h2 class="text-lg font-medium mb-4">Create Product</h2>
                        <div class="mb-4">
                            <label class="block font-medium mb-2" for="product-name">Product Name</label>
                            <input type="text" id="product-name" name="product-name" required>
                        </div>

                        <div class="mb-4">
                            <label class="block font-medium mb-2" for="product-name">Subtitle</label>
                            <input type="text" id="product-name"  name="subtitle" required>
                        </div>

                        <div class="mb-4">
                            <label class="block font-medium mb-2" for="product-image">Image</label>
                            <input class="border border-gray-400 p-2 w-full" type="file" id="product-image" name="image" accept="image/*" required>
                        </div>
                <button type="submit">Update</button>
        </form> -->



        <form action="{{ route ('slides.update', ['slide' => $slide->id]) }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-md" >
                    @csrf
                    @method('PUT')
                    <h2 class="text-lg font-medium mb-4">Edit Product</h2>              
                            <div class="mb-6">
                                <label for="text" class="block mb-2 text-sm font-medium text-gray-900 ">Product Name</label>
                                <input type="text" name="title" value="{{ $slide->title }}"  class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600  dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Product Name" required>
                            </div> 
                            <div class="mb-6">
                                <label for="text" class="block mb-2 text-sm font-medium text-gray-900 ">Subtitle</label>
                                <input type="text" name="subtitle" value="{{ $slide->subtitle }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Subtitle" required>
                            </div>
                            
                            <span>Current Img</span>
                            <img src="{{ asset('storage/slides/'.$slide->image) }}" width="250px" alt="{{ $slide->title }}">

                        <div class="mb-4">
                            <label class="block font-medium mb-2" for="product-image">Current Image</label>
                            <input class="border border-gray-400 p-2 w-full" value="{{ $slide->image }}" type="file" id="product-image" name="image" accept="image/*">
                        </div>
                    <!-- <button type="submit">Create</button> -->
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Update</button>


                    
                </form>
            </div>
        </div>


     

        
    </div>
</x-app-layout>
