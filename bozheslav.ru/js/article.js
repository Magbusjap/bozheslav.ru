const ARTICLES = {
	"vps-setup": {
		title: "Как я поднял свой первый VPS",
		category: "devops",
		categoryLabel: "DevOps",
		date: "2025-03-10",
		dateLabel: "10 марта 2025",
		readTime: "7 мин",
		cover: "/images/blog/post-1.jpg",
		coverWebp: "/images/blog/post-1.webp",
		content: `
			<p>Когда я решил перенести свои проекты с shared-хостинга на VPS, казалось что это будет просто. Спойлер: нет.</p>

			<h2>С чего начать</h2>
			<p>Я выбрал Timeweb Cloud — доступные тарифы, нормальная панель управления, сервера в России. Ubuntu 24.04 как операционная система.</p>

			<h2>nginx</h2>
			<p>Первое что нужно настроить — веб-сервер. nginx быстрее Apache и проще в конфигурации для моих задач.</p>
			<pre><code>sudo apt install nginx
sudo systemctl enable nginx</code></pre>

			<h2>SSL через Let's Encrypt</h2>
			<p>Certbot делает это в две команды. Главное — не платить за SSL если можно получить бесплатно.</p>
			<pre><code>sudo apt install certbot python3-certbot-nginx
sudo certbot --nginx -d yourdomain.ru</code></pre>

			<h2>Что пошло не так</h2>
			<p>PostgreSQL 16 требует явного указания прав на схему public. Потерял на этом час. Теперь знаю.</p>

			<h2>Итог</h2>
			<p>VPS — это не страшно. Это просто Linux с доступом по SSH. Если умеешь гуглить и читать документацию — разберёшься.</p>
		`,
	},
	"bem-methodology": {
		title: "BEM: почему я наконец понял методологию",
		category: "frontend",
		categoryLabel: "Frontend",
		date: "2025-02-20",
		dateLabel: "20 февраля 2025",
		readTime: "5 мин",
		cover: "/images/blog/post-2.jpg",
		coverWebp: "/images/blog/post-2.webp",
		content: `
			<p>Долго не мог принять BEM. Казалось что длинные имена классов — это лишнее. Пока не начал работать над большим проектом.</p>

			<h2>Что такое BEM</h2>
			<p>Block, Element, Modifier. Система именования CSS-классов которая делает код предсказуемым и масштабируемым.</p>

			<h2>Почему я сопротивлялся</h2>
			<p>Писать <code>.card__body--active</code> вместо просто <code>.active</code> казалось многословным. Но потом я понял: <code>.active</code> ничего не говорит о контексте.</p>

			<h2>Где это реально помогло</h2>
			<p>Когда я верстал портфолио с десятком блоков — BEM позволил не думать о конфликтах. Каждый блок изолирован.</p>

			<h2>Итог</h2>
			<p>BEM — это договорённость. Как только принял её, код стал читаемее и CSS-файлы перестали превращаться в кашу.</p>
		`,
	},
	"clean-code": {
		title: "Книга: Чистый код",
		category: "books",
		categoryLabel: "Книги",
		date: "2025-01-15",
		dateLabel: "15 января 2025",
		readTime: "4 мин",
		cover: "/images/blog/post-3.jpg",
		coverWebp: "/images/blog/post-3.webp",
		content: `
			<p>«Чистый код» Роберта Мартина — одна из тех книг которые все советуют. Прочитал. Вот честный разбор.</p>

			<h2>Что взял для себя</h2>
			<p>Функции должны делать одно. Имена должны объяснять намерение. Комментарий — признак того что код недостаточно говорит сам за себя.</p>

			<h2>Что показалось спорным</h2>
			<p>Некоторые примеры из Java выглядят избыточно для небольших проектов. Не всегда нужно дробить на десять классов то что читается в одном.</p>

			<h2>Вывод</h2>
			<p>Читать стоит. Применять — с умом, не буквально. Принципы важнее правил.</p>
		`,
	},
	"laravel-first-steps": {
		title: "Laravel: первые шаги",
		category: "backend",
		categoryLabel: "Backend",
		date: "2025-01-05",
		dateLabel: "5 января 2025",
		readTime: "6 мин",
		cover: "/images/blog/post-4.jpg",
		coverWebp: "/images/blog/post-4.webp",
		content: `
			<p>После чистого HTML переход на Laravel ощущается как прыжок в другой мир. Но это хороший мир.</p>

			<h2>Что удивило</h2>
			<p>Artisan — консольный инструмент Laravel — делает рутину за тебя. Создать модель, миграцию, контроллер одной командой.</p>

			<h2>Blade-шаблоны</h2>
			<p>Это то к чему я шёл — компонентный подход без JS-фреймворка. <code>@include</code>, <code>@component</code>, <code>@yield</code> — просто и понятно.</p>

			<h2>Что показалось сложным</h2>
			<p>Eloquent ORM поначалу магический. Не всегда понятно что происходит под капотом. Помогло чтение SQL-логов.</p>

			<h2>Итог</h2>
			<p>Laravel — хороший выбор для старта с бэкендом если уже знаешь PHP хотя бы базово.</p>
		`,
	},
	"manufacturing-to-it": {
		title: "Как я перешёл из производства в IT",
		category: "other",
		categoryLabel: "Разное",
		date: "2024-12-01",
		dateLabel: "1 декабря 2024",
		readTime: "8 мин",
		cover: "/images/blog/post-5.jpg",
		coverWebp: "/images/blog/post-5.webp",
		content: `
			<p>Два года я ремонтировал измерительные инструменты на заводе. Штангенциркули, микрометры, точность до микрона. И параллельно учил HTML.</p>

			<h2>Почему решил менять</h2>
			<p>Не потому что было плохо. А потому что программирование давало то чего не было на заводе — видимый результат и возможность строить что-то своё.</p>

			<h2>Что взял с производства</h2>
			<p>Системный подход. Привычку проверять дважды. Понимание что монотонный труд — это не наказание а инструмент.</p>

			<h2>Как учился</h2>
			<p>Структурированный курс плюс реальные проекты. Без курса было бы медленнее, без проектов — бесполезно.</p>

			<h2>Итог</h2>
			<p>Переход занял больше времени чем хотелось. Но каждый месяц был прогресс. Это главное.</p>
		`,
	},
	"docker-compose": {
		title: "Docker Compose: что это и зачем",
		category: "devops",
		categoryLabel: "DevOps",
		date: "2024-11-15",
		dateLabel: "15 ноября 2024",
		readTime: "5 мин",
		cover: "/images/blog/post-6.jpg",
		coverWebp: "/images/blog/post-6.webp",
		content: `
			<p>Docker я понял быстро. Docker Compose потребовал чуть больше времени — но теперь не представляю деплой без него.</p>

			<h2>Проблема которую решает Compose</h2>
			<p>Когда у тебя три контейнера — приложение, база данных, nginx — запускать каждый вручную неудобно. Compose описывает всё в одном файле.</p>

			<h2>Базовый docker-compose.yml</h2>
			<pre><code>services:
  app:
    build: .
    ports:
      - "8000:8000"
  db:
    image: postgres:16
    environment:
      POSTGRES_PASSWORD: secret</code></pre>

			<h2>Как использую на сервере</h2>
			<p>n8n, вспомогательные сервисы — всё через Compose. Один <code>docker compose up -d</code> и всё работает.</p>

			<h2>Итог</h2>
			<p>Compose — обязательный инструмент если работаешь с Docker. Учить сразу вместе с Docker, не после.</p>
		`,
	},
};

