@extends('layouts.public')

@section('title', 'Kontak & Rumah Aspirasi Warga | Banu Lesmana Bagaskara, S.M.')
@section('meta_description', 'Saluran resmi pengaduan warga, alamat sekretariat Rumah Aspirasi di Kedung Badak, dan layanan ambulance siaga 24 jam gratis.')

@push('schema')
<script type="application/ld+json">
{
  "{{ '@context' }}": "https://schema.org",
  "@type": "GovernmentService",
  "name": "Rumah Aspirasi Rakyat Banu Bagaskara",
  "serviceType": "Layanan Pengaduan & Bantuan Publik",
  "provider": {
    "@type": "Person",
    "name": "Banu Lesmana Bagaskara, S.M."
  },
  "areaServed": {
    "@type": "AdministrativeArea",
    "name": "Kecamatan Tanah Sareal, Kota Bogor"
  }
}
</script>
@endpush

@section('content')
  <!-- ========================================== -->
  <!-- 1. HEADER & HERO SECTION (Kontak)          -->
  <!-- ========================================== -->
  <header class="w-full bg-[#faf5f5] border-b border-zinc-200 pt-7 sm:pt-9 pb-12 sm:pb-16 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-12 xl:px-16">
      <!-- Top Nav Bar: Logo & Navigation Links -->
      <div class="flex items-center justify-between z-10 w-full mb-10 sm:mb-14 gap-2">
        <a href="{{ route('home') }}" class="flex items-center gap-2.5 sm:gap-3 text-zinc-950 group min-w-0 flex-1">
          @if (!empty($generalSettings['logo']))
            <img src="{{ asset($generalSettings['logo']) }}" alt="{{ $generalSettings['siteTitle'] ?? 'Banu Lesmana Bagaskara' }}" class="h-8 sm:h-9 w-auto object-contain" />
          @else
            <!-- Official Parliamentary / Democratic Red Mark (No Pill, Rounded-lg) -->
            <div class="w-8 h-8 sm:w-9 sm:h-9 rounded-lg bg-[#BC0202] text-white flex items-center justify-center font-bold text-sm sm:text-base shadow-sm shrink-0">
              <svg class="w-4 h-4 sm:w-5 sm:h-5 fill-current" viewBox="0 0 24 24">
                <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" />
              </svg>
            </div>
          @endif
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
            :aria-expanded="mobileMenu ? 'true' : 'false'"
            aria-controls="mobile-nav-drawer"
            aria-label="Buka Menu Navigasi"
            class="inline-flex items-center justify-center rounded-lg border border-zinc-200 bg-white hover:bg-zinc-100 text-zinc-900 text-xs font-medium px-2.5 sm:px-3.5 py-1.5 shadow-sm transition-colors active:bg-zinc-200 cursor-pointer"
          >
            <svg class="w-4 h-4 text-zinc-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <span class="hidden sm:inline ml-1.5">Menu</span>
          </button>
        </div>
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
  <!-- 2. BANNER AMBULANCE SIAGA 24 JAM (FULL GAMBAR - SELALU AKTIF) -->
  <!-- ======================================================== -->
  <section class="w-full bg-zinc-950 border-b border-zinc-200">
    <div class="w-full max-w-[1920px] mx-auto overflow-hidden">
      @if (!empty($generalSettings['contactBanner']['image']))
        <img
          src="{{ asset($generalSettings['contactBanner']['image']) }}"
          alt="{{ !empty($generalSettings['contactBanner']['alt']) ? $generalSettings['contactBanner']['alt'] : '[Banner Kontak]' }}"
          class="w-full h-auto object-cover min-h-[160px] sm:min-h-[220px] md:min-h-[280px] lg:min-h-[340px] xl:min-h-[400px]"
          loading="lazy"
        />
      @else
        <div class="w-full h-44 sm:h-56 md:h-64 lg:h-72 bg-zinc-900 flex items-center justify-center text-zinc-500 text-sm font-medium p-4 text-center">
          <span>{{ !empty($generalSettings['contactBanner']['alt']) ? $generalSettings['contactBanner']['alt'] : '[Banner Kontak]' }}</span>
        </div>
      @endif
    </div>
  </section>

  <!-- ========================================== -->
  <!-- 3. MAIN CONTACT & ASPIRATION FORM SECTION  -->
  <!-- ========================================== -->
  <section class="w-full bg-[#f4f4f5] py-14 sm:py-20 border-b border-zinc-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-12 xl:px-16">
      <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-10 items-start">
        <!-- Left Column (5 Cols): Kontak Resmi (Hanya Alamat, Telepon, Email, Media Sosial) -->
        <div
          class="lg:col-span-5 flex flex-col space-y-6"
          x-data="{
            copiedField: null,
            copyText(text, field) {
              if (!text) return;
              navigator.clipboard.writeText(text);
              this.copiedField = field;
              setTimeout(() => {
                if (this.copiedField === field) this.copiedField = null;
              }, 2000);
            }
          }"
        >
          <div class="rounded-2xl border border-zinc-200/90 bg-white p-6 sm:p-8 shadow-xs">
            <h2 class="text-xl sm:text-2xl font-bold text-zinc-950 tracking-tight"><span class="text-[#BC0202]">Kontak</span> Resmi</h2>

            <!-- List: Alamat, Telepon, Email -->
            <div class="mt-6 space-y-5 text-xs text-zinc-700">
              <!-- 1. Alamat -->
              <div class="flex items-start gap-3.5 group">
                <div class="w-9 h-9 rounded-xl bg-red-50 text-[#BC0202] flex items-center justify-center shrink-0 mt-0.5 border border-red-100">
                  <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                  </svg>
                </div>
                <div class="flex-1 min-w-0">
                  <div class="flex items-center justify-between gap-2">
                    <span class="font-bold text-zinc-950 block text-[13px]">Alamat:</span>
                    @if (!empty($generalSettings['address']))
                      <button
                        type="button"
                        @click="copyText('{{ addslashes($generalSettings['address']) }}', 'address')"
                        class="text-[10px] text-zinc-400 hover:text-zinc-700 font-medium transition-colors cursor-pointer"
                      >
                        <span x-show="copiedField !== 'address'">Salin</span>
                        <span x-show="copiedField === 'address'" x-cloak class="text-[#BC0202] font-bold">Tersalin!</span>
                      </button>
                    @endif
                  </div>
                  <span class="text-zinc-600 mt-0.5 block leading-relaxed">
                    {{ !empty($generalSettings['address']) ? $generalSettings['address'] : '[Alamat Kantor / Rumah Aspirasi]' }}
                  </span>
                </div>
              </div>

              <!-- 2. Telepon -->
              <div class="flex items-start gap-3.5 group">
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
                <div class="flex-1 min-w-0">
                  <div class="flex items-center justify-between gap-2">
                    <span class="font-bold text-zinc-950 block text-[13px]">Telepon / WhatsApp:</span>
                    @if (!empty($generalSettings['phone']))
                      <button
                        type="button"
                        @click="copyText('{{ addslashes($generalSettings['phone']) }}', 'phone')"
                        class="text-[10px] text-zinc-400 hover:text-zinc-700 font-medium transition-colors cursor-pointer"
                      >
                        <span x-show="copiedField !== 'phone'">Salin</span>
                        <span x-show="copiedField === 'phone'" x-cloak class="text-[#BC0202] font-bold">Tersalin!</span>
                      </button>
                    @endif
                  </div>
                  <a href="tel:{{ !empty($generalSettings['phone']) ? $generalSettings['phone'] : '+6281200000000' }}" class="text-zinc-600 hover:text-[#BC0202] mt-0.5 block transition-colors font-medium">
                    {{ !empty($generalSettings['phone']) ? $generalSettings['phone'] : '+62 812-0000-0000' }}
                  </a>
                </div>
              </div>

              <!-- 3. Email -->
              <div class="flex items-start gap-3.5 group">
                <div class="w-9 h-9 rounded-xl bg-red-50 text-[#BC0202] flex items-center justify-center shrink-0 mt-0.5 border border-red-100">
                  <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                  </svg>
                </div>
                <div class="flex-1 min-w-0">
                  <div class="flex items-center justify-between gap-2">
                    <span class="font-bold text-zinc-950 block text-[13px]">Email:</span>
                    @if (!empty($generalSettings['email']))
                      <button
                        type="button"
                        @click="copyText('{{ addslashes($generalSettings['email']) }}', 'email')"
                        class="text-[10px] text-zinc-400 hover:text-zinc-700 font-medium transition-colors cursor-pointer"
                      >
                        <span x-show="copiedField !== 'email'">Salin</span>
                        <span x-show="copiedField === 'email'" x-cloak class="text-[#BC0202] font-bold">Tersalin!</span>
                      </button>
                    @endif
                  </div>
                  <a href="mailto:{{ !empty($generalSettings['email']) ? $generalSettings['email'] : 'aspirasi@banubagaskara.id' }}" class="text-zinc-600 hover:text-[#BC0202] mt-0.5 block transition-colors font-medium">
                    {{ !empty($generalSettings['email']) ? $generalSettings['email'] : '[Email Resmi: aspirasi@banubagaskara.id]' }}
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
            <div role="alert" class="mb-5 p-3.5 rounded-lg bg-red-50 border border-red-200 text-xs text-red-900">
              <ul class="list-disc list-inside space-y-1">
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif

          <!-- Form Element with Character Counter & Submit Loading Indicator -->
          <form
            method="POST"
            action="{{ route('aspirasi.store') }}"
            x-data="{
              submitting: false,
              charCount: {{ strlen(old('description', '')) }}
            }"
            @submit="submitting = true"
            class="space-y-4"
          >
            @csrf
            <!-- Anti-bot Honeypot Field -->
            <div class="hidden" aria-hidden="true" style="display:none !important;">
              <input type="text" name="website_hp" value="" tabindex="-1" autocomplete="off" />
            </div>

            <!-- 1. Nama Lengkap & 2. Nomor Telepon -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
              <div>
                <label for="sender_name" class="block text-xs font-bold text-zinc-900 mb-1.5">Nama Lengkap *</label>
                <input
                  type="text"
                  id="sender_name"
                  name="sender_name"
                  value="{{ old('sender_name') }}"
                  required
                  aria-required="true"
                  placeholder="Nama lengkap kamu"
                  class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-900 placeholder:text-zinc-400 focus:outline-none focus:border-[#FF0000] focus:ring-1 focus:ring-[#FF0000] shadow-2xs"
                />
              </div>
              <div>
                <label for="phone_number" class="block text-xs font-bold text-zinc-900 mb-1.5">Nomor Telepon *</label>
                <input
                  type="tel"
                  id="phone_number"
                  name="phone_number"
                  value="{{ old('phone_number') }}"
                  required
                  aria-required="true"
                  placeholder="Nomor WhatsApp aktif (misal: 081234567890)"
                  class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-900 placeholder:text-zinc-400 focus:outline-none focus:border-[#FF0000] focus:ring-1 focus:ring-[#FF0000] shadow-2xs"
                />
              </div>
            </div>

            <!-- 3. Alamat Lengkap -->
            <div>
              <label for="address" class="block text-xs font-bold text-zinc-900 mb-1.5">Alamat Lengkap *</label>
              <input
                type="text"
                id="address"
                name="address"
                value="{{ old('address') }}"
                required
                aria-required="true"
                placeholder="Alamat tinggal (RT / RW / Nama Gang)"
                class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-900 placeholder:text-zinc-400 focus:outline-none focus:border-[#FF0000] focus:ring-1 focus:ring-[#FF0000] shadow-2xs"
              />
            </div>

            <!-- 4. Subjek -->
            <div>
              <label for="subject" class="block text-xs font-bold text-zinc-900 mb-1.5">Subjek *</label>
              <input
                type="text"
                id="subject"
                name="subject"
                value="{{ old('subject') }}"
                required
                aria-required="true"
                placeholder="Apa yang mau disampaikan? (Contoh: Lampu jalan mati / Saluran mampet)"
                class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-900 placeholder:text-zinc-400 focus:outline-none focus:border-[#FF0000] focus:ring-1 focus:ring-[#FF0000] shadow-2xs"
              />
            </div>

            <!-- 5. Uraian -->
            <div>
              <label for="description" class="block text-xs font-bold text-zinc-900 mb-1.5">Uraian *</label>
              <textarea
                id="description"
                name="description"
                required
                aria-required="true"
                rows="4"
                maxlength="5000"
                @input="charCount = $event.target.value.length"
                placeholder="Ceritakan detail masalah atau usulanmu secara lengkap di sini..."
                class="w-full rounded-lg border border-zinc-300 bg-white px-3.5 py-2.5 text-xs sm:text-sm text-zinc-900 placeholder:text-zinc-400 focus:outline-none focus:border-[#FF0000] focus:ring-1 focus:ring-[#FF0000] shadow-2xs leading-relaxed"
              >{{ old('description') }}</textarea>
              <div class="flex items-center justify-between text-[11px] text-zinc-500 mt-1 px-0.5">
                <span>Maksimal 5000 karakter</span>
                <span :class="charCount > 4500 ? 'text-[#BC0202] font-bold' : 'text-zinc-400'" x-text="charCount + ' / 5000'"></span>
              </div>
            </div>

            <!-- 6. Button Submit Kirim Aspirasi -->
            <div class="pt-2">
              <button
                type="submit"
                :disabled="submitting"
                class="w-full inline-flex items-center justify-center rounded-lg bg-[#BC0202] hover:bg-[#830000] disabled:bg-zinc-400 disabled:cursor-not-allowed text-white text-xs sm:text-sm font-semibold px-7 py-3 shadow-sm transition-colors active:scale-98 cursor-pointer gap-2"
              >
                <svg x-show="submitting" x-cloak class="animate-spin w-4 h-4 text-white" fill="none" viewBox="0 0 24 24">
                  <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                  <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path>
                </svg>
                <span x-text="submitting ? 'Mengirimkan Aspirasi...' : 'Kirim Aspirasi'"></span>
              </button>
            </div>
          </form>

          <!-- Success Notification Card with Quick Copy -->
          @if (session('ticket_number'))
            <div role="status" aria-live="polite" class="mt-6 rounded-xl border border-emerald-200 bg-emerald-50/80 p-5 text-xs text-emerald-900">
              <div class="flex items-start gap-3">
                <div class="w-6 h-6 rounded-lg bg-emerald-600 text-white flex items-center justify-center shrink-0 mt-0.5 font-bold">&check;</div>
                <div class="flex-1 min-w-0" x-data="{ ticketCopied: false }">
                  <span class="font-bold text-sm block">Aspirasi Anda Berhasil Terkirim!</span>
                  <p class="mt-1 leading-relaxed">
                    Terima kasih banyak{{ session('sender_name') ? ', ' . session('sender_name') : '' }}! Pesanmu sudah kami terima dengan Nomor Tiket: <strong class="text-emerald-950 font-mono text-sm">{{ session('ticket_number') }}</strong>. Tim kami bakal segera cek dan hubungi nomor WhatsApp kamu.
                  </p>
                  <div class="mt-3">
                    <button
                      type="button"
                      @click="navigator.clipboard.writeText('{{ session('ticket_number') }}'); ticketCopied = true; setTimeout(() => ticketCopied = false, 2000)"
                      class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-white border border-emerald-300 text-emerald-800 text-xs font-semibold hover:bg-emerald-50 shadow-2xs transition-colors cursor-pointer"
                    >
                      <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2" />
                      </svg>
                      <span x-text="ticketCopied ? 'Nomor Tiket Tersalin!' : 'Salin Nomor Tiket'"></span>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          @endif
        </div>
      </div>
    </div>
  </section>
@endsection
