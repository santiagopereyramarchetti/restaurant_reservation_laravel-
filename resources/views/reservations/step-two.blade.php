<x-guest-layout>
    <div class="container w-full px-5 py-6 mx-auto">
        
        <div class="flex items-center min-h-screen bg-gray-50">
            <div class="flex-1 h-full max-w-4xl mx-auto bg-white rounded-lg shadow-xl">
                <div class="flex flex-col md:flex-row">
                    <div class="h-32 md:h-auto md:w-1/2">
                        <img class="object-cover w-full h-full"
                            src="https://cdn.pixabay.com/photo/2021/01/15/17/01/green-5919790__340.jpg" alt="img" />
                    </div>
                    <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
                        <div class="w-full">
                            <h3 class="mb-4 text-xl font-bold text-blue-600">Make Reservation</h3>

                            <div class="w-full bg-gray-200 rounded-full flex justify-end">
                                <div
                                    class="w-40 p-1 text-xs font-medium leading-none text-center text-blue-100 bg-blue-600 rounded-full">
                                    Step 2
                                </div>
                            </div>

                            <form method="POST" action="{{ route('reservations.store.step.two') }}" class="mt-4">
                                @csrf
                                <div class="sm:col-span-6">
                                    <label for="table_id" class="block text-sm font-medium text-gray-700">Table</label>
                                    <div class="mt-1">
                                        <select type="text" name="table_id" id="table_id" class="block w-full transition duration-150 ease-in-out bg-white border border-gray-400 rounded @error('table_id') border-red-600 @enderror">
                                            @foreach ($tables as $table)
                                                <option value="{{ $table->id }}"> {{ $table->name }} ({{ $table->guest_number }} Guest)</option>    
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('table_id')
                                        <div class="text-red-600 mt-2 text-sm">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mt-6 p-4 flex justify-between">
                                    <a class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white" href="{{ route('reservations.step.one') }}">Previous</a>
                                    <button type="submit"
                                        class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Finish</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-guest-layout>