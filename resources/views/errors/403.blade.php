@extends('errors.layout')

@section('title', 'Akses Ditolak')

@section('badge')
  <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-md text-xs font-bold uppercase tracking-wider bg-red-50 text-[#BC0202] border border-red-200">
    <span class="w-1.5 h-1.5 rounded-full bg-[#BC0202]"></span>
    Error 403 &bull; Akses Terbatas
  </span>
@endsection

@section('message', 'Anda tidak memiliki hak akses atau kredensial yang sah untuk membuka laman ini.')

@section('actions')
  <a
    href="{{ route('home') }}"
    class="inline-flex items-center justify-center rounded-lg bg-[#BC0202] hover:bg-[#830000] text-white text-xs sm:text-sm font-semibold px-5 py-2.5 shadow-sm transition-colors cursor-pointer"
  >
    Kembali ke Beranda
  </a>
  <a
    href="{{ route('kontak.index') }}"
    class="inline-flex items-center justify-center rounded-lg border border-zinc-300 bg-white hover:bg-zinc-50 text-zinc-800 text-xs sm:text-sm font-semibold px-5 py-2.5 shadow-2xs transition-colors cursor-pointer"
  >
    Hubungi Rumah Aspirasi
  </a>
@endsection
