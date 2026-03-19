import { initTheme } from "./theme.js";
import { initMenu } from "./mobile-menu.js";
import { initForm } from "./form.js";
import { initTyped } from "./typewriter.js";
import { initProjects } from "./sliding-window.js";
import { loadComponent } from "./components.js";
import { initBlog } from "./blog.js";

document.addEventListener("DOMContentLoaded", async () => {
	await loadComponent("header", "./components/header.html");
	await loadComponent("footer", "./components/footer.html");

	initTheme();
	initMenu();
	initForm();
	initTyped();
	initProjects();
	initBlog();
});
