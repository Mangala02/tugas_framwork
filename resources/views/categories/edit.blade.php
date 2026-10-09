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
                    Edit Kategori
                </span>
            </div>

            <h2 class="text-2xl font-extrabold text-slate-900 tracking-tight">
                Edit Kategori
            </h2>

            <p class="mt-2 text-sm text-slate-500">
                Perbarui informasi kategori buku sesuai kebutuhan.
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

    <!-- Informasi Kategori -->
    <div class="flex items-center gap-4 p-5 mb-6 rounded-2xl border border-indigo-100 bg-indigo-50/60">

        <div class="flex items-center justify-center w-12 h-12 rounded-xl bg-indigo-600 text-white shadow-md shadow-indigo-200 shrink-0">

            <svg xmlns="http://www.w3.org/2000/svg"
                 class="w-6 h-6"
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

        </div>

        <div class="min-w-0">
            <p class="text-xs font-semibold uppercase tracking-wider text-indigo-600">
                Kategori yang dipilih
            </p>

            <h3 class="mt-1 text-lg font-bold text-slate-900 break-words">
                {{ $category->name }}
            </h3>

            <p class="mt-1 text-sm text-slate-500">
                Ubah nama atau deskripsi kategori melalui formulir berikut.
            </p>
        </div>

    </div>

    <!-- Form Card -->
    <div class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">

        <!-- Card Header -->
        <div class="px-5 sm:px-7 py-5 border-b border-slate-100 bg-slate-50/70">

            <div class="flex items-center gap-3">

                <div class="flex items-center justify-center w-11 h-11 rounded-xl bg-amber-100 text-amber-600">

                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-6 h-6"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor"
                         stroke-width="1.8">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.77a4.5 4.5 0 01-1.897 1.13l-3.148.945.945-3.148a4.5 4.5 0 011.13-1.897L16.862 4.487z"/>
                    </svg>

                </div>

                <div>
                    <h3 class="font-bold text-slate-800">
                        Formulir Perubahan
                    </h3>

                    <p class="text-xs text-slate-500 mt-1">
                        Pastikan informasi yang dimasukkan sudah benar.
                    </p>
                </div>

            </div>
        </div>

        <!-- Form Body -->
        <form action="{{ route('categories.update', $category->id) }}"
              method="POST">

            @csrf
            @method('PUT')

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
                        value="{{ old('name', $category->name) }}"
                        placeholder="Masukkan nama kategori"
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
                        placeholder="Tuliskan deskripsi kategori buku..."
                        class="w-full px-4 py-3 rounded-xl border text-sm text-slate-800 placeholder:text-slate-400 outline-none resize-y transition
                        {{ $errors->has('description')
                            ? 'border-rose-400 bg-rose-50/30 focus:ring-4 focus:ring-rose-100'
                            : 'border-slate-200 bg-white focus:border-indigo-500 focus:ring-4 focus:ring-indigo-100' }}"
                    >{{ old('description', $category->description) }}</textarea>

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
                        Perbarui deskripsi jika terdapat perubahan informasi.
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

                        Perbarui Kategori
                    </button>

                </div>
            </div>

        </form>
    </div>

</div>

@endsection
