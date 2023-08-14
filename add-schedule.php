<?php include "theme/header.php"; ?>

<div class="container-fluid background-img">
    <div class="container">
        <?php include "widgets/navbar-menu.php"; ?>
        <div class="upload-orar-form">
            <form action="upload-schedule.php" method="post" enctype="multipart/form-data">
                Upload new schedule
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
