@extends('layouts.app')

@section('content')

<div class="max-w-3xl mx-auto">

    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">

        <div>
            <div class="flex items-center gap-2 text-sm text-slate-400 mb-3">
                <a href="{{ route('categories.index') }}"
                   class="hover:text-indigo-600 transition">
                    Kategori
                </a>

                <svg xmlns="http://www.w3.org/2000/svg"
                     class="w-4 h-4"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="m9 18 6-6-6-6"/>
                </svg>

                <span class="text-indigo-600 font-medium">
                    Tambah Kategori
                </span>
            </div>

            <h2 class="text-2xl font-extrabold text-slate-900 tracking-tight">
                Tambah Kategori
            </h2>

            <p class="mt-2 text-sm text-slate-500">
                Tambahkan kategori baru untuk mengelompokkan koleksi buku.
            </p>
        </div>

        <a href="{{ route('categories.index') }}"
           class="inline-flex items-center justify-center gap-2 px-4 py-2.5 rounded-xl border border-slate-200 bg-white text-sm font-semibold text-slate-600 hover:bg-slate-50 hover:text-indigo-600 transition">

            <svg xmlns="http://www.w3.org/2000/svg"
                 class="w-4 h-4"
                 fill="none"
                 viewBox="0 0 24 24"
                 stroke="currentColor"
                 stroke-width="2">
                <path stroke-linecap="round"
                      stroke-linejoin="round"
                      d="M10 19l-7-7 7-7M3 12h18"/>
            </svg>

            Kembali
        </a>

    </div>

    <!-- Form Card -->
    <div class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">

        <!-- Card Header -->
        <div class="px-5 sm:px-7 py-5 border-b border-slate-100 bg-slate-50/70">

            <div class="flex items-center gap-3">

                <div class="flex items-center justify-center w-11 h-11 rounded-xl bg-indigo-100 text-indigo-600">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-6 h-6"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor"
                         stroke-width="1.8">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M4 6.5A1.5 1.5 0 015.5 5H10l2 2h6.5A1.5 1.5 0 0120 8.5v9a1.5 1.5 0 01-1.5 1.5h-13A1.5 1.5 0 014 17.5z"/>
                    </svg>
                </div>

                <div>
                    <h3 class="font-bold text-slate-800">
                        Informasi Kategori
                    </h3>

                    <p class="text-xs text-slate-500 mt-1">
                        Lengkapi informasi kategori di bawah ini.
                    </p>
                </div>

            </div>
        </div>

        <!-- Form Body -->
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf

            <div class="p-5 sm:p-7 space-y-6">

                <!-- Nama Kategori -->
                <div>
                    <label for="name"
                           class="block text-sm font-semibold text-slate-700 mb-2">
                        Nama Kategori
                        <span class="text-rose-500">*</span>
                    </label>

                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ old('name') }}"
                        placeholder="Contoh: Novel, Pendidikan, Teknologi"
                        class="w-full px-4 py-3 rounded-xl border text-sm text-slate-800 placeholder:text-slate-400 outline-none transition
                        {{ $errors->has('name')
                            ? 'border-rose-400 bg-rose-50/30 focus:ring-4 focus:ring-rose-100'
                            : 'border-slate-200 bg-white focus:border-indigo-500 focus:ring-4 focus:ring-indigo-100' }}"
                    >

                    @error('name')
                        <p class="flex items-start gap-1.5 mt-2 text-sm text-rose-600">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="w-4 h-4 shrink-0 mt-0.5"
                                 fill="none"
                                 viewBox="0 0 24 24"
                                 stroke="currentColor"
                                 stroke-width="2">
                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      d="M12 9v4m0 4h.01M10.3 3.86L1.82 18.5A2 2 0 003.55 21h16.9a2 2 0 001.73-2.5L13.7 3.86a2 2 0 00-3.4 0z"/>
                            </svg>

                            {{ $message }}
                        </p>
                    @enderror

                    <p class="mt-2 text-xs text-slate-400">
                        Gunakan nama yang singkat dan mudah dikenali.
                    </p>
                </div>

                <!-- Deskripsi -->
                <div>
                    <label for="description"
                           class="block text-sm font-semibold text-slate-700 mb-2">
                        Deskripsi
                    </label>

                    <textarea
                        id="description"
                        name="description"
                        rows="4"
                        placeholder="Tuliskan penjelasan singkat mengenai kategori buku ini..."
                        class="w-full px-4 py-3 rounded-xl border text-sm text-slate-800 placeholder:text-slate-400 outline-none resize-y transition
                        {{ $errors->has('description')
                            ? 'border-rose-400 bg-rose-50/30 focus:ring-4 focus:ring-rose-100'
                            : 'border-slate-200 bg-white focus:border-indigo-500 focus:ring-4 focus:ring-indigo-100' }}"
                    >{{ old('description') }}</textarea>

                    @error('description')
                        <p class="flex items-start gap-1.5 mt-2 text-sm text-rose-600">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="w-4 h-4 shrink-0 mt-0.5"
                                 fill="none"
                                 viewBox="0 0 24 24"
                                 stroke="currentColor"
                                 stroke-width="2">
                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      d="M12 9v4m0 4h.01M10.3 3.86L1.82 18.5A2 2 0 003.55 21h16.9a2 2 0 001.73-2.5L13.7 3.86a2 2 0 00-3.4 0z"/>
                            </svg>

                            {{ $message }}
                        </p>
                    @enderror

                    <p class="mt-2 text-xs text-slate-400">
                        Deskripsi bersifat opsional.
                    </p>
                </div>

            </div>

            <!-- Form Footer -->
            <div class="flex flex-col-reverse sm:flex-row sm:items-center sm:justify-between gap-3 px-5 sm:px-7 py-5 bg-slate-50/70 border-t border-slate-100">

                <p class="text-xs text-slate-400">
                    <span class="text-rose-500">*</span>
                    Wajib diisi
                </p>

                <div class="flex flex-col-reverse sm:flex-row gap-3">

                    <a href="{{ route('categories.index') }}"
                       class="inline-flex items-center justify-center px-5 py-2.5 rounded-xl border border-slate-200 bg-white text-sm font-semibold text-slate-600 hover:bg-slate-100 transition">
                        Batal
                    </a>

                    <button type="submit"
                            class="inline-flex items-center justify-center gap-2 px-5 py-2.5 rounded-xl bg-indigo-600 text-white text-sm font-semibold shadow-md shadow-indigo-200 hover:bg-indigo-700 hover:shadow-lg focus:outline-none focus:ring-4 focus:ring-indigo-200 transition">

                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="w-4 h-4"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor"
                             stroke-width="2">
                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M5 13l4 4L19 7"/>
                        </svg>

                        Simpan Kategori
                    </button>

                </div>
            </div>

        </form>
    </div>

</div>

@endsection