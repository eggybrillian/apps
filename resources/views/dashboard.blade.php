<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

            {{-- Statistics Cards --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                {{-- Total Products --}}
                <div class="bg-gradient-to-r from-green-400 to-green-600 overflow-hidden shadow-lg rounded-xl transform hover:scale-105 transition duration-300">
                    <div class="p-6 text-white">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-semibold">Total Products</h3>
                                <p class="text-3xl font-bold">{{ $totalProducts }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Total Users --}}
                <div class="bg-gradient-to-r from-blue-400 to-blue-600 overflow-hidden shadow-lg rounded-xl transform hover:scale-105 transition duration-300">
                    <div class="p-6 text-white">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-semibold">Total Users</h3>
                                <p class="text-3xl font-bold">{{ $totalUsers }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Total Revenue --}}
                <div class="bg-gradient-to-r from-purple-400 to-purple-600 overflow-hidden shadow-lg rounded-xl transform hover:scale-105 transition duration-300">
                    <div class="p-6 text-white">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"/>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-semibold">Total Revenue</h3>
                                <p class="text-3xl font-bold">Rp{{ number_format($totalRevenue) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Recent Activity --}}
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

                {{-- Recent Products --}}
                <div class="bg-white overflow-hidden shadow-lg rounded-xl border border-gray-200">
                    <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-900">Recent Products</h3>
                    </div>
                    <div class="p-6">
                        <div class="space-y-4">
                            @forelse($recentProducts as $product)
                                <div class="flex items-center justify-between p-3 rounded-lg hover:bg-gray-50 transition duration-200">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10 bg-green-100 rounded-lg flex items-center justify-center">
                                            <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                            </svg>
                                        </div>
                                        <div class="ml-4">
                                            <p class="text-sm font-medium text-gray-900">{{ $product->name }}</p>
                                            <p class="text-sm text-gray-500">Rp{{ number_format($product->price) }}</p>
                                        </div>
                                    </div>
                                    <span class="text-xs text-gray-400 bg-gray-100 px-2 py-1 rounded-full">{{ $product->created_at->diffForHumans() }}</span>
                                </div>
                            @empty
                                <div class="text-center py-8">
                                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2M4 13h2m8-5v2m0 0v2m0-2H8m4 0h4"/>
                                    </svg>
                                    <p class="mt-2 text-sm text-gray-500">No products yet.</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>

                {{-- Recent Users --}}
                <div class="bg-white overflow-hidden shadow-lg rounded-xl border border-gray-200">
                    <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-900">Recent Users</h3>
                    </div>
                    <div class="p-6">
                        <div class="space-y-4">
                            @forelse($recentUsers as $user)
                                <div class="flex items-center justify-between p-3 rounded-lg hover:bg-gray-50 transition duration-200">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10 bg-blue-100 rounded-full flex items-center justify-center">
                                            <span class="text-sm font-semibold text-blue-600">{{ strtoupper(substr($user->name, 0, 1)) }}</span>
                                        </div>
                                        <div class="ml-4">
                                            <p class="text-sm font-medium text-gray-900">{{ $user->name }}</p>
                                            <p class="text-sm text-gray-500">{{ $user->email }}</p>
                                        </div>
                                    </div>
                                    <span class="text-xs text-gray-400 bg-gray-100 px-2 py-1 rounded-full">{{ $user->created_at->diffForHumans() }}</span>
                                </div>
                            @empty
                                <div class="text-center py-8">
                                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                    <p class="mt-2 text-sm text-gray-500">No users yet.</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>
