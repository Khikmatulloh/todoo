<?php

declare(strict_types=1);

$task = new Task();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $taskId = $_POST['task_id'] ?? null;
    if ($taskId) {
        $result = $task->complete((int)$taskId);
    }
}