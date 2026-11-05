@extends('errors.layout')

@section('title', 'Situs Dalam Pemeliharaan')

@section('badge')
  <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-md text-xs font-bold uppercase tracking-wider bg-amber-50 text-amber-700 border border-amber-200">
    <span class="w-1.5 h-1.5 rounded-full bg-amber-500 animate-pulse"></span>
    Mode Pemeliharaan &bull; Maintenance
  </span>
@endsection

@section('message')
  {{ !empty($exception) && $exception->getMessage() ? $exception->getMessage() : 'Website sedang dalam proses peningkatan sistem dan pemeliharaan berkala untuk menghadirkan kualitas layanan digital yang lebih baik. Kami akan segera kembali online melayani Anda.' }}
@endsection

@section('extra')
  <div class="rounded-xl border border-zinc-200 bg-zinc-50 p-4 text-left space-y-2">
    <div class="flex items-center gap-2 text-xs font-bold text-zinc-900">
      <svg class="w-4 h-4 text-[#BC0202]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
      </svg>
      <span>Kebutuhan Darurat &amp; Ambulance Siaga 24 Jam</span>
    </div>
    <p class="text-xs text-zinc-600 leading-relaxed">
      Bagi warga yang membutuhkan bantuan darurat medis atau rujukan RSUD di wilayah Tanah Sareal, layanan hotline tetap siaga melayani melalui kontak WhatsApp Rumah Aspirasi.
    </p>
  </div>
@endsection

@section('actions')
  <button
    type="button"
    onclick="window.location.reload()"
    class="inline-flex items-center justify-center rounded-lg bg-[#BC0202] hover:bg-[#830000] text-white text-xs sm:text-sm font-semibold px-5 py-2.5 shadow-sm transition-colors cursor-pointer"
  >
    Muat Ulang Halaman
  </button>
  <a
    href="{{ route('admin.login') }}"
    class="inline-flex items-center justify-center rounded-lg border border-zinc-300 bg-white hover:bg-zinc-50 text-zinc-800 text-xs sm:text-sm font-semibold px-5 py-2.5 shadow-2xs transition-colors cursor-pointer"
  >
    Login Administrator
  </a>
@endsection