const ARTICLE_KEYS = Object.keys(ARTICLES);

function getArticleSlug() {
	const params = new URLSearchParams(window.location.search);
	return params.get("slug");
}

function renderMeta(article) {
	const container = document.getElementById("articleMeta");
	if (!container) return;
	container.innerHTML = `
		<span class="badge badge__blog">${article.categoryLabel}</span>
		<span class="article-page__meta-group">
			<svg class="sprites badge__icon" aria-hidden="true">
				<use href="/icons/sprites.svg#calendar"></use>
			</svg>
			<time datetime="${article.date}">${article.dateLabel}</time>
		</span>
		<span class="article-page__meta-group">
			<svg class="sprites badge__icon" aria-hidden="true">
				<use href="/icons/sprites.svg#clock"></use>
			</svg>
			${article.readTime}
		</span>
	`;
}

function renderCover(article) {
	const container = document.getElementById("articleCover");
	if (!container) return;
	container.innerHTML = `
		<picture>
			<source srcset="${article.coverWebp}" type="image/webp" />
			<img
				src="${article.cover}"
				alt="${article.title}"
				class="article-page__cover-img"
				loading="eager"
			/>
		</picture>
	`;
}

function renderNav(currentSlug) {
	const container = document.getElementById("articleNav");
	if (!container) return;

	const currentIndex = ARTICLE_KEYS.indexOf(currentSlug);
	const prevSlug = ARTICLE_KEYS[currentIndex + 1];
	const nextSlug = ARTICLE_KEYS[currentIndex - 1];

	const prevArticle = prevSlug ? ARTICLES[prevSlug] : null;
	const nextArticle = nextSlug ? ARTICLES[nextSlug] : null;

	container.innerHTML = `
		<div class="article-nav__prev">
			${
				prevArticle
					? `
				<a href="/article.html?slug=${prevSlug}" class="article-nav__link">
					<span class="article-nav__label">← Предыдущая</span>
					<span class="article-nav__title">${prevArticle.title}</span>
				</a>
			`
					: ""
			}
		</div>
		<div class="article-nav__next">
			${
				nextArticle
					? `
				<a href="/article.html?slug=${nextSlug}" class="article-nav__link article-nav__link--right">
					<span class="article-nav__label">Следующая →</span>
					<span class="article-nav__title">${nextArticle.title}</span>
				</a>
			`
					: ""
			}
		</div>
	`;
}

export function initArticle() {
	if (!document.getElementById("articleTitle")) return;

	const slug = getArticleSlug();
	const article = slug ? ARTICLES[slug] : null;

	if (!article) {
		document.getElementById("articleTitle").textContent = "Статья не найдена";
		return;
	}

	// Page tab title
	document.title = `${article.title} — Михаил Божеслав`;

	document.getElementById("articleTitle").textContent = article.title;
	document.getElementById("articleContent").innerHTML = article.content;

	renderMeta(article);
	renderCover(article);
	renderNav(slug);
}
