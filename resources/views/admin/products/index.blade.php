<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Daftar Produk
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded-lg p-6">

                @if(session('success'))
                    <div class="bg-green-100 text-green-700 px-4 py-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold">Produk</h3>
                    <a href="{{ route('admin.products.create') }}"
                       class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                        + Tambah
                    </a>
                </div>

                <table class="table-fixed w-full text-sm text-left border">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="w-10 px-4 py-2 border">#</th>
                            <th class="w-48 px-4 py-2 border">Nama</th>
                            <th class="w-72 px-4 py-2 border">Deskripsi</th>
                            <th class="w-28 px-4 py-2 border">Harga</th>
                            <th class="w-14 px-4 py-2 border">Stok</th>
                            <th class="w-32 px-4 py-2 border">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($products as $product)
                        <tr>
                            <td class="text-center px-4 py-2 border">{{ $loop->iteration }}</td>
                            <td class="whitespace-normal break-words px-4 py-2 border">{{ $product->name }}</td>
                            <td class="whitespace-normal break-words px-4 py-2 border">{{ $product->description }}</td>
                            <td class="text-right px-4 py-2 border">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                            <td class="text-center px-4 py-2 border">{{ $product->stock }}</td>
                            <td class="px-4 py-2 border">
                                <a href="{{ route('admin.products.edit', $product) }}"
                                   class="bg-yellow-400 text-white px-3 py-1 rounded text-xs">Edit</a>

                                <form action="{{ route('admin.products.destroy', $product) }}"
                                      method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="bg-red-500 text-white px-3 py-1 rounded text-xs"
                                            onclick="return confirm('Yakin hapus?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center px-4 py-4">Belum ada data.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="mt-4">{{ $products->links() }}</div>

            </div>
        </div>
    </div>
</x-app-layout>     