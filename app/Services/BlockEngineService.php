<?php

namespace App\Services;

class BlockEngineService
{
    /**
     * Render an array of content blocks into an HTML string.
     *
     * @param  array<int, array<string, mixed>>|null  $blocks
     */
    public function renderToHtml(?array $blocks): string
    {
        if (empty($blocks)) {
            return '';
        }

        return $this->renderBlockCollection($blocks);
    }

    /**
     * Render a collection of blocks into combined HTML.
     *
     * @param  array<int, array<string, mixed>>  $blocks
     */
    public function renderBlockCollection(array $blocks): string
    {
        $htmlParts = [];

        foreach ($blocks as $block) {
            $rendered = $this->renderBlock($block);
            if ($rendered !== '') {
                $htmlParts[] = $rendered;
            }
        }

        return implode("\n", $htmlParts);
    }

    /**
     * Render a single block by its type.
     *
     * @param  array<string, mixed>  $block
     */
    public function renderBlock(array $block): string
    {
        $type = $block['type'] ?? 'paragraph';

        return match ($type) {
            'heading' => $this->renderHeading($block),
            'paragraph' => $this->renderParagraph($block),
            'image' => $this->renderImage($block),
            'list' => $this->renderList($block),
            'grid' => $this->renderGrid($block),
            'quote' => $this->renderQuote($block),
            'metric' => $this->renderMetric($block),
            'attachment' => $this->renderAttachment($block),
            'table' => $this->renderTable($block),
            'callout', 'highlight' => $this->renderCallout($block),
            default => $this->renderParagraph($block),
        };
    }

    /**
     * @param  array<string, mixed>  $block
     */
    protected function renderHeading(array $block): string
    {
        $level = in_array($block['level'] ?? 'h2', ['h2', 'h3'], true) ? $block['level'] : 'h2';
        $text = htmlspecialchars((string) ($block['text'] ?? ''), ENT_QUOTES, 'UTF-8');

        if ($level === 'h3') {
            return '<h3 class="text-lg sm:text-xl font-bold text-zinc-950 mt-8 mb-3.5 tracking-tight">'.$text.'</h3>';
        }

        return '<h2 class="text-xl sm:text-2xl font-bold text-zinc-950 mt-10 mb-4 tracking-tight">'.$text.'</h2>';
    }

    /**
     * @param  array<string, mixed>  $block
     */
    protected function renderParagraph(array $block): string
    {
        $rawText = (string) ($block['text'] ?? '');
        $format = $block['format'] ?? null;

        if ($format === 'html') {
            $text = $this->sanitizeRichText($rawText);
        } else {
            $text = nl2br(htmlspecialchars($rawText, ENT_QUOTES, 'UTF-8'));
        }

        return '<p class="text-sm sm:text-base text-zinc-700 leading-relaxed mb-5">'.$text.'</p>';
    }

    /**
     * Sanitize rich text HTML to allow safe formatting tags while preventing XSS.
     */
    protected function sanitizeRichText(string $html): string
    {
        $allowedTags = '<strong><b><em><i><u><a><br><p><span><ul><ol><li><code>';
        $stripped = strip_tags($html, $allowedTags);

        // Remove dangerous on* event handler attributes
        $sanitized = preg_replace('/\s+on[a-z0-9_-]+\s*=\s*(["\'][^"\']*["\']|[^\s>]+)/i', '', (string) $stripped);

        // Remove style attributes to prevent CSS expression/injection
        $sanitized = preg_replace('/\s+style\s*=\s*(["\'][^"\']*["\']|[^\s>]+)/i', '', (string) $sanitized);

        // Remove javascript:, vbscript:, and data: URIs in links
        $sanitized = preg_replace('/(href|src)\s*=\s*(["\'])\s*(?:javascript|vbscript|data):[^"\']*\2/i', '$1="#"', (string) $sanitized);
        $sanitized = preg_replace('/(href|src)\s*=\s*(?:javascript|vbscript|data):[^\s>]*/i', '$1="#"', (string) $sanitized);

        return (string) $sanitized;
    }

