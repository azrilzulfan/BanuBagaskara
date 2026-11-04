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

        $htmlParts = [];

        foreach ($blocks as $block) {
            $type = $block['type'] ?? 'paragraph';

            $rendered = match ($type) {
                'heading' => $this->renderHeading($block),
                'paragraph' => $this->renderParagraph($block),
                'image' => $this->renderImage($block),
                'list' => $this->renderList($block),
                'grid' => $this->renderGrid($block),
                'quote' => $this->renderQuote($block),
                default => $this->renderParagraph($block),
            };

            if ($rendered !== '') {
                $htmlParts[] = $rendered;
            }
        }

        return implode("\n", $htmlParts);
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
        $text = nl2br(htmlspecialchars((string) ($block['text'] ?? ''), ENT_QUOTES, 'UTF-8'));

        return '<p class="text-sm sm:text-base text-zinc-700 leading-relaxed mb-5">'.$text.'</p>';
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

        return '<figure class="my-8 rounded-xl overflow-hidden border border-zinc-200 bg-zinc-50 shadow-2xs">
            <img src="/'.ltrim($url, '/').'" alt="'.$caption.'" class="w-full aspect-[16/9] object-cover" loading="lazy" />
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
}
