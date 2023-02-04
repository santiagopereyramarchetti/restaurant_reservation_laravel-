<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Reservations') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex m-2 p-2">
                <a href="{{ route('admin.reservations.index') }}" class="text-white px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg">Back</a>
            </div>
            <div class="m-2 mt-5 p-2 bg-slate-100 rounded w-1/2">
                <div class="space-y-8 divide-y divide-gray-200 mt-10">
                    <form action="" enctype="multipart/form-data" class="space-y-8 mt-10">
                        <div class="sm:col-span-6">
                            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                            <div class="mt-1">
                                <input type="text" name="name" id="name" class="p-2 block w-full transition duration-150 ease-in-out bg-white border border-gray-400 rounded">
                            </div>
                        </div>
                        <div class="sm:col-span-6">
                            <label for="name" class="block text-sm font-medium text-gray-700">Image</label>
                            <div class="mt-1">
                                <input type="file" name="image" id="image" class="p-2 block w-full transition duration-150 ease-in-out bg-white border border-gray-400 rounded">
                            </div>
                        </div>
                        <div class="sm:col-span-6">
                            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                            <div class="mt-1">
                                <textarea type="text" name="description" id="p-2 description" class="block w-full transition duration-150 ease-in-out bg-white border border-gray-400 rounded"></textarea>
                            </div>
                        </div>
                        <div class="mt-5 p-4">
                            <button type="submit" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Store</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
