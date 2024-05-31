<?php
if (isset($_POST["postar"])) {
    include("../config.php");

    // Escapando os dados recebidos do formulário
    $title = mysqli_real_escape_string($conn, $_POST["title"]);
    $content = mysqli_real_escape_string($conn, $_POST["content"]);
    $date = mysqli_real_escape_string($conn, $_POST["date"]);

    // Definindo a query de inserção
    $sqlInsert = "INSERT INTO posts(title, content, date) VALUES ('$title', '$content', '$date')";

    // Executando a query
    if (mysqli_query($conn, $sqlInsert)) {
        session_start();
        $_SESSION['postar']= "Post Adicionado Com Sucesso!";
        header("Location:index.php");
    } else {
        echo "Erro: " . $sqlInsert . "<br>" . mysqli_error($conn);
    }

    // Fechando a conexão
    mysqli_close($conn);
}
?>

<?php
if (isset($_POST["atualizar"])) {
    include("../config.php");

    // Escapando os dados recebidos do formulário
    $title = mysqli_real_escape_string($conn, $_POST["title"]);
    $content = mysqli_real_escape_string($conn, $_POST["content"]);
    $date = mysqli_real_escape_string($conn, $_POST["date"]);
    $id = mysqli_real_escape_string($conn, $_POST["id"]);

    // Definindo a query de inserção
    $sqlUpdate = "UPDATE posts SET title = '$title', content = '$content', date = '$date' WHERE id = $id";

    // Executando a query
    if (mysqli_query($conn, $sqlUpdate)) {
        session_start();
        $_SESSION['atualizar']= "Post Atualizado Com Sucesso!";
        header("Location:index.php");
    } else {
        echo "Erro: " . $sqlInsert . "<br>" . mysqli_error($conn);
    }

    // Fechando a conexão
    mysqli_close($conn);
}
?>
