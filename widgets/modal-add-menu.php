<?php
include_once "sys.php";
$query_food = "select id_food, name from food;";
$food_data = mysqli_query($link, $query_food);
?>
<div class="modal fade" id="menuModal" tabindex="-1" role="dialog" aria-labelledby="menuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="menuModalLabel">Add menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="add-menu-query.php" method="post">
                <div class="modal-body">
                    <div class="add-menu-form">
                        <div class="row-food">
                            <div class="col-md-12 food-modal-field">
                                <label for="nume"><b>Menu name:</b></label>
                                <input type="text" name="name" required>
                            </div>
                        </div>
                        <div class="row-food">
                            <div class="col-md-12 food-modal-field">
                                <label for="description"><b>Description:</b></label>
                                <textarea name="description"></textarea>
                            </div>
                        </div>

                        <div class="row-food" style="flex-direction: column;">
                            <div class="col-md-12 menu-modal-field">
                                <label for="luni"><b>Luni </b></label>
                                <input type="hidden" name="monday" value="0">
                                <input type="checkbox" name="monday" value="1">
                            </div>
                            <div class="col-md-12 menu-modal-field">
                                <label for="marti"><b>Marti </b></label>
                                <input type="hidden" name="tuesday" value="0">
                                <input type="checkbox" name="tuesday" value="1">
                            </div>
                            <div class="col-md-12 menu-modal-field">
                                <label for="miercuri"><b>Miercuri </b></label>
                                <input type="hidden" name="wednesday" value="0">
                                <input type="checkbox" name="wednesday" value="1">
                            </div>
                            <div class="col-md-12 menu-modal-field">
                                <label for="joi"><b>Joi </b></label>
                                <input type="hidden" name="thursday" value="0">
                                <input type="checkbox" name="thursday" value="1">
                            </div>
                            <div class="col-md-12 menu-modal-field">
                                <label for="vineri"><b>Vineri </b></label>
                                <input type="hidden" name="friday" value="0">
                                <input type="checkbox" name="friday" value="1">
                            </div>
                            <div class="col-md-12 menu-modal-field">
                                <label for="de_post"><b>De post </b></label>
                                <input type="hidden" name="fasting" value="0">
                                <input type="checkbox" name="fasting" value="1">
                            </div>
                            <div class="col-md-12 menu-modal-field">
                                <label for="vegetarieni"><b>Pentru vegetarieni </b></label>
                                <input type="hidden" name="vegetarian" value="0">
                                <input type="checkbox" name="vegetarian" value="1">
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
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="submit">Salveaza modificarile</button>
                </div>
            </form>
        </div>
    </div>
</div>