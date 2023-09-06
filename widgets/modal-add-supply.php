
<div class="modal fade" id="supplyModal" tabindex="-1" role="dialog" aria-labelledby="supplyModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="add-supply-query.php" method="post">
                <div class="modal-header d-flex align-items-center bg-primary text-white"><h6
                        class="modal-title mb-0" id="supplyModalLabel">New supplier</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="supplyTitle">Name</label>
                        <input type="text" class="form-control" id="supplyName" placeholder="name" autofocus="" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="supplyTitle">Cantitate</label>
                        <input type="text" class="form-control" id="supplyTitle" placeholder="Qty" autofocus="" name="qty" required>
                    </div>
                    <div class="form-group">
                        <label for="supplyTitle">Furnizor</label>
                        <input type="text" class="form-control" id="supplyTitle" placeholder="Introduceti furnizor" autofocus="" name="supplier" required>
                    </div>
                    <label for="supplyTitle">Notite</label>
                    <textarea class="form-control summernote" style="display: block;" name="notes"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Salveaza</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>