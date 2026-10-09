@extends('layouts.app')

@section('content')

<div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
    <div>
        <h2 class="text-2xl font-bold tracking-tight text-slate-800">
            Edit Buku
        </h2>
        <p class="mt-1 text-sm text-slate-500">
            Perbarui informasi buku perpustakaan.
        </p>
    </div>

    <a
        href="{{ route('books.index') }}"
        class="inline-flex items-center justify-center gap-2 rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-sm font-semibold text-slate-700 transition hover:bg-slate-50"
    >
        <svg
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke-width="1.8"
            stroke="currentColor"
            class="h-4 w-4"
        >
            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
        </svg>
        Kembali
    </a>
</div>

<div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
    <div class="border-b border-slate-200 px-5 py-5 sm:px-8">
        <h3 class="text-lg font-semibold text-slate-800">
            Informasi Buku
        </h3>
        <p class="mt-1 text-sm text-slate-500">
            Silakan perbarui data buku pada formulir berikut.
        </p>
    </div>

    <form
        action="{{ route('books.update', $book->id) }}"
        method="POST"
        class="space-y-5 p-5 sm:p-8"
    >
        @csrf
        @method('PUT')

        <div>
            <label for="title" class="mb-2 block text-sm font-medium text-slate-700">
                Judul Buku
            </label>

            <input
                type="text"
                id="title"
                name="title"
                value="{{ old('title', $book->title) }}"
                class="w-full rounded-xl border px-4 py-3 text-sm text-slate-800 outline-none transition placeholder:text-slate-400 focus:ring-2 focus:ring-indigo-500 {{ $errors->has('title') ? 'border-red-400 bg-red-50 focus:border-red-500' : 'border-slate-300 bg-white focus:border-indigo-500' }}"
                placeholder="Masukkan judul buku"
            >

            @error('title')
                <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="category_id" class="mb-2 block text-sm font-medium text-slate-700">
                Kategori
            </label>

            <select
                id="category_id"
                name="category_id"
                class="w-full rounded-xl border px-4 py-3 text-sm text-slate-800 outline-none transition focus:ring-2 focus:ring-indigo-500 {{ $errors->has('category_id') ? 'border-red-400 bg-red-50 focus:border-red-500' : 'border-slate-300 bg-white focus:border-indigo-500' }}"
            >
                <option value="">-- Pilih Kategori --</option>

                @foreach($categories as $cat)
                    <option
                        value="{{ $cat->id }}"
                        {{ old('category_id', $book->category_id) == $cat->id ? 'selected' : '' }}
                    >
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>

            @error('category_id')
                <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="author" class="mb-2 block text-sm font-medium text-slate-700">
                Penulis
            </label>

            <input
                type="text"
                id="author"
                name="author"
                value="{{ old('author', $book->author) }}"
                class="w-full rounded-xl border px-4 py-3 text-sm text-slate-800 outline-none transition placeholder:text-slate-400 focus:ring-2 focus:ring-indigo-500 {{ $errors->has('author') ? 'border-red-400 bg-red-50 focus:border-red-500' : 'border-slate-300 bg-white focus:border-indigo-500' }}"
                placeholder="Masukkan nama penulis"
            >

            @error('author')
                <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
            <div>
                <label for="published_year" class="mb-2 block text-sm font-medium text-slate-700">
                    Tahun Terbit
                </label>

                <input
                    type="number"
                    id="published_year"
                    name="published_year"
                    value="{{ old('published_year', $book->published_year) }}"
                    class="w-full rounded-xl border px-4 py-3 text-sm text-slate-800 outline-none transition focus:ring-2 focus:ring-indigo-500 {{ $errors->has('published_year') ? 'border-red-400 bg-red-50 focus:border-red-500' : 'border-slate-300 bg-white focus:border-indigo-500' }}"
                    placeholder="Contoh: 2024"
                >

                @error('published_year')
                    <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="stock" class="mb-2 block text-sm font-medium text-slate-700">
                    Stok Buku
                </label>

                <input
                    type="number"
                    id="stock"
                    name="stock"
                    value="{{ old('stock', $book->stock) }}"
                    class="w-full rounded-xl border px-4 py-3 text-sm text-slate-800 outline-none transition focus:ring-2 focus:ring-indigo-500 {{ $errors->has('stock') ? 'border-red-400 bg-red-50 focus:border-red-500' : 'border-slate-300 bg-white focus:border-indigo-500' }}"
                    placeholder="Masukkan jumlah stok"
                >

                @error('stock')
                    <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="flex flex-col-reverse gap-3 border-t border-slate-100 pt-5 sm:flex-row sm:justify-end">
            <a
                href="{{ route('books.index') }}"
                class="inline-flex items-center justify-center rounded-xl border border-slate-300 px-5 py-2.5 text-sm font-semibold text-slate-700 transition hover:bg-slate-50"
            >
                Batal
            </a>

            <button
                type="submit"
                class="inline-flex items-center justify-center gap-2 rounded-xl bg-indigo-600 px-5 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.8"
                    stroke="currentColor"
                    class="h-4 w-4"
                >
                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.77a4.5 4.5 0 0 1-1.897 1.13L6 18.75l.85-2.685a4.5 4.5 0 0 1 1.13-1.897L16.862 4.487Z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 13.5v5.625A1.875 1.875 0 0 1 17.625 21H5.625a1.875 1.875 0 0 1-1.875-1.875V7.125A1.875 1.875 0 0 1 5.625 5.25H11.25" />
                </svg>
                Perbarui Buku
            </button>
        </div>
    </form>
</div>

@endsection
