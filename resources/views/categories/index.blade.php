@extends('layouts.app')

@section('content')

<div class="space-y-6">

    <!-- Header Halaman -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">

        <div>
            <div class="flex items-center gap-2 mb-2">
                <span class="w-2 h-2 rounded-full bg-indigo-600"></span>
                <span class="text-xs font-bold uppercase tracking-widest text-indigo-600">
                    Manajemen Perpustakaan
                </span>
            </div>

            <h2 class="text-2xl font-extrabold tracking-tight text-slate-900">
                Daftar Kategori
            </h2>

            <p class="mt-2 text-sm text-slate-500">
                Kelola dan atur kategori koleksi buku perpustakaan.
            </p>
        </div>

        <a href="{{ route('categories.create') }}"
           class="inline-flex items-center justify-center gap-2 px-5 py-3 rounded-xl bg-indigo-600 text-white text-sm font-semibold shadow-md shadow-indigo-200 hover:bg-indigo-700 hover:shadow-lg transition">

            <svg xmlns="http://www.w3.org/2000/svg"
                 class="w-5 h-5"
                 fill="none"
                 viewBox="0 0 24 24"
                 stroke="currentColor"
                 stroke-width="2">
                <path stroke-linecap="round"
                      stroke-linejoin="round"
                      d="M12 4v16m8-8H4"/>
            </svg>

            Tambah Kategori
        </a>

    </div>

    <!-- Ringkasan Data -->
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

        <div class="relative overflow-hidden rounded-2xl border border-indigo-100 bg-indigo-50/60 p-5">

            <div class="flex items-center justify-between gap-4">

                <div>
                    <p class="text-sm font-medium text-slate-500">
                        Total Kategori
                    </p>

                    <p class="mt-2 text-3xl font-extrabold text-slate-900">
                        {{ $categories->count() }}
                    </p>

                    <p class="mt-1 text-xs text-slate-500">
                        Kategori terdaftar
                    </p>
                </div>

                <div class="flex items-center justify-center w-14 h-14 rounded-2xl bg-indigo-600 text-white shadow-md shadow-indigo-200">

                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-7 h-7"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor"
                         stroke-width="1.7">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M4 6.5A1.5 1.5 0 015.5 5H10l2 2h6.5A1.5 1.5 0 0120 8.5v9a1.5 1.5 0 01-1.5 1.5h-13A1.5 1.5 0 014 17.5z"/>
                    </svg>

                </div>

            </div>
        </div>

        <div class="rounded-2xl border border-slate-200 bg-white p-5">

            <div class="flex items-center justify-between gap-4">

                <div>
                    <p class="text-sm font-medium text-slate-500">
                        Status Data
                    </p>

                    <p class="mt-2 text-xl font-bold text-slate-800">
                        {{ $categories->isEmpty() ? 'Belum tersedia' : 'Tersedia' }}
                    </p>

                    <p class="mt-1 text-xs text-slate-500">
                        Informasi koleksi kategori
                    </p>
                </div>

                <div class="flex items-center justify-center w-14 h-14 rounded-2xl bg-emerald-50 text-emerald-600">

                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-7 h-7"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor"
                         stroke-width="1.8">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 3a11.955 11.955 0 01-8.618 2.984A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622C17.176 19.29 21 14.591 21 9c0-1.042-.133-2.053-.382-3.016z"/>
                    </svg>

                </div>

            </div>
        </div>

    </div>

    <!-- Tabel Kategori -->
    <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white">

        <!-- Judul Tabel -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 px-5 sm:px-6 py-5 border-b border-slate-100">

            <div>
                <h3 class="font-bold text-slate-800">
                    Data Kategori Buku
                </h3>

                <p class="mt-1 text-xs text-slate-500">
                    Daftar kategori yang digunakan dalam perpustakaan.
                </p>
            </div>

            <span class="inline-flex items-center self-start gap-2 px-3 py-1.5 rounded-lg bg-slate-100 text-xs font-semibold text-slate-600">
                <span class="w-1.5 h-1.5 rounded-full bg-indigo-500"></span>
                {{ $categories->count() }} data
            </span>

        </div>

        <!-- Area Tabel Responsif -->
        <div class="overflow-x-auto">

            <table class="w-full min-w-[650px] text-left">

                <thead>
                    <tr class="bg-slate-50 border-b border-slate-200">

                        <th class="px-5 sm:px-6 py-4 text-xs font-bold uppercase tracking-wider text-slate-500 w-20">
                            No.
                        </th>

                        <th class="px-5 py-4 text-xs font-bold uppercase tracking-wider text-slate-500">
                            Nama Kategori
                        </th>

                        <th class="px-5 py-4 text-xs font-bold uppercase tracking-wider text-slate-500">
                            Deskripsi
                        </th>

                        <th class="px-5 sm:px-6 py-4 text-xs font-bold uppercase tracking-wider text-slate-500 text-center w-48">
                            Aksi
                        </th>

                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-100">

                    @forelse($categories as $category)

                        <tr class="hover:bg-indigo-50/30 transition-colors">

                            <!-- Nomor -->
                            <td class="px-5 sm:px-6 py-4">
                                <span class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-slate-100 text-xs font-bold text-slate-600">
                                    {{ $loop->iteration }}
                                </span>
                            </td>

                            <!-- Nama Kategori -->
                            <td class="px-5 py-4">

                                <div class="flex items-center gap-3">

                                    <div class="flex items-center justify-center w-10 h-10 rounded-xl bg-indigo-50 text-indigo-600 shrink-0">

                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             class="w-5 h-5"
                                             fill="none"
                                             viewBox="0 0 24 24"
                                             stroke="currentColor"
                                             stroke-width="1.7">
                                            <path stroke-linecap="round"
                                                  stroke-linejoin="round"
                                                  d="M4 6.5A1.5 1.5 0 015.5 5H10l2 2h6.5A1.5 1.5 0 0120 8.5v9a1.5 1.5 0 01-1.5 1.5h-13A1.5 1.5 0 014 17.5z"/>
                                        </svg>

                                    </div>

                                    <div>
                                        <p class="text-sm font-bold text-slate-800">
                                            {{ $category->name }}
                                        </p>

                                        <p class="text-xs text-slate-400 mt-1">
                                            Kategori buku
                                        </p>
                                    </div>

                                </div>

                            </td>

                            <!-- Deskripsi -->
                            <td class="px-5 py-4">

                                <p class="text-sm text-slate-600 max-w-sm whitespace-normal break-words">
                                    {{ $category->description ?: 'Belum ada deskripsi.' }}
                                </p>

                            </td>

                            <!-- Aksi -->
                            <td class="px-5 sm:px-6 py-4">

                                <div class="flex items-center justify-center gap-2">

                                    <!-- Edit -->
                                    <a href="{{ route('categories.edit', $category->id) }}"
                                       class="inline-flex items-center justify-center gap-1.5 px-3 py-2 rounded-lg border border-indigo-200 bg-white text-xs font-semibold text-indigo-600 hover:bg-indigo-600 hover:text-white hover:border-indigo-600 transition"
                                       title="Edit kategori">

                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             class="w-4 h-4"
                                             fill="none"
                                             viewBox="0 0 24 24"
                                             stroke="currentColor"
                                             stroke-width="1.8">
                                            <path stroke-linecap="round"
                                                  stroke-linejoin="round"
                                                  d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.77a4.5 4.5 0 01-1.897 1.13l-3.148.945.945-3.148a4.5 4.5 0 011.13-1.897L16.862 4.487z"/>
                                            <path stroke-linecap="round"
                                                  stroke-linejoin="round"
                                                  d="M19.5 7.125L16.875 4.5"/>
                                        </svg>

                                        Edit
                                    </a>

                                    <!-- Hapus -->
                                    <form action="{{ route('categories.destroy', $category->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="inline-flex items-center justify-center gap-1.5 px-3 py-2 rounded-lg border border-rose-200 bg-white text-xs font-semibold text-rose-600 hover:bg-rose-600 hover:text-white hover:border-rose-600 transition"
                                                title="Hapus kategori">

                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 class="w-4 h-4"
                                                 fill="none"
                                                 viewBox="0 0 24 24"
                                                 stroke="currentColor"
                                                 stroke-width="1.8">
                                                <path stroke-linecap="round"
                                                      stroke-linejoin="round"
                                                      d="M6 7h12m-10 0V5a1 1 0 011-1h6a1 1 0 011 1v2m-9 0l.7 12.1a1 1 0 001 .9h4.6a1 1 0 001-.9L15 7M10 11v5m4-5v5"/>
                                            </svg>

                                            Hapus
                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="4" class="px-6 py-16 text-center">

                                <div class="flex flex-col items-center">

                                    <div class="flex items-center justify-center w-16 h-16 rounded-2xl bg-slate-100 text-slate-400 mb-4">

                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             class="w-8 h-8"
                                             fill="none"
                                             viewBox="0 0 24 24"
                                             stroke="currentColor"
                                             stroke-width="1.5">
                                            <path stroke-linecap="round"
                                                  stroke-linejoin="round"
                                                  d="M4 6.5A1.5 1.5 0 015.5 5H10l2 2h6.5A1.5 1.5 0 0120 8.5v9a1.5 1.5 0 01-1.5 1.5h-13A1.5 1.5 0 014 17.5z"/>
                                        </svg>

                                    </div>

                                    <h4 class="text-base font-bold text-slate-800">
                                        Belum Ada Kategori
                                    </h4>

                                    <p class="mt-2 text-sm text-slate-500 max-w-sm">
                                        Data kategori belum tersedia. Tambahkan kategori pertama untuk mulai mengelompokkan koleksi buku.
                                    </p>

                                    <a href="{{ route('categories.create') }}"
                                       class="inline-flex items-center gap-2 mt-5 px-4 py-2.5 rounded-xl bg-indigo-600 text-white text-sm font-semibold hover:bg-indigo-700 transition">

                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             class="w-4 h-4"
                                             fill="none"
                                             viewBox="0 0 24 24"
                                             stroke="currentColor"
                                             stroke-width="2">
                                            <path stroke-linecap="round"
                                                  stroke-linejoin="round"
                                                  d="M12 4v16m8-8H4"/>
                                        </svg>

                                        Tambah Kategori
                                    </a>

                                </div>

                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

        <!-- Footer Tabel -->
        <div class="px-5 sm:px-6 py-4 bg-slate-50/70 border-t border-slate-100">

            <p class="text-xs text-slate-500">
                Menampilkan
                <span class="font-bold text-slate-700">
                    {{ $categories->count() }}
                </span>
                kategori pada daftar ini.
            </p>

        </div>

    </div>

</div>

@endsection
