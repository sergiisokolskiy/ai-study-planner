<?php

namespace App\Http\Controllers\Api;

use App\Actions\Tasks\AskAiAction;
use App\Actions\Tasks\GenerateSubtasksAction;
use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;


class TaskAiController extends Controller
{
    public function generateSubtasks(
        Task $task,
        GenerateSubtasksAction $generateSubtasksAction
    ): JsonResponse {
        $result = $generateSubtasksAction->handle($task);

        return response()->json([
            'success' => true,
            'data' => [
                'task_id' => $task->id,
                'task_title' => $task->title,
                'subtasks' => $result->subtasks,
                'raw_response' => $result->rawResponse,
            ],
        ]);
    }

    public function ask(
        Task $task,
        Request $request,
        AskAiAction $askAiAction
    ): JsonResponse {
        $validated = $request->validate([
            'question' => ['required', 'string', 'max:1000'],
        ]);

        $aiMessage = $askAiAction->handle(
            task: $task,
            question: $validated['question']
        );

        return response()->json([
            'success' => true,
            'data' => [
                'task_id' => $task->id,
                'question' => $aiMessage->question,
                'answer' => $aiMessage->answer,
                'created_at' => $aiMessage->created_at,
            ],
        ]);
    }
}
