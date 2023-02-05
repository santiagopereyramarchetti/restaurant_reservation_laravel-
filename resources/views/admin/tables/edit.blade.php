<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tables') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex m-2 p-2">
                <a href="{{ route('admin.tables.index') }}" class="text-white px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg">Back</a>
            </div>
            <div class="m-2 mt-5 p-2 bg-slate-100 rounded w-1/2">
                <div class="space-y-8 divide-y divide-gray-200 mt-10">
                    <form method="POST" action="{{ route('admin.tables.update', $table->id) }}" class="space-y-8 mt-10">
                        @csrf
                        @method('PUT')
                        <div class="sm:col-span-6">
                            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                            <div class="mt-1">
                                <input type="text" value="{{ $table->name }}" name="name" id="name" class="p-2 block w-full transition duration-150 ease-in-out bg-white border border-gray-400 rounded">
                            </div>
                        </div>
                        <div class="sm:col-span-6">
                            <label for="guest_number" class="block text-sm font-medium text-gray-700">Guest Number</label>
                            <div class="mt-1">
                                <input type="number" value="{{ $table->guest_number }}" name="guest_number" id="guest_number" class="p-2 block w-full transition duration-150 ease-in-out bg-white border border-gray-400 rounded">
                            </div>
                        </div>
                        <div class="sm:col-span-6">
                            <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                            <div class="mt-1">
                                <select type="text" name="status" id="status" class="block w-full transition duration-150 ease-in-out bg-white border border-gray-400 rounded">
                                    @foreach (App\Enums\TableStatus::cases() as $status)
                                        <option value="{{ $status->value }}" @selected($status->value == $table->status->value)> {{ $status->name }}</option>    
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="sm:col-span-6">
                            <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
                            <div class="mt-1">
                                <select type="text" name="location" id="location" class="block w-full transition duration-150 ease-in-out bg-white border border-gray-400 rounded">
                                    @foreach (App\Enums\TableLocation::cases() as $location)
                                        <option value="{{ $location->value }}" @selected($location->value == $table->location->value)>{{ $location->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mt-5 p-4">
                            <button type="submit" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
