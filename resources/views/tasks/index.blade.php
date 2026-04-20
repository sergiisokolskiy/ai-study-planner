<!DOCTYPE html>
<html>
<head>
    <title>Tasks List</title>
    <style>
        @include('styles')
    </style>
</head>
<body>

<h1>Tasks</h1>

<div class="top-actions">
    <a href="{{ route('tasks.kanban') }}" class="btn btn-primary">
        Open Kanban board
    </a>

    <a href="{{ route('tasks.create') }}" class="btn btn-success">
        Create new task
    </a>
</div>

<div class="table-wrapper">
    <table>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>

        @forelse ($tasks as $task)
            <tr>
                <td>{{ $task->id }}</td>
                <td>
                    <a href="{{ route('tasks.show', $task->id) }}">
                        {{ $task->title }}
                    </a>
                </td>
                <td>
                    <form action="{{ route('tasks.updateStatus', $task->id) }}" method="POST" class="status-form">
                        @csrf
                        @method('PATCH')

                        <select name="status">
                            @foreach (\App\Enums\TaskStatusEnum::cases() as $status)
                                <option value="{{ $status->value }}"
                                    {{ $task->status === $status->value ? 'selected' : '' }}>
                                    {{ $status->label() }}
                                </option>
                            @endforeach
                        </select>

                        <button type="submit" class="btn btn-warning">
                            Update
                        </button>
                    </form>
                </td>

                <td>
                    <div class="actions">
                        <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-primary">
                            Edit
                        </a>

                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                Delete
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="empty-cell">No tasks found</td>
            </tr>
        @endforelse
    </table>
</div>

</body>
</html>
