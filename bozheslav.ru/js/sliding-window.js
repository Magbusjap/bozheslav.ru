const VISIBLE = 5;
let currentProject = 0;
let windowStart = 0;

function getTotalProjects() {
	return document.querySelectorAll(".project-item").length;
}

function updateList() {
	const total = getTotalProjects();
	document.querySelectorAll(".project-item").forEach((item, i) => {
		const inWindow = i >= windowStart && i < windowStart + VISIBLE;
		item.style.display = inWindow ? "block" : "none";
		item.classList.toggle("active", i === currentProject);
	});
}

export function selectProject(index) {
	const total = getTotalProjects();
	currentProject = index;

	// Shift window if needed
	if (index >= windowStart + VISIBLE) {
		windowStart = index - VISIBLE + 1;
	} else if (index < windowStart) {
		windowStart = index;
	}

	updateList();

	document.querySelectorAll(".project-detail").forEach((detail, i) => {
		detail.classList.toggle("active", i === index);
	});

	document.getElementById("projectsCounter").textContent =
		`${index + 1} / ${total}`;

	document.getElementById("prevBtn").disabled = index === 0;
	document.getElementById("nextBtn").disabled = index === total - 1;
}

export function prevProject() {
	if (currentProject > 0) selectProject(currentProject - 1);
}

export function nextProject() {
	const total = getTotalProjects();
	if (currentProject < total - 1) selectProject(currentProject + 1);
}

export function initProjects() {
	if (!document.getElementById("projectsCounter")) return;
	selectProject(0);
}

window.selectProject = selectProject;
window.prevProject = prevProject;
window.nextProject = nextProject;
