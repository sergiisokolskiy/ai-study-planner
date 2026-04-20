<?php

namespace App\AI\Gateways;

use App\AI\Contracts\AiGatewayInterface;
use App\AI\DTO\GeneratedSubtasksResultDto;
use App\AI\Parsers\SubtaskAiResponseParser;
use App\AI\Prompts\SubtaskPromptBuilder;
use App\Models\Task;
use Illuminate\Support\Facades\Http;

class OpenRouterGateway implements AiGatewayInterface
{
    public function generateSubtasks(Task $task): GeneratedSubtasksResultDto
    {
        $promptBuilder = new SubtaskPromptBuilder();
        $parser = new SubtaskAiResponseParser();

        $prompt = $promptBuilder->build($task);

        $response = Http::withOptions([
            'verify' => false,  // лише тимчасово для локальної розробки
        ])->withHeaders([
            'Authorization' => 'Bearer ' . config('services.openrouter.key'),
            'Content-Type' => 'application/json',
        ])->post('https://openrouter.ai/api/v1/chat/completions', [
            'model' => 'openrouter/free',
            'messages' => [
                [
                    'role' => 'user',
                    'content' => $prompt,
                ],
            ],
        ]);

        $data = $response->json();

        $text = $data['choices'][0]['message']['content'] ?? '';
        $subtasks = $parser->parse($text);

        return new GeneratedSubtasksResultDto(
            subtasks: $subtasks,
            rawResponse: $text,
        );
    }
}
