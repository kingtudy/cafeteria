<?php include_once "theme/header.php";
include_once "sys.php";

switch (date("l")) {
    case "Monday":
        $query_menu = "select id_menu, name, monday, tuesday, wednesday, thursday, friday, fasting, vegetarian, description from menu where monday=1;";
        break;
    case "Tuesday":
        $query_menu = "select id_menu, name, monday, tuesday, wednesday, thursday, friday, fasting, vegetarian, description from menu where tuesday=1;";
        break;
    case "Wednesday":
        $query_menu = "select id_menu, name, monday, tuesday, wednesday, thursday, friday, fasting, vegetarian, description from menu where wednesday=1;";
        break;
    case "Thursday":
        $query_menu = "select id_menu, name, monday, tuesday, wednesday, thursday, friday, fasting, vegetarian, description from menu where thursday=1;";
        break;
    case "Friday":
        $query_menu = "select id_menu, name, monday, tuesday, wednesday, thursday, friday, fasting, vegetarian, description from menu where friday=1;";
        break;
    case "Saturday":
        $query_menu = "select id_menu, name, monday, tuesday, wednesday, thursday, friday, fasting, vegetarian, description from menu where saturday=1;";
        break;
    case "Sunday":
        $query_menu = "select id_menu, name, monday, tuesday, wednesday, thursday, friday, fasting, vegetarian, description from menu where sunday=1;";
        break;
}


//if(date("l")=="Monday") {
//    $query_menu = "select id_menu, name, monday, tuesday, wednesday, thursday, friday, fasting, vegetarian, description from menu where monday=1;";
//} else if(date("l")=="Tuesday") {
//    $query_menu = "select id_menu, name, monday, tuesday, wednesday, thursday, friday, fasting, vegetarian, description from menu where tuesday=1;";
//} else if(date("l")=="Wednesday") {
//    $query_menu = "select id_menu, name, monday, tuesday, wednesday, thursday, friday, fasting, vegetarian, description from menu where wednesday=1;";
//} else if(date("l")=="Thursday") {
//    $query_menu = "select id_menu, name, monday, tuesday, wednesday, thursday, friday, fasting, vegetarian, description from menu where thursday=1;";
//} else {
//    $query_menu = "select id_menu, name, monday, tuesday, wednesday, thursday, friday, fasting, vegetarian, description from menu where friday=1;";
//}

$menu_data = mysqli_query($link, $query_menu);
?>
<div class="container-fluid background-img-stud">
    <div class="container">
        <?php include "widgets/navbar-client.php"; ?>
        <div class="top-table">
            <span class="add-shadow table-title">Food menu</span>
        </div>
        <?php if(mysqli_num_rows($menu_data) > 0) { ?>
            <table class="table table-bordered table-hover table-mancare">
                <thead>
                <tr>
                    <th class="table-header">NUME MENIU</th>
                    <th class="table-header">VEGETARIAN</th>
                    <th class="table-header">DE POST</th>
                    <th class="table-header">VEZI CONTINUT</th>
                    <th class="table-header">DESCRIERE</th>
                </tr>
                </thead>
                <tbody>
                <?php if (mysqli_num_rows($menu_data) > 0) {
                    while($row = mysqli_fetch_array($menu_data)) { ?>
                        <tr class="data-table-content">
                            <td class="data-table-content"><?php echo $row["name"]; ?></td>
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
                            <td class="data-table-content"><?php include "widgets/modal-show-food.php";
                                echo '<a href="javascript:void(0)" data-toggle="modal" data-target="#viewFoodList-'. $row["id_menu"] .'"> Vezi lista mancaruri</a>'; ?>
                            </td>
                            <td class="data-table-content"><?php echo $row["description"]; ?></td>
                        </tr>
                    <?php }
                } ?>
                </tbody>
            </table>
        <?php } else { ?>
            <h1 class="add-shadow table-no-data">Nu exista meniuri pentru aceasta zi</h1>
        <?php } ?>
    </div>
</div>

<?php include "theme/footer.php"; ?>
