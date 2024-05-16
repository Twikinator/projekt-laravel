<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ 'Create' }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
            <h1 class="text-2xl font-bold mb-4">Create new Product:</h1>
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf

                <div class="flex flex-col">
                    <label for="name" class="font-bold">Product name:</label>
                    <input type="text" id="name" name="name" class="border border-gray-300 p-2 rounded-md">
                </div>

                <div class="flex flex-col">
                    <label for="description" class="font-bold">Description:</label>
                    <input type="text" id="description" name="description" class="border border-gray-300 p-2 rounded-md">
                </div>

                <div class="flex flex-col">
                    <label for="price" class="font-bold">Price:</label>
                    <input type="number" id="price" name="price" class="border border-gray-300 p-2 rounded-md">
                </div>

                <div class="flex flex-col">
                    <label for="image" class="font-bold">Image:</label>
                    <input type="file" id="image" name="image" class="border border-gray-300 p-2 rounded-md">
                </div>

                <div class="flex flex-col">
                    <label for="category_id" class="font-bold">Category ID:</label>
                    <select name="category_id" class="border border-gray-300 p-2 rounded-md">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="flex justify-between">
                    <a href="{{ route('products.index') }}" class="text-blue-600 hover:underline">Cancel</a>
                    <button class="border border-blue-500 hover:bg-blue-500 hover:text-white px-4 py-2 rounded-md">Submit</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
