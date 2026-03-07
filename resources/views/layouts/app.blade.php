<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Apps') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 font-sans antialiased">

<div class="flex h-screen overflow-hidden bg-gray-50">

    {{-- SIDEBAR --}}
    <aside class="w-64 bg-gradient-to-b from-gray-900 to-gray-800 text-white flex flex-col flex-shrink-0 border-r border-gray-700">

        {{-- Logo Section --}}
        <div class="px-6 h-20 flex items-center border-b border-gray-700 flex-shrink-0">
            <a href="{{ route('dashboard') }}" class="flex items-center gap-3 w-full">
                <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-blue-600 rounded-lg flex items-center justify-center shadow-lg">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h4l2 2h4a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2V6z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-lg font-bold tracking-wide">Admin</p>
                    <p class="text-xs text-gray-400">Dashboard</p>
                </div>
            </a>
        </div>

        {{-- Menu --}}
        <nav class="flex-1 px-4 py-8 space-y-2 overflow-y-auto">
            
            {{-- Dashboard --}}
            <a href="{{ route('dashboard') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium transition-all duration-200
               {{ request()->routeIs('dashboard') ? 'bg-blue-600 text-white shadow-lg' : 'text-gray-300 hover:bg-gray-700' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-3m0 0l7-4 7 4M5 9v10a1 1 0 001 1h12a1 1 0 001-1V9m-9 11l4-4m-9-8l4-4m0 0l4-4   "/>
                </svg>
                <span>Dashboard</span>
            </a>

            {{-- Products --}}
            <a href="{{ route('admin.products.index') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium transition-all duration-200
               {{ request()->routeIs('admin.products.*') ? 'bg-green-600 text-white shadow-lg' : 'text-gray-300 hover:bg-gray-700' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                </svg>
                <span>Products</span>
            </a>

            {{-- Users --}}
            <a href="{{ route('admin.users.index') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium transition-all duration-200
               {{ request()->routeIs('admin.users.*') ? 'bg-blue-600 text-white shadow-lg' : 'text-gray-300 hover:bg-gray-700' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.856-1.487M15 10a3 3 0 11-6 0 3 3 0 016 0zM16 12a4 4 0 11-8 0 4 4 0 018 0z"/>
                </svg>
                <span>Users</span>
            </a>

        </nav>

        {{-- Footer Info --}}
        <div class="px-4 py-6 border-t border-gray-700 space-y-3">
            <div class="text-xs text-gray-400 space-y-1">
                <p class="font-semibold text-gray-300">{{ Auth::user()->name }}</p>
                <p class="truncate">{{ Auth::user()->email }}</p>
            </div>
        </div>

    </aside>

    {{-- MAIN CONTENT --}}
    <div class="flex-1 flex flex-col overflow-hidden">

        {{-- Top Header --}}
        <header class="bg-white border-b border-gray-200 px-8 h-20 flex items-center justify-between flex-shrink-0 shadow-sm">

            {{-- Left Side - Title and Breadcrumb --}}
            <div class="flex items-center gap-4 flex-1">
                <div>
                    @if(isset($header))
                        <h1 class="text-2xl font-bold text-gray-900">{{ $header }}</h1>
                        <p class="text-sm text-gray-500 mt-1">Welcome back, manage your content</p>
                    @endif
                </div>
            </div>

            {{-- Right Side - Profile Dropdown --}}
            <div class="flex items-center gap-4">
                {{-- Notification --}}
                <button class="relative p-2 text-gray-600 hover:text-gray-900 transition duration-200">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                    </svg>
                    <span class="absolute top-1 right-1 block h-2 w-2 rounded-full bg-red-500"></span>
                </button>

                {{-- Divider --}}
                <div class="w-px h-8 bg-gray-200"></div>

                {{-- Profile Dropdown --}}
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open"
                            class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-gray-100 transition duration-200">
                        <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-blue-600 rounded-full flex items-center justify-center text-white font-semibold">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </div>
                        <div class="text-left hidden sm:block">
                            <p class="text-sm font-medium text-gray-900">{{ Auth::user()->name }}</p>
                            <p class="text-xs text-gray-500">{{ Auth::user()->is_admin ? 'Admin' : 'User' }}</p>
                        </div>
                        <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>

                    {{-- Dropdown Menu --}}
                    <div x-show="open" @click.outside="open = false"
                         class="absolute right-0 mt-2 w-56 bg-white rounded-xl shadow-lg border border-gray-200 z-50 overflow-hidden"
                         style="display: none">

                        {{-- Header --}}
                        <div class="px-4 py-3 border-b border-gray-100 bg-gray-50">
                            <p class="text-sm font-semibold text-gray-900">{{ Auth::user()->name }}</p>
                            <p class="text-xs text-gray-500 mt-1">{{ Auth::user()->email }}</p>
                        </div>

                        {{-- Menu Items --}}
                        <a href="{{ route('profile.edit') }}"
                           class="flex items-center gap-3 px-4 py-3 text-sm text-gray-700 hover:bg-gray-50 transition duration-200 border-b border-gray-100">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                            Lihat Profil
                        </a>

                        <form method="POST" action="{{ route('logout') }}" class="w-full">
                            @csrf
                            <button type="submit"
                                    class="w-full flex items-center gap-3 px-4 py-3 text-sm text-red-600 hover:bg-red-50 transition duration-200">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                </svg>
                                Logout
                            </button>
                        </form>

                    </div>
                </div>
            </div>
        </header>

        {{-- Page Content --}}
        <main class="flex-1 overflow-y-auto bg-gray-50">
            {{ $slot }}
        </main>

    </div>

</div>

</body>
</html>