<?php
$query_food = "select id_food, name from food;";
$food_data = mysqli_query($link, $query_food);
$query_food_on_the_menu = 'select id_food from food_on_the_menu where id_menu=('.$row["id_menu"].');';
$food_on_the_menu_data = mysqli_query($link, $query_food_on_the_menu);
$construct_array = [];
while($data = mysqli_fetch_array($food_on_the_menu_data)) {
    array_push($construct_array, $data['id_food']);
} ?>

<div class="modal fade" id="viewMenuEditList-<?php echo $row["id_menu"]; ?>" tabindex="-1" role="dialog" aria-labelledby="viewMenuEditList" aria-hidden="true">
    <div class="modal-dialog show-food-modal" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewMenuEditList">Editare meniu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="edit-menu-query.php?id=<?php echo $row["id_menu"];?>" method="post">
                    <div class="add-menu-form">
                        <div class="row-food">
                            <div class="col-md-12 food-modal-field">
                                <label for="nume"><b>Nume:</b></label>
                                <input type="text" name="name" value="<?php echo $row['name']; ?>" required>
                            </div>
                        </div>
                        <div class="row-food">
                            <div class="col-md-12 food-modal-field">
                                <label for="descriere"><b>Descriere:</b></label>
                                <textarea name="description"><?php echo $row['description']; ?></textarea>
                            </div>
                        </div>

                        <div class="row-food" style="flex-direction: column;">
                            <div class="col-md-12 menu-modal-field">
                                <label for="luni"><b>Luni </b></label>
                                <input type="hidden" name="monday" value="0">
                                <input type="checkbox" name="monday" value="1" <?php if($row['monday']) echo 'checked'; ?>>
                            </div>
                            <div class="col-md-12 menu-modal-field">
                                <label for="marti"><b>Marti </b></label>
                                <input type="hidden" name="tuesday" value="0">
                                <input type="checkbox" name="tuesday" value="1" <?php if($row['tuesday']) echo 'checked'; ?>>
                            </div>
                            <div class="col-md-12 menu-modal-field">
                                <label for="miercuri"><b>Miercuri </b></label>
                                <input type="hidden" name="wednesday" value="0">
                                <input type="checkbox" name="wednesday" value="1" <?php if($row['wednesday']) echo 'checked'; ?>>
                            </div>
                            <div class="col-md-12 menu-modal-field">
                                <label for="joi"><b>Joi </b></label>
                                <input type="hidden" name="thursday" value="0">
                                <input type="checkbox" name="thursday" value="1" <?php if($row['thursday']) echo 'checked'; ?>>
                            </div>
                            <div class="col-md-12 menu-modal-field">
                                <label for="vineri"><b>Vineri </b></label>
                                <input type="hidden" name="friday" value="0">
                                <input type="checkbox" name="friday" value="1" <?php if($row['friday']) echo 'checked'; ?>>
                            </div>
                            <div class="col-md-12 menu-modal-field">
                                <label for="de_post"><b>De post </b></label>
                                <input type="hidden" name="fasting" value="0">
                                <input type="checkbox" name="fasting" value="1" <?php if($row['fasting']) echo 'checked'; ?>>
                            </div>
                            <div class="col-md-12 menu-modal-field">
                                <label for="vegetarieni"><b>Pentru vegetarieni </b></label>
                                <input type="hidden" name="vegetarian" value="0">
                                <input type="checkbox" name="vegetarian" value="1" <?php if($row['vegetarian']) echo 'checked'; ?>>
                            </div>
                        </div>
                        <div class="row-food">
                            <div class="col-md-12 food-modal-field">
                                <label><b>Editeaza mancaruri:</b></label>
                                <select data-placeholder="Lista mancaruri" multiple="multiple" class="js-example-basic-multiple" name="food_list[]" values="" required>
                                    <?php if (mysqli_num_rows($food_data) > 0) {
                                    while($value = mysqli_fetch_array($food_data)) { ?>
                                        <option value="<?php echo $value['id_food']; ?>" <?php if(in_array($value['id_food'], $construct_array)) { echo "selected"; }?>><?php echo $value['name']; ?></option>
                                    <?php } } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="edit-food-btn">
                        <button class="btn btn-primary" type="submit">Salveaza modificarile</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>