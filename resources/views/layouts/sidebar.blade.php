<!-- Sidebar -->
<aside class="sidebar collapsed">
    <!-- Sidebar header -->
    <div class="sidebar-header">
        <a href="{{ route('dashboard') }}" class="header-logo">
            <x-application-logo class="w-full h-full fill-current text-gray-500" />
        </a>
        <button class="sidebar-toggle">
            <span class="material-symbols-rounded">chevron_left</span>
        </button>
    </div>
    
    <div class="sidebar-content">
        <!-- Search Form -->
        <form action="#" class="search-form">
            <span class="material-symbols-rounded">search</span>
            <input type="search" placeholder="Search..." required />
        </form>
        
        <!-- Sidebar Menu -->
        <ul class="menu-list">
            <li class="menu-item">
                <a href="{{ route('dashboard') }}" class="menu-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <span class="material-symbols-rounded">dashboard</span>
                    <span class="menu-label">Dashboard</span>
                </a>
            </li>
            
            <!-- Placeholder Links -->
            <li class="menu-item">
                <a href="{{ route('kegiatan') }}" class="menu-link {{ request()->routeIs('kegiatan') ? 'active' : '' }}">
                    <span class="material-symbols-rounded">event</span>
                    <span class="menu-label">Kegiatan</span>
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route('documentations') }}" class="menu-link {{ request()->routeIs('documentations') ? 'active' : '' }}">
                    <span class="material-symbols-rounded">picture_in_picture</span>
                    <span class="menu-label">Dokumentasi</span>
                </a>
            </li>
            <!-- <li class="menu-item">
                <a href="#" class="menu-link">
                    <span class="material-symbols-rounded">star</span>
                    <span class="menu-label">Favourites</span>
                </a>
            </li>
            <li class="menu-item">
                <a href="#" class="menu-link">
                    <span class="material-symbols-rounded">storefront</span>
                    <span class="menu-label">Products</span>
                </a>
            </li> -->
            @if(auth()->user()->role === 'admin')
            <li class="menu-item">
                <a href="{{ route('account_manage') }}" class="menu-link {{ request()->routeIs('account_manage') ? 'active' : '' }}">
                    <span class="material-symbols-rounded">group</span>
                    <span class="menu-label">Account</span>
                </a>
            </li>
            @endif
        </ul>
        
        <!-- User Profile Section (Diambil dari navigation.blade.php) -->
        <div class="user-profile-section border-t border-gray-200 mt-4 pt-4">
            <div class="px-4 mb-3">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <!-- Settings & Profile -->
            <ul class="menu-list">
                <li class="menu-item">
                    <a href="{{ route('profile.edit') }}" class="menu-link {{ request()->routeIs('profile.edit') ? 'active' : '' }}">
                        <span class="material-symbols-rounded">person</span>
                        <span class="menu-label">Profile</span>
                    </a>
                </li>
                <!-- Logout -->
                <li class="menu-item">
                    <form method="POST" action="{{ route('logout') }}" id="logout-form">
                        @csrf
                        <a href="#" class="menu-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <span class="material-symbols-rounded">logout</span>
                            <span class="menu-label">Log Out</span>
                        </a>
                    </form>
                </li>
            </ul>
        </div>
    </div>
    
    <!-- Sidebar Footer -->
    <div class="sidebar-footer">
        <button class="theme-toggle">
            <div class="theme-label">
                <span class="theme-icon material-symbols-rounded">dark_mode</span>
                <span class="theme-text">Dark Mode</span>
            </div>
            <div class="theme-toggle-track">
                <div class="theme-toggle-indicator"></div>
            </div>
        </button>
    </div>
</aside>

<!-- Mobile Navigation Header (Diambil dan dimodifikasi dari navigation.blade.php) -->
<nav x-data="{ open: false }" class="mobile-nav sm:hidden bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <div class="flex justify-between items-center px-4 h-16">
        <!-- Logo -->
        <div class="shrink-0 flex items-center">
            <a href="{{ route('dashboard') }}">
                <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
            </a>
        </div>

        <!-- User Dropdown untuk Mobile -->
        <div class="flex items-center">
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                        <div>{{ Auth::user()->name }}</div>
                        <div class="ms-1">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </button>
                </x-slot>

                <x-slot name="content">
                    <x-dropdown-link :href="route('profile.edit')">
                        {{ __('Profile') }}
                    </x-dropdown-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                </x-slot>
            </x-dropdown>

            <!-- Hamburger Menu Toggle -->
            <button @click="open = ! open" class="ms-2 inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>

    <!-- Responsive Navigation Menu (Mobile) -->
    <div x-show="open" class="sm:hidden bg-white dark:bg-gray-800 border-t border-gray-200 dark:border-gray-700">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>

<script>
    // Mobile menu functionality
    document.addEventListener('DOMContentLoaded', function() {
        const mobileMenuButton = document.querySelector('.mobile-nav button');
        const mobileMenu = document.querySelector('.mobile-nav div[x-show]');
        
        if (mobileMenuButton && mobileMenu) {
            mobileMenuButton.addEventListener('click', function() {
                const isOpen = mobileMenu.style.display !== 'none';
                mobileMenu.style.display = isOpen ? 'none' : 'block';
            });
        }
    });
</script>