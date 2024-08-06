<?php
require_once 'db.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $taskName = $_POST['task_name'] ?? null;
    $taskDescription = $_POST['task_description'] ?? null;

    if ($taskName && $taskDescription) {
        
        $sql = "INSERT INTO tasks ( task, created_at) VALUES ( :task, NOW())";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':task', $task);

        
       
    }
}