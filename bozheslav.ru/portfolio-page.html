<!doctype html>
<html lang="ru">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="/css/index.css" />
		<link rel="stylesheet" href="/css/vendor/highlight.min.css" />
		<link rel="shortcut icon" href="/icons/favicon.ico" type="image/x-icon" />
		<title>Портфолио — Михаил Божеслав</title>
	</head>
	<body>
		@auth
		<x-admin-bar 
			:editUrl="'/admin'"
			editLabel="Редактировать страницу"
		/>
		@endauth
		

		<div id="header"></div>

		<main class="main">
			<!-- Portfolio page -->
			<section class="section portfolio-page" id="portfolio">
				<div class="container portfolio-page__container">
					<div class="portfolio-page__header">
						<h1 class="portfolio-page__title">Портфолио</h1>
						<p class="portfolio-page__desc">
							Проекты, которые я реализовал — от вёрстки до деплоя на
							собственном сервере.
						</p>
					</div>

					<!-- Filters -->
					<div class="portfolio-page__filters" id="portfolioFilters">
						<button class="portfolio-filter active" data-filter="all">Все</button>
						@foreach($categories as $category)
						<button class="portfolio-filter" data-filter="{{ $category->slug }}">
							{{ $category->name }}
						</button>
						@endforeach
					</div>

					<!-- Master-detail -->
					<div class="projects__layout">
						<!-- 1/3 — list -->
						<div class="projects__sidebar">
							<div class="projects__list" id="projectsList">
								@foreach($projects as $index => $project)
								<div class="project-item {{ $index === 0 ? 'active' : '' }}" 
									data-category="{{ $project->category->slug ?? 'other' }}"
									onclick="selectProject({{ $index }})"
									style="{{ $index >= 5 ? 'display:none' : '' }}">
									<h3 class="project-item__name">{{ $project->title }}</h3>
									<div class="project-item__actions">
										@if($project->github_url)
										<a href="{{ $project->github_url }}" target="_blank" rel="noopener noreferrer" class="btn btn--outline btn--sm">
											<svg class="btn__icon" width="20" height="20" aria-hidden="true">
												<use href="/icons/sprites.svg#github"></use>
											</svg>
											GitHub
										</a>
										@endif
										@if($project->link_url)
										<a href="{{ $project->link_url }}" target="_blank" rel="noopener noreferrer" class="btn btn--primary btn--sm">
											<svg class="btn__icon" width="20" height="20" aria-hidden="true">
												<use href="/icons/sprites.svg#demo"></use>
											</svg>
											{{ $project->link_label ?? 'Demo' }}
										</a>
										@endif
									</div>
								</div>
								@endforeach
							</div>

							<div class="projects__nav">
								<div class="projects__arrows">
									<button class="projects__arrow" id="prevBtn" onclick="prevProject()" aria-label="Предыдущий проект">
										<svg class="sprites badge__icon projects__arrow-left" aria-hidden="true">
											<use href="/icons/sprites.svg#arrow-left"></use>
										</svg>
									</button>
									<span class="projects__counter" id="projectsCounter">1 / {{ count($projects) }}</span>
									<button class="projects__arrow" id="nextBtn" onclick="nextProject()" aria-label="Следующий проект">
										<svg class="sprites badge__icon projects__arrow-right" aria-hidden="true">
											<use href="/icons/sprites.svg#arrow-right"></use>
										</svg>
									</button>
								</div>
							</div>
						</div>

						<!-- 2/3 — detail -->
						<div class="projects__detail">
							@foreach($projects as $index => $project)
							<div class="project-detail card {{ $index === 0 ? 'active' : '' }}" id="project-{{ $index }}">
								<div class="project-detail__image-wrap">
									<img
										src="{{ $project->cover_url ?? '/images/projects/default.jpg' }}"
										alt="Скриншот проекта {{ $project->title }}"
										class="project-detail__image"
										loading="lazy"
									/>
								</div>
								<div class="card__body">
									<h3 class="project-detail__title">{{ $project->title }}</h3>
									<p class="project-detail__desc">{{ $project->description }}</p>
									<div class="project-detail__tags">
										@foreach($project->stack_tags ?? [] as $tag)
										<span class="badge badge__portfolio portfolio-tag">{{ $tag }}</span>
										@endforeach
									</div>
									<div class="project-detail__actions">
										@if($project->github_url)
										<a href="{{ $project->github_url }}" target="_blank" rel="noopener noreferrer" class="btn btn--outline btn--sm">
											<svg class="btn__icon" width="20" height="20" aria-hidden="true">
												<use href="/icons/sprites.svg#github"></use>
											</svg>
											GitHub
										</a>
										@endif
										@if($project->link_url)
										<a href="{{ $project->link_url }}" target="_blank" rel="noopener noreferrer" class="btn btn--primary btn--sm">
											<svg class="btn__icon" width="20" height="20" aria-hidden="true">
												<use href="/icons/sprites.svg#demo"></use>
											</svg>
											{{ $project->link_label ?? 'Demo' }}
										</a>
										@endif
									</div>
								</div>
							</div>
							@endforeach
						</div>
					</div>
				</div>
			</section>

			<!-- About site -->
			<section class="section portfolio-about" id="about-site">
				<div class="container portfolio-about__container">
					<div class="portfolio-about__content">
						<div class="portfolio-about__text">
							<h2 class="portfolio-about__title">
								Этот сайт — тоже мой проект
							</h2>
							<p class="portfolio-about__desc">
								bozheslav.ru написан с нуля и задеплоен на собственном VPS.
								Никаких конструкторов — только код.
							</p>
							<div class="portfolio-about__stack">
								<span class="badge badge--outline">HTML / CSS / JS</span>
								<span class="badge badge--outline">Laravel</span>
								<span class="badge badge--outline">PostgreSQL</span>
								<span class="badge badge--outline">nginx</span>
								<span class="badge badge--outline">VPS</span>
								<span class="badge badge--outline">Let's Encrypt</span>
							</div>
						</div>
						<div class="portfolio-about__cta">
							<p class="portfolio-about__cta-text">Готов обсудить ваш проект</p>
							<a href="{{ option('social_telegram', '#') }}" ...>Написать в Telegram</a>
								<svg
									class="btn__icon"
									width="20"
									height="20"
									aria-hidden="true"
								>
									<use href="/icons/sprites.svg#telegram"></use>
								</svg>
								Написать в Telegram
							</a>
						</div>
					</div>
				</div>
			</section>

			<!-- Contacts -->
			<section class="section portfolio-contacts" id="contacts">
				<div class="container portfolio-contacts__container">
					<h2 class="portfolio-contacts__title">Связаться со мной</h2>
					<div class="portfolio-contacts__grid">
						<div class="card">
							<div class="card__body">
								<div class="contact__info-row">
									<svg
										class="sprites badge__icon contact__info-icon"
										aria-hidden="true"
									>
										<use href="/icons/sprites.svg#telegram"></use>
									</svg>
									<div>
										<h4 class="contact__info-label">Telegram</h4>
										<p class="contact__info-value">
											<a href="{{ option('social_telegram', '#') }}">
												{{ option('contact_telegram', '@username') }}</a>
										</p>
									</div>
								</div>
							</div>
						</div>
						<div class="card">
							<div class="card__body">
								<div class="contact__info-row">
									<svg
										class="sprites badge__icon contact__info-icon"
										aria-hidden="true"
									>
										<use href="/icons/sprites.svg#email"></use>
									</svg>
									<div>
										<h4 class="contact__info-label">Почта</h4>
										<p class="contact__info-value">
											<a href="mailto:{{ option('contact_email', 'mail@bozheslav.ru') }}">
												{{ option('contact_email', 'mail@bozheslav.ru') }}</a>
										</p>
									</div>
								</div>
							</div>
						</div>
						<div class="card">
							<div class="card__body">
								<div class="contact__info-row">
									<svg
										class="sprites badge__icon contact__info-icon"
										aria-hidden="true"
									>
										<use href="/icons/sprites.svg#github"></use>
									</svg>
									<div>
										<h4 class="contact__info-label">GitHub</h4>
										<p class="contact__info-value">
											<a href="{{ option('social_github', '#') }}">
												{{ option('social_github', 'github.com/username') }}</a>
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</main>

		<div id="footer"></div>
		<script src="/js/vendor/highlight.min.js"></script>
		<script>hljs.highlightAll();</script>
		<script defer src="/js/index.js" type="module"></script>
	</body>
</html>
