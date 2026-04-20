<!DOCTYPE html>
<html>
<head>
    <title>Edit Task</title>
    <style>
        @include('styles')
    </style>
</head>
<body>

<h1>Edit Task</h1>

<form action="{{ route('tasks.update', $task->id) }}" method="POST" class="form-container">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" id="title" name="title" value="{{ $task->title }}">
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <textarea id="description" name="description">{{ $task->description }}</textarea>
    </div>

    <div class="form-group">
        <label for="status">Status</label>
        <select id="status" name="status">
            @foreach (\App\Enums\TaskStatusEnum::cases() as $status)
                <option value="{{ $status->value }}"
                    {{ $task->status === $status->value ? 'selected' : '' }}>
                    {{ $status->label() }}
                </option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-success">Update task</button>

    <div class="mt-10">
        <a href="{{ route('tasks.index') }}" class="btn btn-primary">Back</a>
    </div>
</form>
</body>
</html>
