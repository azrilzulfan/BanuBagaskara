@extends('errors.layout')

@section('title', 'Situs Dalam Pemeliharaan')

@section('badge')
    <span
        class="inline-flex items-center gap-1.5 px-3 py-1 rounded-md text-xs font-bold uppercase tracking-wider bg-amber-50 text-amber-700 border border-amber-200">
        <span class="w-1.5 h-1.5 rounded-full bg-amber-500 animate-pulse"></span>
        Mode Pemeliharaan &bull; Maintenance
    </span>
@endsection

@section('message')
    {{ !empty($exception) && $exception->getMessage() ? $exception->getMessage() : 'Website sedang dalam proses peningkatan sistem dan pemeliharaan berkala untuk menghadirkan kualitas layanan digital yang lebih baik. Kami akan segera kembali online melayani Anda.' }}
@endsection

@section('actions')
    <button type="button" onclick="window.location.reload()"
        class="inline-flex items-center justify-center rounded-lg bg-[#BC0202] hover:bg-[#830000] text-white text-xs sm:text-sm font-semibold px-5 py-2.5 shadow-sm transition-colors cursor-pointer">
        Muat Ulang Halaman
    </button>
@endsection
