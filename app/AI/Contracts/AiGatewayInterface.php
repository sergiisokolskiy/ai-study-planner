<?php

namespace App\AI\Contracts;

use App\Models\Task;
use App\AI\DTO\GeneratedSubtasksResultDto;

interface AiGatewayInterface
{
    public function generateSubtasks(Task $task): GeneratedSubtasksResultDto;
}
