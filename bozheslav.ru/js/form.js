export function initForm() {
	const form = document.getElementById("contactForm");
	if (!form) return;
	form.addEventListener("submit", (e) => {
		e.preventDefault();
		alert("Сообщение отправлено!");
		e.target.reset();
	});
}
