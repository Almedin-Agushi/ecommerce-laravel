<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Category') }}
        </h2>
    </x-slot>


    <div class="py-12" data-modal-target="modalId">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
    
                <div class="flex flex-col">
                    <div class="overflow-x-auto sm:mx-0.5 lg:mx-0.5">
                        <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="overflow-hidden">
                            @if(session()->has('success'))
                               {{ session()->get('success')}}
                            @endif
                                
                                <button type="button"class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    <a href="/categories/create">Create Category </a>
                                </button>
                            <table class="w-full">
                                    <thead class="bg-white border-b">
                                        <tr>
                                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">ID</th>
                                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Post</th>
                                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Category</th>
                                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left ">Edit</th>
                                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left ">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($categories as $category)
                                            <tr class="bg-gray-100 border-b">
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $category->id}}</td>
                                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{ $category->name}}</td>
                                        
                                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{ $category->products->count() }}</td>
                                                <td > <a class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" 
                                                href="{{ route('categories.edit', $category->id) }}"> Edit</a></td>
                                                <td>
                                            <form  action="{{ route('categories.destroy', ['category' => $category->id]) }}" method="POST" onsubmit="return confirm('Are you sure?')" id="deleteCategoryForm">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"  class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-red-600 dark:hover:bg-red-700
                                                     dark:focus:ring-red-900">Delete</button>
                                                </form></td>
                                            </tr>
                                         @endforeach
                                    </tbody>
                            </table>
                                        
                                        <p>0 Slides</p>
                                       
                        </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>



    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    

            </x-app-layout>


