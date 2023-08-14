<?php include "theme/header.php";
include "sys.php";
$query_menu = 'select id_menu, name, monday, tuesday, wednesday, thursday, friday, saturday, sunday, fasting, vegetarian, description from menu where id_menu=('.$_REQUEST["id"].');';
$menu_data = mysqli_query($link, $query_menu);
$row = mysqli_fetch_array($menu_data);
$query_food = "select id_food, name from food;";
$food_data = mysqli_query($link, $query_food);
$query_food_on_the_menu = 'select id_food from food_on_the_menu where id_menu=('.$_REQUEST["id"].');';
$food_on_the_menu_data = mysqli_query($link, $query_food_on_the_menu);
$construct_array = [];
while($data = mysqli_fetch_array($food_on_the_menu_data)) {
    array_push($construct_array, $data['id_food']);
} ?>

<div class="container-fluid background-img">
    <div class="container login-container">
        <form action="edit-menu-query.php?id=<?= $row['id']?>" method="post">
            <div class="add-menu-form">
                <div class="row-food">
                    <div class="col-md-12 food-modal-field">
                        <label for="nume"><b>Name:</b></label>
                        <input type="text" name="name" value="<?php echo $row['name']; ?>" required>
                    </div>
                </div>
                <div class="row-food">
                    <div class="col-md-12 food-modal-field">
                        <label for="description"><b>Description:</b></label>
                        <textarea name="description"><?php echo $row['description']; ?></textarea>
                    </div>
                </div>

                <div class="row-food" style="flex-direction: column;">
                    <div class="col-md-12 menu-modal-field">
                        <label for="monday"><b>Monday </b></label>
                        <input type="hidden" name="monday" value="0">
                        <input type="checkbox" name="monday" value="1" <?php if($row['monday']) echo 'checked'; ?>>
                    </div>
                    <div class="col-md-12 menu-modal-field">
                        <label for="tuesday"><b>Tuesday </b></label>
                        <input type="hidden" name="tuesday" value="0">
                        <input type="checkbox" name="tuesday" value="1" <?php if($row['tuesday']) echo 'checked'; ?>>
                    </div>
                    <div class="col-md-12 menu-modal-field">
                        <label for="wednesday"><b>Wednesday </b></label>
                        <input type="hidden" name="wednesday" value="0">
                        <input type="checkbox" name="wednesday" value="1" <?php if($row['wednesday']) echo 'checked'; ?>>
                    </div>
                    <div class="col-md-12 menu-modal-field">
                        <label for="thursday"><b>Thursday </b></label>
                        <input type="hidden" name="thursday" value="0">
                        <input type="checkbox" name="thursday" value="1" <?php if($row['thursday']) echo 'checked'; ?>>
                    </div>
                    <div class="col-md-12 menu-modal-field">
                        <label for="friday"><b>Friday </b></label>
                        <input type="hidden" name="friday" value="0">
                        <input type="checkbox" name="friday" value="1" <?php if($row['friday']) echo 'checked'; ?>>
                    </div>
                    <div class="col-md-12 menu-modal-field">
                        <label for="saturday"><b>Saturday </b></label>
                        <input type="hidden" name="saturday" value="0">
                        <input type="checkbox" name="saturday" value="1" <?php if($row['saturday']) echo 'checked'; ?>>
                    </div>
                    <div class="col-md-12 menu-modal-field">
                        <label for="sunday"><b>Sunday </b></label>
                        <input type="hidden" name="sunday" value="0">
                        <input type="checkbox" name="sunday" value="1" <?php if($row['sunday']) echo 'checked'; ?>>
                    </div>
                    <div class="col-md-12 menu-modal-field">
                        <label for="de_post"><b>Fasting </b></label>
                        <input type="hidden" name="fasting" value="0">
                        <input type="checkbox" name="fasting" value="1" <?php if($row['fasting']) echo 'checked'; ?>>
                    </div>
                    <div class="col-md-12 menu-modal-field">
                        <label for="vegetarians"><b>For vegetarians </b></label>
                        <input type="hidden" name="vegetarian" value="0">
                        <input type="checkbox" name="vegetarian" value="1" <?php if($row['vegetarian']) echo 'checked'; ?>>
                    </div>
                </div>
                <div class="row-food">
                    <div class="col-md-12 food-modal-field">
                        <label><b>Edit food:</b></label>
                        <select data-placeholder="Food list" multiple="multiple" class="js-example-basic-multiple" name="food_list[]" values="" required>
                            <?php if (mysqli_num_rows($food_data) > 0) {
                                while($value = mysqli_fetch_array($food_data)) { ?>
                                    <option value="<?php echo $value['id_food'] . '"'; if(in_array($value['id_food'], $construct_array)) { echo "selected"; }?>"><?php echo $value['name']; ?></option>
                                <?php }
                            } ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="edit-food-btn">
                <button class="btn btn-primary" type="submit">Save</button>
            </div>
        </form>
    </div>
</div>

<?php include "theme/footer.php"; ?>
