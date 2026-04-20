<!DOCTYPE html>
<html>
<head>
    <title>Task Details</title>
    <style>
        @include('styles')
    </style>
</head>
<body>

<h1>Task Details</h1>

<div class="top-actions">
    <a href="{{ route('tasks.index') }}" class="btn btn-primary">
        Back to tasks
    </a>

    <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-success">
        Edit task
    </a>
</div>

<div class="details-card">
    <h2>{{ $task->title }}</h2>

    <p>
        <strong>Description:</strong><br>
        {{ $task->description ?: 'No description provided.' }}
    </p>

    <p>
        <strong>Status:</strong>
        <span class="status-badge">
            {{ \App\Enums\TaskStatusEnum::tryFrom($task->status)?->label() ?? 'Unknown' }}
        </span>
    </p>
</div>

<div class="subtasks-section">
    <form action="{{ route('tasks.generateSubtasks', $task->id) }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-success">Generate subtasks</button>
    </form>

    @isset($generatedSubtasks)
        <h2 class="section-title">Generated subtasks</h2>

        @if (count($generatedSubtasks) > 0)
            <div class="subtasks-list">
                @foreach ($generatedSubtasks as $subtask)
                    <div class="subtask-card">
                        {{ $subtask }}
                    </div>
                @endforeach
            </div>
        @else
            <p class="empty">No subtasks were generated.</p>
        @endif
    @endisset
</div>

</body>
</html>
