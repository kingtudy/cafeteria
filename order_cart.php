<?php include_once "theme/header.php";
include_once "widgets/modal-order.php";
include_once "sys.php";
#date("l") -> asta imi scoate ziua saptamanii
$query_order = "select id_order, order_date, status_id, order_email, order_desc from order_data where order_date='" . date("Y-m-d") . "';";
$order_data = mysqli_query($link, $query_order); #aici se face interogarea propiuzisa
if($_SESSION["role"] === 'admin') { ?>
<div class="container-fluid background-img">
<?php } else { ?>
<div class="container-fluid background-img-stud">
<?php } ?>
    <div class="container">
        <?php if($_SESSION["role"] === 'admin') {
            include "widgets/navbar-admin.php";
        } else {
            include "widgets/navbar-student.php";
        } ?>
        <div class="top-table">
            <span class="add-shadow table-title">Tabela comenzi</span>
            <button type="button" class="btn btn-primary food-table-btn" data-toggle="modal" data-target="#orderModal">
                Adauga <i class="fas fa-plus"></i>
            </button>
        </div>
        <?php if(mysqli_num_rows($order_data) > 0) { ?>
            <table class="table table-bordered table-hover table-mancare">
                <thead>
                <tr>
                    <th class="table-header">ID COMANDA</th>
                    <th class="table-header">DATA COMANDA</th>
                    <th class="table-header">STATUS COMANDA</th>
                    <th class="table-header">UTILIZATOR</th>
                    <th class="table-header">CONTINUT</th>
                    <th class="table-header">DATE SUPLIMENTARE</th>
                    <?php if($_SESSION["role"] === 'admin') { ?>
                        <th class="table-header">SETARI</th>
                    <?php } ?>
                </tr>
                </thead>
                <tbody>
                <?php if (mysqli_num_rows($order_data) > 0) {
                    while($row = mysqli_fetch_array($order_data)) { ?>
                        <tr>
                            <td class="data-table-content"><?php echo $row["id_order"]; ?></td>
                            <td class="data-table-content"><?php echo $row["order_date"]; ?></td>
                            <td class="data-table-content"><?php
                                $query_status = 'select status from status where status_id=('.$row["status_id"].');';
                                $status_data = mysqli_query($link, $query_status);
                                $status = mysqli_fetch_array($status_data);
                                echo $status["status"]; ?>
                            </td>
                            <td class="data-table-content"><?php echo $row["order_email"]; ?></td>
                            <td class="data-table-content"><?php include "widgets/modal-show-food-order.php";
                                echo '<a href="javascript:void(0)" data-toggle="modal" data-target="#viewOrderList-'. $row["id_order"] .'"> Vezi lista mancaruri</a>'; ?>
                            </td>
                            <td class="data-table-content"><?php echo $row["order_desc"]; ?></td>
                            <?php if($_SESSION["role"] === 'admin') { ?>
                                <td class="middle-center-btn">
                                    <a class="btn btn-primary edit-food" href="javascript:void(0)" data-toggle="modal" data-target="#viewOrderEditList-<?php echo $row["id_order"]; ?>"><div class="icon-settings"><i class="fas fa-pencil-alt"></i></div></a>
                                    <?php include "widgets/modal-edit-order.php"; ?>
                                    <a class="btn btn-primary delete-food" href="delete-order-query.php?id=<?php echo $row[" onclick="return deleteItemOrder();"><div class="icon-settings"><i style="float: right" class="fas fa-trash-alt"></i></div></a>
                                </td>
                            <?php } ?>
                        </tr>
                    <?php }
                } ?>
                </tbody>
            </table>
        <?php } else { ?>
            <h1 class="add-shadow table-no-data">Nu exista comenzi pentru aceasta zi</h1>
        <?php } ?>
    </div>
</div>

<?php include "theme/footer.php"; ?>
