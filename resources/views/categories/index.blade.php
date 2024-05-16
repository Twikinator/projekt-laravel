<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl leading-tight">{{ 'Categories' }}</h2>
            <a href="{{ route('categories.create') }}" class="border border-blue-500 hover:bg-blue-500 hover:text-white px-4 py-2 rounded-md">ADD</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <div class="text-2xl">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                {{-- populate our category data --}}
                                @foreach ($categories as $category)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $category->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <a href="{{ route('categories.show', $category->id) }}" class="border px-2 py-1 rounded-md hover:text-indigo-900">SHOW</a>
                                            <a href="{{ route('categories.edit', $category->id) }}" class="border px-2 py-1 rounded-md hover:text-green-900">EDIT</a>
                                            {{-- add delete button using form tag --}}
                                            <form method="POST" action="{{ route('categories.destroy', $category->id) }}" class="inline">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="mt-1 border border-red-500 hover:bg-red-500 hover:text-white px-4 py-1 rounded-md">DELETE</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
