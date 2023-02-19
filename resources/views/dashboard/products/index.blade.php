<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <button  type="button" class="m-4 text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                      <a href="{{ route('products.create') }}">Create Product </a>
                    </button>

                <div class="table-responsive">
               <!-- component -->
                <div class="flex flex-col">
                  <div class="overflow-x-auto sm:mx-0.5 lg:mx-0.5">
                    <div class="py-2 inline-block ">
                      <div class="overflow-hidden">
                        <table class="w-full">
                        @if($products && count($products) > 0)
                      
                          <thead class="bg-white border-b">
                            <tr>
                              <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">ID</th>

                              <th scope="col" class="text-sm font-medium text-gray-900 text-left">Name</th>
                              
                              <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Qty</th>

                              <th scope="col" class="text-sm text-gray-900 px-6 py-4 text-left">Price</th>

                              <th scope="col" class="text-sm text-gray-900 px-6 py-4 text-left">Storage</th>
                              <th scope="col" class="text-sm text-gray-900 px-6 py-4 text-left">Color</th>
                              <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left ">Description</th>
                              <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Image</th>
                            </tr>
                          </thead>
                          <tbody> 
                            @foreach($products as $product)
                            <tr class="bg-gray-100 border-b">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $product->id }}</td>
                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{ $product->name }}</td>
                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{ $product->qty }}</td>
                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{ $product->price }}</td>
                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{ $product->storage }}GB</td>
                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{ $product->color }}GB</td>
                                <td class="text-sm text-gray-900 font-light px-6 py-4 ">{{ substr($product->description, 0, 70) }}..</td>
                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                <img src="{{ asset('storage/products/'.$product->image) }}" width="100px" alt="{{ $product->title }}">
                                </td>
                                <td > <a class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" href="{{ route('products.edit', ['product' => $product->id]) }}"> Edit</a></td>
                                <td>
                                <form  action="{{ route('products.destroy', ['product' => $product->id]) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"  class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Delete</button>
                                </form></td>
                            </tr>

                            @endforeach

                          </tbody>
                        </table>
                        @else
                        <p>0 Product</p>
                        @endif
                        </div>



                      </div>
                    </div>
                  </div>
                </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>




