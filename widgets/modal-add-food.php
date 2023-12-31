<div class="modal fade" id="foodModal" tabindex="-1" role="dialog" aria-labelledby="foodModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="foodModalLabel">Add food</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="add-food-query.php" method="post">
                <div class="modal-body">
                    <div class="add-food-form">
                        <div class="row-food">
                            <div class="col-md-6 food-modal-field">
                                <label for="nume"><b>Name:</b></label>
                                <input type="text" name="name" required>
                            </div>

                            <div class="col-md-6 food-modal-field">
                                <label for="tip"><b>Food type:</b></label>
                                <input type="text" name="type" required>
                            </div>
                        </div>

                        <div class="row-food">
                            <div class="col-md-12 food-modal-field">
                                <label for="pret"><b>Price:</b></label>
                                <input type="number" step="0.01" name="price" required>
                            </div>
                        </div>
                        <div class="col-md-12 food-modal-field">
                            <label for="description"><b>Description:</b></label>
                            <textarea name="description"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="submit">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>