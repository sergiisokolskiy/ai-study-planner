<!DOCTYPE html>
<html>
<head>
    <title>Kanban Board</title>
    <style>
        @include('styles')
    </style>
</head>
<body>

<h1>Kanban Board</h1>

<div class="kanban">

    <div class="kanban-column">
        <h2>To Do ({{ $todoTasks->count() }})</h2>

        @forelse ($todoTasks as $task)
            <div class="card">
                <strong>{{ $task->title }}</strong>
                <p>{{ $task->description }}</p>
            </div>
        @empty
            <p class="empty">No tasks</p>
        @endforelse
    </div>

    <div class="kanban-column">
        <h2>In Progress ({{ $inProgressTasks->count() }})</h2>

        @forelse ($inProgressTasks as $task)
            <div class="card">
                <strong>{{ $task->title }}</strong>
                <p>{{ $task->description }}</p>
            </div>
        @empty
            <p class="empty">No tasks</p>
        @endforelse
    </div>

    <div class="kanban-column">
        <h2>Done ({{ $doneTasks->count() }})</h2>

        @forelse ($doneTasks as $task)
            <div class="card">
                <strong>{{ $task->title }}</strong>
                <p>{{ $task->description }}</p>
            </div>
        @empty
            <p class="empty">No tasks</p>
        @endforelse
    </div>
</div>

<div class="top-actions">
    <a href="{{ route('tasks.index') }}" class="btn btn-primary">
        Back to tasks
    </a>
</div>

</body>
</html>
