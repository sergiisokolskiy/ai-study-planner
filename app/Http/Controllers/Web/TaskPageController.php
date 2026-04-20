<?php

namespace App\Http\Controllers\Web;

use App\Actions\Tasks\GenerateSubtasksAction;
use App\Enums\TaskStatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class TaskPageController extends Controller
{
    public function index(): View
    {
        $tasks = Task::all();

        return view('tasks.index', compact('tasks'));
    }

    public function create(): View
    {
        return view('tasks.create');
    }

    public function edit(Task $task): View
    {
        return view('tasks.edit', compact('task'));
    }

    public function store(TaskRequest $request)
    {
        Task::create($request->validated());

        return redirect()->route('tasks.index');
    }

    public function update(TaskRequest $request, Task $task)
    {
        $task->update($request->validated());

        return redirect()->route('tasks.index');
    }

    public function show(Task $task): View
    {
        return view('tasks.show', compact('task'));
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index');
    }

    public function updateStatus(Request $request, Task $task)
    {
        $validated = $request->validate([
            'status' => 'required|string',
        ]);

        $task->update([
            'status' => $validated['status'],
        ]);


        return redirect()->route('tasks.index');
    }

    public function kanban(): View
    {
        $tasks = Task::all();

        $todoTasks = $tasks->where('status', TaskStatusEnum::TODO->value);
        $inProgressTasks = $tasks->where('status', TaskStatusEnum::IN_PROGRESS->value);
        $doneTasks = $tasks->where('status', TaskStatusEnum::DONE->value);

        return view('tasks.kanban', compact('todoTasks', 'inProgressTasks', 'doneTasks'));
    }

    public function generateSubtasks(
        Task $task,
        GenerateSubtasksAction $generateSubtasksAction
    ): View {
        $result = $generateSubtasksAction->handle($task);

        return view('tasks.show', [
            'task' => $task,
            'generatedSubtasks' => $result->subtasks,
            'rawResponse' => $result->rawResponse,
        ]);
    }
}
