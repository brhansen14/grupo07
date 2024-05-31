<?php
include '../config.php'; // inclua o arquivo de configuração do banco de dados

$sql = "SELECT * FROM posts";
$result = $conn->query($sql);

$posts = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $posts[] = $row;
    }
}

echo json_encode($posts);

$conn->close();
?>