    /**
     * @param  array<string, mixed>  $block
     */
    protected function renderImage(array $block): string
    {
        $url = htmlspecialchars((string) ($block['url'] ?? ''), ENT_QUOTES, 'UTF-8');
        $caption = htmlspecialchars((string) ($block['caption'] ?? ''), ENT_QUOTES, 'UTF-8');

        if (str_starts_with($url, '../')) {
            $url = substr($url, 3);
        }

        $captionHtml = $caption !== ''
            ? '<figcaption class="text-xs text-zinc-500 text-center mt-2.5 px-4 font-medium italic">'.$caption.'</figcaption>'
            : '';

        $cleanUrl = ltrim($url, '/');
        if (preg_match('/^(javascript|data|vbscript):/i', $cleanUrl)) {
            $cleanUrl = '#';
        }

        return '<figure class="my-8 rounded-xl overflow-hidden border border-zinc-200 bg-zinc-50 shadow-2xs">
            <img src="/'.$cleanUrl.'" alt="'.$caption.'" class="w-full aspect-[16/9] object-cover" loading="lazy" />
            '.$captionHtml.'
        </figure>';
    }

    /**
     * @param  array<string, mixed>  $block
     */
    protected function renderList(array $block): string
    {
        $items = (array) ($block['items'] ?? []);
        if (empty($items)) {
            return '';
        }

        $listItems = '';
        foreach ($items as $item) {
            $cleanItem = htmlspecialchars((string) $item, ENT_QUOTES, 'UTF-8');
            $listItems .= '<li class="flex items-start gap-3 text-sm sm:text-base text-zinc-700">
                <span class="inline-flex items-center justify-center w-5 h-5 rounded-md bg-red-50 text-[#BC0202] text-xs font-bold mt-0.5 shrink-0">&check;</span>
                <span>'.$cleanItem.'</span>
            </li>';
        }

        return '<ul class="my-6 space-y-3 pl-1">'.$listItems.'</ul>';
    }

    /**
     * @param  array<string, mixed>  $block
     */
    protected function renderGrid(array $block): string
    {
        $col1Blocks = (array) ($block['col1Blocks'] ?? []);
        $col2Blocks = (array) ($block['col2Blocks'] ?? []);

        // Nested Container Grid (support nested blocks in each column)
        if (! empty($col1Blocks) || ! empty($col2Blocks)) {
            $col1Html = $this->renderBlockCollection($col1Blocks);
            $col2Html = $this->renderBlockCollection($col2Blocks);

            return '<div class="grid grid-cols-1 md:grid-cols-2 gap-6 my-8">
                <div class="space-y-4">'.$col1Html.'</div>
                <div class="space-y-4">'.$col2Html.'</div>
            </div>';
        }

        // Backward compatibility with legacy comparison grid
        $col1Title = htmlspecialchars((string) ($block['col1Title'] ?? ''), ENT_QUOTES, 'UTF-8');
        $col1Text = nl2br(htmlspecialchars((string) ($block['col1Text'] ?? ''), ENT_QUOTES, 'UTF-8'));
        $col2Title = htmlspecialchars((string) ($block['col2Title'] ?? ''), ENT_QUOTES, 'UTF-8');
        $col2Text = nl2br(htmlspecialchars((string) ($block['col2Text'] ?? ''), ENT_QUOTES, 'UTF-8'));

        return '<div class="grid grid-cols-1 md:grid-cols-2 gap-4 my-8">
            <div class="rounded-xl border border-zinc-200 bg-white p-5 shadow-2xs">
                <h4 class="font-bold text-sm sm:text-base text-zinc-950 mb-2">'.$col1Title.'</h4>
                <p class="text-xs sm:text-sm text-zinc-600 leading-relaxed">'.$col1Text.'</p>
            </div>
            <div class="rounded-xl border border-zinc-200 bg-white p-5 shadow-2xs">
                <h4 class="font-bold text-sm sm:text-base text-zinc-950 mb-2">'.$col2Title.'</h4>
                <p class="text-xs sm:text-sm text-zinc-600 leading-relaxed">'.$col2Text.'</p>
            </div>
        </div>';
    }

