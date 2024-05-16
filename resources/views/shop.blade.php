<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ 'Shop' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    @foreach ($categories as $category)
                        <div class="mb-4">
                            <h3 class="text-lg font-semibold mb-2">{{ $category->name }}</h3>
                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                                @foreach ($products as $product)
                                    @if ($product->category_id == $category->id)
                                        <div class="border rounded-lg p-4 mb-4">
                                            <a href="{{ route('products.show', $product) }}" class="text-blue-500 hover:underline text-xl font-bold">{{ $product->name }}</a>
                                            <p class="text-gray-700 my-2">{{ $product->description }}</p>
                                            <p class="text-gray-900 font-bold">{{ $product->price }}</p>
                                            <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                                @csrf
                                                <button class="border border-gray-500 px-3 py-1 ml-2 rounded-md">Add</button>
                                            </form>
                                        </div> 
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
