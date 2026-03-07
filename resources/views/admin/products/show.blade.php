<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Detail Produk
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg rounded-xl border border-gray-200">

                {{-- Header --}}
                <div class="px-6 py-4 bg-gradient-to-r from-green-500 to-green-600 border-b border-gray-200">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-white mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                            </svg>
                            <h3 class="text-lg font-semibold text-white">Detail Produk</h3>
                        </div>
                        <div class="flex space-x-2">
                            <a href="{{ route('admin.products.edit', $product) }}"
                               class="inline-flex items-center px-3 py-1.5 border border-white/20 shadow-sm text-sm font-medium rounded-lg text-white bg-white/10 hover:bg-white/20 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-white transition duration-200">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                                Edit
                            </a>
                            <a href="{{ route('admin.products.index') }}"
                               class="inline-flex items-center px-3 py-1.5 border border-white/20 shadow-sm text-sm font-medium rounded-lg text-white bg-white/10 hover:bg-white/20 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-white transition duration-200">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                                </svg>
                                Kembali
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Content --}}
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                        {{-- Informasi Utama --}}
                        <div class="space-y-6">
                            <div>
                                <h4 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                                    <svg class="w-5 h-5 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    Informasi Produk
                                </h4>

                                <div class="bg-gray-50 rounded-lg p-4 space-y-3">
                                    <div class="flex items-center justify-between">
                                        <span class="text-sm font-medium text-gray-600">Nama Produk:</span>
                                        <span class="text-sm text-gray-900">{{ $product->name }}</span>
                                    </div>

                                    <div class="flex items-center justify-between">
                                        <span class="text-sm font-medium text-gray-600">Harga:</span>
                                        <span class="text-sm font-semibold text-green-600">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                                    </div>

                                    <div class="flex items-center justify-between">
                                        <span class="text-sm font-medium text-gray-600">Stok:</span>
                                        <span class="text-sm text-gray-900">{{ $product->stock }} unit</span>
                                    </div>

                                    <div class="flex items-center justify-between">
                                        <span class="text-sm font-medium text-gray-600">Status:</span>
                                        @if($product->stock > 0)
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                                </svg>
                                                Tersedia
                                            </span>
                                        @else
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                                </svg>
                                                Habis
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            {{-- Deskripsi --}}
                            <div>
                                <h4 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                                    <svg class="w-5 h-5 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"/>
                                    </svg>
                                    Deskripsi
                                </h4>

                                <div class="bg-gray-50 rounded-lg p-4">
                                    @if($product->description)
                                        <p class="text-sm text-gray-700 leading-relaxed">{{ $product->description }}</p>
                                    @else
                                        <p class="text-sm text-gray-500 italic">Tidak ada deskripsi</p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        {{-- Metadata --}}
                        <div class="space-y-6">
                            <div>
                                <h4 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                                    <svg class="w-5 h-5 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    Metadata
                                </h4>

                                <div class="bg-gray-50 rounded-lg p-4 space-y-3">
                                    <div class="flex items-center justify-between">
                                        <span class="text-sm font-medium text-gray-600">ID Produk:</span>
                                        <span class="text-sm text-gray-900 font-mono">#{{ $product->id }}</span>
                                    </div>

                                    <div class="flex items-center justify-between">
                                        <span class="text-sm font-medium text-gray-600">Dibuat:</span>
                                        <span class="text-sm text-gray-900">{{ $product->created_at->format('d M Y, H:i') }}</span>
                                    </div>

                                    <div class="flex items-center justify-between">
                                        <span class="text-sm font-medium text-gray-600">Diupdate:</span>
                                        <span class="text-sm text-gray-900">{{ $product->updated_at->format('d M Y, H:i') }}</span>
                                    </div>
                                </div>
                            </div>

                            {{-- Statistik --}}
                            <div>
                                <h4 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                                    <svg class="w-5 h-5 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                                    </svg>
                                    Statistik
                                </h4>

                                <div class="bg-gray-50 rounded-lg p-4 space-y-3">
                                    <div class="flex items-center justify-between">
                                        <span class="text-sm font-medium text-gray-600">Nilai Stok:</span>
                                        <span class="text-sm font-semibold text-green-600">Rp {{ number_format($product->price * $product->stock, 0, ',', '.') }}</span>
                                    </div>

                                    <div class="flex items-center justify-between">
                                        <span class="text-sm font-medium text-gray-600">Ketersediaan:</span>
                                        <span class="text-sm text-gray-900">
                                            @if($product->stock > 10)
                                                Tinggi
                                            @elseif($product->stock > 0)
                                                Sedang
                                            @else
                                                Habis
                                            @endif
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>