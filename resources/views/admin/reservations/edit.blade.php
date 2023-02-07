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
                    <form method="POST" action="{{ route('admin.reservations.update', $reservation->id) }}" class="space-y-8 mt-10">
                        @csrf
                        @method('PUT')
                        <div class="sm:col-span-6">
                            <label for="first_name" class="block text-sm font-medium text-gray-700">First Name</label>
                            <div class="mt-1">
                                <input type="text" value="{{$reservation->first_name}}" name="first_name" id="first_name" class="p-2 block w-full transition duration-150 ease-in-out bg-white border border-gray-400 rounded @error('first_name') border-red-600 @enderror">
                            </div>
                            @error('first_name')
                                <div class="text-red-600 mt-2 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="sm:col-span-6">
                            <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name</label>
                            <div class="mt-1">
                                <input type="text" value="{{$reservation->last_name}}" name="last_name" id="last_name" class="p-2 block w-full transition duration-150 ease-in-out bg-white border border-gray-400 rounded @error('last_name') border-red-600 @enderror">
                            </div>
                            @error('last_name')
                                <div class="text-red-600 mt-2 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="sm:col-span-6">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <div class="mt-1">
                                <input type="email" value="{{$reservation->email}}" name="email" id="email" class="p-2 block w-full transition duration-150 ease-in-out bg-white border border-gray-400 rounded @error('email') border-red-600 @enderror">
                            </div>
                            @error('email')
                                <div class="text-red-600 mt-2 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="sm:col-span-6">
                            <label for="tel_number" class="block text-sm font-medium text-gray-700">Phone number</label>
                            <div class="mt-1">
                                <input type="text" value="{{$reservation->tel_number}}" name="tel_number" id="tel_number" class="p-2 block w-full transition duration-150 ease-in-out bg-white border border-gray-400 rounded @error('tel_number') border-red-600 @enderror">
                            </div>
                            @error('tel_number')
                                <div class="text-red-600 mt-2 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="sm:col-span-6">
                            <label for="guest_number" class="block text-sm font-medium text-gray-700">Guest number</label>
                            <div class="mt-1">
                                <input type="text" value="{{$reservation->guest_number}}" name="guest_number" id="guest_number" class="p-2 block w-full transition duration-150 ease-in-out bg-white border border-gray-400 rounded @error('guest_number') border-red-600 @enderror">
                            </div>
                            @error('guest_number')
                                <div class="text-red-600 mt-2 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="sm:col-span-6">
                            <label for="res_date" class="block text-sm font-medium text-gray-700">Reservation Date</label>
                            <div class="mt-1">
                                <input type="datetime-local" value="{{$reservation->res_date}}" name="res_date" id="res_date" class="p-2 block w-full transition duration-150 ease-in-out bg-white border border-gray-400 rounded @error('res_date') border-red-600 @enderror">
                            </div>
                            @error('res_date')
                                <div class="text-red-600 mt-2 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="sm:col-span-6">
                            <label for="table_id" class="block text-sm font-medium text-gray-700">Table</label>
                            <div class="mt-1">
                                <select type="text" name="table_id" id="table_id" class="block w-full transition duration-150 ease-in-out bg-white border border-gray-400 rounded @error('table_id') border-red-600 @enderror">
                                    @foreach ($tables as $table)
                                        <option value="{{ $table->id }}" @selected($table->id == $reservation->table_id)> {{ $table->name }} ({{ $table->guest_number }} Guest)</option>    
                                    @endforeach
                                </select>
                            </div>
                            @error('table_id')
                                <div class="text-red-600 mt-2 text-sm">{{ $message }}</div>
                            @enderror
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
