const SKILLS = {
	html: {
		title: "HTML",
		level: 90,
		desc: "Уверенно верстаю семантическую разметку. Знаю структуру документа, работаю с формами, таблицами, медиа-элементами. Использую picture/source для WebP. Понимаю доступность (aria-атрибуты).",
	},
	css: {
		title: "CSS",
		level: 85,
		desc: "Flexbox, Grid, CSS-переменные, анимации, псевдоэлементы. Работаю с адаптивной вёрсткой через media queries. Пишу по методологии BEM, CSS разбит на блоки.",
	},
	bem: {
		title: "BEM",
		level: 80,
		desc: "Применяю методологию БЭМ на всех проектах. Понимаю разницу между блоком, элементом и модификатором. CSS-файлы организованы по блокам.",
	},
	javascript: {
		title: "JavaScript",
		level: 55,
		desc: "Прохожу курс, нахожусь в середине. Умею работать с DOM, событиями, fetch, ES-модулями. Реализовал typewriter-эффект, sliding window, фильтрацию с пагинацией.",
	},
	tailwind: {
		title: "Tailwind CSS",
		level: 50,
		desc: "Знаком с утилитарным подходом, использовал в Laravel-проектах. Понимаю конфигурацию и кастомизацию через tailwind.config.",
	},
	responsive: {
		title: "Responsive Design",
		level: 80,
		desc: "Верстаю mobile-first или desktop-first в зависимости от задачи. Работаю с breakpoints, fluid-сетками, адаптивными изображениями.",
	},
	laravel: {
		title: "Laravel",
		level: 45,
		desc: "Развернул Laravel на VPS с php-fpm и nginx. Понимаю маршрутизацию, Blade-шаблоны, Eloquent ORM. Планирую интеграцию Filament для admin-панели.",
	},
	php: {
		title: "PHP",
		level: 40,
		desc: "Базовый PHP — синтаксис, функции, работа с массивами и строками. Использую в контексте Laravel, не как самостоятельный язык.",
	},
	linux: {
		title: "Linux (Ubuntu)",
		level: 65,
		desc: "Администрирую VPS на Ubuntu 24.04. Работаю с SSH, systemd, правами доступа, cron. Настраивал nginx, php-fpm, PostgreSQL, Let's Encrypt.",
	},
	nginx: {
		title: "Nginx",
		level: 60,
		desc: "Настраиваю виртуальные хосты, SSL-сертификаты, проксирование на php-fpm. Понимаю конфигурацию server block и location.",
	},
	docker: {
		title: "Docker",
		level: 55,
		desc: "Понимаю концепцию контейнеров, умею писать Dockerfile. Использовал для деплоя n8n и других сервисов на сервере.",
	},
	"docker-compose": {
		title: "Docker Compose",
		level: 55,
		desc: "Описываю многоконтейнерные приложения через docker-compose.yml. Настраивал сети, volumes, переменные окружения.",
	},
	git: {
		title: "Git",
		level: 60,
		desc: "Ежедневно использую Git для версионирования. Понимаю ветки, merge, rebase. Проекты выложены на GitHub с осмысленными коммитами.",
	},
	figma: {
		title: "Figma",
		level: 50,
		desc: "Читаю макеты, извлекаю отступы, цвета, шрифты. Использовал для создания собственного дизайна портфолио на основе шаблонов.",
	},
	n8n: {
		title: "n8n",
		level: 65,
		desc: "Строил автоматизации с Telegram Bot API и OpenAI. Понимаю ноды, вебхуки, HTTP-запросы, обработку данных внутри workflow.",
	},
	"telegram-bot": {
		title: "Telegram Bot API",
		level: 60,
		desc: "Создавал ботов с обработкой сообщений, командами, вебхуками. Интегрировал с n8n и OpenAI API.",
	},
	openai: {
		title: "OpenAI API",
		level: 55,
		desc: "Работал с Chat Completions API. Настраивал system prompt, передавал контекст диалога, управлял параметрами модели.",
	},
	"claude-api": {
		title: "Claude API",
		level: 50,
		desc: "Знаком с Anthropic API, понимаю отличия от OpenAI. Использовал в экспериментальных проектах.",
	},
	postgresql: {
		title: "PostgreSQL",
		level: 55,
		desc: "Настраивал PostgreSQL 16 на VPS. Понимаю схемы, роли, права доступа. Работаю через Laravel Eloquent и напрямую через psql.",
	},
	mysql: {
		title: "MySQL",
		level: 40,
		desc: "Базовый опыт — SELECT, INSERT, JOIN, индексы. Использовал в учебных проектах и WordPress.",
	},
	wordpress: {
		title: "WordPress",
		level: 50,
		desc: "Создавал корпоративный сайт, работал с темами и плагинами. Сейчас не использую — перешёл на Laravel.",
	},
	csharp: {
		title: "C#",
		level: 30,
		desc: "Изучал самостоятельно — синтаксис, ООП, базовые алгоритмы. Не применял в продакшне, знания базовые.",
	},
	python: {
		title: "Python",
		level: 35,
		desc: "Изучал основы — синтаксис, функции, работа с файлами. Планирую вернуться для автоматизации и написания ботов.",
	},
};

function getLevelLabel(level) {
	if (level >= 80) return "Уверенно";
	if (level >= 60) return "Хорошо";
	if (level >= 40) return "В процессе";
	return "Базово";
}

function openModal(skillKey) {
	const skill = SKILLS[skillKey];
	if (!skill) return;

	document.getElementById("skillModalTitle").textContent = skill.title;
	document.getElementById("skillModalDesc").textContent = skill.desc;
	document.getElementById("skillModalLevel").textContent =
		`${getLevelLabel(skill.level)} — ${skill.level}%`;

	const bar = document.getElementById("skillModalBar");
	bar.style.width = "0%";
	setTimeout(() => {
		bar.style.width = `${skill.level}%`;
	}, 50);

	const modal = document.getElementById("skillModal");
	modal.classList.add("active");
	modal.setAttribute("aria-hidden", "false");
	document.body.style.overflow = "hidden";
}

function closeModal() {
	const modal = document.getElementById("skillModal");
	modal.classList.remove("active");
	modal.setAttribute("aria-hidden", "true");
	document.body.style.overflow = "";
}

export function initSkills() {
	if (!document.querySelector(".skill-tag")) return;

	document.querySelectorAll(".skill-tag").forEach((btn) => {
		btn.addEventListener("click", () => {
			openModal(btn.dataset.skill);
		});
	});

	document
		.getElementById("skillModalClose")
		.addEventListener("click", closeModal);
	document
		.getElementById("skillModalOverlay")
		.addEventListener("click", closeModal);

	document.addEventListener("keydown", (e) => {
		if (e.key === "Escape") closeModal();
	});
}
