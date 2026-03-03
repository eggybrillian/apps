<x-app-layout>
    <x-slot name="header">Edit User</x-slot>

    <div class="max-w-2xl bg-white shadow rounded-lg p-6">
        <form action="{{ route('admin.users.update', $user) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}"
                       class="w-full border rounded px-3 py-2 @error('name') border-red-500 @enderror">
                @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}"
                       class="w-full border rounded px-3 py-2 @error('email') border-red-500 @enderror">
                @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Password <span class="text-gray-400 text-xs">(kosongkan jika tidak ingin mengubah)</span>
                </label>
                <input type="password" name="password"
                       class="w-full border rounded px-3 py-2 @error('password') border-red-500 @enderror">
                @error('password') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Password</label>
                <input type="password" name="password_confirmation"
                       class="w-full border rounded px-3 py-2">
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Role</label>
                <select name="is_admin" class="w-full border rounded px-3 py-2 @error('is_admin') border-red-500 @enderror">
                    <option value="0" {{ old('is_admin', $user->is_admin ?? '') == '0' ? 'selected' : '' }}>User</option>
                    <option value="1" {{ old('is_admin', $user->is_admin ?? '') == '1' ? 'selected' : '' }}>Admin</option>
                </select>
            </div>

            <div class="flex gap-2">
                <a href="{{ route('admin.users.index') }}"
                   class="bg-gray-400 text-white px-4 py-2 rounded hover:bg-gray-500">Batal</a>
                <button type="submit"
                        class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Update</button>
            </div>
        </form>
    </div>
</x-app-layout>