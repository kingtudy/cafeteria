<?php
include_once "sys.php";
$query_food = "select id_food, name from food;";
$food_data = mysqli_query($link, $query_food);
?>
<div class="modal fade" id="orderModal" tabindex="-1" role="dialog" aria-labelledby="orderModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="orderModalLabel">Adauga date comanda</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="add-order-query.php" method="post">
                <div class="modal-body">
                    <div class="add-menu-form">
                        <div class="row-food">
                            <div class="col-md-12 food-modal-field">
                                <label for="nume"><b>Data:</b></label>
                                <input type="date" name="date" required>
                            </div>
                        </div>
                        <div class="row-food">
                            <div class="col-md-12 food-modal-field">
                                <label><b>Adauga mancaruri:</b></label>
                                <select data-placeholder="Lista mancaruri" multiple="multiple" class="js-example-basic-multiple" name="food_list[]" required>
                                    <?php if (mysqli_num_rows($food_data) > 0) {
                                        while($value = mysqli_fetch_array($food_data)) { ?>
                                            <option value="<?php echo $value['id_food']; ?>"><?php echo $value['name']; ?></option>
                                        <?php }
                                    } ?>
                                </select>
                            </div>
                        </div>
                        <div class="row-food">
                            <div class="col-md-12 food-modal-field">
                                <label for="descriere"><b>Descriere:</b></label>
                                <textarea name="description"></textarea>
                            </div>
                        </div>
                        <input type="hidden" value="<?php echo $_SESSION["email"]; ?>" name="user">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="submit">Trimite comanda</button>
                </div>
            </form>
        </div>
    </div>
</div>