const SKILLS = {
    html: {
        title: "HTML5",
        level: 90,
        desc: "Семантическая разметка, доступность (ARIA). Глубокое понимание структуры DOM и оптимизации ресурсов (WebP, picture/source).",
    },
    css: {
        title: "CSS3 / SCSS",
        level: 85,
        desc: "Сложные макеты (Grid, Flexbox), анимации. Строгое следование методологии BEM. Адаптивная вёрстка под любые устройства (Mobile First).",
    },
    javascript: {
        title: "JavaScript (ES6+)",
        level: 60,
        desc: "Асинхронное программирование, работа с API (Fetch). Уверенное манипулирование DOM. Реализация сложной логики фильтрации и пагинации на фронтенде.",
    },
    laravel: {
        title: "Laravel 11",
        level: 55,
        desc: "Полноценная разработка Fullstack-приложений. Маршрутизация, Eloquent ORM, создание кастомных Blade-компонентов и сервис-провайдеров.",
    },
    filament: {
        title: "Filament PHP",
        level: 65,
        desc: "Разработка сложных админ-панелей. Создание кастомных страниц, виджетов и Actions. Реализовал систему автоматизированного деплоя ZIP-архивов.",
    },
    postgresql: {
        title: "PostgreSQL",
        level: 60,
        desc: "Администрирование БД на VPS. Проектирование схем данных, работа со связями (Foreign Keys), оптимизация запросов и миграции.",
    },
    linux: {
        title: "Linux (Ubuntu Server)",
        level: 75,
        desc: "Администрирование через SSH. Настройка системных прав доступа, работа с systemd и cron. Опыт развертывания проектов с нуля.",
    },
    security: {
        title: "Server Security",
        level: 70,
        desc: "Защита сервера: настройка Fail2Ban, аутентификация строго по SSH-ключам, конфигурация межсетевого экрана (UFW).",
    },
    nginx: {
        title: "Nginx",
        level: 65,
        desc: "Тонкая настройка Server Blocks, оптимизация лимитов загрузки, настройка проксирования на PHP-FPM. Управление SSL (Certbot).",
    },
    docker: {
        title: "Docker / Compose",
        level: 60,
        desc: "Контейнеризация приложений и сервисов (n8n, БД). Написание Dockerfile и конфигурация многоконтейнерных сред.",
    },
    git: {
        title: "Git / GitHub",
        level: 70,
        desc: "Управление версиями, работа с ветками, разрешение конфликтов. Ведение истории коммитов согласно стандартам индустрии.",
    },
    n8n: {
        title: "n8n / Automation",
        level: 70,
        desc: "Создание сложных цепочек автоматизации. Интеграция Telegram Bot API, OpenAI и внутренних сервисов через вебхуки.",
    },
    english: {
        title: "English (B1+)",
        level: 55,
        desc: "Свободное чтение технической документации. Способность вести переписку и описывать технические решения на английском языке.",
    }
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
