<?php
include("templates/header.php");
?>

        <div class="crate-form w-100 mx-auto p-4" style="max-width:900px;">
            <form action="process.php" method="post">
                <div class="form-field mb-4">
                    <input type="text" class="form-control" name="title" id="" placeholder="Incluir Título">
                </div>
                <div class="form-field mb-4">
                    <textarea name="content" class="form-control" id="" cols="30" rows="10" placeholder="Adicionar Post:"></textarea>
                </div>
                <input type="hidden" name="date" value="<?php echo date("Y/m/d"); ?>">

                <div class="form-field">
                    <input type="submit" class="btn btn-primary" value="submit" name="postar">
                </div>
            </form>
        </div>

<?php
include("templates/footer.php");
?>