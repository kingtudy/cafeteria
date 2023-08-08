<div class="modal fade" id="viewFoodEditList-<?php echo $row["id_food"]; ?>" tabindex="-1" role="dialog" aria-labelledby="viewFoodEditList" aria-hidden="true">
    <div class="modal-dialog show-food-modal" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewFoodEditList">Editare mancare</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="edit-food-query.php?id=<?php echo $row["id_food"];?>" method="post">
                    <div class="add-food-form">
                        <div class="row-food">
                            <div class="col-md-6 food-modal-field">
                                <label for="nume"><b>Nume:</b></label>
                                <input type="text" name="name" value="<?php echo $row['name']; ?>" required>
                            </div>

                            <div class="col-md-6 food-modal-field">
                                <label for="tip"><b>Tip:</b></label>
                                <input type="text" name="type" value="<?php echo $row['type']; ?>" required>
                            </div>
                        </div>

                        <div class="row-food">
                            <div class="col-md-12 food-modal-field">
                                <label for="pret"><b>Pret:</b></label>
                                <input type="text" name="price" value="<?php echo $row['price']; ?>" required>
                            </div>
                        </div>
                        <div class="col-md-12 food-modal-field">
                            <label for="descriere"><b>Descriere:</b></label>
                            <textarea name="description"><?php echo $row['description']; ?></textarea>
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