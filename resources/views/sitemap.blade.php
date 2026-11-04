{!! '<'.'?xml version="1.0" encoding="UTF-8"?>' !!}
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc>{{ url('/') }}</loc>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>
    <url>
        <loc>{{ route('profile') }}</loc>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>
    <url>
        <loc>{{ route('kinerja.index') }}</loc>
        <changefreq>daily</changefreq>
        <priority>0.9</priority>
    </url>
    <url>
        <loc>{{ route('berita.index') }}</loc>
        <changefreq>daily</changefreq>
        <priority>0.9</priority>
    </url>
    <url>
        <loc>{{ route('galeri.index') }}</loc>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>
    <url>
        <loc>{{ route('kontak.index') }}</loc>
        <changefreq>monthly</changefreq>
        <priority>0.7</priority>
    </url>
    @foreach ($reports as $report)
        <url>
            <loc>{{ route('kinerja.show', $report->slug) }}</loc>
            <lastmod>{{ $report->updated_at ? $report->updated_at->toAtomString() : now()->toAtomString() }}</lastmod>
            <changefreq>monthly</changefreq>
            <priority>0.8</priority>
        </url>
    @endforeach
    @foreach ($newsList as $item)
        <url>
            <loc>{{ route('berita.show', $item->slug) }}</loc>
            <lastmod>{{ $item->updated_at ? $item->updated_at->toAtomString() : now()->toAtomString() }}</lastmod>
            <changefreq>monthly</changefreq>
            <priority>0.8</priority>
        </url>
    @endforeach
</urlset>
