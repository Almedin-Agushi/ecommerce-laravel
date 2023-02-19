<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Article {{ $article->slug}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            
             
                    
                    <div class="p-6 border-t border-gray-200">
                        <div class="flex items-center">
                           <livewire:comments :model="$article"/>
                        </div>

                    </div>

                    

                
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
