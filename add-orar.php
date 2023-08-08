<?php include "theme/header.php"; ?>
<!-- Indexul este pagina principala => HOME -->
<div class="container-fluid background-img">
    <div class="container">
        <?php include "widgets/navbar-menu.php"; ?>
        <div class="upload-orar-form">
            <form action="upload-orar.php" method="post" enctype="multipart/form-data">
                Incarca orar
                <input type="file" name="fileToUpload">
                <input type="submit" value="Upload Image" name="submit">
            </form>
        </div>
        <div class="orar_cantina">
            <img src="respload/orar.jpeg" alt="orar">
        </div>
    </div>
</div>

<?php include "theme/footer.php"; ?>
