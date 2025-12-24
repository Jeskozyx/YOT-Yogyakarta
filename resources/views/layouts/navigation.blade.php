<nav class="bg-white  border-b border-gray-200 sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            
            <div class="flex items-center gap-8">
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <img src="{{ asset('images/logos/Jogja_logo.png') }}" alt="CozMeet" class="h-10 w-auto object-contain">
                    </a>
                </div>
            </div>

            <div class="hidden md:flex space-x-4 items-center justify-center flex-1">
                
                <a href="{{ route('dashboard') }}" 
                   class="flex items-center gap-2 px-4 py-2 rounded-full transition-all duration-300 ease-in-out hover:scale-105 
                   {{ request()->routeIs('dashboard') ? 'bg-blue-100 text-blue-600 active-nav-anim' : 'text-gray-500 hover:bg-gray-50 hover:text-blue-500' }}">
                    <span class="material-symbols-rounded {{ request()->routeIs('dashboard') ? 'fill-current' : '' }}">home</span>
                    @if(request()->routeIs('dashboard'))
                        <span class="font-semibold text-sm">Home</span>
                    @endif
                </a>

                @if(auth()->user()->role === 'coordinator')
                <a href="{{ route('kegiatan') }}" 
                   class="flex items-center gap-2 px-4 py-2 rounded-full transition-all duration-300 ease-in-out hover:scale-105
                   {{ request()->routeIs('kegiatan') ? 'bg-blue-100 text-blue-600 active-nav-anim' : 'text-gray-500 hover:bg-gray-50 hover:text-blue-500' }}">
                    <span class="material-symbols-rounded {{ request()->routeIs('kegiatan') ? 'fill-current' : '' }}">explore</span>
                    @if(request()->routeIs('kegiatan'))
                        <span class="font-semibold text-sm">Kegiatan</span>
                    @endif
                </a>
                @endif

                <a href="{{ route('documentations') }}" 
                   class="flex items-center gap-2 px-4 py-2 rounded-full transition-all duration-300 ease-in-out hover:scale-105
                   {{ request()->routeIs('documentations') ? 'bg-blue-100 text-blue-600 active-nav-anim' : 'text-gray-500 hover:bg-gray-50 hover:text-blue-500' }}">
                    <span class="material-symbols-rounded {{ request()->routeIs('documentations') ? 'fill-current' : '' }}">photo</span>
                    @if(request()->routeIs('documentations'))
                        <span class="font-semibold text-sm">Dokumentasi</span>
                    @endif
                </a>

                @if(auth()->user()->role === 'admin')
                <a href="{{ route('tasknotes') }}" 
                   class="flex items-center gap-2 px-4 py-2 rounded-full transition-all duration-300 ease-in-out hover:scale-105
                   {{ request()->routeIs('tasknotes') ? 'bg-blue-100 text-blue-600 active-nav-anim' : 'text-gray-500 hover:bg-gray-50 hover:text-blue-500' }}">
                    <span class="material-symbols-rounded {{ request()->routeIs('tasknotes') ? 'fill-current' : '' }}">notes</span>
                    @if(request()->routeIs('tasknotes'))
                        <span class="font-semibold text-sm">Task & Notes</span>
                    @endif
                </a>
                @endif

                @if(auth()->user()->role === 'admin')
                <a href="{{ route('account_manage') }}" 
                   class="flex items-center gap-2 px-4 py-2 rounded-full transition-all duration-300 ease-in-out hover:scale-105
                   {{ request()->routeIs('account_manage') ? 'bg-blue-100 text-blue-600 active-nav-anim' : 'text-gray-500 hover:bg-gray-50 hover:text-blue-500' }}">
                    <span class="material-symbols-rounded {{ request()->routeIs('account_manage') ? 'fill-current' : '' }}">person</span>
                    @if(request()->routeIs('account_manage'))
                        <span class="font-semibold text-sm">Account Manage</span>
                    @endif
                </a>
                @endif
            </div>

            <div class="flex items-center gap-4">
                <div class="flex items-center gap-3">
                    <div class="h-9 w-9 rounded-full bg-yellow-400 overflow-hidden border border-gray-200">
                        <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=random" alt="{{ Auth::user()->name }}" class="h-full w-full object-cover">
                    </div>
                    
                    <span class="hidden lg:block text-sm font-medium text-gray-700">
                        {{ Auth::user()->name }}
                    </span>
                </div>

                <a href="{{ route('profile.edit') }}" class="text-sm font-medium text-blue-500 hover:text-blue-700 ml-2 transition hover:scale-105">
                    Switch
                </a>

                <form method="POST" action="{{ route('logout') }}" class="ml-2">
                    @csrf
                    <button type="submit" class="flex items-center gap-2 px-4 py-2 rounded-full transition-all duration-300 ease-in-out hover:scale-105 hover:bg-red-50 hover:text-red-600 text-gray-500">
                        <span class="material-symbols-rounded">logout</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>

<style>
    @keyframes fadeInScale {
        0% {
            opacity: 0;
            transform: scale(0.95);
        }
        100% {
            opacity: 1;
            transform: scale(1);
        }
    }
    
    .active-nav-anim {
        animation: fadeInScale 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards;
    }
</style>