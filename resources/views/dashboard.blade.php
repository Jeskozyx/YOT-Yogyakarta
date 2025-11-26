<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <!-- Search and Add Button Section -->
            <div class="mb-8 bg-white overflow-hidden shadow-lg sm:rounded-xl">
                <div class="p-8 bg-white border-b border-gray-200">
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-6">
                        <!-- Search Bar -->
                        <div class="relative flex-1 w-full sm:max-w-xl">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="h-7 w-7 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </div>
                            <input 
                                type="text" 
                                placeholder="Cari kegiatan..." 
                                class="block w-full pl-12 pr-4 py-4 text-lg border-2 border-gray-300 rounded-xl leading-6 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            >
                        </div>

                        <!-- Add Button -->
                        <button class="w-full sm:w-auto bg-blue-600 hover:bg-blue-700 text-white font-semibold py-4 px-8 rounded-xl transition duration-200 ease-in-out flex items-center justify-center gap-3 text-lg">
                            <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            Tambah Kegiatan
                        </button>
                    </div>
                </div>
            </div>

            <!-- Activities Table -->
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-xl">
                <div class="p-8 bg-white border-b border-gray-200">
                    <!-- Table -->
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-8 py-5 text-left text-lg font-semibold text-gray-700 uppercase tracking-wider">
                                        No
                                    </th>
                                    <th scope="col" class="px-8 py-5 text-left text-lg font-semibold text-gray-700 uppercase tracking-wider">
                                        Tanggal
                                    </th>
                                    <th scope="col" class="px-8 py-5 text-left text-lg font-semibold text-gray-700 uppercase tracking-wider">
                                        Nama Kegiatan
                                    </th>
                                    <th scope="col" class="px-8 py-5 text-left text-lg font-semibold text-gray-700 uppercase tracking-wider">
                                        Aksi
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($events as $event)
                                <tr class="hover:bg-gray-50 transition duration-150">
                                    <td class="px-8 py-6 whitespace-nowrap">
                                        <span class="text-xl font-semibold text-gray-900">{{ $event->id }}</span>
                                    </td>
                                    <td class="px-8 py-6 whitespace-nowrap">
                                        <span class="text-lg text-gray-700 font-medium">{{ $event->tanggal_pelaksanaan }}</span>
                                    </td>
                                    <td class="px-8 py-6">
                                        <span class="text-lg text-gray-900 font-normal">{{ $event->nama_kegiatan }}</span>
                                    </td>
                                    <td class="px-8 py-6 whitespace-nowrap">
                                        <div class="flex space-x-4">
                                            <button class="text-blue-600 hover:text-blue-900 transition duration-150 text-lg font-medium flex items-center gap-2">
                                                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                                Edit
                                            </button>
                                            <button class="text-red-600 hover:text-red-900 transition duration-150 text-lg font-medium flex items-center gap-2">
                                                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                                Hapus
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="mt-8 flex items-center justify-between">
                        <div class="text-lg text-gray-700">
                            
                        </div>
                        <div class="flex space-x-3">
                           
                            <button class="px-5 py-3 text-lg bg-gray-200 text-gray-700 rounded-xl hover:bg-gray-300 transition duration-150 font-medium">
                                Sebelumnya
                            </button>
                            <button class="px-5 py-3 text-lg bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition duration-150 font-medium">
                                1
                            </button>
                            <button class="px-5 py-3 text-lg bg-gray-200 text-gray-700 rounded-xl hover:bg-gray-300 transition duration-150 font-medium">
                                Selanjutnya
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>