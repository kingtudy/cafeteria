<?php include_once "theme/header.php";
include_once "widgets/modal-add-menu.php";
include_once "sys.php";
$query_menu = "select id_menu, name, monday, tuesday, wednesday, thursday, friday, saturday, sunday, fasting, vegetarian, description from menu;";
$menu_data = mysqli_query($link, $query_menu);
?>
<div class="container-fluid background-img">
    <div class="container">
        <?php include "widgets/navbar-menu.php"; ?>
        <div class="top-table">
            <span class="add-shadow table-title">Menus</span>
            <button type="button" class="btn btn-primary food-table-btn" data-toggle="modal" data-target="#menuModal">
                Add <i class="fas fa-plus"></i>
            </button>
        </div>
        <?php if(mysqli_num_rows($menu_data) > 0) { ?>
        <table class="table table-bordered table-hover table-mancare">
            <thead>
            <tr>
                <th class="table-header">MENU NAME</th>
                <th class="table-header">AVAILABILITY</th>
                <th class="table-header">VEGETARIAN</th>
                <th class="table-header">FASTING</th>
                <th class="table-header">SEE CONTENT</th>
                <th class="table-header">DESCRIPTION</th>
                <th class="table-header">SETTINGS</th>
            </tr>
            </thead>
            <tbody>
            <?php if (mysqli_num_rows($menu_data) > 0) {
                $num_modal = 0;
                while($row = mysqli_fetch_array($menu_data)) { ?>
                    <tr>
                        <td class="data-table-content"><?php echo $row["name"]; ?></td>
                        <td class="data-table-content"><?php
                            if($row["monday"]) echo 'Monday ';
                            if($row["tuesday"]) echo 'Tuesday ';
                            if($row["wednesday"]) echo 'Wednesday ';
                            if($row["thursday"]) echo 'Thursday ';
                            if($row["friday"]) echo 'Friday ';
                            if($row["saturday"]) echo 'Saturday ';
                            if($row["sunday"]) echo 'Sunday ';
                            if($row["monday"]==0 && $row["tuesday"]==0 && $row["wednesday"]==0 && $row["thursday"]==0 && $row["friday"]==0 && $row["saturday"]==0 && $row["sunday"]==0) { echo 'Menu unavailable due to missing days'; }
                        ?></td>
                        <td class="data-table-content"><?php if($row["vegetarian"]){
                            echo 'YES';
                        } else {
                            echo 'NO';
                        } ?></td>
                        <td class="data-table-content"><?php if($row["fasting"]){
                                echo 'YES';
                            } else {
                                echo 'NO';
                            } ?></td>
                        <td class="data-table-content">
                            <?php include "widgets/modal-show-food.php";?>
                            <a class="edit-food show-desc-btn" href="javascript:void(0)" class="edit-food" data-toggle="modal" data-target="#viewFoodList-<?php echo $row['id_menu']; ?>">See foods</a>
                        </td>
                        <td class="data-table-content"><?php if(strlen($row["description"]) > 123) {
                                echo substr($row["description"],0,123) . '...' . '<a href="javascript:void(0)" class="data-table-content" data-toggle="modal" data-target="#viewMore-'. $num_modal .'"> See more</a>';
                                include "widgets/modal-description.php";
                                $num_modal++;
                            } else {
                                echo $row["description"];
                            } ?>
                        </td>
                        <td class="middle-center-btn">
                            <a class="btn btn-primary edit-food" href="javascript:void(0)" data-toggle="modal" data-target="#viewMenuEditList-<?php echo $row["id_menu"]; ?>"><div class="icon-settings"><i class="fas fa-pencil-alt"></i></div></a>
                            <?php include "widgets/modal-edit-menu.php"; ?>
                            <a class="btn btn-primary delete-food" href="delete-menu-query.php?id=<?= $row['id_menu']; ?>" onclick="return deleteItemFood();"><div class="icon-settings"><i style="float: right" class="fas fa-trash-alt"></i></div></a>
                        </td>
                    </tr>
                <?php }
            } ?>
            </tbody>
        </table>
        <?php } else { ?>
            <h1 class="add-shadow table-no-data">No data added, please add menus</h1>
        <?php } ?>
    </div>
</div>

<?php include "theme/footer.php"; ?>