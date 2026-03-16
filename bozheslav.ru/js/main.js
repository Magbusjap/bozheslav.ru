/* ==========================================================================
   Theme toggle
   ========================================================================== */

const THEME_KEY = "portfolio-theme";
const html = document.documentElement;

function getPreferredTheme() {
	const saved = localStorage.getItem(THEME_KEY);
	if (saved) return saved;
	return window.matchMedia("(prefers-color-scheme: dark)").matches
		? "dark"
		: "light";
}

function applyTheme(theme) {
	if (theme === "dark") {
		html.classList.add("dark");
	} else {
		html.classList.remove("dark");
	}
	localStorage.setItem(THEME_KEY, theme);
}

function toggleTheme() {
	const isDark = html.classList.contains("dark");
	applyTheme(isDark ? "light" : "dark");
}

// Apply saved / preferred theme on load (before page paint)
applyTheme(getPreferredTheme());

// Wire up all theme-toggle buttons (desktop + mobile)
document.querySelectorAll(".theme-toggle").forEach((btn) => {
	btn.addEventListener("click", toggleTheme);
});

/* ==========================================================================
   Mobile menu
   ========================================================================== */

const mobileMenuBtn = document.getElementById("mobileMenuBtn");
const mobileMenu = document.getElementById("mobileMenu");
const menuIcon = document.getElementById("menuIcon");
const closeIcon = document.getElementById("closeIcon");

function openMenu() {
	mobileMenu.hidden = false;
	menuIcon.style.display = "none";
	closeIcon.style.display = "block";
}

function closeMenu() {
	mobileMenu.hidden = true;
	menuIcon.style.display = "block";
	closeIcon.style.display = "none";
}

mobileMenuBtn.addEventListener("click", () => {
	mobileMenu.hidden ? openMenu() : closeMenu();
});

// Close menu when any nav link is clicked
mobileMenu.querySelectorAll(".nav__link").forEach((link) => {
	link.addEventListener("click", closeMenu);
});

/* ==========================================================================
   Init Lucide icons
   ========================================================================== */

lucide.createIcons();

/* ==========================================================================
   Contact form (demo)
   ========================================================================== */

document.getElementById("contactForm").addEventListener("submit", (e) => {
	e.preventDefault();
	alert("Message sent! (demo — wire up a real backend here)");
	e.target.reset();
});
