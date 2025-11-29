<x-app-layout>
    <div class="py-8 bg-gray-50/50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900 tracking-tight">Account Manager</h1>
                    <p class="text-gray-500 text-sm mt-1">Kelola pengguna, peran, dan akses sistem.</p>
                </div>
                <div>
                    <button class="inline-flex items-center px-4 py-2.5 bg-blue-600 text-white font-medium rounded-xl hover:bg-blue-700 shadow-lg shadow-blue-500/30 transition duration-200 gap-2">
                        <span class="material-symbols-rounded text-xl">person_add</span>
                        <span>New User</span>
                    </button>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 flex items-center justify-between group hover:border-blue-200 transition duration-200">
                    <div>
                        <p class="text-sm font-medium text-gray-500 mb-1">Total Users</p>
                        <h3 class="text-3xl font-bold text-gray-800">{{ $users->total() }}</h3>
                    </div>
                    <div class="h-12 w-12 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition duration-200">
                        <span class="material-symbols-rounded text-2xl">group</span>
                    </div>
                </div>

                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 flex items-center justify-between group hover:border-purple-200 transition duration-200">
                    <div>
                        <p class="text-sm font-medium text-gray-500 mb-1">Administrators</p>
                        <h3 class="text-3xl font-bold text-gray-800">{{ $users->where('role', 'admin')->count() }}</h3>
                    </div>
                    <div class="h-12 w-12 bg-purple-50 text-purple-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition duration-200">
                        <span class="material-symbols-rounded text-2xl">shield_person</span>
                    </div>
                </div>

                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 flex items-center justify-between group hover:border-emerald-200 transition duration-200">
                    <div>
                        <p class="text-sm font-medium text-gray-500 mb-1">Coordinators</p>
                        <h3 class="text-3xl font-bold text-gray-800">{{ $users->where('role', 'coordinator')->count() }}</h3>
                    </div>
                    <div class="h-12 w-12 bg-emerald-50 text-emerald-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition duration-200">
                        <span class="material-symbols-rounded text-2xl">supervisor_account</span>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
                
                <div class="p-5 border-b border-gray-100">
                    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                        
                        <div class="relative w-full md:w-96">
                            <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="material-symbols-rounded text-gray-400">search</span>
                            </span>
                            <input type="text" 
                                   class="block w-full pl-10 pr-3 py-2.5 border-gray-200 rounded-xl bg-gray-50 text-sm focus:bg-white focus:ring-2 focus:ring-blue-100 focus:border-blue-500 transition duration-200 placeholder-gray-400" 
                                   placeholder="Search by name or email...">
                        </div>

                        <div class="flex flex-wrap items-center gap-3">
                            <select class="bg-white border-gray-200 text-gray-600 text-sm rounded-xl focus:ring-blue-500 focus:border-blue-500 py-2.5 pl-3 pr-8 cursor-pointer hover:bg-gray-50 transition">
                                <option>Role: All</option>
                                <option>Admin</option>
                                <option>Coordinator</option>
                            </select>
                            
                            <select class="bg-white border-gray-200 text-gray-600 text-sm rounded-xl focus:ring-blue-500 focus:border-blue-500 py-2.5 pl-3 pr-8 cursor-pointer hover:bg-gray-50 transition">
                                <option>Status: All</option>
                                <option>Active</option>
                                <option>Inactive</option>
                            </select>

                            <div class="h-6 w-px bg-gray-200 hidden sm:block mx-1"></div>

                            <button class="inline-flex items-center px-4 py-2.5 border border-gray-200 text-sm font-medium rounded-xl text-gray-600 bg-white hover:bg-gray-50 hover:text-gray-900 transition gap-2">
                                <span class="material-symbols-rounded text-lg">download</span>
                                Export
                            </button>
                        </div>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-100">
                        <thead class="bg-gray-50/50">
                            <tr>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">User Profile</th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Role</th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Status</th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Verified</th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Joined Date</th>
                                <th scope="col" class="relative px-6 py-4"><span class="sr-only">Actions</span></th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-100">
                            @foreach($users as $user)
                            <tr class="hover:bg-blue-50/30 transition-colors duration-150 group">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center gap-4">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <div class="h-10 w-10 rounded-full bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center text-white text-sm font-bold shadow-md shadow-blue-500/20">
                                                {{ strtoupper(substr($user->name, 0, 1)) }}
                                            </div>
                                        </div>
                                        <div>
                                            <div class="text-sm font-semibold text-gray-900">{{ $user->name }}</div>
                                            <div class="text-xs text-gray-500">{{ $user->email }}</div>
                                        </div>
                                    </div>
                                </td>
                                
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($user->role === 'admin')
                                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium bg-purple-50 text-purple-700 border border-purple-100">
                                            <span class="h-1.5 w-1.5 rounded-full bg-purple-500"></span> Admin
                                        </span>
                                    @elseif($user->role === 'coordinator')
                                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium bg-emerald-50 text-emerald-700 border border-emerald-100">
                                            <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span> Coordinator
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium bg-gray-50 text-gray-600 border border-gray-200">
                                            <span class="h-1.5 w-1.5 rounded-full bg-gray-400"></span> User
                                        </span>
                                    @endif
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center gap-2">
                                        <div class="relative flex h-2.5 w-2.5">
                                          <span class="animate-ping absolute inline-flex h-full w-full rounded-full {{ $user->is_active ? 'bg-green-400 opacity-75' : 'hidden' }}"></span>
                                          <span class="relative inline-flex rounded-full h-2.5 w-2.5 {{ $user->is_active ? 'bg-green-500' : 'bg-red-400' }}"></span>
                                        </div>
                                        <span class="text-sm font-medium {{ $user->is_active ? 'text-green-700' : 'text-red-600' }}">
                                            {{ $user->is_active ? 'Active' : 'Inactive' }}
                                        </span>
                                    </div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($user->email_verified_at)
                                        <span class="material-symbols-rounded text-green-500 text-xl" title="Verified">verified</span>
                                    @else
                                        <span class="material-symbols-rounded text-gray-300 text-xl" title="Pending">gpp_maybe</span>
                                    @endif
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $user->created_at->format('M d, Y') }}
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <div class="flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                                        <button class="p-1.5 text-gray-400 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition" title="Edit">
                                            <span class="material-symbols-rounded text-lg">edit</span>
                                        </button>
                                        
                                        @if($user->id !== auth()->id())
                                            <button class="p-1.5 text-gray-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition" title="Delete">
                                                <span class="material-symbols-rounded text-lg">delete</span>
                                            </button>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex items-center justify-between">
                    <div class="text-xs text-gray-500">
                        Showing <span class="font-medium text-gray-900">{{ $users->firstItem() ?? 0 }}</span> to <span class="font-medium text-gray-900">{{ $users->lastItem() ?? 0 }}</span> of results
                    </div>
                    <div>
                        {{ $users->links() }} 
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>