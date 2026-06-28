<?php

use function Livewire\Volt\{state};
use App\Models\Task;
 
use Livewire\Volt\Component;
 new class extends Component { 
    public string $title = '';

    public function addTask(): void
    {
        $validated = $this->validate([
            'title' => 'required|string|max:255',
        ]);

        Task::create([
            'title' => $validated['title'],
        ]);

        $this->reset('title');
    }

    public function toggle($id): void
    {
        $task = Task::findOrFail($id);

        $task->completed = ! $task->completed;

        $task->save();
    }

    public function with(): array
    {
        return [
            'tasks' => Task::latest()->get(),
        ];
    }
};

?>

<div class="max-w-xl mx-auto mt-10">

    <h1 class="text-2xl font-bold mb-4">
        Task Manager
    </h1>

    <div class="flex gap-2 mb-2">
        <input
            type="text"
            wire:model="title"
            placeholder="Enter task"
            class="border rounded px-3 py-2 flex-1"
        >

        <button
            wire:click="addTask"
            class="px-4 py-2 bg-blue-600 text-white rounded"
        >
            Add Task
        </button>
    </div>

    @error('title')
        <div class="text-red-600 mb-4">
            {{ $message }}
        </div>
    @enderror

    <ul class="space-y-2">
        @forelse($tasks as $task)
            <li class="flex items-center gap-3 border rounded p-2">

                <input
                    type="checkbox"
                    wire:click="toggle({{ $task->id }})"
                    @checked($task->completed)
                >

                <span class="{{ $task->completed ? 'line-through text-gray-500' : '' }}">
                    {{ $task->title }}
                </span>

            </li>
        @empty
            <li>No tasks found.</li>
        @endforelse
    </ul>

</div>