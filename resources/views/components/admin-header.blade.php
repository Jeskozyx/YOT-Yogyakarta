@props(['title', 'breadcrumb' => null])

<div class="mb-8 flex flex-col md:flex-row md:items-center justify-between gap-4">
    <div>
        <h1 class="text-3xl font-extrabold text-blue-900 tracking-tight">{{ $title }}</h1>
        
        <nav class="flex text-sm text-gray-500 mt-1">
            <a href="{{ route('dashboard') }}" class="hover:text-blue-600 cursor-pointer transition-colors">Dashboard</a>
            <span class="mx-2">/</span>
            <span class="font-semibold text-blue-600">{{ $breadcrumb ?? $title }}</span>
        </nav>
    </div>

    <div>
        {{ $slot }}
    </div>
</div>