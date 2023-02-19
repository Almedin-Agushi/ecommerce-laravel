<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            @role('admin')
                <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2">
                    <div class="p-6">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-gray-400"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" /></svg>
                            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a href="{{route('slides.index')}}">Slides ({{$slides}})</a></div>
                        </div>
                    </div>

                    <div class="p-6 border-t border-gray-200 md:border-t-0 md:border-l">
                        <div class="flex items-center">
                <svg fill="#000000" width="25px" height="25px" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>list-check</title> <path d="M30 14.75h-17c-0.69 0-1.25 0.56-1.25 1.25s0.56 1.25 1.25 1.25v0h17c0.69 0 1.25-0.56 1.25-1.25s-0.56-1.25-1.25-1.25v0zM13 6.25h17c0.69 0 1.25-0.56 1.25-1.25s-0.56-1.25-1.25-1.25v0h-17c-0.69 0-1.25 0.56-1.25 1.25s0.56 1.25 1.25 1.25v0zM6 22.75h-2c-1.794 0.002-3.248 1.456-3.25 3.25v2c0.002 1.794 1.456 3.248 3.25 3.25h2c1.794-0.002 3.248-1.456 3.25-3.25v-2c-0.002-1.794-1.456-3.248-3.25-3.25h-0zM6.75 28c-0 0.414-0.336 0.75-0.75 0.75h-2c-0.414-0-0.75-0.336-0.75-0.75v-2c0-0.414 0.336-0.75 0.75-0.75h2c0.414 0 0.75 0.336 0.75 0.75v0zM30 25.75h-17c-0.69 0-1.25 0.56-1.25 1.25s0.56 1.25 1.25 1.25v0h17c0.69 0 1.25-0.56 1.25-1.25s-0.56-1.25-1.25-1.25v0zM9.078 11.877l-5.121 5.598-1.076-1.069c-0.226-0.225-0.537-0.363-0.881-0.363-0.69 0-1.25 0.559-1.25 1.25 0 0.346 0.141 0.66 0.369 0.886l2 1.988 0.022 0.015 0.015 0.021c0.073 0.059 0.156 0.112 0.246 0.153l0.007 0.003c0.038 0.028 0.082 0.055 0.128 0.080l0.006 0.003c0.135 0.056 0.292 0.088 0.457 0.088 0.175 0 0.341-0.037 0.491-0.103l-0.008 0.003c0.053-0.031 0.098-0.061 0.14-0.094l-0.003 0.002c0.102-0.050 0.189-0.11 0.268-0.179l-0.001 0.001 0.015-0.023 0.020-0.014 6-6.559c0.205-0.222 0.331-0.52 0.331-0.847 0-0.69-0.56-1.25-1.25-1.25-0.366 0-0.696 0.158-0.924 0.409l-0.001 0.001zM9.078 0.877l-5.121 5.598-1.076-1.069c-0.226-0.223-0.536-0.361-0.878-0.361-0.69 0-1.25 0.56-1.25 1.25 0 0.345 0.14 0.658 0.366 0.884v0l2 1.987 0.022 0.015 0.015 0.021c0.072 0.058 0.153 0.109 0.24 0.15l0.007 0.003c0.040 0.029 0.086 0.058 0.134 0.084l0.007 0.003c0.135 0.056 0.292 0.088 0.456 0.088 0.175 0 0.341-0.037 0.491-0.103l-0.008 0.003c0.053-0.031 0.098-0.061 0.14-0.094l-0.003 0.002c0.102-0.050 0.189-0.11 0.268-0.179l-0.001 0.001 0.015-0.023 0.020-0.014 6-6.559c0.206-0.222 0.332-0.521 0.332-0.848 0-0.69-0.56-1.25-1.25-1.25-0.367 0-0.697 0.158-0.925 0.41l-0.001 0.001z"></path> </g></svg>            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a href="{{route('products.index')}}">Products ({{$products}})</a></div>
                        </div>


                        

                        
                    </div>
                    @endrole
                    <div class="p-6 border-t border-gray-200">
                        <div class="flex items-center">
                        <svg width="25px" height="25px" viewBox="0 0 1024 1024" fill="#000000" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M53.6 1023.2c-6.4 0-12.8-2.4-17.6-8-4.8-4.8-7.2-11.2-6.4-18.4L80 222.4c0.8-12.8 11.2-22.4 24-22.4h211.2v-3.2c0-52.8 20.8-101.6 57.6-139.2C410.4 21.6 459.2 0.8 512 0.8c108 0 196.8 88 196.8 196.8 0 0.8-0.8 1.6-0.8 2.4v0.8H920c12.8 0 23.2 9.6 24 22.4l49.6 768.8c0.8 2.4 0.8 4 0.8 6.4-0.8 13.6-11.2 24.8-24.8 24.8H53.6z m25.6-48H944l-46.4-726.4H708v57.6h0.8c12.8 8.8 20 21.6 20 36 0 24.8-20 44.8-44.8 44.8s-44.8-20-44.8-44.8c0-14.4 7.2-27.2 20-36h0.8v-57.6H363.2v57.6h0.8c12.8 8.8 20 21.6 20 36 0 24.8-20 44.8-44.8 44.8-24.8 0-44.8-20-44.8-44.8 0-14.4 7.2-27.2 20-36h0.8v-57.6H125.6l-46.4 726.4zM512 49.6c-81.6 0-148.8 66.4-148.8 148.8v3.2h298.4l-0.8-1.6v-1.6c0-82.4-67.2-148.8-148.8-148.8z" fill=""></path></g></svg>             <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a href="{{route('orders.index')}}">Orders ({{$orders}})</a></div>
                        </div>

                    </div>

                    

                
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
