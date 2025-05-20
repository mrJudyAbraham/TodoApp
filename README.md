# 📝 AI Powered ToDoApp

This is a dynamic and responsive ToDo application built using [Laravel](https://laravel.com/) and [Livewire](https://laravel-livewire.com/), featuring syntax-highlighted code blocks with [PrismPHP](https://github.com/PrismJS/prism) and enhanced with AI-powered capabilities via **Gemini**. It offers a seamless task management experience powered by reactive components and intelligent suggestions.

---

## 🚀 Features

- ✅ Real-time task creation, editing, and deletion with **Livewire**
- ✍️ Auto-updating task list without page refresh
- 🌈 Code syntax highlighting via **PrismPHP**
- 🤖 AI integration using **Gemini** for smart task assistance
- 📊 Status toggles (e.g., completed, important)
- 🔒 Secure validation and interactive error feedback

---

## 🛠️ Tech Stack

- **Backend:** Laravel 10+
- **Frontend:** Laravel Livewire, Blade Components
- **Syntax Highlighting:** PrismPHP
- **AI Assistant:** Gemini (via API)
- **Database:** SQLite
- **Optional Auth:** Laravel Breeze

---

## 💡 Gemini Integration

Gemini AI is used to assist users with:

- Auto-generating task descriptions based on keywords
- Suggesting task names from input patterns
- Offering productivity tips and reminders
- Optional: Task reordering or smart filtering logic

Gemini requests are handled through a custom Laravel service class or API middleware.

---

## ⚡ Livewire in Action

Livewire powers all user interactions for an app-like experience without writing custom JavaScript. Example components:

- `TaskListComponent`
- `TaskFormComponent`
- `GeminiSuggestionComponent`

Task updates, creation, and deletions are handled via Livewire events and state binding.

---

## 🌈 PrismPHP Usage

[PrismPHP](https://github.com/PrismJS/prism) is used to render syntax-highlighted code blocks, ideal for users managing code-based tasks, notes, or documentation within the app.

```php
$task = Task::create([
    'title' => 'Deploy project',
    'description' => 'Run php artisan migrate --force',
]);
