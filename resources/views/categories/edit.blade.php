<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create') }}
        </h2>
    </x-slot>

    <div class="max-w-md mx-auto mt-6 bg-white p-6 rounded-lg shadow">
        <form action="{{ route('categories.update', $category) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <h1 class="text-2xl font-bold mb-4">Edit Category: {{$category->name}}</h1>
            <div class="mb-4">
                <label for="name" class="block text-sm font-semibold mb-1">Category name:</label>
                <input type="text" id="name" name="name" class="w-full px-4 py-2 rounded-lg border focus:outline-none focus:border-blue-500">
            </div>
            <div class="flex items-center justify-between">
                <a href="{{ route('categories.index') }}" class="text-sm text-gray-600 hover:text-gray-800">Cancel</a>
                <button class="border border-blue-500 hover:bg-blue-500 hover:text-white px-4 py-2 rounded-md">Submit</button>
            </div>
        </form>
    </div>
</x-app-layout>
