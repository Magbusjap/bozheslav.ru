function initParserBlock(block) {
    const endpoint  = block.dataset.endpoint;
    const paramName = block.dataset.param;
    const dataKey   = block.dataset.key;

    const input     = block.querySelector('.parser-block__input');
    const btn       = block.querySelector('.parser-block__btn');
    const status    = block.querySelector('.parser-block__status');
    const error     = block.querySelector('.parser-block__error');
    const tableWrap = block.querySelector('.parser-block__table-wrap');
    const thead     = block.querySelector('.parser-block__thead');
    const tbody     = block.querySelector('.parser-block__tbody');
    const empty     = block.querySelector('.parser-block__empty');

    function show(el)  { el.style.display = 'block'; }
    function hide(el)  { el.style.display = 'none';  }

    function renderTable(items) {
        const columns = Object.keys(items[0]);

        thead.innerHTML = '<tr>' +
            columns.map(c => `<th class="parser-block__th">${c}</th>`).join('') +
            '</tr>';

        tbody.innerHTML = items.map(row =>
            '<tr class="parser-block__tr">' +
            columns.map(c => {
                const val = row[c];
                // URL-подобные значения — ссылки
                const cell = (typeof val === 'string' && val.startsWith('http'))
                    ? `<a href="${val}" target="_blank" rel="noopener noreferrer" class="parser-block__link">открыть</a>`
                    : (val ?? '<span class="parser-block__muted">—</span>');
                return `<td class="parser-block__td">${cell}</td>`;
            }).join('') +
            '</tr>'
        ).join('');
    }

    async function doSearch() {
        const query = input.value.trim();
        if (!query) return;

        btn.disabled = true;
        const originalText = btn.textContent;
        btn.textContent = 'Загрузка...';

        hide(tableWrap); hide(empty); hide(error);
        status.textContent = 'Запрос...';
        show(status);

        try {
            const res  = await fetch(`${endpoint}?${paramName}=${encodeURIComponent(query)}`);
            if (!res.ok) throw new Error('Ошибка сервера: ' + res.status);
            const json = await res.json();
            const items = json[dataKey] ?? [];

            if (items.length === 0) {
                hide(status);
                show(empty);
            } else {
                status.textContent = `Найдено: ${json.total ?? items.length}, показано: ${items.length}`;
                renderTable(items);
                show(tableWrap);
            }
        } catch (e) {
            hide(status);
            error.textContent = 'Ошибка: ' + e.message;
            show(error);
        } finally {
            btn.disabled = false;
            btn.textContent = originalText;
        }
    }

    btn.addEventListener('click', doSearch);
    input.addEventListener('keydown', e => { if (e.key === 'Enter') doSearch(); });
}

export function initParserBlocks() {
    // Инициализируем все блоки на странице
    document.querySelectorAll('.parser-block').forEach(initParserBlock);
}