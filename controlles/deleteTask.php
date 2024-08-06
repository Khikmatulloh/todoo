<?php

declare(strict_types=1);
$task = new Task();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $taskId = $_POST['id'] ?? null;
    if ($taskId) {  
        $result = $task->delete((int)$id);
    }
}