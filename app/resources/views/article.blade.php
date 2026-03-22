<!doctype html>
<html lang="ru">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="/css/index.css" />
		<link rel="shortcut icon" href="/icons/favicon.ico" type="image/x-icon" />
		<title>Статья — Михаил Божеслав</title>
	</head>
	<body>
		<x-admin-bar 
			:editUrl="auth()->check() ? '/admin/posts/' . $post->id . '/edit' : null"
			editLabel="Редактировать запись"
		/>
		<div id="header"></div>

		<main class="main">
			<article class="section article-page" id="article">
				<div class="container article-page__container">
					<!-- Breadcrumbs -->
					<nav class="article-page__breadcrumb" aria-label="Навигация">
						<a href="/blog" class="article-page__breadcrumb-link"
							>← Блог</a
						>
					</nav>

					<!-- Meta -->
							@isset($post)
					<div class="article-page__meta">
						<span class="badge badge__blog" data-filter="{{ $post->category->slug ?? 'other' }}">{{ $post->category->name ?? 'Разное' }}</span>
						<!-- <span class="badge badge__blog">{{ $post->category->name ?? 'Разное' }}</span> -->
						<time class="blog-card__date" datetime="{{ $post->created_at->format('Y-m-d') }}">
							{{ $post->created_at->translatedFormat('d F Y') }}
						</time>
					</div>

					<!-- Cover -->
					@if($post->cover_image)
					<div class="article-page__cover">
						<img src="/storage/{{ $post->cover_image }}" alt="{{ $post->title }}" />
					</div>
					@endif
					
					<!-- Title -->
					<h1 class="article-page__title">{{ $post->title }}</h1>


					<!-- Content -->
					<div class="article-page__content">
						@foreach($post->content as $block)
							@switch($block['type'])
								@case('heading')
									<{{ $block['data']['level'] }}>{{ $block['data']['text'] }}</{{ $block['data']['level'] }}>
									@break
								@case('text')
									{!! $block['data']['content'] !!}
									@break
								@case('code')
									<pre><code class="language-{{ $block['data']['language'] }}">{{ $block['data']['code'] }}</code></pre>
									@break
								@case('image')
									<figure>
										<img src="/storage/{{ $block['data']['url'] }}" alt="{{ $block['data']['caption'] ?? '' }}" />
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
							@endswitch
						@endforeach
					</div>
					@else
					<h1 class="article-page__title">Статья не найдена</h1>
					@endisset

					<!-- Navigation -->
					<nav
						class="article-page__nav"
						id="articleNav"
						aria-label="Другие статьи"
					></nav>
				</div>
			</article>
		</main>

		<div id="footer"></div>
		<script defer src="/js/index.js" type="module"></script>
	</body>
</html>
