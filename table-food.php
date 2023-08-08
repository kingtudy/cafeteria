<?php include_once "theme/header.php";
include_once "widgets/modal-add-food.php";
include_once "sys.php";
//Scos din baza toate mancarurile
$query_food = "select id_food, name, type, price, id_menu, description from food;";
$food_data = mysqli_query($link, $query_food);
?>
<div class="container-fluid background-img">
    <div class="container">
        <?php include "widgets/navbar-menu.php"; ?>
        <div class="top-table">
            <span class="add-shadow table-title">Tabela cu mancaruri</span>
            <button type="button" class="btn btn-primary food-table-btn" data-toggle="modal" data-target="#foodModal">
                Adauga <i class="fas fa-plus"></i>
            </button>
        </div>
        <?php if(mysqli_num_rows($food_data) > 0) { ?>
            <table class="table table-bordered table-hover table-mancare">
                <thead>
                    <tr>
                        <th class="table-header">NUME</th>
                        <th class="table-header">TIP</th>
                        <th class="table-header">PRET</th>
                        <th class="table-header">DESCRIERE</th>
                        <th class="table-header">SETARI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (mysqli_num_rows($food_data) > 0) {
                        $num_modal = 0;
                        while($row = mysqli_fetch_array($food_data)) { //cu asta iau fiecare linie in parte si salvez informatia in variabila $row ?>
                            <tr>
                                <td class="data-table-content"><?php echo $row["name"]; ?></td>
                                <td class="data-table-content"><?php echo $row["type"]; ?></td>
                                <td class="data-table-content"><?php echo $row["price"]; ?></td>
                                <td class="data-table-content"><?php if(strlen($row["description"]) > 123) {
                                        echo substr($row["description"],0,123) . '...' . '<a href="javascript:void(0)" data-toggle="modal" data-target="#viewMore-'. $num_modal .'"> Vezi mai mult</a>';
                                        include "widgets/modal-description.php";
                                        $num_modal++;
                                    } else {
                                        echo $row["description"];
                                    } ?>
                                </td>
                                <td class="middle-center-btn">
                                    <a class="btn btn-primary edit-food" href="javascript:void(0)" data-toggle="modal" data-target="#viewFoodEditList-<?php echo $row["id_food"]; ?>"><div class="icon-settings"><i class="fas fa-pencil-alt"></i></div></a>
                                    <?php include "widgets/modal-edit-food.php"; ?>
                                    <a class="btn btn-primary delete-food" href="delete-food-query.php?id=<?php echo $row[" onclick="return deleteItemFood();"><div class="icon-settings"><i style="float: right" class="fas fa-trash-alt"></i></div></a>
                                </td>
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
