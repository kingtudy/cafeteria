<?php
///Interogarea pentru toate mancarurile
$query_food = "select id_food, name from food;";
$food_data = mysqli_query($link, $query_food);
///Interogarea pentru toate statusurile
$query_status = "select status_id, status from status;";
$status_data = mysqli_query($link, $query_status);
///Interogarea pentru status curent
$current_status = "select status from status where status_id = ".$row['status_id'].";";
$current_status_data = mysqli_query($link, $current_status);
$current_status_data = mysqli_fetch_array($current_status_data);
///Interogarea pentru macarurile deja selectate
$query_order_food = 'select id_food from order_food where id_order=('.$row["id_order"].');';
$query_order_food_data = mysqli_query($link, $query_order_food);
$construct_array = [];
while($data = mysqli_fetch_array($query_order_food_data)) {
    array_push($construct_array, $data['id_food']);
} ?>

<div class="modal fade" id="viewOrderEditList-<?php echo $row["id_order"]; ?>" tabindex="-1" role="dialog" aria-labelledby="viewOrderEditList" aria-hidden="true">
    <div class="modal-dialog show-food-modal" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewOrderEditList">Editare comanda</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="edit-order-query.php?id=<?php echo $row["id_order"];?>" method="post">
                    <div class="modal-body">
                        <div class="add-menu-form">
                            <div class="row-food">
                                <div class="col-md-12 food-modal-field">
                                    <label for="date"><b>Data:</b></label>
                                    <input type="date" name="date" value="<?php echo $row['order_date']; ?>" required>
                                </div>
                            </div>
                            <div class="row-food">
                                <div class="col-md-12 food-modal-field">
                                    <label for="status"><b>Status:</b></label>
                                    <select name="status" placeholder="<?php echo $current_status_data['status']; ?>" required>
                                        <?php if(mysqli_num_rows($status_data) > 0) {
                                            while($row2 = mysqli_fetch_array($status_data)) { ?>
                                                <option value="<?php echo $row2["status_id"]; ?>" <?php if($row2['status_id']==$row['status_id']) { echo 'selected';} ?>><?php echo $row2["status"]; ?></option>
                                            <?php }
                                        } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row-food">
                                <div class="col-md-12 food-modal-field">
                                    <label><b>Add food:</b></label>
                                    <select data-placeholder="Lista mancaruri" multiple="multiple" class="js-example-basic-multiple" name="food_list[]" required>
                                        <?php if (mysqli_num_rows($food_data) > 0) {
                                        while($value = mysqli_fetch_array($food_data)) { ?>
                                            <option value="<?= $value['id_food']; ?>"<?php if(in_array($value['id_food'], $construct_array)) { echo " selected"; }?> > <?php echo $value['name']; ?></option>
                                        <?php }
                                        } ?>
                                </select>
                            </div>
                        </div>
                        <div class="row-food">
                                        <div class="col-md-12 food-modal-field">
                                            <label for="description"><b>Description:</b></label>
                                            <textarea name="description"><?php echo $row['order_desc'] ?></textarea>
                                        </div>
                                </div>
                                <input type="hidden" value="<?php echo $row["order_email"]; ?>" name="user">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary" type="submit">Salveaza modificarile</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>