    /**
     * @param  array<string, mixed>  $block
     */
    protected function renderQuote(array $block): string
    {
        $quote = htmlspecialchars((string) ($block['quote'] ?? ''), ENT_QUOTES, 'UTF-8');
        $author = htmlspecialchars((string) ($block['author'] ?? 'Banu Lesmana Bagaskara, S.M.'), ENT_QUOTES, 'UTF-8');

        return '<blockquote class="my-8 rounded-xl border-l-4 border-[#BC0202] bg-[#faf5f5] p-5 sm:p-6 shadow-2xs">
            <p class="text-sm sm:text-base italic font-medium text-zinc-900 leading-relaxed mb-2.5">“'.$quote.'”</p>
            <footer class="text-xs font-bold text-[#BC0202] tracking-wide uppercase">— '.$author.'</footer>
        </blockquote>';
    }

    /**
     * Render Metric / KPI box block.
     *
     * @param  array<string, mixed>  $block
     */
    protected function renderMetric(array $block): string
    {
        $value = htmlspecialchars((string) ($block['value'] ?? '0'), ENT_QUOTES, 'UTF-8');
        $label = htmlspecialchars((string) ($block['label'] ?? ''), ENT_QUOTES, 'UTF-8');
        $description = htmlspecialchars((string) ($block['description'] ?? ''), ENT_QUOTES, 'UTF-8');

        $descHtml = $description !== ''
            ? '<p class="text-xs sm:text-sm text-zinc-600 leading-relaxed mt-1">'.$description.'</p>'
            : '';

        return '<div class="my-6 p-5 sm:p-6 rounded-xl border border-zinc-200 bg-[#fafafa] shadow-2xs">
            <div class="text-3xl sm:text-4xl font-extrabold text-[#BC0202] tracking-tight mb-1">'.$value.'</div>
            <div class="text-sm sm:text-base font-bold text-zinc-950">'.$label.'</div>
            '.$descHtml.'
        </div>';
    }

    /**
     * Render Document Attachment / Download block.
     *
     * @param  array<string, mixed>  $block
     */
    protected function renderAttachment(array $block): string
    {
        $title = htmlspecialchars((string) ($block['title'] ?? 'Dokumen Lampiran'), ENT_QUOTES, 'UTF-8');
        $url = htmlspecialchars((string) ($block['url'] ?? '#'), ENT_QUOTES, 'UTF-8');
        $fileType = htmlspecialchars((string) ($block['fileType'] ?? 'PDF'), ENT_QUOTES, 'UTF-8');
        $fileSize = htmlspecialchars((string) ($block['fileSize'] ?? ''), ENT_QUOTES, 'UTF-8');

        if (str_starts_with($url, '../')) {
            $url = substr($url, 3);
        }

        $metaText = $fileSize !== '' ? $fileSize.' &bull; Unduh Dokumen Resmi' : 'Unduh Dokumen Resmi';

        $cleanUrl = ltrim($url, '/');
        if (preg_match('/^(javascript|data|vbscript):/i', $cleanUrl)) {
            $cleanUrl = '#';
        }

        return '<div class="my-6 p-4 sm:p-5 rounded-xl border border-zinc-200 bg-white hover:border-[#BC0202] transition-colors flex flex-col sm:flex-row sm:items-center justify-between gap-4 shadow-2xs">
            <div class="flex items-center gap-3.5 min-w-0">
                <div class="w-10 h-10 rounded-lg bg-red-50 border border-red-200 text-[#BC0202] flex items-center justify-center font-bold text-xs uppercase shrink-0">
                    '.$fileType.'
                </div>
                <div class="min-w-0">
                    <h4 class="text-sm font-bold text-zinc-950 truncate">'.$title.'</h4>
                    <span class="text-xs text-zinc-500 font-medium">'.$metaText.'</span>
                </div>
            </div>
            <a href="/'.$cleanUrl.'" download target="_blank" rel="noopener noreferrer" class="inline-flex items-center justify-center gap-1.5 px-4 py-2 rounded-lg bg-zinc-900 hover:bg-[#BC0202] text-white text-xs font-semibold shrink-0 transition-colors shadow-2xs">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                </svg>
                Unduh Berkas
            </a>
        </div>';
    }

