const VISIBLE = 5;
let currentFilter = "all";
let filteredProjects = [];
let currentIndex = 0;
let windowStart = 0;

function getAllProjects() {
	return Array.from(document.querySelectorAll(".project-item"));
}

function getFilteredProjects() {
	return getAllProjects().filter((item) => {
		if (currentFilter === "all") return true;
		return item.dataset.category === currentFilter;
	});
}

function updateList() {
	const all = getAllProjects();

	// Hide all
	all.forEach((item) => {
		item.style.display = "none";
		item.classList.remove("active");
	});

	// Show only filtered items in window
	filteredProjects.forEach((item, i) => {
		const inWindow = i >= windowStart && i < windowStart + VISIBLE;
		if (inWindow) {
			item.style.display = "block";
		}
	});

	// Mark active filter
	if (filteredProjects[currentIndex]) {
		filteredProjects[currentIndex].classList.add("active");
	}
}

function updateDetail() {
	const all = document.querySelectorAll(".project-detail");
	all.forEach((detail) => detail.classList.remove("active"));

	if (filteredProjects[currentIndex]) {
		// Find global index in DOM
		const globalIndex = getAllProjects().indexOf(
			filteredProjects[currentIndex],
		);
		const detail = document.getElementById(`project-${globalIndex}`);
		if (detail) detail.classList.add("active");
	}
}

function updateCounter() {
	const total = filteredProjects.length;
	const counter = document.getElementById("projectsCounter");
	if (counter) {
		counter.textContent =
			total > 0 ? `${currentIndex + 1} / ${total}` : "0 / 0";
	}
}

function updateButtons() {
	const total = filteredProjects.length;
	const prevBtn = document.getElementById("prevBtn");
	const nextBtn = document.getElementById("nextBtn");
	if (prevBtn) prevBtn.disabled = currentIndex === 0;
	if (nextBtn) nextBtn.disabled = currentIndex >= total - 1 || total === 0;
}

export function selectProject(globalIndex) {
	const all = getAllProjects();
	const item = all[globalIndex];
	const filteredIndex = filteredProjects.indexOf(item);

	if (filteredIndex === -1) return;

	currentIndex = filteredIndex;

	// Shift window if needed
	if (currentIndex >= windowStart + VISIBLE) {
		windowStart = currentIndex - VISIBLE + 1;
	} else if (currentIndex < windowStart) {
		windowStart = currentIndex;
	}

	updateList();
	updateDetail();
	updateCounter();
	updateButtons();
}

export function prevProject() {
	if (currentIndex > 0) {
		currentIndex--;
		if (currentIndex < windowStart) windowStart = currentIndex;
		updateList();
		updateDetail();
		updateCounter();
		updateButtons();
	}
}

export function nextProject() {
	if (currentIndex < filteredProjects.length - 1) {
		currentIndex++;
		if (currentIndex >= windowStart + VISIBLE)
			windowStart = currentIndex - VISIBLE + 1;
		updateList();
		updateDetail();
		updateCounter();
		updateButtons();
	}
}

function initFilters() {
	document.querySelectorAll(".portfolio-filter").forEach((btn) => {
		btn.addEventListener("click", () => {
			document
				.querySelectorAll(".portfolio-filter")
				.forEach((b) => b.classList.remove("active"));
			btn.classList.add("active");
			currentFilter = btn.dataset.filter;
			currentIndex = 0;
			windowStart = 0;
			filteredProjects = getFilteredProjects();
			updateList();
			updateDetail();
			updateCounter();
			updateButtons();
		});
	});
}

function initTags() {
	document.querySelectorAll(".portfolio-tag").forEach((tag) => {
		tag.addEventListener("click", () => {
			const filter = tag.dataset.filter;

			document
				.querySelectorAll(".portfolio-filter")
				.forEach((b) => b.classList.remove("active"));

			const matchBtn = [...document.querySelectorAll(".portfolio-filter")].find(
				(b) => b.dataset.filter === filter,
			);
			if (matchBtn) matchBtn.classList.add("active");

			currentFilter = filter;
			currentIndex = 0;
			windowStart = 0;
			filteredProjects = getFilteredProjects();
			updateList();
			updateDetail();
			updateCounter();
			updateButtons();
		});
	});
}

export function initPortfolio() {
	if (!document.getElementById("projectsList")) return;
	filteredProjects = getFilteredProjects();
	initFilters();
	updateList();
	updateDetail();
	updateCounter();
	updateButtons();
}

window.selectProject = selectProject;
window.prevProject = prevProject;
window.nextProject = nextProject;
