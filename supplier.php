<?php include_once "theme/header.php";
include_once "widgets/modal-add-supply.php";
include_once "sys.php";
//Scos din baza toate mancarurile
$query_supply = "select id_supply, name, qty, supplier, notes from supply;";
$supply_data = mysqli_query($link, $query_supply);
?>
<div class="container-fluid background-img">
    <div class="container">
        <?php include "widgets/navbar-admin.php"; ?>
        <div class="top-table">
            <span class="add-shadow table-title">Supplying table</span>
            <button type="button" class="btn btn-primary food-table-btn" data-toggle="modal" data-target="#supplyModal">
                Add <i class="fas fa-plus"></i>
            </button>
        </div>
        <?php if(mysqli_num_rows($supply_data) > 0) {
            $num_modal = 0; ?>
            <table class="table table-bordered table-hover table-mancare">
                <thead>
                <tr>
                    <th class="table-header">NAME</th>
                    <th class="table-header">QTY</th>
                    <th class="table-header">SUPPLIER</th>
                    <th class="table-header">NOTE</th>
                </tr>
                </thead>
                <tbody>
                <?php if (mysqli_num_rows($supply_data) > 0) {
                    while($row = mysqli_fetch_array($supply_data)) { ?>
                        <tr>
                            <td class="data-table-content"><?php echo $row["name"]; ?></td>
                            <td class="data-table-content"><?php echo $row["qty"]; ?></td>
                            <td class="data-table-content"><?php echo $row["supplier"]; ?></td>
                            <td class="data-table-content"><?php if(strlen($row["notes"]) > 123) {
                                    echo substr($row["notes"],0,123) . '...' . '<a href="javascript:void(0)" data-toggle="modal" data-target="#viewMore-'. $num_modal .'"> See more</a>';
                                    include "widgets/modal-notes.php";
                                    $num_modal++;
                                } else {
                                    echo $row["notes"];
                                } ?>
                            </td>
                            <td class="middle-center-btn">
                                <a class="btn btn-primary edit-food" href="javascript:void(0)" data-toggle="modal" data-target="#viewSupplyEditList-<?php echo $row["id_supply"]; ?>"><div class="icon-settings"><i class="fas fa-pencil-alt"></i></div></a>
                                <?php include "widgets/modal-edit-supply.php"; ?>
                                <a class="btn btn-primary delete-food" href="delete-supply-query.php?id=<?= $row['id']?>" onclick="deleteItemSupply()"><div class="icon-settings"><i style="float: right" class="fas fa-trash-alt"></i></div></a>
                            </td>
                        </tr>
                    <?php   }
                } ?>
                </tbody>
            </table>
        <?php } else { ?>
            <h1 class="add-shadow table-no-data">Data not added.</h1>
        <?php } ?>
    </div>
</div>

<?php include "theme/footer.php"; ?>
