@extends('layouts.app')

@section('content')

<div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
    <div>
        <h2 class="text-2xl font-bold tracking-tight text-slate-800">
            Daftar Buku
        </h2>
        <p class="mt-1 text-sm text-slate-500">
            Kelola data buku perpustakaan.
        </p>
    </div>

    <a
        href="{{ route('books.create') }}"
        class="inline-flex items-center justify-center gap-2 rounded-xl bg-indigo-600 px-5 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
    >
        <span class="text-lg leading-none">+</span>
        Tambah Buku
    </a>
</div>

<div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
    <div class="border-b border-slate-200 px-5 py-4 sm:px-6">
        <h3 class="font-semibold text-slate-800">
            Data Buku
        </h3>
        <p class="mt-1 text-sm text-slate-500">
            Daftar seluruh buku yang tersimpan di perpustakaan.
        </p>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full min-w-[750px] divide-y divide-slate-200 text-left">
            <thead class="bg-slate-50">
                <tr>
                    <th class="px-5 py-3.5 text-xs font-semibold uppercase tracking-wider text-slate-500">
                        No.
                    </th>
                    <th class="px-5 py-3.5 text-xs font-semibold uppercase tracking-wider text-slate-500">
                        Judul Buku
                    </th>
                    <th class="px-5 py-3.5 text-xs font-semibold uppercase tracking-wider text-slate-500">
                        Kategori
                    </th>
                    <th class="px-5 py-3.5 text-xs font-semibold uppercase tracking-wider text-slate-500">
                        Penulis
                    </th>
                    <th class="px-5 py-3.5 text-xs font-semibold uppercase tracking-wider text-slate-500">
                        Tahun
                    </th>
                    <th class="px-5 py-3.5 text-xs font-semibold uppercase tracking-wider text-slate-500">
                        Stok
                    </th>
                    <th class="px-5 py-3.5 text-center text-xs font-semibold uppercase tracking-wider text-slate-500">
                        Aksi
                    </th>
                </tr>
            </thead>

            <tbody class="divide-y divide-slate-100">
                @forelse($books as $book)
                    <tr class="transition hover:bg-slate-50">
                        <td class="whitespace-nowrap px-5 py-4 text-sm text-slate-500">
                            {{ $loop->iteration }}
                        </td>

                        <td class="px-5 py-4">
                            <span class="font-semibold text-slate-800">
                                {{ $book->title }}
                            </span>
                        </td>

                        <td class="whitespace-nowrap px-5 py-4 text-sm text-slate-600">
                            {{ $book->category->name }}
                        </td>

                        <td class="px-5 py-4 text-sm text-slate-600">
                            {{ $book->author }}
                        </td>

                        <td class="whitespace-nowrap px-5 py-4 text-sm text-slate-600">
                            {{ $book->published_year }}
                        </td>

                        <td class="whitespace-nowrap px-5 py-4">
                            <span class="inline-flex items-center rounded-lg bg-indigo-50 px-2.5 py-1 text-sm font-semibold text-indigo-700">
                                {{ $book->stock }}
                            </span>
                        </td>

                        <td class="whitespace-nowrap px-5 py-4">
                            <div class="flex items-center justify-center gap-2">
                                <a
                                    href="{{ route('books.edit', $book->id) }}"
                                    class="inline-flex items-center rounded-lg border border-indigo-200 px-3 py-1.5 text-sm font-medium text-indigo-700 transition hover:border-indigo-300 hover:bg-indigo-50"
                                >
                                    Edit
                                </a>

                                <form
                                    action="{{ route('books.destroy', $book->id) }}"
                                    method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus buku ini?')"
                                >
                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="inline-flex items-center rounded-lg border border-red-200 px-3 py-1.5 text-sm font-medium text-red-600 transition hover:border-red-300 hover:bg-red-50"
                                    >
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-5 py-12 text-center">
                            <div class="mx-auto flex max-w-sm flex-col items-center">
                                <div class="mb-4 flex h-14 w-14 items-center justify-center rounded-2xl bg-slate-100 text-slate-400">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke-width="1.5"
                                        stroke="currentColor"
                                        class="h-7 w-7"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M12 6.75v10.5m-5.25-5.25h10.5M3.75 5.25A2.25 2.25 0 0 1 6 3h12a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 18 21H6a2.25 2.25 0 0 1-2.25-2.25V5.25Z"
                                        />
                                    </svg>
                                </div>

                                <h3 class="text-base font-semibold text-slate-800">
                                    Belum ada data buku
                                </h3>

                                <p class="mt-1 text-sm text-slate-500">
                                    Silakan tambahkan buku untuk mulai mengelola koleksi perpustakaan.
                                </p>

                                <a
                                    href="{{ route('books.create') }}"
                                    class="mt-4 inline-flex items-center rounded-xl bg-indigo-600 px-4 py-2 text-sm font-semibold text-white transition hover:bg-indigo-700"
                                >
                                    + Tambah Buku
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="border-t border-slate-200 bg-slate-50 px-5 py-3 sm:px-6">
        <p class="text-sm text-slate-500">
            Total buku:
            <span class="font-semibold text-slate-700">{{ $books->count() }}</span>
        </p>
    </div>
</div>

@endsection
