<?php
$id = $_GET["id"];
if ($id) {
include("../config.php");
$sqlDelete = "DELETE FROM posts WHERE id = $id";
if(mysqli_query($conn, $sqlDelete)){
    session_start();
        $_SESSION['delete']= "Post Deletado Com Sucesso!";
    header("Location:index.php");
}else{
    die("Algo nõa está certo, Dado não deletado");
}
}else{
    echo "Post não encontrado";
}
?>