<?php include_once "theme/header.php";
include_once "widgets/modal-add-menu.php";
include_once "sys.php";
$query_menu = "select id_menu, name, monday, tuesday, wednesday, thursday, friday, fasting, vegetarian, description from menu;";
$menu_data = mysqli_query($link, $query_menu);
?>
<div class="container-fluid background-img">
    <div class="container">
        <?php include "widgets/navbar-menu.php"; ?>
        <div class="top-table">
            <span class="add-shadow table-title">Tabela cu meniuri</span>
            <button type="button" class="btn btn-primary food-table-btn" data-toggle="modal" data-target="#menuModal">
                Adauga <i class="fas fa-plus"></i>
            </button>
        </div>
        <?php if(mysqli_num_rows($menu_data) > 0) { ?>
        <table class="table table-bordered table-hover table-mancare">
            <thead>
            <tr>
                <th class="table-header">NUME MENIU</th>
                <th class="table-header">DISPONIBILITATE</th>
                <th class="table-header">VEGETARIAN</th>
                <th class="table-header">DE POST</th>
                <th class="table-header">VEZI CONTINUT</th>
                <th class="table-header">DESCRIERE</th>
                <th class="table-header">SETARI</th>
            </tr>
            </thead>
            <tbody>
            <?php if (mysqli_num_rows($menu_data) > 0) {
                $num_modal = 0;
                while($row = mysqli_fetch_array($menu_data)) { ?>
                    <tr>
                        <td class="data-table-content"><?php echo $row["name"]; ?></td>
                        <td class="data-table-content"><?php
                            if($row["monday"]) echo 'Luni ';
                            if($row["tuesday"]) echo 'Marti ';
                            if($row["wednesday"]) echo 'Miercuri ';
                            if($row["thursday"]) echo 'Joi ';
                            if($row["friday"]) echo 'Vineri ';
                            if($row["monday"]==0 && $row["tuesday"]==0 && $row["wednesday"]==0 && $row["thursday"]==0 && $row["friday"]==0) { echo 'Meniu dezactivat, nu exista zile disponibile'; }
                        ?></td>
                        <td class="data-table-content"><?php if($row["vegetarian"]){
                            echo 'DA';
                        } else {
                            echo 'NU';
                        } ?></td>
                        <td class="data-table-content"><?php if($row["fasting"]){
                                echo 'DA';
                            } else {
                                echo 'NU';
                            } ?></td>
                        <td class="data-table-content">
                            <?php include "widgets/modal-show-food.php";?>
                            <a class="edit-food show-desc-btn" href="javascript:void(0)" class="edit-food" data-toggle="modal" data-target="#viewFoodList-<?php echo $row['id_menu']; ?>">Vezi Mancaruri</a>
                        </td>
                        <td class="data-table-content"><?php if(strlen($row["description"]) > 123) {
                                echo substr($row["description"],0,123) . '...' . '<a href="javascript:void(0)" class="data-table-content" data-toggle="modal" data-target="#viewMore-'. $num_modal .'"> Vezi mai mult</a>';
                                include "widgets/modal-description.php";
                                $num_modal++;
                            } else {
                                echo $row["description"];
                            } ?>
                        </td>
                        <td class="middle-center-btn">
                            <a class="btn btn-primary edit-food" href="javascript:void(0)" data-toggle="modal" data-target="#viewMenuEditList-<?php echo $row["id_menu"]; ?>"><div class="icon-settings"><i class="fas fa-pencil-alt"></i></div></a>
                            <?php include "widgets/modal-edit-menu.php"; ?>
                            <a class="btn btn-primary delete-food" href="delete-menu-query.php?id=<?= $row['id']; ?>" onclick="return deleteItemFood();"><div class="icon-settings"><i style="float: right" class="fas fa-trash-alt"></i></div></a>
                        </td>
                    </tr>
                <?php }
            } ?>
            </tbody>
        </table>
        <?php } else { ?>
            <h1 class="add-shadow table-no-data">Nu au fost adaugate date, va rugam sa adaugati meniuri.</h1>
        <?php } ?>
    </div>
</div>

<?php include "theme/footer.php"; ?>
