@extends('layouts.public')

@section('title', 'Kontak & Rumah Aspirasi Warga | Banu Lesmana Bagaskara, S.M.')
@section('meta_description', 'Saluran resmi pengaduan warga, alamat sekretariat Rumah Aspirasi di Kedung Badak, dan layanan ambulance siaga 24 jam gratis bersama Banu Lesmana Bagaskara, S.M.')

@section('content')
  <!-- Header Hero -->
  <header class="w-full bg-[#faf5f5] border-b border-zinc-200 py-14 sm:py-18">
    <div class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-12 xl:px-16">
      <div class="max-w-3xl">
        <span class="text-xs font-bold text-[#BC0202] uppercase tracking-wider block mb-2">Rumah Aspirasi Rakyat Digital</span>
        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-zinc-950 tracking-tight leading-tight">
          <span class="text-[#BC0202]">Kontak</span> &amp; Kotak <span class="text-[#BC0202]">Aspirasi</span> Warga
        </h1>
        <p class="text-xs sm:text-sm text-zinc-600 mt-4 leading-relaxed">
          Kanal pengaduan publik langsung tanpa sekat. Sampaikan usulan perbaikan lingkungan, keluhan fasilitas umum, maupun permohonan pendampingan kesehatan dan UMKM di wilayah Tanah Sareal.
        </p>
      </div>
    </div>
  </header>

  <!-- Banner Ambulance Siaga 24 Jam -->
  <section class="w-full bg-zinc-950 border-b border-zinc-200">
    <div class="w-full max-w-[1920px] mx-auto overflow-hidden">
      <a href="#aspirasi" class="block w-full group">
        <img
          src="{{ asset('assets/banu/banner_serbaguna.jpg') }}"
          alt="Ambulance Siaga 24 Jam & Pendamping Rujukan RSUD - Banu Lesmana Bagaskara, S.M."
          class="w-full h-auto object-cover min-h-[160px] sm:min-h-[220px] md:min-h-[280px] lg:min-h-[340px] xl:min-h-[400px] transition-transform duration-500 group-hover:scale-[1.008]"
          loading="lazy"
        />
      </a>
    </div>
  </section>

  <!-- Main Contact & Aspiration Form Section -->
  <section class="w-full bg-[#f4f4f5] py-14 sm:py-20 border-b border-zinc-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-12 xl:px-16">
      <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-10 items-start">
        <!-- Left: Official Contact Card -->
        <div class="lg:col-span-5 flex flex-col space-y-6">
          <div class="rounded-2xl border border-zinc-200 bg-white p-6 sm:p-8 shadow-xs">
            <h2 class="text-xl sm:text-2xl font-bold text-zinc-950 tracking-tight"><span class="text-[#BC0202]">Kontak</span> Resmi</h2>

            <div class="mt-6 space-y-5 text-xs text-zinc-700">
              <!-- Alamat -->
              <div class="flex items-start gap-3.5">
                <div class="w-9 h-9 rounded-xl bg-red-50 text-[#BC0202] flex items-center justify-center shrink-0 mt-0.5 border border-red-100">
                  <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                  </svg>
                </div>
                <div>
                  <span class="font-bold text-zinc-950 block text-[13px]">Posko Rumah Aspirasi:</span>
                  <span class="text-zinc-600 mt-0.5 block leading-relaxed">
                    {{ $generalSettings['address'] ?? 'Kelurahan Kedung Badak, Kecamatan Tanah Sareal, Kota Bogor, Jawa Barat.' }}
                  </span>
                </div>
              </div>

              <!-- Telepon / WA -->
              <div class="flex items-start gap-3.5">
                <div class="w-9 h-9 rounded-xl bg-red-50 text-[#BC0202] flex items-center justify-center shrink-0 mt-0.5 border border-red-100">
                  <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                  </svg>
                </div>
                <div>
                  <span class="font-bold text-zinc-950 block text-[13px]">Hotline Ambulance Siaga 24 Jam:</span>
                  <a href="tel:{{ $generalSettings['phone'] ?? '+6281288880000' }}" class="text-[#BC0202] font-mono font-bold mt-0.5 block hover:underline text-sm">
                    {{ $generalSettings['phone'] ?? '+62 812-8888-0000' }}
                  </a>
                </div>
              </div>

              <!-- Email -->
              <div class="flex items-start gap-3.5">
                <div class="w-9 h-9 rounded-xl bg-red-50 text-[#BC0202] flex items-center justify-center shrink-0 mt-0.5 border border-red-100">
                  <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                  </svg>
                </div>
                <div>
                  <span class="font-bold text-zinc-950 block text-[13px]">Email Resmi:</span>
                  <a href="mailto:{{ $generalSettings['email'] ?? 'aspirasi@banubagaskara.id' }}" class="text-zinc-600 hover:text-[#BC0202] mt-0.5 block transition-colors font-medium">
                    {{ $generalSettings['email'] ?? 'aspirasi@banubagaskara.id' }}
                  </a>
                </div>
              </div>
            </div>

            <!-- Media Sosial -->
            <div class="mt-7 pt-6 border-t border-zinc-100">
              <span class="text-xs font-bold text-zinc-950 block mb-3 uppercase tracking-wider">Media Sosial Resmi:</span>
              <div class="flex flex-col space-y-2.5 text-xs text-zinc-600">
                <a href="{{ $generalSettings['socials']['instagram'] ?? 'https://instagram.com/banubagaskara' }}" target="_blank" rel="noopener" class="flex items-center gap-2 hover:text-[#BC0202] transition-colors">
                  <span class="w-2 h-2 rounded-xs bg-[#BC0202]"></span>
                  <span>Instagram: <strong>@banubagaskara</strong></span>
                </a>
                <a href="{{ $generalSettings['socials']['tiktok'] ?? 'https://tiktok.com/@banubagaskara' }}" target="_blank" rel="noopener" class="flex items-center gap-2 hover:text-[#BC0202] transition-colors">
                  <span class="w-2 h-2 rounded-xs bg-[#BC0202]"></span>
                  <span>TikTok: <strong>@banubagaskara</strong></span>
                </a>
                <a href="{{ $generalSettings['socials']['facebook'] ?? 'https://facebook.com/banubgsk' }}" target="_blank" rel="noopener" class="flex items-center gap-2 hover:text-[#BC0202] transition-colors">
                  <span class="w-2 h-2 rounded-xs bg-[#BC0202]"></span>
                  <span>Facebook: <strong>banubgsk</strong></span>
                </a>
              </div>
            </div>
          </div>
        </div>

        <!-- Right: Sampaikan Aspirasi Form -->
        <div id="aspirasi" class="lg:col-span-7 rounded-2xl border border-zinc-200 bg-white p-6 sm:p-9 shadow-xs">
          <div class="mb-6 sm:mb-8">
            <h2 class="text-xl sm:text-2xl font-bold text-zinc-950 tracking-tight leading-snug"><span class="text-[#BC0202]">Formulir</span> Kotak Aspirasi</h2>
            <p class="text-xs text-zinc-600 mt-1.5">Laporan Anda akan tercatat dengan nomor tiket resmi untuk ditinjau oleh tim sekretariat dewan.</p>
          </div>

          <!-- Success Notification Card -->
          @if (session('ticket_number'))
            <div class="mb-6 rounded-xl border border-emerald-200 bg-emerald-50 p-5 text-xs text-emerald-900">
              <div class="flex items-start gap-3">
                <div class="w-7 h-7 rounded-lg bg-emerald-600 text-white flex items-center justify-center font-bold text-sm shrink-0 mt-0.5">&check;</div>
                <div>
                  <span class="font-bold text-sm block text-emerald-950">Aspirasi Anda Berhasil Terkirim!</span>
                  <p class="mt-1 leading-relaxed text-zinc-700">
                    Terima kasih <strong>{{ session('sender_name', 'Bapak/Ibu') }}</strong>. Laporan Anda telah tersimpan dengan nomor tiket:
                  </p>
                  <div class="mt-2.5 inline-block px-3.5 py-1.5 rounded-lg bg-white border border-emerald-300 font-mono font-bold text-base text-emerald-800 shadow-2xs">
                    {{ session('ticket_number') }}
                  </div>
                  <p class="mt-2 text-[11px] text-zinc-500">
                    Simpan nomor tiket ini sebagai bukti pelaporan. Tim Rumah Aspirasi akan meninjau dan menghubungi Anda via WhatsApp.
                  </p>
                </div>
              </div>
            </div>
          @endif

          <!-- Validation Errors Alert -->
          @if ($errors->any())
            <div class="mb-6 rounded-xl border border-red-200 bg-red-50 p-4 text-xs text-red-900 space-y-1">
              <span class="font-bold block">Mohon perbaiki isian formulir:</span>
              <ul class="list-disc list-inside space-y-0.5 text-red-800">
                @foreach ($errors->all() as $err)
                  <li>{{ $err }}</li>
                @endforeach
              </ul>
            </div>
          @endif

          <!-- Form Element -->
          <form method="POST" action="{{ route('aspirasi.store') }}" class="space-y-4">
            @csrf

            <!-- Honeypot field (hidden from real users, traps automated bots) -->
            <div class="hidden" aria-hidden="true" style="display:none !important;">
              <input type="text" name="website_hp" tabindex="-1" autocomplete="off" />
            </div>

            <!-- Nama Lengkap & Nomor Telepon -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
              <div>
                <label for="sender_name" class="block text-xs font-bold text-zinc-900 mb-1.5">Nama Lengkap *</label>
                <input
                  id="sender_name"
                  name="sender_name"
                  type="text"
                  required
                  value="{{ old('sender_name') }}"
                  placeholder="Nama lengkap Anda..."
                  class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-900 placeholder:text-zinc-400 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] shadow-2xs"
                />
              </div>
              <div>
                <label for="phone_number" class="block text-xs font-bold text-zinc-900 mb-1.5">Nomor WhatsApp Aktif *</label>
                <input
                  id="phone_number"
                  name="phone_number"
                  type="tel"
                  required
                  value="{{ old('phone_number') }}"
                  placeholder="Contoh: 081234567890"
                  class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-900 placeholder:text-zinc-400 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] shadow-2xs"
                />
              </div>
            </div>

            <!-- Kelurahan & Kategori -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
              <div>
                <label for="kelurahan" class="block text-xs font-bold text-zinc-900 mb-1.5">Kelurahan (Kec. Tanah Sareal)</label>
                <select
                  id="kelurahan"
                  name="kelurahan"
                  class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-900 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] shadow-2xs"
                >
                  <option value="">Pilih Kelurahan...</option>
                  @foreach ($kelurahanList as $kel)
                    <option value="{{ $kel }}" {{ old('kelurahan') === $kel ? 'selected' : '' }}>{{ $kel }}</option>
                  @endforeach
                </select>
              </div>
              <div>
                <label for="category" class="block text-xs font-bold text-zinc-900 mb-1.5">Kategori Bidang</label>
                <select
                  id="category"
                  name="category"
                  class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-900 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] shadow-2xs"
                >
                  <option value="Infrastruktur & Drainase" {{ old('category') === 'Infrastruktur & Drainase' ? 'selected' : '' }}>Infrastruktur &amp; Drainase</option>
                  <option value="Penerangan Jalan (PJU)" {{ old('category') === 'Penerangan Jalan (PJU)' ? 'selected' : '' }}>Penerangan Jalan (PJU)</option>
                  <option value="Layanan Ambulance Siaga" {{ old('category') === 'Layanan Ambulance Siaga' ? 'selected' : '' }}>Layanan Ambulance Siaga</option>
                  <option value="UMKM & Usaha Warga" {{ old('category') === 'UMKM & Usaha Warga' ? 'selected' : '' }}>UMKM &amp; Legalitas Usaha</option>
                  <option value="Pendidikan & Beasiswa" {{ old('category') === 'Pendidikan & Beasiswa' ? 'selected' : '' }}>Pendidikan &amp; Beasiswa</option>
                  <option value="Sosial & Kesehatan Lainnya" {{ old('category') === 'Sosial & Kesehatan Lainnya' ? 'selected' : '' }}>Sosial &amp; Kesehatan Lainnya</option>
                </select>
              </div>
            </div>

            <!-- Alamat Lengkap -->
            <div>
              <label for="address" class="block text-xs font-bold text-zinc-900 mb-1.5">Alamat Lengkap / Lokasi Masalah *</label>
              <input
                id="address"
                name="address"
                type="text"
                required
                value="{{ old('address') }}"
                placeholder="RT/RW, nama jalan/gang, nomor rumah..."
                class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-900 placeholder:text-zinc-400 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] shadow-2xs"
              />
            </div>

            <!-- Subjek -->
            <div>
              <label for="subject" class="block text-xs font-bold text-zinc-900 mb-1.5">Perihal / Subjek *</label>
              <input
                id="subject"
                name="subject"
                type="text"
                required
                value="{{ old('subject') }}"
                placeholder="Contoh: Perbaikan saluran drainase tersumbat saat hujan deras"
                class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-900 placeholder:text-zinc-400 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] shadow-2xs"
              />
            </div>

            <!-- Uraian -->
            <div>
              <label for="description" class="block text-xs font-bold text-zinc-900 mb-1.5">Uraian Lengkap Masalah / Usulan *</label>
              <textarea
                id="description"
                name="description"
                required
                rows="4"
                placeholder="Ceritakan kronologi, kondisi lapangan, atau bantuan apa yang Anda butuhkan secara terperinci..."
                class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-900 placeholder:text-zinc-400 focus:outline-none focus:border-[#BC0202] focus:ring-1 focus:ring-[#BC0202] shadow-2xs leading-relaxed"
              >{{ old('description') }}</textarea>
            </div>

            <!-- Submit Button (Strictly Rounded-lg, No Pill) -->
            <div class="pt-2">
              <button
                type="submit"
                class="w-full inline-flex items-center justify-center rounded-lg bg-[#BC0202] hover:bg-[#830000] text-white text-xs sm:text-sm font-semibold px-7 py-3 shadow-sm transition-colors active:scale-98"
              >
                Kirim Aspirasi Sekarang
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
@endsection
