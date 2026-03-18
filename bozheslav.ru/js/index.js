import { initTheme } from "./theme.js";
import { initMenu } from "./mobile-menu.js";
import { initForm } from "./form.js";
import { initTyped } from "./typewriter.js";
import { initProjects } from "./sliding-window.js";

document.addEventListener("DOMContentLoaded", () => {
	initTheme();
	initMenu();
	initForm();
	initTyped();
	initProjects();
	lucide.createIcons();
});
