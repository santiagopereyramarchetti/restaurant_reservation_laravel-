<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end m-2 p-2">
                <a href="{{ route('admin.categories.create') }}" class="text-white px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg">New Category</a>
            </div>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Image
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Description
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $category->name }}
                                </th>
                                <td class="px-6 py-4">
                                    <img src="{{ Storage::url($category->image) }}" alt="" class="w-96 rounded">
                                </td>
                                <td class="px-6 py-4">
                                    {{ $category->description }}
                                </td>
                                <td class="px-6 py-4">
                                    <a href="{{route('admin.categories.edit', $category->id)}}" class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-lg text-white">Edit</a>
                                    <form class="inline" method="POST" action="{{ route('admin.categories.destroy', $category->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-4 py-2 bg-red-500 hover:bg-red-700 rounded-lg text-white">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-admin-layout>
