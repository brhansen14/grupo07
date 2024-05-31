<?php
include("templates/header.php");
?>

<div class="posts-list w-100 p-5">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th style="width:15%;">Data da Publicação</th>
                <th style="width:15%;">Título</th>
                <th style="width:45%;">Artigo</th>
                <th style="width:25%;">Ação</th>
            </tr>
        </thead>
        <tbody>
            
            <?php
            include('../config.php');
            $sqlSelect= "SELECT * FROM posts";
            $result = mysqli_query($conn, $sqlSelect);
            while($data = mysqli_fetch_array($result)){
            ?>
            <tr>
            <td><?php echo $data["date"]?></td>
            <td><?php echo $data["title"]?></td>
            <td><?php echo $data["content"]?></td>
            <td>
                <a class="btn btn-info" href="view.php?id=<?php echo $data["id"]?>">Visualizar</a>
                <a class="btn btn-warning" href="edit.php?id=<?php echo $data["id"]?>">Editar</a>
                <a class="btn btn-danger" href="delete.php?id=<?php echo $data["id"]?>">Deletar</a>
            </td>
            </tr>
            <?php
            }
            ?>
           
        </tbody>
</div>

<?php
include("templates/footer.php");
?>