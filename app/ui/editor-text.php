<?php
// editor-text.php
?>

<style>
    .editor-container {
        border: 1px solid #dee2e6;
        border-radius: 5px;
        margin-bottom: 20px;
    }

    .editor-toolbar {
        background-color: #f8f9fa;
        padding: 10px;
        border-bottom: 1px solid #dee2e6;
        display: flex;
        flex-wrap: wrap;
        gap: 5px;
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
    }

    .editor-toolbar button {
        background: white;
        border: 1px solid #dee2e6;
        border-radius: 4px;
        width: 36px;
        height: 36px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.2s;
    }

    .editor-toolbar button:hover {
        background-color: #e9ecef;
        border-color: #ced4da;
    }

    .editor-content {
        min-height: 200px;
        padding: 15px;
        font-family: inherit;
        outline: none;
        overflow-y: auto;
        max-height: 500px;
    }

    .editor-content:focus {
        border-color: #86b7fe;
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
    }

    .editor-content img {
        max-width: 100%;
    }
</style>

<div class="editor-container">
    <div class="editor-toolbar">
        <button type="button" title="Жирный" onclick="formatText('bold')"><i class="fas fa-bold"></i></button>
        <button type="button" title="Курсив" onclick="formatText('italic')"><i class="fas fa-italic"></i></button>
        <button type="button" title="Подчеркивание" onclick="formatText('underline')"><i class="fas fa-underline"></i>
        </button>
        <button type="button" title="Зачеркнутый" onclick="formatText('strikethrough')"><i
                    class="fas fa-strikethrough"></i></button>
        <div class="vr"></div>
        <button type="button" title="Нумерованный список" onclick="insertList('ol')"><i class="fas fa-list-ol"></i>
        </button>
        <button type="button" title="Маркированный список" onclick="insertList('ul')"><i class="fas fa-list-ul"></i>
        </button>
        <div class="vr"></div>
        <button type="button" title="Ссылка" onclick="insertLink()"><i class="fas fa-link"></i></button>
        <button type="button" title="Изображение" onclick="insertImage()"><i class="fas fa-image"></i></button>
        <div class="vr"></div>
        <button type="button" title="Очистить форматирование" onclick="formatText('removeFormat')"><i
                    class="fas fa-remove-format"></i></button>
    </div>
    <div
            id="editor"
            class="editor-content form-control"
            contenteditable="true"
            oninput="updateTextarea()"
            onpaste="handlePaste(event)"
    ><?= isset($content) ? htmlspecialchars($content) : '' ?></div>
    <textarea
            name="content"
            id="hidden_textarea"
            style="display: none;"
    ><?= isset($content) ? htmlspecialchars($content) : '' ?></textarea>
</div>

<script>
    const editor = document.getElementById('editor');
    const hiddenTextarea = document.getElementById('hidden_textarea');

    // Инициализация содержимого
    window.addEventListener('DOMContentLoaded', () => {
        hiddenTextarea.value = editor.innerHTML;
    });

    // Обновление textarea при изменении контента
    function updateTextarea() {
        hiddenTextarea.value = editor.innerHTML;
    }

    // Форматирование текста
    function formatText(command) {
        document.execCommand(command, false, null);
        editor.focus();
        updateTextarea();
    }

    // Вставка списка
    function insertList(type) {
        document.execCommand(type === 'ol' ? 'insertOrderedList' : 'insertUnorderedList');
        editor.focus();
        updateTextarea();
    }

    // Вставка ссылки
    function insertLink() {
        const url = prompt('Введите URL:', 'https://');
        if (url) {
            document.execCommand('createLink', false, url);
        }
        editor.focus();
        updateTextarea();
    }

    // Вставка изображения
    function insertImage() {
        const url = prompt('Введите URL изображения:', 'https://');
        if (url) {
            document.execCommand('insertImage', false, url);
        }
        editor.focus();
        updateTextarea();
    }

    // Обработка вставки текста (очистка формата)
    function handlePaste(e) {
        e.preventDefault();
        const text = (e.clipboardData || window.clipboardData).getData('text/plain');
        document.execCommand('insertText', false, text);
        updateTextarea();
    }

    // Автоматическое обновление textarea при любых изменениях
    editor.addEventListener('input', updateTextarea);
    editor.addEventListener('blur', updateTextarea);
    editor.addEventListener('keyup', updateTextarea);
</script>