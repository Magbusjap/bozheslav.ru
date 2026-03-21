import { initTheme } from "/js/theme.js";
import { initMenu } from "/js/mobile-menu.js";
import { initForm } from "/js/form.js";
import { initTyped } from "/js/typewriter.js";
import { initProjects } from "/js/sliding-window.js";
import { loadComponent } from "/js/components.js";
import { initBlog } from "/js/blog.js";
import { initPortfolio } from "/js/portfolio-page.js";
import { initSkills } from "/js/skills-page.js";
import { initExperience } from "/js/experience-page.js";
import { initArticle, initArticleTags } from "/js/article.js";
import { init404 } from "./404.js";

document.addEventListener("DOMContentLoaded", async () => {
	await loadComponent("header", "/components/header.html");
	await loadComponent("footer", "/components/footer.html");

	initTheme();
	initMenu();
	initForm();
	initTyped();
	initProjects();
	initBlog();
	initPortfolio();
	initSkills();
	initExperience();
	initArticle();
	initArticleTags();
	init404();
});
