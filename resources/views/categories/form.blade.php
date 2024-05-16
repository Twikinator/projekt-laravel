<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ 'Create' }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
            <h1 class="text-2xl font-bold mb-4">Create new Category:</h1>
            <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf

                <div class="flex flex-col">
                    <label for="name" class="font-bold">Category name:</label>
                    <input type="text" id="name" name="name" class="border border-gray-300 p-2 rounded-md">
                </div>

                <div class="flex justify-between">
                    <a href="{{ route('categories.index') }}" class="text-blue-600 hover:underline">Cancel</a>
                    <button class="border border-blue-500 hover:bg-blue-500 hover:text-white px-4 py-2 rounded-md">Submit</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
