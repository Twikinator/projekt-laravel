<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ 'Show' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-6">
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ 'Name' }}
                        </h2>
                
                        <p class="mt-1 text-sm text-gray-600">
                            {{ $product->name }}
                        </p>
                    </div>
                    <div class="mb-6">
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ 'Description' }}
                        </h2>
                
                        <p class="mt-1 text-sm text-gray-600">
                            {{ $product->description }}
                        </p>
                    </div>
                    <div class="mb-6">
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ 'Category' }}
                        </h2>
                
                        <p class="mt-1 text-sm text-gray-600">
                            {{ $name }}
                        </p>
                    </div>
                    <div class="mb-6">
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ 'Price' }}
                        </h2>
                
                        <p class="mt-1 text-sm text-gray-600">
                            {{ $product->price }}
                        </p>
                    </div>
                    <div class="mb-6">
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ 'Featured Image' }}
                        </h2>
                
                        <p class="mt-1 text-sm text-gray-600">
                            <img class="h-64 w-128" src="{{ Storage::url($product->imgSrc) }}" alt="{{ $product->name }}" srcset="">
                        </p>
                    </div>
                    <div class="mb-6">
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ 'Created At' }}
                        </h2>
                
                        <p class="mt-1 text-sm text-gray-600">
                            {{ $product->created_at }}
                        </p>
                    </div>
                    <div class="mb-6">
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ 'Updated At' }}
                        </h2>
                
                        <p class="mt-1 text-sm text-gray-600">
                            {{ $product->updated_at }}
                        </p>
                    </div>
                    <a href="{{ route('products.index') }}" class="border border-blue-500 hover:bg-blue-500 hover:text-white px-4 py-2 rounded-md">BACK</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>