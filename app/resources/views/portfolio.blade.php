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
						<button class="portfolio-filter active" data-filter="all">
							Все
						</button>
						<button class="portfolio-filter" data-filter="frontend">
							Frontend
						</button>
						<button class="portfolio-filter" data-filter="backend">
							Backend
						</button>
						<button class="portfolio-filter" data-filter="devops">
							DevOps
						</button>
						<button class="portfolio-filter" data-filter="automation">
							Автоматизация
						</button>
					</div>

					<!-- Master-detail -->
					<div class="projects__layout">
						<!-- 1/3 — list -->
						<div class="projects__sidebar">
							<div class="projects__list" id="projectsList">
								<div
									class="project-item active"
									data-category="devops"
									onclick="selectProject(0)"
								>
									<h3 class="project-item__name">bozheslav.ru</h3>
									<div class="project-item__actions">
										<a href="#" class="btn btn--outline btn--sm">
											<svg
												class="btn__icon"
												width="20"
												height="20"
												aria-hidden="true"
											>
												<use href="/icons/sprites.svg#github"></use>
											</svg>
											GitHub
										</a>
										<a
											href="https://bozheslav.ru"
											target="_blank"
											rel="noopener noreferrer"
											class="btn btn--primary btn--sm"
										>
											<svg
												class="btn__icon"
												width="20"
												height="20"
												aria-hidden="true"
											>
												<use href="/icons/sprites.svg#demo"></use>
											</svg>
											Demo
										</a>
									</div>
								</div>

								<div
									class="project-item"
									data-category="automation"
									onclick="selectProject(1)"
								>
									<h3 class="project-item__name">Telegram Bot + n8n</h3>
									<div class="project-item__actions">
										<a href="#" class="btn btn--outline btn--sm">
											<svg
												class="btn__icon"
												width="20"
												height="20"
												aria-hidden="true"
											>
												<use href="/icons/sprites.svg#github"></use>
											</svg>
											GitHub
										</a>
										<a
											href="#"
											target="_blank"
											rel="noopener noreferrer"
											class="btn btn--primary btn--sm"
										>
											<svg
												class="btn__icon"
												width="20"
												height="20"
												aria-hidden="true"
											>
												<use href="/icons/sprites.svg#demo"></use>
											</svg>
											Demo
										</a>
									</div>
								</div>

								<div
									class="project-item"
									data-category="frontend"
									onclick="selectProject(2)"
								>
									<h3 class="project-item__name">Landing page</h3>
									<div class="project-item__actions">
										<a href="#" class="btn btn--outline btn--sm">
											<svg
												class="btn__icon"
												width="20"
												height="20"
												aria-hidden="true"
											>
												<use href="/icons/sprites.svg#github"></use>
											</svg>
											GitHub
										</a>
										<a
											href="#"
											target="_blank"
											rel="noopener noreferrer"
											class="btn btn--primary btn--sm"
										>
											<svg
												class="btn__icon"
												width="20"
												height="20"
												aria-hidden="true"
											>
												<use href="/icons/sprites.svg#demo"></use>
											</svg>
											Demo
										</a>
									</div>
								</div>

								<div
									class="project-item"
									data-category="frontend"
									onclick="selectProject(3)"
								>
									<h3 class="project-item__name">Landing page</h3>
									<div class="project-item__actions">
										<a href="#" class="btn btn--outline btn--sm">
											<svg
												class="btn__icon"
												width="20"
												height="20"
												aria-hidden="true"
											>
												<use href="/icons/sprites.svg#github"></use>
											</svg>
											GitHub
										</a>
										<a
											href="#"
											target="_blank"
											rel="noopener noreferrer"
											class="btn btn--primary btn--sm"
										>
											<svg
												class="btn__icon"
												width="20"
												height="20"
												aria-hidden="true"
											>
												<use href="/icons/sprites.svg#demo"></use>
											</svg>
											Demo
										</a>
									</div>
								</div>

								<div
									class="project-item"
									data-category="frontend"
									onclick="selectProject(4)"
								>
									<h3 class="project-item__name">Landing page</h3>
									<div class="project-item__actions">
										<a href="#" class="btn btn--outline btn--sm">
											<svg
												class="btn__icon"
												width="20"
												height="20"
												aria-hidden="true"
											>
												<use href="/icons/sprites.svg#github"></use>
											</svg>
											GitHub
										</a>
										<a
											href="#"
											target="_blank"
											rel="noopener noreferrer"
											class="btn btn--primary btn--sm"
										>
											<svg
												class="btn__icon"
												width="20"
												height="20"
												aria-hidden="true"
											>
												<use href="/icons/sprites.svg#demo"></use>
											</svg>
											Demo
										</a>
									</div>
								</div>
							</div>

							<!-- Navigation -->
							<div class="projects__nav">
								<div class="projects__arrows">
									<button
										class="projects__arrow"
										id="prevBtn"
										onclick="prevProject()"
										aria-label="Предыдущий проект"
										disabled
									>
										<svg
											class="sprites badge__icon projects__arrow-left"
											aria-hidden="true"
										>
											<use href="/icons/sprites.svg#arrow-left"></use>
										</svg>
									</button>
									<span class="projects__counter" id="projectsCounter"
										>1 / 5</span
									>
									<button
										class="projects__arrow"
										id="nextBtn"
										onclick="nextProject()"
										aria-label="Следующий проект"
									>
										<svg
											class="sprites badge__icon projects__arrow-right"
											aria-hidden="true"
										>
											<use href="/icons/sprites.svg#arrow-right"></use>
										</svg>
									</button>
								</div>
							</div>
						</div>

						<!-- 2/3 — detail -->
						<div class="projects__detail">
							<div class="project-detail card active" id="project-0">
								<div class="project-detail__image-wrap">
									<picture>
										<source
											srcset="/images/projects/bozheslav.webp"
											type="image/webp"
										/>
										<img
											src="/images/projects/bozheslav.jpg"
											alt="Скриншот проекта bozheslav.ru"
											class="project-detail__image"
											loading="lazy"
										/>
									</picture>
								</div>
								<div class="card__body">
									<h3 class="project-detail__title">bozheslav.ru</h3>
									<p class="project-detail__desc">
										Личный сайт-портфолио с блогом. Полный цикл от вёрстки до
										деплоя на собственном VPS. Настроен nginx, SSL-сертификат,
										Laravel на php-fpm.
									</p>
									<div class="project-detail__tags">
										<span
											class="badge badge__portfolio portfolio-tag"
											data-filter="devops"
											>DevOps</span
										>
										<span
											class="badge badge__portfolio portfolio-tag"
											data-filter="backend"
											>Laravel</span
										>
										<span
											class="badge badge__portfolio portfolio-tag"
											data-filter="backend"
											>PostgreSQL</span
										>
										<span
											class="badge badge__portfolio portfolio-tag"
											data-filter="frontend"
											>HTML/CSS</span
										>
										<span
											class="badge badge__portfolio portfolio-tag"
											data-filter="frontend"
											>JavaScript</span
										>
									</div>
									<div class="project-detail__actions">
										<a href="#" class="btn btn--outline btn--sm">
											<svg
												class="btn__icon"
												width="20"
												height="20"
												aria-hidden="true"
											>
												<use href="/icons/sprites.svg#github"></use>
											</svg>
											GitHub
										</a>
										<a
											href="https://bozheslav.ru"
											target="_blank"
											rel="noopener noreferrer"
											class="btn btn--primary btn--sm"
										>
											<svg
												class="btn__icon"
												width="20"
												height="20"
												aria-hidden="true"
											>
												<use href="/icons/sprites.svg#demo"></use>
											</svg>
											Demo
										</a>
									</div>
								</div>
							</div>

							<div class="project-detail card" id="project-1">
								<div class="project-detail__image-wrap">
									<picture>
										<source
											srcset="/images/projects/bot.webp"
											type="image/webp"
										/>
										<img
											src="/images/projects/bot.jpg"
											alt="Скриншот проекта Telegram Bot + n8n"
											class="project-detail__image"
											loading="lazy"
										/>
									</picture>
								</div>
								<div class="card__body">
									<h3 class="project-detail__title">Telegram Bot + n8n</h3>
									<p class="project-detail__desc">
										Автоматизация на базе n8n с интеграцией Telegram Bot API и
										OpenAI. Бот принимает сообщения и отвечает с помощью GPT.
										Развёрнут на собственном сервере через Docker Compose.
									</p>
									<div class="project-detail__tags">
										<span
											class="badge badge__portfolio portfolio-tag"
											data-filter="automation"
											>n8n</span
										>
										<span
											class="badge badge__portfolio portfolio-tag"
											data-filter="automation"
											>Telegram Bot API</span
										>
										<span
											class="badge badge__portfolio portfolio-tag"
											data-filter="automation"
											>OpenAI API</span
										>
										<span
											class="badge badge__portfolio portfolio-tag"
											data-filter="devops"
											>Docker</span
										>
									</div>
									<div class="project-detail__actions">
										<a href="#" class="btn btn--outline btn--sm">
											<svg
												class="btn__icon"
												width="20"
												height="20"
												aria-hidden="true"
											>
												<use href="/icons/sprites.svg#github"></use>
											</svg>
											GitHub
										</a>
										<a
											href="#"
											target="_blank"
											rel="noopener noreferrer"
											class="btn btn--primary btn--sm"
										>
											<svg
												class="btn__icon"
												width="20"
												height="20"
												aria-hidden="true"
											>
												<use href="/icons/sprites.svg#demo"></use>
											</svg>
											Demo
										</a>
									</div>
								</div>
							</div>

							<div class="project-detail card" id="project-2">
								<div class="project-detail__image-wrap">
									<picture>
										<source
											srcset="/images/projects/landing.webp"
											type="image/webp"
										/>
										<img
											src="/images/projects/landing.jpg"
											alt="Скриншот Landing page"
											class="project-detail__image"
											loading="lazy"
										/>
									</picture>
								</div>
								<div class="card__body">
									<h3 class="project-detail__title">Landing page</h3>
									<p class="project-detail__desc">
										Дипломная работа модуля 2. Вёрстка по Figma-макету,
										адаптивный дизайн, BEM-методология. Hover-эффекты
										реализованы самостоятельно.
									</p>
									<div class="project-detail__tags">
										<span
											class="badge badge__portfolio portfolio-tag"
											data-filter="frontend"
											>HTML</span
										>
										<span
											class="badge badge__portfolio portfolio-tag"
											data-filter="frontend"
											>CSS</span
										>
										<span
											class="badge badge__portfolio portfolio-tag"
											data-filter="frontend"
											>BEM</span
										>
										<span
											class="badge badge__portfolio portfolio-tag"
											data-filter="frontend"
											>JavaScript</span
										>
									</div>
									<div class="project-detail__actions">
										<a href="#" class="btn btn--outline btn--sm">
											<svg
												class="btn__icon"
												width="20"
												height="20"
												aria-hidden="true"
											>
												<use href="/icons/sprites.svg#github"></use>
											</svg>
											GitHub
										</a>
										<a
											href="#"
											target="_blank"
											rel="noopener noreferrer"
											class="btn btn--primary btn--sm"
										>
											<svg
												class="btn__icon"
												width="20"
												height="20"
												aria-hidden="true"
											>
												<use href="/icons/sprites.svg#demo"></use>
											</svg>
											Demo
										</a>
									</div>
								</div>
							</div>

							<div class="project-detail card" id="project-3">
								<div class="project-detail__image-wrap">
									<picture>
										<source
											srcset="/images/projects/landing-2.webp"
											type="image/webp"
										/>
										<img
											src="/images/projects/landing-2.jpg"
											alt="Скриншот Landing page"
											class="project-detail__image"
											loading="lazy"
										/>
									</picture>
								</div>
								<div class="card__body">
									<h3 class="project-detail__title">Landing page</h3>
									<p class="project-detail__desc">
										Вёрстка лендинга по макету. Адаптивный дизайн, анимации на
										CSS.
									</p>
									<div class="project-detail__tags">
										<span
											class="badge badge__portfolio portfolio-tag"
											data-filter="frontend"
											>HTML</span
										>
										<span
											class="badge badge__portfolio portfolio-tag"
											data-filter="frontend"
											>CSS</span
										>
										<span
											class="badge badge__portfolio portfolio-tag"
											data-filter="frontend"
											>JavaScript</span
										>
									</div>
									<div class="project-detail__actions">
										<a href="#" class="btn btn--outline btn--sm">
											<svg
												class="btn__icon"
												width="20"
												height="20"
												aria-hidden="true"
											>
												<use href="/icons/sprites.svg#github"></use>
											</svg>
											GitHub
										</a>
										<a
											href="#"
											target="_blank"
											rel="noopener noreferrer"
											class="btn btn--primary btn--sm"
										>
											<svg
												class="btn__icon"
												width="20"
												height="20"
												aria-hidden="true"
											>
												<use href="/icons/sprites.svg#demo"></use>
											</svg>
											Demo
										</a>
									</div>
								</div>
							</div>

							<div class="project-detail card" id="project-4">
								<div class="project-detail__image-wrap">
									<picture>
										<source
											srcset="/images/projects/landing-3.webp"
											type="image/webp"
										/>
										<img
											src="/images/projects/landing-3.jpg"
											alt="Скриншот Landing page"
											class="project-detail__image"
											loading="lazy"
										/>
									</picture>
								</div>
								<div class="card__body">
									<h3 class="project-detail__title">Landing page</h3>
									<p class="project-detail__desc">
										Вёрстка лендинга по макету. Адаптивный дизайн, анимации на
										CSS.
									</p>
									<div class="project-detail__tags">
										<span
											class="badge badge__portfolio portfolio-tag"
											data-filter="frontend"
											>HTML</span
										>
										<span
											class="badge badge__portfolio portfolio-tag"
											data-filter="frontend"
											>CSS</span
										>
										<span
											class="badge badge__portfolio portfolio-tag"
											data-filter="frontend"
											>JavaScript</span
										>
									</div>
									<div class="project-detail__actions">
										<a href="#" class="btn btn--outline btn--sm">
											<svg
												class="btn__icon"
												width="20"
												height="20"
												aria-hidden="true"
											>
												<use href="/icons/sprites.svg#github"></use>
											</svg>
											GitHub
										</a>
										<a
											href="#"
											target="_blank"
											rel="noopener noreferrer"
											class="btn btn--primary btn--sm"
										>
											<svg
												class="btn__icon"
												width="20"
												height="20"
												aria-hidden="true"
											>
												<use href="/icons/sprites.svg#demo"></use>
											</svg>
											Demo
										</a>
									</div>
								</div>
							</div>
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
							<a
								href="https://t.me/username"
								target="_blank"
								rel="noopener noreferrer"
								class="btn btn--primary btn--lg"
							>
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
											<a
												href="https://t.me/username"
												target="_blank"
												rel="noopener noreferrer"
												>@username</a
											>
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
											<a href="mailto:mail@bozheslav.ru">mail@bozheslav.ru</a>
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
											<a
												href="https://github.com/username"
												target="_blank"
												rel="noopener noreferrer"
												>github.com/username</a
											>
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
