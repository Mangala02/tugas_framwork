<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Mini-Perpus | Perpustakaan Digital</title>

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="min-h-screen flex flex-col bg-slate-50 text-slate-800 antialiased">

    <!-- Navbar -->
    <header class="sticky top-0 z-50 bg-white/95 backdrop-blur-md border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between min-h-[76px] gap-4">

                <!-- Logo -->
                <a href="/"
                   class="flex items-center gap-3 shrink-0 group">

                    <div class="flex items-center justify-center w-11 h-11 rounded-2xl bg-indigo-600 text-white shadow-md shadow-indigo-200 group-hover:bg-indigo-700 transition">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="w-6 h-6"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor"
                             stroke-width="1.8">
                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M12 7v14m0-14C9.5 4.5 6.5 4 3 5v14c3.5-1 6.5-.5 9 2m0-14c2.5-2.5 5.5-3 9-2v14c-3.5-1-6.5-.5-9 2"/>
                        </svg>
                    </div>

                    <div>
                        <span class="block text-lg font-extrabold tracking-tight text-slate-900">
                            Mini<span class="text-indigo-600">Perpus.</span>
                        </span>
                        <span class="block text-xs text-slate-500">
                            Perpustakaan Digital
                        </span>
                    </div>
                </a>

                <!-- Navigation -->
                <nav class="flex items-center gap-2 sm:gap-3">

                    <a href="{{ route('categories.index') }}"
                       class="inline-flex items-center gap-2 px-3 sm:px-4 py-2.5 rounded-xl text-sm font-semibold text-slate-600 hover:text-indigo-700 hover:bg-indigo-50 transition">

                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="w-5 h-5"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor"
                             stroke-width="1.8">
                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M4 6.5A1.5 1.5 0 015.5 5H10l2 2h6.5A1.5 1.5 0 0120 8.5v9a1.5 1.5 0 01-1.5 1.5h-13A1.5 1.5 0 014 17.5z"/>
                        </svg>

                        <span>Kategori</span>
                    </a>

                    <a href="{{ route('books.index') }}"
                       class="inline-flex items-center gap-2 px-3 sm:px-5 py-2.5 rounded-xl bg-indigo-600 text-white text-sm font-semibold shadow-md shadow-indigo-200 hover:bg-indigo-700 hover:shadow-lg transition">

                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="w-5 h-5"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor"
                             stroke-width="1.8">
                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M6 4.75A1.75 1.75 0 017.75 3H20v16H7.75A1.75 1.75 0 006 20.75m0-16v16m0-16H4v16h2"/>
                        </svg>

                        <span>Buku</span>
                    </a>

                </nav>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-1 w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-10">

        <!-- Page Introduction -->
        <section class="mb-8">
            <p class="text-sm font-semibold text-indigo-600 mb-2">
                RUANG LITERASI DIGITAL
            </p>

            <h1 class="text-2xl sm:text-3xl font-extrabold tracking-tight text-slate-900">
                Selamat Datang di Mini-Perpus
            </h1>

            <p class="mt-2 text-sm sm:text-base text-slate-500 max-w-2xl leading-relaxed">
                Kelola koleksi buku dan kategori perpustakaan melalui satu tempat
                dengan tampilan yang sederhana dan nyaman digunakan.
            </p>
        </section>

        <!-- Success Notification -->
        @if(session('success'))
            <div class="flex items-start gap-3 p-4 mb-5 rounded-xl border border-emerald-200 bg-emerald-50 text-emerald-800"
                 role="alert">

                <svg xmlns="http://www.w3.org/2000/svg"
                     class="w-5 h-5 shrink-0 mt-0.5"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke="currentColor"
                     stroke-width="2">
                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          d="M5 13l4 4L19 7"/>
                </svg>

                <div class="text-sm font-medium">
                    {{ session('success') }}
                </div>
            </div>
        @endif

        <!-- Error Notification -->
        @if(session('error'))
            <div class="flex items-start gap-3 p-4 mb-5 rounded-xl border border-rose-200 bg-rose-50 text-rose-800"
                 role="alert">

                <svg xmlns="http://www.w3.org/2000/svg"
                     class="w-5 h-5 shrink-0 mt-0.5"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke="currentColor"
                     stroke-width="2">
                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          d="M12 9v4m0 4h.01M10.3 3.86L1.82 18.5A2 2 0 003.55 21h16.9a2 2 0 001.73-2.5L13.7 3.86a2 2 0 00-3.4 0z"/>
                </svg>

                <div class="text-sm font-medium">
                    {{ session('error') }}
                </div>
            </div>
        @endif

        <!-- Content Panel -->
        <section class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">

            <div class="h-1 bg-gradient-to-r from-indigo-600 via-violet-500 to-sky-400"></div>

            <div class="p-5 sm:p-7 lg:p-8">
                @yield('content')
            </div>

        </section>

        <!-- Bottom Note -->
        <div class="mt-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2 text-xs text-slate-400">
            <p>Temukan, kelola, dan rawat koleksi literasi Anda.</p>
            <p>Mini-Perpus &bull; Sistem Manajemen Perpustakaan</p>
        </div>

    </main>

    <!-- Footer -->
    <footer class="mt-auto border-t border-slate-200 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-5 flex flex-col sm:flex-row items-center justify-between gap-2">

            <p class="text-sm text-slate-500">
                &copy; {{ date('Y') }}
                <span class="font-semibold text-slate-700">Mini-Perpus.</span>
                Semua hak dilindungi.
            </p>

            <p class="text-xs text-slate-400">
                Dibuat untuk mendukung pengelolaan perpustakaan.
            </p>

        </div>
    </footer>

</body>
</html>
