@extends('layouts.public')

@section('title', 'Kontak & Rumah Aspirasi Rakyat | Banu Lesmana Bagaskara, S.M.')
@section('meta_description', 'Saluran kontak resmi, alamat sekretariat Rumah Aspirasi Rakyat di Kedung Badak, hotline ambulance siaga 24 jam, dan formulir pengaduan warga Banu Lesmana Bagaskara, S.M. (DPRD Kota Bogor 2024–2029).')

@section('content')
  <!-- ========================================== -->
  <!-- 1. HEADER & HERO SECTION (Kontak)          -->
  <!-- ========================================== -->
  <header class="w-full bg-[#faf5f5] border-b border-zinc-200 pt-7 sm:pt-9 pb-12 sm:pb-16 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-12 xl:px-16">
      <!-- Top Nav Bar: Logo & Navigation Links -->
      <div class="flex items-center justify-between z-10 w-full mb-10 sm:mb-14 gap-2">
        <a href="{{ route('home') }}" class="flex items-center gap-2.5 sm:gap-3 text-zinc-950 group min-w-0 flex-1">
          <!-- Official Parliamentary / Democratic Red Mark (No Pill, Rounded-lg) -->
          <div class="w-8 h-8 sm:w-9 sm:h-9 rounded-lg bg-[#BC0202] text-white flex items-center justify-center font-bold text-sm sm:text-base shadow-sm shrink-0">
            <svg class="w-4 h-4 sm:w-5 sm:h-5 fill-current" viewBox="0 0 24 24">
              <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" />
            </svg>
          </div>
          <div class="flex flex-col leading-tight min-w-0 flex-1">
            <span class="font-bold text-sm sm:text-base lg:text-lg tracking-tight text-zinc-950 truncate">banubagaskara.</span>
          </div>
        </a>
        <!-- Desktop Navigation Bar (Pre-scroll) -->
        <div class="hidden lg:block shrink-0">
          <nav class="flex items-center gap-1.5 bg-white/95 border border-zinc-200 p-1.5 rounded-xl shadow-sm">
            <a href="{{ route('home') }}" class="text-xs font-semibold px-3 py-1.5 text-zinc-700 hover:text-zinc-950 rounded-lg hover:bg-zinc-100 transition-colors">Beranda</a>
            <a href="{{ route('profile') }}" class="text-xs font-semibold px-3 py-1.5 text-zinc-700 hover:text-zinc-950 rounded-lg hover:bg-zinc-100 transition-colors">Profil</a>
            <a href="{{ route('kinerja.index') }}" class="text-xs font-semibold px-3 py-1.5 text-zinc-700 hover:text-zinc-950 rounded-lg hover:bg-zinc-100 transition-colors">Kinerja</a>
            <a href="{{ route('berita.index') }}" class="text-xs font-semibold px-3 py-1.5 text-zinc-700 hover:text-zinc-950 rounded-lg hover:bg-zinc-100 transition-colors">Berita</a>
            <a href="{{ route('galeri.index') }}" class="text-xs font-semibold px-3 py-1.5 text-zinc-700 hover:text-zinc-950 rounded-lg hover:bg-zinc-100 transition-colors">Galeri</a>
            <a href="{{ route('kontak.index') }}" class="text-xs font-semibold px-3 py-1.5 text-zinc-950 bg-zinc-100 rounded-lg transition-colors">Kontak</a>
          </nav>
        </div>

        <!-- Menu Button for Mobile & Tablet (< lg) - Shadcn Button (No Pill, Rounded-lg) -->
        <div class="lg:hidden shrink-0 ml-2">
          <button
            @click="mobileMenu = !mobileMenu"
            aria-label="Buka Menu"
            class="inline-flex items-center justify-center rounded-lg border border-zinc-200 bg-white hover:bg-zinc-100 text-zinc-900 text-xs font-medium px-2.5 sm:px-3.5 py-1.5 shadow-sm transition-colors active:bg-zinc-200"
          >
            <svg class="w-4 h-4 text-zinc-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <span class="hidden sm:inline ml-1.5">Menu</span>
          </button>
        </div>
      </div>

      <!-- Mobile Navigation Drawer Overlay (Alpine.js - Rounded-xl) -->
      <div x-show="mobileMenu" x-cloak @click.away="mobileMenu = false" class="lg:hidden fixed top-16 left-4 right-4 bg-white border border-zinc-200 rounded-xl p-5 shadow-xl z-50">
        <nav class="flex flex-col space-y-3 text-sm font-medium text-zinc-800">
          <a href="{{ route('home') }}" @click="mobileMenu = false" class="py-1.5 px-3 rounded-lg hover:bg-zinc-100 transition-colors">Beranda</a>
          <a href="{{ route('profile') }}" @click="mobileMenu = false" class="py-1.5 px-3 rounded-lg hover:bg-zinc-100 transition-colors">Profil (Kenali Banu)</a>
          <a href="{{ route('kinerja.index') }}" @click="mobileMenu = false" class="py-1.5 px-3 rounded-lg hover:bg-zinc-100 transition-colors">Hasil Kinerja</a>
          <a href="{{ route('berita.index') }}" @click="mobileMenu = false" class="py-1.5 px-3 rounded-lg hover:bg-zinc-100 transition-colors">Berita &amp; Rilis Pers</a>
          <a href="{{ route('galeri.index') }}" @click="mobileMenu = false" class="py-1.5 px-3 rounded-lg hover:bg-zinc-100 transition-colors">Galeri Dokumentasi</a>
          <a href="{{ route('kontak.index') }}" @click="mobileMenu = false" class="py-1.5 px-3 rounded-lg bg-zinc-100 font-bold text-zinc-950 transition-colors">Rumah Aspirasi &amp; Kontak</a>
          <div class="pt-2 border-t border-zinc-100">
            <a href="#aspirasi" @click="mobileMenu = false" class="w-full inline-flex items-center justify-center rounded-lg bg-[#BC0202] text-white py-2 text-xs font-semibold"> Sampaikan Aspirasi </a>
          </div>
        </nav>
      </div>

      <!-- Hero Content (Editorial Header, No Badge) -->
      <div class="max-w-3xl">
        <h1 class="text-2xl sm:text-4xl md:text-[44px] lg:text-[42px] text-zinc-950 font-bold leading-[1.16] tracking-tight">
          Rumah <span class="text-[#BC0202]">Aspirasi</span> &amp; Kontak
        </h1>
      </div>
    </div>
  </header>

  <!-- ======================================================== -->
  <!-- 2. BANNER AMBULANCE SIAGA 24 JAM (FULL GAMBAR RESPONSIF) -->
  <!-- ======================================================== -->
  <section class="w-full bg-zinc-950 border-b border-zinc-200">
    <div class="w-full max-w-[1920px] mx-auto overflow-hidden">
      <a href="#aspirasi" class="block w-full group focus:outline-none" title="Banner Layanan Ambulance Siaga 24 Jam & Aspirasi Warga - Banu Lesmana Bagaskara, S.M.">
        <img
          src="{{ asset('assets/banu/banner_serbaguna.jpg') }}"
          alt="Ambulance Siaga 24 Jam & Pendamping Rujukan RSUD - Banu Lesmana Bagaskara, S.M."
          class="w-full h-auto object-cover min-h-[160px] sm:min-h-[220px] md:min-h-[280px] lg:min-h-[340px] xl:min-h-[400px] transition-transform duration-500 group-hover:scale-[1.008]"
          loading="lazy"
        />
      </a>
    </div>
  </section>

  <!-- ========================================== -->
  <!-- 3. MAIN CONTACT & ASPIRATION FORM SECTION  -->
  <!-- ========================================== -->
  <section class="w-full bg-[#f4f4f5] py-14 sm:py-20 border-b border-zinc-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-12 xl:px-16">
      <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-10 items-start">
        <!-- Left Column (5 Cols): Kontak Resmi (Hanya Alamat, Telepon, Email, Media Sosial) -->
        <div class="lg:col-span-5 flex flex-col space-y-6">
          <div class="rounded-2xl border border-zinc-200/90 bg-white p-6 sm:p-8 shadow-xs">
            <h2 class="text-xl sm:text-2xl font-bold text-zinc-950 tracking-tight"><span class="text-[#BC0202]">Kontak</span> Resmi</h2>

            <!-- List: Alamat, Telepon, Email -->
            <div class="mt-6 space-y-5 text-xs text-zinc-700">
              <!-- 1. Alamat -->
              <div class="flex items-start gap-3.5">
                <div class="w-9 h-9 rounded-xl bg-red-50 text-[#BC0202] flex items-center justify-center shrink-0 mt-0.5 border border-red-100">
                  <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                  </svg>
                </div>
                <div>
                  <span class="font-bold text-zinc-950 block text-[13px]">Alamat:</span>
                  <span class="text-zinc-600 mt-0.5 block leading-relaxed">
                    {{ $generalSettings['address']['street'] ?? 'Kelurahan Kedung Badak, Kecamatan Tanah Sareal, Kota Bogor, Jawa Barat.' }}
                  </span>
                </div>
              </div>

              <!-- 2. Telepon -->
              <div class="flex items-start gap-3.5">
                <div class="w-9 h-9 rounded-xl bg-red-50 text-[#BC0202] flex items-center justify-center shrink-0 mt-0.5 border border-red-100">
                  <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"
                    />
                  </svg>
                </div>
                <div>
                  <span class="font-bold text-zinc-950 block text-[13px]">Telepon / WhatsApp:</span>
                  <a href="tel:{{ $generalSettings['contact']['ambulance_hotline'] ?? '+6281288880000' }}" class="text-zinc-600 hover:text-[#BC0202] mt-0.5 block transition-colors font-medium">
                    {{ $generalSettings['contact']['ambulance_hotline'] ?? '+62 812-8888-0000' }}
                  </a>
                </div>
              </div>

              <!-- 3. Email -->
              <div class="flex items-start gap-3.5">
                <div class="w-9 h-9 rounded-xl bg-red-50 text-[#BC0202] flex items-center justify-center shrink-0 mt-0.5 border border-red-100">
                  <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                  </svg>
                </div>
                <div>
                  <span class="font-bold text-zinc-950 block text-[13px]">Email:</span>
                  <a href="mailto:{{ $generalSettings['contact']['email'] ?? 'aspirasi@banubagaskara.id' }}" class="text-zinc-600 hover:text-[#BC0202] mt-0.5 block transition-colors font-medium">
                    {{ $generalSettings['contact']['email'] ?? 'aspirasi@banubagaskara.id' }}
                  </a>
                </div>
              </div>
            </div>

            <!-- 4. Media Sosial -->
            <div class="mt-7 pt-6 border-t border-zinc-100">
              <span class="text-xs font-bold text-zinc-950 block mb-3 uppercase tracking-wider">Media Sosial Resmi:</span>
              <div class="flex flex-col space-y-2.5 text-xs text-zinc-600">
                <a href="{{ $generalSettings['socials']['instagram'] ?? 'https://instagram.com/banubagaskara' }}" target="_blank" rel="noopener" class="flex items-center gap-2 hover:text-[#BC0202] transition-colors group">
                  <span class="w-2 h-2 rounded-xs bg-[#BC0202] group-hover:scale-125 transition-transform"></span>
                  <span>Instagram: <strong>@banubagaskara</strong></span>
                </a>
                <a href="{{ $generalSettings['socials']['tiktok'] ?? 'https://tiktok.com/@banubagaskara' }}" target="_blank" rel="noopener" class="flex items-center gap-2 hover:text-[#BC0202] transition-colors group">
                  <span class="w-2 h-2 rounded-xs bg-[#BC0202] group-hover:scale-125 transition-transform"></span>
                  <span>TikTok: <strong>@banubagaskara</strong></span>
                </a>
                <a href="{{ $generalSettings['socials']['facebook'] ?? 'https://facebook.com/banubgsk' }}" target="_blank" rel="noopener" class="flex items-center gap-2 hover:text-[#BC0202] transition-colors group">
                  <span class="w-2 h-2 rounded-xs bg-[#BC0202] group-hover:scale-125 transition-transform"></span>
                  <span>Facebook: <strong>banubgsk</strong></span>
                </a>
              </div>
            </div>
          </div>
        </div>

        <!-- Right Column (7 Cols): Sampaikan Aspirasimu (Kotak Aspirasi) -->
        <div id="aspirasi" class="lg:col-span-7 rounded-2xl border border-zinc-200/90 bg-white p-6 sm:p-9 shadow-xs">
          <div class="mb-6 sm:mb-8">
            <h2 class="text-xl sm:text-2xl font-bold text-zinc-950 tracking-tight leading-snug"><span class="text-[#BC0202]">Sampaikan</span> Aspirasi</h2>
            <p class="text-xs text-zinc-500 mt-1">Formulir Kotak Aspirasi Warga Dapil 4 Tanah Sareal</p>
          </div>

          <!-- Error Alert -->
          @if ($errors->any())
            <div class="mb-5 p-3.5 rounded-lg bg-red-50 border border-red-200 text-xs text-red-900">
              <ul class="list-disc list-inside space-y-1">
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif

          <!-- Form Element -->
          <form method="POST" action="{{ route('aspirasi.store') }}" class="space-y-4">
            @csrf
            <!-- Anti-bot Honeypot Field -->
            <input type="text" name="website_hp" value="" class="hidden" tabindex="-1" autocomplete="off" />

            <!-- 1. Nama Lengkap & 2. Nomor Telepon -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
              <div>
                <label class="block text-xs font-bold text-zinc-900 mb-1.5">Nama Lengkap *</label>
                <input
                  type="text"
                  name="sender_name"
                  value="{{ old('sender_name') }}"
                  required
                  placeholder="Nama lengkap kamu"
                  class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-900 placeholder:text-zinc-400 focus:outline-none focus:border-[#FF0000] focus:ring-1 focus:ring-[#FF0000] shadow-2xs"
                />
              </div>
              <div>
                <label class="block text-xs font-bold text-zinc-900 mb-1.5">Nomor Telepon *</label>
                <input
                  type="tel"
                  name="phone_number"
                  value="{{ old('phone_number') }}"
                  required
                  placeholder="Nomor WhatsApp aktif (misal: 081234567890)"
                  class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-900 placeholder:text-zinc-400 focus:outline-none focus:border-[#FF0000] focus:ring-1 focus:ring-[#FF0000] shadow-2xs"
                />
              </div>
            </div>

            <!-- 3. Kelurahan di Tanah Sareal (11 Kelurahan Faktual) -->
            <div>
              <label class="block text-xs font-bold text-zinc-900 mb-1.5">Kelurahan di Kecamatan Tanah Sareal *</label>
              <select
                name="kelurahan"
                class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-900 focus:outline-none focus:border-[#FF0000] focus:ring-1 focus:ring-[#FF0000] shadow-2xs"
              >
                <option value="">Pilih Kelurahan</option>
                @foreach ($kelurahanList ?? \App\Enums\TanahSarealKelurahan::values() as $kel)
                  <option value="{{ $kel }}" {{ old('kelurahan') === $kel ? 'selected' : '' }}>
                    {{ $kel }}
                  </option>
                @endforeach
              </select>
            </div>

            <!-- 4. Alamat Lengkap -->
            <div>
              <label class="block text-xs font-bold text-zinc-900 mb-1.5">Alamat Lengkap *</label>
              <input
                type="text"
                name="address"
                value="{{ old('address') }}"
                required
                placeholder="Alamat tinggal (RT / RW / Nama Gang)"
                class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-900 placeholder:text-zinc-400 focus:outline-none focus:border-[#FF0000] focus:ring-1 focus:ring-[#FF0000] shadow-2xs"
              />
            </div>

            <!-- 5. Subjek -->
            <div>
              <label class="block text-xs font-bold text-zinc-900 mb-1.5">Subjek *</label>
              <input
                type="text"
                name="subject"
                value="{{ old('subject') }}"
                required
                placeholder="Apa yang mau disampaikan? (Contoh: Lampu jalan mati / Saluran mampet)"
                class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-900 placeholder:text-zinc-400 focus:outline-none focus:border-[#FF0000] focus:ring-1 focus:ring-[#FF0000] shadow-2xs"
              />
            </div>

            <!-- 6. Uraian -->
            <div>
              <label class="block text-xs font-bold text-zinc-900 mb-1.5">Uraian *</label>
              <textarea
                name="description"
                required
                rows="4"
                placeholder="Ceritakan detail masalah atau usulanmu secara lengkap di sini..."
                class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-900 placeholder:text-zinc-400 focus:outline-none focus:border-[#FF0000] focus:ring-1 focus:ring-[#FF0000] shadow-2xs leading-relaxed"
              >{{ old('description') }}</textarea>
            </div>

            <!-- 7. Button Submit Kirim Aspirasi -->
            <div class="pt-2">
              <button type="submit" class="w-full inline-flex items-center justify-center rounded-lg bg-[#BC0202] hover:bg-[#830000] text-white text-xs sm:text-sm font-semibold px-7 py-3 shadow-sm transition-colors active:scale-98">
                Kirim Aspirasi
              </button>
            </div>
          </form>

          <!-- Success Notification Card -->
          @if (session('ticket_number'))
            <div class="mt-6 rounded-xl border border-emerald-200 bg-emerald-50/80 p-5 text-xs text-emerald-900">
              <div class="flex items-start gap-3">
                <div class="w-6 h-6 rounded-lg bg-emerald-600 text-white flex items-center justify-center shrink-0 mt-0.5">&check;</div>
                <div>
                  <span class="font-bold text-sm block">Aspirasi Anda Berhasil Terkirim!</span>
                  <p class="mt-1 leading-relaxed">
                    Terima kasih banyak{{ session('sender_name') ? ', ' . session('sender_name') : '' }}! Pesanmu sudah kami terima dengan Nomor Tiket: <strong class="text-emerald-950 font-mono text-sm">{{ session('ticket_number') }}</strong>. Tim kami bakal segera cek dan hubungi nomor WhatsApp kamu.
                  </p>
                </div>
              </div>
            </div>
          @endif
        </div>
      </div>
    </div>
  </section>
@endsection
