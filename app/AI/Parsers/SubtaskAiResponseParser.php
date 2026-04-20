<?php

namespace App\AI\Parsers;

class SubtaskAiResponseParser
{
    public function parse(string $rawResponse): array
    {
        $lines = preg_split('/\r\n|\r|\n/', trim($rawResponse));

        if ($lines === false) {
            return [];
        }

        $subtasks = [];

        foreach ($lines as $line) {
            $line = trim($line);

            if ($line === '') {
                continue;
            }

            $line = preg_replace('/^[-*•]\s*/u', '', $line);
            $line = preg_replace('/^\d+[\).\s-]*/u', '', $line);

            $line = trim((string) $line);

            if ($line === '') {
                continue;
            }

            $subtasks[] = $line;
        }

        return array_values(array_unique($subtasks));
    }
}
