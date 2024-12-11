<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Tailwind</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 flex justify-center items-center min-h-screen">
    <main class="bg-slate-50 p-8 rounded-lg shadow-md w-full max-w-md my-8">
        <h1 class="text-xl font-semibold mb-6 text-gray-700">Edit Status Data Pengusulan</h1>
        <form action="{{ route('updateDataPengusulan', $pengusulan->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            <div class="flex flex-col">
                <label for="status" class="mb-1 text-gray-600 font-medium">Status</label>
                <select id="status" name="status" required
                    class="h-12 border border-slate-400 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-blue-500 dark:focus:border-indigo-600 focus:ring-blue-500 dark:focus:ring-blue-500 text-sm rounded-xl shadow-sm">
                    <option value="diproses" {{ old('status', $pengusulan->status) == 'diproses' ? 'selected' : '' }}>diproses</option>
                    <option value="diterima" {{ old('status', $pengusulan->status) == 'diterima' ? 'selected' : '' }}>diterima</option>
                    <option value="tersedia" {{ old('status', $pengusulan->status) == 'tersedia' ? 'selected' : '' }}>tersedia</option>
                    <option value="ditolak" {{ old('status', $pengusulan->status) == 'ditolak' ? 'selected' : '' }}>ditolak</option>
                </select>
            </div>

                {{-- <label for="bookImage" class="mb-1 text-gray-600 font-medium">Gambar Buku</label>
                <input type="file" id="bookImage" name="bookImage" accept="image/*"
                    class="p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"> --}}

            <button type="submit" class="px-4 py-2 w-full bg-blue-600 text-white font-medium rounded-md hover:bg-blue-700 transition">Edit</button>
        </form>
    </main>
</body>

</html>
