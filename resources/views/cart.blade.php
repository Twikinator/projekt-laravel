<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ 'Cart' . ' (' . count($cart) . ')'}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    @foreach ($cart as $product)
                        <div class="mb-4">
                            <h3 class="text-lg font-semibold mb-2"><a href="{{ route('products.show', $product) }}">{{ $product->name }}</a></h3>
                            <p class="text-gray-700 my-2">{{ $product->price }}</p>
                            <form action="{{ route('cart.remove', $product->id) }}" method="POST">
                                @csrf
                               
                                <button class="border border-gray-500 px-3 py-1 ml-2 rounded-md">Remove</button>
                            </form>
                        </div>
                    @endforeach
                    <form action="{{ route('cart.clear') }}" method="POST">
                        @csrf
                        <button class="border border-gray-500 px-3 py-1 ml-2 rounded-md">Order</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
