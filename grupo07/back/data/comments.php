<?php
include '../config.php'; // Caminho atualizado para incluir o config.php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $comment = $_POST['comment'];

    if (!empty($username) && !empty($comment)) {
        $stmt = $conn->prepare("INSERT INTO comments (username, comment) VALUES (?, ?)");
        if ($stmt === false) {
            die('Prepare failed: ' . htmlspecialchars($conn->error));
        }
        $stmt->bind_param("ss", $username, $comment);
        if ($stmt->execute() === false) {
            die('Execute failed: ' . htmlspecialchars($stmt->error));
        } else {
            echo "Comment added successfully.";
        }
        $stmt->close();
    } else {
        die('Username and comment cannot be empty.');
    }
}

$result = $conn->query("SELECT * FROM comments ORDER BY created_at DESC");
$comments = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $comments[] = $row;
    }
}

echo json_encode($comments);

$conn->close();
?>
