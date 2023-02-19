<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Slides') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
    
                <div class="flex flex-col">
                    <div class="overflow-x-auto sm:mx-0.5 lg:mx-0.5">
                        <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="overflow-hidden">
                                
                                <button type="button"class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    <a href="{{ route('slides.create') }}">Create slide </a>
                                </button>

                            <table class="w-full">
                            
                                    <thead class="bg-white border-b">
                                    @if($slides && count($slides) > 0)
                                    
                                        <tr>
                                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">ID</th>
                                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Title</th>                            
                                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Image</th>
                                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Subtite</th>
                                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left ">Edit</th>
                                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left ">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($slides as $slide)
                                            <tr class="bg-gray-100 border-b">
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $slide->id }}</td>
                                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{ $slide->title }}</td>
                                                <td  class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{ $slide->image }} 
                                                <img src="{{ asset('storage/slides/'.$slide->image) }}" width="250px" alt="{{ $slide->title }}">
                                                </td>
                                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{ substr($slide->subtitle, 0, 50) }}..</td>
                                                <td > <a class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" href="{{ route('slides.edit', ['slide' => $slide->id]) }}"> Edit</a></td>
                                                <td>
                                            <form  action="{{ route('slides.destroy', ['slide' => $slide->id]) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"  class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Delete</button>
                                                </form></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                            </table>
                                        @else
                                        <p>0 Slides</p>
                                        @endif
                        </div>
                        </div>
                    </div>
                </div>





















            </div>
        </div>
    </div>

    
</x-app-layout>