    /**
     * Render Custom Table block.
     *
     * @param  array<string, mixed>  $block
     */
    protected function renderTable(array $block): string
    {
        $title = htmlspecialchars((string) ($block['title'] ?? ''), ENT_QUOTES, 'UTF-8');
        $headers = (array) ($block['headers'] ?? []);
        $rows = (array) ($block['rows'] ?? []);

        $titleHtml = $title !== ''
            ? '<div class="px-5 py-3 bg-[#fafafa] border-b border-zinc-200 font-bold text-sm text-zinc-900">'.$title.'</div>'
            : '';

        $headerHtml = '';
        if (! empty($headers)) {
            $thParts = '';
            foreach ($headers as $h) {
                $thParts .= '<th scope="col" class="px-4 py-3 text-left font-bold text-zinc-900 uppercase tracking-wider text-[11px]">'.htmlspecialchars((string) $h, ENT_QUOTES, 'UTF-8').'</th>';
            }
            $headerHtml = '<thead class="bg-zinc-100/80 border-b border-zinc-200"><tr>'.$thParts.'</tr></thead>';
        }

        $rowsHtml = '';
        foreach ($rows as $row) {
            $tdParts = '';
            foreach ((array) $row as $cell) {
                $tdParts .= '<td class="px-4 py-3 text-zinc-700 whitespace-nowrap sm:whitespace-normal">'.htmlspecialchars((string) $cell, ENT_QUOTES, 'UTF-8').'</td>';
            }
            $rowsHtml .= '<tr class="hover:bg-zinc-50/80 transition-colors">'.$tdParts.'</tr>';
        }

        return '<div class="my-6 rounded-xl border border-zinc-200 overflow-hidden bg-white shadow-2xs">
            '.$titleHtml.'
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs sm:text-sm text-zinc-700">
                    '.$headerHtml.'
                    <tbody class="divide-y divide-zinc-200">
                        '.$rowsHtml.'
                    </tbody>
                </table>
            </div>
        </div>';
    }

    /**
     * Render Callout / Highlight box block.
     *
     * @param  array<string, mixed>  $block
     */
    protected function renderCallout(array $block): string
    {
        $title = htmlspecialchars((string) ($block['title'] ?? 'Sorotan Utama'), ENT_QUOTES, 'UTF-8');
        $rawText = (string) ($block['text'] ?? '');
        $text = nl2br(htmlspecialchars($rawText, ENT_QUOTES, 'UTF-8'));

        return '<div class="my-6 rounded-xl border border-red-200 border-l-4 border-l-[#BC0202] bg-[#faf5f5] p-5 sm:p-6 shadow-2xs">
            <div class="flex items-start gap-3.5">
                <div class="w-7 h-7 rounded-lg bg-[#BC0202] text-white flex items-center justify-center shrink-0 mt-0.5 shadow-2xs">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div class="flex-1 min-w-0">
                    <h4 class="font-bold text-sm sm:text-base text-zinc-950 mb-1 tracking-tight">'.$title.'</h4>
                    <div class="text-xs sm:text-sm text-zinc-700 leading-relaxed">'.$text.'</div>
                </div>
            </div>
        </div>';
    }
}
