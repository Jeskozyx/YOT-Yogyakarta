<head>
    <link rel="icon" type="image/png" href="{{ asset('images/logos/Logo-MS-kuning.png') }}">
</head>
<x-app-layout>
    <div class="py-4 md:py-8 bg-gray-50/50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Header Section -->
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 md:mb-8 gap-4">
                <div class="w-full">
                    <h1 class="text-2xl md:text-3xl font-bold text-gray-900 tracking-tight">Account Manager</h1>
                    <p class="text-gray-500 text-sm mt-1">Kelola pengguna, peran, dan akses sistem.</p>
                </div>
                <div class="w-full md:w-auto">
                    <!-- <button class="w-full md:w-auto inline-flex items-center justify-center px-4 py-3 md:py-2.5 bg-blue-600 text-white font-medium rounded-xl hover:bg-blue-700 shadow-lg shadow-blue-500/30 transition duration-200 gap-2">
                        <span class="material-symbols-rounded text-xl">person_add</span>
                        <span class="text-sm md:text-base">New User</span>
                    </button> -->
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6 mb-6 md:mb-8">
                <div class="bg-white rounded-2xl p-4 md:p-6 shadow-sm border border-gray-100 flex items-center justify-between group hover:border-blue-200 transition duration-200">
                    <div>
                        <p class="text-xs md:text-sm font-medium text-gray-500 mb-1">Total Users</p>
                        <h3 class="text-2xl md:text-3xl font-bold text-gray-800">{{ $users->total() }}</h3>
                    </div>
                    <div class="h-10 w-10 md:h-12 md:w-12 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition duration-200">
                        <span class="material-symbols-rounded text-xl md:text-2xl">group</span>
                    </div>
                </div>

                <div class="bg-white rounded-2xl p-4 md:p-6 shadow-sm border border-gray-100 flex items-center justify-between group hover:border-purple-200 transition duration-200">
                    <div>
                        <p class="text-xs md:text-sm font-medium text-gray-500 mb-1">Administrators</p>
                        <h3 class="text-2xl md:text-3xl font-bold text-gray-800">{{ $users->where('role', 'admin')->count() }}</h3>
                    </div>
                    <div class="h-10 w-10 md:h-12 md:w-12 bg-purple-50 text-purple-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition duration-200">
                        <span class="material-symbols-rounded text-xl md:text-2xl">shield_person</span>
                    </div>
                </div>

                <div class="bg-white rounded-2xl p-4 md:p-6 shadow-sm border border-gray-100 flex items-center justify-between group hover:border-emerald-200 transition duration-200">
                    <div>
                        <p class="text-xs md:text-sm font-medium text-gray-500 mb-1">Coordinators</p>
                        <h3 class="text-2xl md:text-3xl font-bold text-gray-800">{{ $users->where('role', 'coordinator')->count() }}</h3>
                    </div>
                    <div class="h-10 w-10 md:h-12 md:w-12 bg-emerald-50 text-emerald-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition duration-200">
                        <span class="material-symbols-rounded text-xl md:text-2xl">supervisor_account</span>
                    </div>
                </div>
            </div>

            <!-- Table Section -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
                
                <!-- Filters Section -->
                <div class="p-4 md:p-5 border-b border-gray-100">
                    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                        
                        <!-- Search Input -->
                        <div class="relative w-full">
                            <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="material-symbols-rounded text-gray-400">search</span>
                            </span>
                            <input type="text" 
                                   class="block w-full pl-10 pr-3 py-2.5 border-gray-200 rounded-xl bg-gray-50 text-sm focus:bg-white focus:ring-2 focus:ring-blue-100 focus:border-blue-500 transition duration-200 placeholder-gray-400" 
                                   placeholder="Search by name or email...">
                        </div>

                        <!-- Filter Controls -->
                        <div class="flex flex-wrap items-center gap-2 md:gap-3 w-full md:w-auto">
                            <select class="w-full md:w-auto bg-white border-gray-200 text-gray-600 text-sm rounded-xl focus:ring-blue-500 focus:border-blue-500 py-2.5 pl-3 pr-8 cursor-pointer hover:bg-gray-50 transition">
                                <option>Role: All</option>
                                <option>Admin</option>
                                <option>Coordinator</option>
                            </select>
                            
                            <select class="w-full md:w-auto bg-white border-gray-200 text-gray-600 text-sm rounded-xl focus:ring-blue-500 focus:border-blue-500 py-2.5 pl-3 pr-8 cursor-pointer hover:bg-gray-50 transition">
                                <option>Status: All</option>
                                <option>Active</option>
                                <option>Inactive</option>
                            </select>

                            <div class="h-6 w-px bg-gray-200 hidden md:block mx-1"></div>

                            <button class="w-full md:w-auto inline-flex items-center justify-center px-4 py-2.5 border border-gray-200 text-sm font-medium rounded-xl text-gray-600 bg-white hover:bg-gray-50 hover:text-gray-900 transition gap-2">
                                <span class="material-symbols-rounded text-lg">download</span>
                                Export
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Table -->
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-100">
                        <thead class="bg-gray-50/50">
                            <tr>
                                <th scope="col" class="px-4 md:px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">User Profile</th>
                                <th scope="col" class="px-4 md:px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider hidden md:table-cell">Role</th>
                                <th scope="col" class="px-4 md:px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Status</th>
                                <th scope="col" class="px-4 md:px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider hidden sm:table-cell">Verified</th>
                                <th scope="col" class="px-4 md:px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider hidden lg:table-cell">Joined Date</th>
                                <th scope="col" class="px-4 md:px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider hidden lg:table-cell">Control</th>
                                <th scope="col" class="relative px-4 md:px-6 py-3"><span class="sr-only">Actions</span></th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-100">
                            @foreach($users as $user)
                            
                            @php
                                // Cek status Ban
                                $isBanned = $user->banned_until && now()->lessThan($user->banned_until);
                            @endphp

                            <tr class="{{ $isBanned ? 'bg-red-50 hover:bg-red-100 border-l-4 border-l-red-500' : 'hover:bg-blue-50/30' }} transition-colors duration-150 group">
                                <td class="px-4 md:px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center gap-3 md:gap-4">
                                        <div class="flex-shrink-0 h-8 w-8 md:h-10 md:w-10">
                                            <div class="h-8 w-8 md:h-10 md:w-10 rounded-full {{ $isBanned ? 'bg-red-200 text-red-700' : 'bg-gradient-to-br from-blue-500 to-indigo-600 text-white' }} flex items-center justify-center text-xs md:text-sm font-bold shadow-md shadow-blue-500/20">
                                                {{ strtoupper(substr($user->name, 0, 1)) }}
                                            </div>
                                        </div>
                                        <div class="min-w-0 flex-1">
                                            <div class="text-sm font-semibold text-gray-900 truncate">{{ $user->name }}</div>
                                            <div class="text-xs text-gray-500 truncate">{{ $user->email }}</div>
                                        </div>
                                    </div>
                                </td>
                                
                                <td class="px-4 md:px-6 py-4 whitespace-nowrap hidden md:table-cell">
                                    @if($user->role === 'admin')
                                        <span class="inline-flex items-center gap-1.5 px-2 py-1 rounded-full text-xs font-medium bg-purple-50 text-purple-700 border border-purple-100">
                                            <span class="h-1.5 w-1.5 rounded-full bg-purple-500"></span> Admin
                                        </span>
                                    @elseif($user->role === 'coordinator')
                                        <span class="inline-flex items-center gap-1.5 px-2 py-1 rounded-full text-xs font-medium bg-emerald-50 text-emerald-700 border border-emerald-100">
                                            <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span> Coordinator
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1.5 px-2 py-1 rounded-full text-xs font-medium bg-gray-50 text-gray-600 border border-gray-200">
                                            <span class="h-1.5 w-1.5 rounded-full bg-gray-400"></span> User
                                        </span>
                                    @endif
                                </td>

                                <td class="px-4 md:px-6 py-4 whitespace-nowrap">
                                    @if($isBanned)
                                        {{-- TAMPILAN JIKA DI-BAN --}}
                                        <div class="flex flex-col">
                                            <div class="flex items-center gap-2 mb-1">
                                                <span class="relative flex h-2.5 w-2.5">
                                                  <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                                                  <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-red-600"></span>
                                                </span>
                                                <span class="text-xs font-bold text-red-700">SUSPENDED</span>
                                            </div>
                                            <span class="text-[10px] text-red-500 font-medium bg-white/50 px-1.5 py-0.5 rounded border border-red-100 w-fit">
                                                <i class="fas fa-clock mr-1"></i>
                                                Until {{ $user->banned_until->timezone('Asia/Jakarta')->format('H:i') }}
                                            </span>
                                        </div>
                                    @else
                                        {{-- TAMPILAN NORMAL --}}
                                        <div class="flex items-center gap-2">
                                            <div class="relative flex h-2.5 w-2.5">
                                              <span class="animate-ping absolute inline-flex h-full w-full rounded-full {{ $user->is_active ? 'bg-green-400 opacity-75' : 'hidden' }}"></span>
                                              <span class="relative inline-flex rounded-full h-2.5 w-2.5 {{ $user->is_active ? 'bg-green-500' : 'bg-red-400' }}"></span>
                                            </div>
                                            <span class="text-xs md:text-sm font-medium {{ $user->is_active ? 'text-green-700' : 'text-red-600' }}">
                                                {{ $user->is_active ? 'Active' : 'Inactive' }}
                                            </span>
                                        </div>
                                    @endif
                                </td>

                                <td class="px-4 md:px-6 py-4 whitespace-nowrap hidden sm:table-cell">
                                    @if($user->email_verified_at)
                                        <span class="material-symbols-rounded text-green-500 text-lg md:text-xl" title="Verified">verified</span>
                                    @else
                                        <span class="material-symbols-rounded text-gray-300 text-lg md:text-xl" title="Pending">gpp_maybe</span>
                                    @endif
                                </td>
                                <td class="px-4 md:px-6 py-4 whitespace-nowrap text-xs md:text-sm text-gray-500 hidden lg:table-cell">
                                    {{ $user->created_at->format('M d, Y') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <div class="flex items-center justify-end gap-2 opacity-100 group-hover:opacity-100 transition-opacity duration-200">
                                        
                                        <!-- <button class="p-1.5 text-gray-400 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition" title="Edit">
                                            <span class="material-symbols-rounded text-lg">edit</span>
                                        </button> -->
                                        
                                        @if($user->id !== auth()->id())
                                            
                                            @if($isBanned)
                                                <form action="{{ route('users.unban', $user->id) }}" method="POST" class="inline-block">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" 
                                                            class="p-1.5 text-green-600 bg-green-100 hover:bg-green-200 rounded-lg transition shadow-sm" 
                                                            title="Batalkan Suspend (Unban)">
                                                        <span class="material-symbols-rounded text-lg">lock_open_right</span>
                                                    </button>
                                                </form>
                                            @else
                                                <button onclick="openSuspendModal('{{ $user->id }}', '{{ $user->name }}')" 
                                                        class="p-1.5 text-gray-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition" 
                                                        title="Suspend User">
                                                    <span class="material-symbols-rounded text-lg">block</span> 
                                                </button>
                                            @endif

                                        @endif
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="px-4 md:px-6 py-4 bg-gray-50 border-t border-gray-200 flex flex-col sm:flex-row items-center justify-between gap-4">
                    <div class="text-xs text-gray-500 order-2 sm:order-1">
                        Showing <span class="font-medium text-gray-900">{{ $users->firstItem() ?? 0 }}</span> to <span class="font-medium text-gray-900">{{ $users->lastItem() ?? 0 }}</span> of results
                    </div>
                    <div class="order-1 sm:order-2">
                        {{ $users->links() }} 
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Suspend Modal -->
    <div id="suspendModal" class="fixed inset-0 z-50 hidden overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">    
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true" onclick="closeSuspendModal()"></div>
            
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            
            <div class="inline-block align-bottom bg-white rounded-2xl text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg w-full">
                <form id="suspendForm" method="POST" action="">
                    @csrf
                    @method('PUT')               
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                <span class="material-symbols-rounded text-red-600 text-xl">timer_off</span>
                            </div>
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">Suspend Account</h3>
                                <div class="mt-2">
                                    <p class="text-sm text-gray-500 mb-4">
                                        Pilih durasi suspend untuk akun <span id="suspendUserName" class="font-bold text-gray-800"></span>.
                                        Selama periode ini, pengguna tidak akan bisa mengakses dashboard.
                                    </p>
                                    
                                    <label for="duration" class="block text-sm font-medium text-gray-700 mb-1">Durasi (Menit)</label>
                                    <select name="duration" id="duration" class="block w-full rounded-xl border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 sm:text-sm py-2.5">
                                        @for ($i = 1; $i <= 10; $i++)
                                            <option value="{{ $i }}">{{ $i }} Menit</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse gap-2">
                        <button type="submit" class="w-full sm:w-auto inline-flex justify-center rounded-xl border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none sm:text-sm">
                            Suspend User
                        </button>
                        <button type="button" onclick="closeSuspendModal()" class="mt-0 sm:mt-0 w-full sm:w-auto inline-flex justify-center rounded-xl border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none sm:text-sm">
                            Batal
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
    function openSuspendModal(userId, userName) {
        // Set nama user di teks modal
        document.getElementById('suspendUserName').innerText = userName;
        
        // Set action URL form secara dinamis
        const form = document.getElementById('suspendForm');
        // Pastikan route ini sesuai dengan di web.php (users/{id}/suspend)
        form.action = `/users/${userId}/suspend`; 
        
        // Tampilkan modal
        document.getElementById('suspendModal').classList.remove('hidden');
    }

    function closeSuspendModal() {
        document.getElementById('suspendModal').classList.add('hidden');
    }
    </script>
</x-app-layout>