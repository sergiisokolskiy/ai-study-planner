<!DOCTYPE html>
<html>
<head>
    <title>Create Task</title>
    <style>
        @include('styles')
    </style>
</head>
<body>

<h1>Create Task</h1>

<form action="{{ route('tasks.store') }}" method="POST" class="form-container">
    @csrf

    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" id="title" name="title">
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <textarea id="description" name="description"></textarea>
    </div>

    <div class="form-group">
        <label for="status">Status</label>
        <select id="status" name="status">
            @foreach (\App\Enums\TaskStatusEnum::cases() as $status)
                <option value="{{ $status->value }}">
                    {{ $status->label() }}
                </option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-success">Save task</button>

    <div class="mt-10">
        <a href="{{ route('tasks.index') }}" class="btn btn-primary">Back</a>
    </div>
</form>
</body>
</html>
