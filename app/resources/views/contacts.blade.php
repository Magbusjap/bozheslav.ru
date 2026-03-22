<!doctype html>
<html lang="ru">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="/css/index.css" />
		<link rel="shortcut icon" href="/icons/favicon.ico" type="image/x-icon" />
		<title>Контакты — Михаил Божеслав</title>
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
			<!-- Contacts page -->
			<section class="section contacts-page" id="contact">
				<div class="container contacts-page__container">
					<div class="contacts-page__header">
						<h1 class="contacts-page__title">Есть задача — давай решим</h1>
						<p class="contacts-page__desc">
							Верстаю, настраиваю серверы, автоматизирую. Если вам нужен человек
							который разберётся сам — напишите.
						</p>
					</div>

					<div class="contacts-page__grid">
						<!-- Info cards -->
						<div class="contacts-page__info">
							<div class="card">
								<div class="card__body">
									<div class="contacts-page__info-row">
										<svg
											class="sprites badge__icon contacts-page__info-icon"
											aria-hidden="true"
										>
											<use href="/icons/sprites.svg#email"></use>
										</svg>
										<div>
											<h4 class="contacts-page__info-label">Почта</h4>
											<p class="contacts-page__info-value">i@mankudinov.ru</p>
										</div>
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card__body">
									<div class="contacts-page__info-row">
										<svg
											class="sprites badge__icon contacts-page__info-icon"
											aria-hidden="true"
										>
											<use href="/icons/sprites.svg#phone"></use>
										</svg>
										<div>
											<h4 class="contacts-page__info-label">Телефон</h4>
											<p class="contacts-page__info-value">+7 (995) 6907083</p>
										</div>
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card__body">
									<div class="contacts-page__info-row">
										<svg
											class="sprites badge__icon contacts-page__info-icon"
											aria-hidden="true"
										>
											<use href="/icons/sprites.svg#location"></use>
										</svg>
										<div>
											<h4 class="contacts-page__info-label">
												Текущее местоположение
											</h4>
											<p class="contacts-page__info-value">
												Пермь, Россия · Удалённая работа
											</p>
										</div>
									</div>
								</div>
							</div>
						</div>

						<!-- Form card -->
						<div class="card">
							<div class="card__header">
								<h3 class="card__title">Оставить контакты для связи</h3>
							</div>
							<div class="card__body">
								<form class="contacts-page__form" id="contactForm">
									<div class="contacts-page__form-row">
										<input
											class="input"
											type="text"
											placeholder="Ваше имя"
											required
										/>
										<input
											class="input"
											type="email"
											placeholder="Ваша почта"
											required
										/>
									</div>
									<input class="input" type="text" placeholder="Тема письма" />
									<textarea
										class="input input--textarea"
										placeholder="Ваше сообщение"
										rows="5"
									></textarea>
									<button type="submit" class="btn btn--primary btn--full">
										<svg class="sprites badge__icon" aria-hidden="true">
											<use href="/icons/sprites.svg#telegram"></use>
										</svg>
										Отправить
									</button>
								</form>
							</div>
						</div>
					</div>

					<div class="contacts-page__socials">
						<strong class="contacts-page__find">Вы можете найти меня здесь:</strong>
						<div class="hero__socials">
							<a
								href="#"
								class="btn btn--ghost btn--icon btn--circle"
								aria-label="GitHub"
							>
								<svg class="sprites" aria-hidden="true">
									<use href="/icons/sprites.svg#github"></use>
								</svg>
							</a>
							<a
								href="#"
								class="btn btn--ghost btn--icon btn--circle"
								aria-label="Telegram"
							>
								<svg class="sprites" aria-hidden="true">
									<use href="/icons/sprites.svg#telegram"></use>
								</svg>
							</a>
							<a
								href="#"
								class="btn btn--ghost btn--icon btn--circle"
								aria-label="Email"
							>
								<svg class="sprites" aria-hidden="true">
									<use href="/icons/sprites.svg#email"></use>
								</svg>
							</a>
						</div>
					</div>
				</div>
			</section>
		</main>

		<div id="footer"></div>
		<script defer src="/js/index.js" type="module"></script>
	</body>
</html>
