<?php include "theme/header.php";
include "sys.php";
$query_food = 'select id_food, name, type, price, description from food where id_food=('.$_REQUEST["id"].');';
$food_data = mysqli_query($link, $query_food);
$row = mysqli_fetch_array($food_data); ?>

<div class="container-fluid background-img">
    <div class="container login-container">
        <form action="edit-food-query.php?id=<?= $row['id']?>" method="post">
            <div class="add-food-form">
                <div class="row-food">
                    <div class="col-md-6 food-modal-field">
                        <label for="nume"><b>Name:</b></label>
                        <input type="text" name="name" value="<?php echo $row['name']; ?>" required>
                    </div>

                    <div class="col-md-6 food-modal-field">
                        <label for="tip"><b>Type:</b></label>
                        <input type="text" name="type" value="<?php echo $row['type']; ?>" required>
                    </div>
                </div>

                <div class="row-food">
                    <div class="col-md-12 food-modal-field">
                        <label for="pret"><b>Price:</b></label>
                        <input type="number" name="price" value="<?php echo $row['price']; ?>" required>
                    </div>
                </div>
                <div class="col-md-12 food-modal-field">
                    <label for="description"><b>Description:</b></label>
                    <textarea name="description"><?php echo $row['description']; ?></textarea>
                </div>
            </div>
            <div class="edit-food-btn">
                <button class="btn btn-primary" type="submit">Save</button>
            </div>
        </form>
    </div>
</div>

<?php include "theme/footer.php"; ?>
