@extends('errors.layout')

@section('title', 'Sesi Telah Berakhir')

@section('badge')
  <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-md text-xs font-bold uppercase tracking-wider bg-amber-50 text-amber-700 border border-amber-200">
    <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span>
    Error 419 &bull; Halaman Kedaluwarsa
  </span>
@endsection

@section('message', 'Sesi formulir keamanan Anda telah kedaluwarsa karena tidak ada aktivitas dalam waktu lama. Silakan muat ulang halaman untuk mencoba kembali.')

@section('actions')
  <button
    type="button"
    onclick="window.location.reload()"
    class="inline-flex items-center justify-center rounded-lg bg-[#BC0202] hover:bg-[#830000] text-white text-xs sm:text-sm font-semibold px-5 py-2.5 shadow-sm transition-colors cursor-pointer"
  >
    Muat Ulang Halaman
  </button>
  <a
    href="{{ route('home') }}"
    class="inline-flex items-center justify-center rounded-lg border border-zinc-300 bg-white hover:bg-zinc-50 text-zinc-800 text-xs sm:text-sm font-semibold px-5 py-2.5 shadow-2xs transition-colors cursor-pointer"
  >
    Kembali ke Beranda
  </a>
@endsection
