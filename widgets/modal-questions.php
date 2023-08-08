<div class="modal fade" id="questionModal" tabindex="-1" role="dialog" aria-labelledby="questionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="add-question-query.php" method="post">
                <div class="modal-header d-flex align-items-center bg-primary text-white"><h6
                        class="modal-title mb-0" id="questionModalLabel">Intrebare noua</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="questionTitle" placeholder="Introdu intrebarea" autofocus="" name="question" required>
                    </div>
                    <div class="form-group">
                        <label for="ans1"><b>Raspuns 1:</b></label>
                        <input type="text" class="form-control" id="questionTitle" placeholder="Raspuns" autofocus="" name="ans1" required>
                    </div>
                    <div class="form-group">
                        <label for="ans2"><b>Raspuns 2:</b></label>
                        <input type="text" class="form-control" id="questionTitle" placeholder="Raspuns" autofocus="" name="ans2" required>
                    </div>
                    <div class="form-group">
                        <label for="ans3"><b>Raspuns 3:</b></label>
                        <input type="text" class="form-control" id="questionTitle" placeholder="Raspuns" autofocus="" name="ans3">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Posteaza</button>
                </div>
            </form>
        </div>
    </div>
</div>