<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit') }}
        </h2>
    </x-slot>

    <div class="max-w-2xl mx-auto mt-6 bg-white p-6 rounded-lg shadow">
        <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <h1 class="text-2xl font-bold mb-4">Edit Product: {{$product->name}}</h1>
            <div class="mb-4">
                <label for="name" class="block text-sm font-semibold mb-1">Product name:</label>
                <input type="text" id="name" name="name" class="w-full px-4 py-2 rounded-lg border focus:outline-none focus:border-blue-500">
            </div>
            <div class="mb-4">
                <label for="description" class="block text-sm font-semibold mb-1">Description:</label>
                <input type="text" id="description" name="description" class="w-full px-4 py-2 rounded-lg border focus:outline-none focus:border-blue-500">
            </div>
            <div class="mb-4">
                <label for="price" class="block text-sm font-semibold mb-1">Price:</label>
                <input type="number" id="price" name="price" class="w-full px-4 py-2 rounded-lg border focus:outline-none focus:border-blue-500">
            </div>
            <div class="mb-4">
                <label for="image" class="block text-sm font-semibold mb-1">Image:</label>
                <input type="file" id="image" name="image" class="w-full px-4 py-2 rounded-lg border focus:outline-none focus:border-blue-500">
            </div>
            <div class="mb-4">
                <label for="category_id" class="block text-sm font-semibold mb-1">Category ID:</label>
                <select name="category_id" class="w-full px-4 py-2 rounded-lg border focus:outline-none focus:border-blue-500">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex items-center justify-between">
                <a href="{{ route('products.index') }}" class="text-sm text-gray-600 hover:text-gray-800">Cancel</a>
                <button class="border border-blue-500 hover:bg-blue-500 hover:text-white px-4 py-2 rounded-md">Submit</button>
            </div>
        </form>
    </div>
</x-app-layout>
