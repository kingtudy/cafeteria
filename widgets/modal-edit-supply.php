<div class="modal fade" id="viewSupplyEditList-<?php echo $row["id_supply"]; ?>" tabindex="-1" role="dialog" aria-labelledby="viewSupplyEditList" aria-hidden="true">
    <div class="modal-dialog show-food-modal" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewSupplyEditList">Editare inregistrare</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="edit-supply-query.php?id=<?php echo $row["id_supply"];?>" method="post">
                    <div class="add-food-form">
                        <div class="food-modal-field">
                            <div class="form-group">
                                <label for="supplyTitle">Nume</label>
                                <input type="text" class="form-control" id="supplyName" placeholder="Introduceti nume" value="<?php echo $row['name']; ?>" autofocus="" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="supplyTitle">Cantitate</label>
                                <input type="text" class="form-control" id="supplyTitle" placeholder="Introduceti cantitate" value="<?php echo $row['qty']; ?>" autofocus="" name="qty" required>
                            </div>
                            <div class="form-group">
                                <label for="supplyTitle">Furnizor</label>
                                <input type="text" class="form-control" id="supplyTitle" placeholder="Introduceti furnizor" value="<?php echo $row['supplier']; ?>" autofocus="" name="supplier" required>
                            </div>
                            <label for="supplyTitle">Notite</label>
                            <textarea class="form-control summernote" style="display: block;" name="notes"><?php echo $row['notes']; ?></textarea>
                            <button type="submit" class="btn btn-primary btn-edit">Salveaza modificarile</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>