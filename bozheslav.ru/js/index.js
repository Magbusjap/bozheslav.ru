import { initTheme } from "./theme.js";
import { initMenu } from "./mobile-menu.js";
import { initForm } from "./form.js";
import { initTyped } from "./typewriter.js";

document.addEventListener("DOMContentLoaded", () => {
	initTheme();
	initMenu();
	initForm();
	initTyped();
	lucide.createIcons();
});
