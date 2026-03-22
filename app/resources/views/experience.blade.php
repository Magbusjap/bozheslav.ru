<!doctype html>
<html lang="ru">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="/css/index.css" />
		<link rel="shortcut icon" href="/icons/favicon.ico" type="image/x-icon" />
		<title>Опыт — Михаил Божеслав</title>
	</head>
	<body>
		<x-admin-bar 
			:editUrl="'/admin'"
			editLabel="Редактировать страницу"
		/>

		<div id="header"></div>

		<main class="main">
			<section class="section experience-page" id="experience">
				<div class="container experience-page__container">
					<div class="experience-page__header">
						<h1 class="experience-page__title">Опыт</h1>
						<p class="experience-page__desc">
							Хронология того, чем занимался — от работы по найму до личных
							проектов и обучения.
						</p>
					</div>

					<div class="experience-timeline">
						<!-- Personal project -->
						<div class="exp-entry exp-entry--project">
							<div class="exp-entry__marker">
								<span class="exp-entry__icon">
									<svg class="sprites badge__icon" aria-hidden="true">
										<use href="/icons/sprites.svg#folder-data-storage"></use>
									</svg>
								</span>
								<span class="exp-entry__line"></span>
							</div>
							<div class="exp-entry__body card">
								<div class="card__body">
									<div class="exp-entry__head">
										<div>
											<h3 class="exp-entry__title">
												bozheslav.ru — личный сайт-портфолио
											</h3>
											<span class="exp-entry__type">Личный проект</span>
										</div>
										<time class="exp-entry__date">2025 — н.в.</time>
									</div>
									<p class="exp-entry__desc">
										Разработал с нуля и задеплоил на VPS. HTML/CSS/JS на фронте,
										Laravel + PostgreSQL на бэке, nginx + Let's Encrypt. Веду
										блог, портфолио, страницы навыков и опыта.
									</p>
									<div class="exp-entry__tags">
										<span class="badge badge--outline">HTML/CSS</span>
										<span class="badge badge--outline">JavaScript</span>
										<span class="badge badge--outline">Laravel</span>
										<span class="badge badge--outline">PostgreSQL</span>
										<span class="badge badge--outline">nginx</span>
										<span class="badge badge--outline">VPS</span>
									</div>
								</div>
							</div>
						</div>

						<!-- Course -->
						<div class="exp-entry exp-entry--course">
							<div class="exp-entry__marker">
								<span class="exp-entry__icon">
									<svg class="sprites badge__icon" aria-hidden="true">
										<use href="/icons/sprites.svg#programming"></use>
									</svg>
								</span>
								<span class="exp-entry__line"></span>
							</div>
							<div class="exp-entry__body card">
								<div class="card__body">
									<div class="exp-entry__head">
										<div>
											<h3 class="exp-entry__title">
												Курс: HTML, CSS, JavaScript
											</h3>
											<span class="exp-entry__type">Курс / обучение</span>
										</div>
										<time class="exp-entry__date">2024 — н.в.</time>
									</div>
									<p class="exp-entry__desc">
										Прохожу структурированный курс по веб-разработке. Модули:
										HTML → CSS → BEM → JavaScript. Сейчас в середине JS-модуля.
										Дипломные работы реализованы как реальные проекты.
									</p>
									<div class="exp-entry__tags">
										<span class="badge badge--outline">HTML</span>
										<span class="badge badge--outline">CSS</span>
										<span class="badge badge--outline">BEM</span>
										<span class="badge badge--outline">JavaScript</span>
									</div>
								</div>
							</div>
						</div>

						<!-- Personal project -->
						<div class="exp-entry exp-entry--project">
							<div class="exp-entry__marker">
								<span class="exp-entry__icon">
									<svg class="sprites badge__icon" aria-hidden="true">
										<use href="/icons/sprites.svg#folder-data-storage"></use>
									</svg>
								</span>
								<span class="exp-entry__line"></span>
							</div>
							<div class="exp-entry__body card">
								<div class="card__body">
									<div class="exp-entry__head">
										<div>
											<h3 class="exp-entry__title">
												Telegram Bot + n8n + OpenAI
											</h3>
											<span class="exp-entry__type">Личный проект</span>
										</div>
										<time class="exp-entry__date">2024</time>
									</div>
									<p class="exp-entry__desc">
										Автоматизация на базе n8n: Telegram-бот принимает сообщения
										и отвечает через GPT. Развёрнут на собственном сервере через
										Docker Compose.
									</p>
									<div class="exp-entry__tags">
										<span class="badge badge--outline">n8n</span>
										<span class="badge badge--outline">Telegram Bot API</span>
										<span class="badge badge--outline">OpenAI API</span>
										<span class="badge badge--outline">Docker</span>
									</div>
								</div>
							</div>
						</div>

						<!-- Freelance -->
						<div class="exp-entry exp-entry--freelance">
							<div class="exp-entry__marker">
								<span class="exp-entry__icon">
									<svg class="sprites badge__icon" aria-hidden="true">
										<use href="/icons/sprites.svg#handshake"></use>
									</svg>
								</span>
								<span class="exp-entry__line"></span>
							</div>
							<div class="exp-entry__body card">
								<div class="card__body">
									<div class="exp-entry__head">
										<div>
											<h3 class="exp-entry__title">Фриланс-заказы на Kwork</h3>
											<span class="exp-entry__type">Фриланс</span>
										</div>
										<time class="exp-entry__date">2024 — н.в.</time>
									</div>
									<p class="exp-entry__desc">
										Выполняю заказы по вёрстке лендингов и небольших сайтов.
										Работаю с реальными клиентами, есть отзывы на платформе.
									</p>
									<div class="exp-entry__tags">
										<span class="badge badge--outline">HTML/CSS</span>
										<span class="badge badge--outline">Вёрстка</span>
										<span class="badge badge--outline">Kwork</span>
									</div>
								</div>
							</div>
						</div>

						<!-- Employment -->
						<div class="exp-entry exp-entry--job">
							<div class="exp-entry__marker">
								<span class="exp-entry__icon">
									<svg class="sprites badge__icon" aria-hidden="true">
										<use href="/icons/sprites.svg#devops"></use>
									</svg>
								</span>
								<span class="exp-entry__line"></span>
							</div>
							<div class="exp-entry__body card">
								<div class="card__body">
									<div class="exp-entry__head">
										<div>
											<h3 class="exp-entry__title">Производственный инженер</h3>
											<span class="exp-entry__type">Работа по найму</span>
										</div>
										<time class="exp-entry__date">2022 — 2024</time>
									</div>
									<p class="exp-entry__desc">
										Ремонтировал и доводил измерительные инструменты. Монотонный
										труд с высокой точностью сформировал системный подход и
										концентрацию — качества, которые напрямую перенёс в
										программирование.
									</p>
									<div class="exp-entry__tags">
										<span class="badge badge--outline">Точная механика</span>
										<span class="badge badge--outline">Системный подход</span>
									</div>
								</div>
							</div>
						</div>

						<!-- Employment -->
						<div class="exp-entry exp-entry--job">
							<div class="exp-entry__marker">
								<span class="exp-entry__icon">
									<svg class="sprites badge__icon" aria-hidden="true">
										<use href="/icons/sprites.svg#devops"></use>
									</svg>
								</span>
								<span class="exp-entry__line"></span>
							</div>
							<div class="exp-entry__body card">
								<div class="card__body">
									<div class="exp-entry__head">
										<div>
											<h3 class="exp-entry__title">
												Специалист по системам и данным
											</h3>
											<span class="exp-entry__type exp-entry__company"
												>Витамилк / Ростелеком · 2016 — 2022</span
											>
										</div>
										<time class="exp-entry__date">2016 — 2022</time>
									</div>
									<p class="exp-entry__desc">
										Работал в CRM (1С, СБИС, Инфо-Предприятие), обрабатывал
										претензии, занимался логистикой. Создавал корпоративный сайт
										на WordPress. Понял как данные движутся по системе и как
										пользователь взаимодействует с интерфейсом.
									</p>
									<div class="exp-entry__tags">
										<span class="badge badge--outline">СБИС</span>
										<span class="badge badge--outline">1С Предприятие</span>
										<span class="badge badge--outline">WordPress</span>
									</div>
								</div>
							</div>
						</div>

						<!-- Course / self-study -->
						<div class="exp-entry exp-entry--course">
							<div class="exp-entry__marker">
								<span class="exp-entry__icon">
									<svg class="sprites badge__icon" aria-hidden="true">
										<use href="/icons/sprites.svg#programming"></use>
									</svg>
								</span>
								<span class="exp-entry__line"></span>
							</div>
							<div class="exp-entry__body card">
								<div class="card__body">
									<div class="exp-entry__head">
										<div>
											<h3 class="exp-entry__title">
												Самообучение: C#, Python, WordPress
											</h3>
											<span class="exp-entry__type">Курс / обучение</span>
										</div>
										<time class="exp-entry__date">2013 — 2022</time>
									</div>
									<p class="exp-entry__desc">
										Первые правки в шаблонах WordPress в 2013-м. Затем
										самостоятельное изучение C# и Python — алгоритмы, ООП,
										базовые скрипты. Не применял в продакшне, но заложил
										понимание программирования как системы.
									</p>
									<div class="exp-entry__tags">
										<span class="badge badge--outline">WordPress</span>
										<span class="badge badge--outline">C#</span>
										<span class="badge badge--outline">Python</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="experience-page__more">
						<button class="btn btn--outline" id="expLoadMore">
							Показать ещё..
						</button>
					</div>
				</div>
			</section>
		</main>

		<div id="footer"></div>
		<script defer src="/js/index.js" type="module"></script>
	</body>
</html>
