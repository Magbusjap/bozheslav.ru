<!doctype html>
<html lang="ru">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="/css/index.css" />
        <link rel="shortcut icon" href="/icons/favicon.ico" type="image/x-icon" />
        <title>{{ $page->seo_title ?? $page->title . ' — Михаил Божеслав' }}</title>
        <meta name="description" content="{{ $page->seo_description ?? '' }}">
        <meta property="og:title" content="{{ $page->seo_title ?? $page->title }}">
        <meta property="og:description" content="{{ $page->seo_description ?? '' }}">
        <meta property="og:type" content="website">
    </head>
    <body>
        @auth
        <x-admin-bar 
            :editUrl="'/admin/site-pages/' . $page->id . '/edit'"
            editLabel="Редактировать страницу"
        />
        @endauth

        <div id="header"></div>

        <main class="main">
            <section class="section" id="page">
                <div class="container page__container">
                    <h1 class="page__title">{{ $page->title }}</h1>
                    @if($page->excerpt)
                        <p>{{ $page->excerpt }}</p>
                    @endif
                    <div class="page__desc">
                        @if($page->content)
                            @foreach($page->content as $block)
                                @switch($block['type'])
                                    @case('heading')
                                        <{{ $block['data']['level'] }}>{{ $block['data']['text'] }}</{{ $block['data']['level'] }}>
                                        @break
                                    @case('text')
                                        {!! $block['data']['content'] !!}
                                        @break
                                    @case('code')
                                        <div class="article-page__code-wrapper">
                                            <span class="article-page__code-lang">{{ $block['data']['language'] }}</span>
                                            <pre><code class="language-{{ $block['data']['language'] }}">{{ $block['data']['code'] }}</code></pre>
                                        </div>
                                        @break
                                    @case('image')
                                        <figure>
                                            @php $media = \Awcodes\Curator\Models\Media::find($block['data']['url']); @endphp
                                            <img src="{{ $media?->url }}" alt="{{ $block['data']['caption'] ?? '' }}"
                                                style="@if(!empty($block['data']['width'])) width: {{ $block['data']['width'] }}px; @endif @if(!empty($block['data']['height'])) height: {{ $block['data']['height'] }}px; @endif" />
                                            @if(!empty($block['data']['caption']))
                                                <figcaption>{{ $block['data']['caption'] }}</figcaption>
                                            @endif
                                        </figure>
                                        @break
                                    @case('quote')
                                        <blockquote>
                                            <p>{{ $block['data']['text'] }}</p>
                                            @if(!empty($block['data']['author']))
                                                <cite>— {{ $block['data']['author'] }}</cite>
                                            @endif
                                        </blockquote>
                                        @break
                                    @case('image_text')
                                        <div class="article-page__image-text article-page__image-text--{{ $block['data']['position'] }}">
                                            <figure class="article-page__image-text-img" style="width: {{ $block['data']['width'] ?? 300 }}px;">
                                                <img src="{{ \App\Models\Post::getMediaUrl($block['data']['url']) }}" alt="" />
                                            </figure>
                                            <div class="article-page__image-text-body">
                                                {!! $block['data']['text'] !!}
                                            </div>
                                        </div>
                                        @case('before_after')
                                        @php
                                            $before = \Awcodes\Curator\Models\Media::find($block['data']['before_url'])?->url;
                                            $after = \Awcodes\Curator\Models\Media::find($block['data']['after_url'])?->url;
                                            $h = $block['data']['height'] ?? 500;
                                        @endphp

                                        @if($before && $after)
                                            <div class="js-before-after" style="position: relative; width: 100%; height: {{ $h }}px; overflow: hidden; border-radius: 12px; margin: 2rem 0; cursor: ew-resize; user-select: none;">
                                                <img src="{{ $after }}" style="position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; pointer-events: none;">
                                                <div class="js-before-layer" style="position: absolute; inset: 0; width: 50%; height: 100%; overflow: hidden; border-right: 2px solid white; pointer-events: none;">
                                                    <img src="{{ $before }}" class="js-before-img" style="position: absolute; top: 0; left: 0; height: 100%; max-width: none; pointer-events: none;">
                                                </div>
                                                <div class="js-handle" style="position: absolute; top: 0; bottom: 0; left: 50%; width: 4px; background: white; transform: translateX(-50%); pointer-events: none;">
                                                    <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 40px; height: 40px; background: white; border-radius: 50%; box-shadow: 0 4px 10px rgba(0,0,0,0.3); display: flex; align-items: center; justify-content: center;">
                                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#333" stroke-width="2"><path d="M18 8L22 12L18 16M6 8L2 12L6 16"/></svg>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        @break
                                @endswitch
                            @endforeach
                        @endif
                    </div>
                </div>
            </section>
        </main>

        <div id="footer"></div>
        <script defer src="/js/index.js" type="module"></script>
    </body>
</html>
