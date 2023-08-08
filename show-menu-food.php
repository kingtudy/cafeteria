<?php include_once "theme/header.php";
include_once "widgets/modal-add-food.php";
include_once "sys.php";
//Scos din baza toate mancarurile
$query_food = "select id_food, name, type, price, id_menu, description from food where id_food in (select id_food from food_on_the_menu where id_menu=(".$_REQUEST['id']."));";
$food_data = mysqli_query($link, $query_food);
?>
<div class="container-fluid">
    <div class="container">
        <div class="top-table">
            <span class="add-shadow table-title">Mancaruri in meniu</span>
            <?php if($_SESSION["role"] === 'admin') { ?>
                <button type="button" class="btn btn-primary food-table-btn" data-toggle="modal" data-target="#foodModal">
                    Adauga
                </button>
            <?php } ?>
        </div>
        <?php if(mysqli_num_rows($food_data) > 0) { ?>
            <table class="table table-bordered table-hover table-mancare">
                <thead>
                <tr>
                    <th class="data-table-header">NUME</th>
                    <th class="data-table-header">TIP</th>
                    <th class="data-table-header">PRET</th>
                    <th class="data-table-header">DESCRIERE</th>
                    <?php if($_SESSION["role"] === 'admin') { ?>
                    <th class="data-table-header">SETARI</th>
                    <?php } ?>
                </tr>
                </thead>
                <tbody>
                <?php if (mysqli_num_rows($food_data) > 0) {
                    while($row = mysqli_fetch_array($food_data)) { //cu asta iau fiecare linie in parte si salvez informatia in variabila $row ?>
                        <tr>
                            <td class="data-table-content"><?php echo $row["name"]; ?></td>
                            <td class="data-table-content"><?php echo $row["type"]; ?></td>
                            <td class="data-table-content"><?php echo $row["price"]; ?></td>
                            <td class="data-table-content"><?php echo $row["description"]; ?></td>
                            <?php if($_SESSION["role"] === 'admin') { ?>
                            <td class="data-table-content">
                                <a class="edit-food" href="edit-food-form.php?id=<?= $row['id']?>">Edit</a>
                                <a class="delete-food" href="delete-food-query.php?id=<?= $row['id']?>" onclick="return deleteItemFood();">Delete</a>
                            </td>
                            <?php } ?>
                        </tr>
                    <?php   }
                } ?>
                </tbody>
            </table>
        <?php } else { ?>
            <h1 class="add-shadow table-no-data">Nu au fost adaugate date, va rugam sa adaugati mancare.</h1>
        <?php } ?>
    </div>
</div>

<?php include "theme/footer.php"; ?>
