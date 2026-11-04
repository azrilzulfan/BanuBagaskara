<!doctype html>
<html lang="id" class="scroll-smooth">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Masuk Panel Admin | Banu Lesmana Bagaskara, S.M.</title>
    <meta name="robots" content="noindex, nofollow" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
      [x-cloak] { display: none !important; }
    </style>
  </head>
  <body class="min-h-screen bg-[#fafafa] text-zinc-900 antialiased font-normal selection:bg-[#BC0202] selection:text-white flex flex-col justify-between" x-data="{ showPassword: false, isLoading: false }">
    <!-- Top Bar with Back Link -->
    <header class="w-full border-b border-zinc-200 bg-white px-4 sm:px-8 py-4">
      <div class="max-w-7xl mx-auto flex items-center justify-between">
        <a href="{{ route('home') }}" class="flex items-center gap-3 text-zinc-950 group">
          <div class="w-8 h-8 rounded-lg bg-[#BC0202] text-white flex items-center justify-center font-bold text-sm shadow-sm shrink-0">
            B
          </div>
          <div class="flex flex-col">
            <span class="font-bold text-xs sm:text-sm tracking-tight group-hover:text-[#BC0202] transition-colors">
              Banu Lesmana Bagaskara, S.M.
            </span>
            <span class="text-[10px] text-zinc-500 font-medium">
              Anggota DPRD Kota Bogor &bull; Dapil 4 Tanah Sareal
            </span>
          </div>
        </a>

        <a
          href="{{ route('home') }}"
          class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg border border-zinc-200 bg-white hover:bg-zinc-50 text-xs font-semibold text-zinc-700 transition-colors shadow-2xs"
        >
          <svg class="w-3.5 h-3.5 text-zinc-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
          </svg>
          <span class="hidden sm:inline">Kembali ke</span> Web Publik
        </a>
      </div>
    </header>

    <!-- Main Login Section -->
    <main class="flex-1 flex items-center justify-center px-4 sm:px-6 py-12">
      <div class="w-full max-w-md">
        <!-- Login Card -->
        <div class="rounded-2xl border border-zinc-200 bg-white p-7 sm:p-9 shadow-sm space-y-6">
          <!-- Card Header -->
          <div class="text-center space-y-2">
            <div class="w-12 h-12 rounded-xl bg-red-50 text-[#BC0202] border border-red-100 flex items-center justify-center mx-auto mb-2">
              <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
              </svg>
            </div>
            <h1 class="text-xl sm:text-2xl font-bold text-zinc-950 tracking-tight">Masuk Panel Admin</h1>
            <p class="text-xs text-zinc-600 leading-relaxed max-w-xs mx-auto">
              Portal pengelolaan kanal informasi, artikel kinerja, rilis berita, album galeri, dan aspirasi warga.
            </p>
          </div>

          <!-- Alert Error Notification -->
          @if ($errors->any())
            <div class="p-3.5 rounded-lg bg-red-50 border border-red-200 text-xs text-red-900 flex items-start gap-2.5">
              <svg class="w-4 h-4 text-red-600 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              <span>{{ $errors->first() }}</span>
            </div>
          @endif

          <!-- Form Element -->
          <form method="POST" action="{{ route('admin.login.submit') }}" @submit="isLoading = true" class="space-y-4">
            @csrf

            <!-- Email -->
            <div>
              <label for="email" class="block text-xs font-bold text-zinc-900 mb-1.5">Email / Nama Pengguna</label>
              <input
                id="email"
                name="email"
                type="email"
                value="{{ old('email', 'admin@banubagaskara.id') }}"
                required
                autofocus
                placeholder="admin@banubagaskara.id"
                class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-900 placeholder:text-zinc-400 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] shadow-2xs font-medium"
              />
            </div>

            <!-- Password with Show/Hide Toggle -->
            <div>
              <div class="flex items-center justify-between mb-1.5">
                <label for="password" class="block text-xs font-bold text-zinc-900">Kata Sandi</label>
                <span class="text-[11px] text-zinc-400">Akun Tunggal Resmi</span>
              </div>
              <div class="relative">
                <input
                  id="password"
                  name="password"
                  :type="showPassword ? 'text' : 'password'"
                  required
                  placeholder="Masukkan kata sandi admin..."
                  class="w-full rounded-lg border border-zinc-300 bg-white pl-3.5 pr-10 py-2.5 text-xs sm:text-sm text-zinc-900 placeholder:text-zinc-400 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] shadow-2xs"
                />
                <button
                  type="button"
                  @click="showPassword = !showPassword"
                  class="absolute inset-y-0 right-0 pr-3 flex items-center text-zinc-400 hover:text-zinc-600 focus:outline-none"
                  aria-label="Toggle Password Visibility"
                >
                  <svg x-show="!showPassword" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                  </svg>
                  <svg x-show="showPassword" x-cloak class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l18 18" />
                  </svg>
                </button>
              </div>
            </div>

            <!-- Remember Me -->
            <div class="flex items-center justify-between pt-1">
              <label class="flex items-center gap-2 cursor-pointer">
                <input
                  type="checkbox"
                  name="remember"
                  value="1"
                  checked
                  class="rounded border-zinc-300 text-[#BC0202] focus:ring-[#BC0202] focus:ring-offset-0"
                />
                <span class="text-xs text-zinc-700 font-medium">Ingat saya di perangkat ini</span>
              </label>
            </div>

            <!-- Submit Button (No Pill, Rounded-lg) -->
            <button
              type="submit"
              :disabled="isLoading"
              class="w-full inline-flex items-center justify-center rounded-lg bg-[#BC0202] hover:bg-[#830000] text-white text-xs sm:text-sm font-semibold py-2.5 px-4 shadow-sm transition-colors disabled:opacity-50 disabled:cursor-not-allowed gap-2"
            >
              <svg x-show="isLoading" x-cloak class="animate-spin -ml-1 mr-2 h-4 w-4 text-white" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
              </svg>
              <span x-text="isLoading ? 'Memverifikasi...' : 'Masuk ke Dasbor Admin'"></span>
            </button>
          </form>

          <!-- Security Badge Notice -->
          <div class="pt-4 border-t border-zinc-100 text-center">
            <p class="text-[11px] text-zinc-500 leading-relaxed">
              Dilindungi otentikasi tunggal (Single Admin Account) terenkripsi untuk integritas data publikasi kedewanan.
            </p>
          </div>
        </div>
      </div>
    </main>

    <!-- Footer -->
    <footer class="w-full border-t border-zinc-200 bg-white py-4 px-4 text-center">
      <p class="text-xs text-zinc-500">
        &copy; 2026 Banu Lesmana Bagaskara, S.M. &bull; Fraksi PDI Perjuangan &bull; DPRD Kota Bogor
      </p>
    </footer>
  </body>
</html>
