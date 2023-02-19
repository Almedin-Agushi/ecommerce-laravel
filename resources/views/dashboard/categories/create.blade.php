<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ isset($category) ? 'Edit Category' : 'Create Category' }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
    
                <div class="flex flex-col">
                    <div class="overflow-x-auto sm:mx-0.5 lg:mx-0.5">
                        <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="overflow-hidden">
                              @if($errors->any())  
                              @foreach($errors->all() as $error)
                                <p>{{$error}}</p>
                              @endforeach
                              @endif

                            
                            <form action="{{ isset($category) ? route('categories.update', $category->id) : route('categories.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md" >
                                @csrf
                               @if(isset($category))
                               @method('PUT')
                               @endif
                            <div class="mb-6">
                                <label for="text" class="block mb-2 text-sm font-medium text-gray-900 ">Category Name</label>
                                <input type="text" name="name"  id="name" value="{{ isset($category) ? $category->name : '' }}" class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600  dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Category Name" required>
                            </div> 

                            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none
                            dark:focus:ring-blue-800">{{ isset($category) ? 'Update Category' : 'Create Category'}}</button>
        
                        </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


            </x-app-layout>


