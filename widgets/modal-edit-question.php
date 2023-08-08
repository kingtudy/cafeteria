<div class="modal fade" id="viewQuestionEditList-<?php echo $row["id_question"]; ?>" tabindex="-1" role="dialog" aria-labelledby="viewQuestionEditList" aria-hidden="true">
    <div class="modal-dialog show-food-modal" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewQuestionEditList">Editare intrebare</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="edit-question-query.php?id=<?php echo $row["id_question"];?>" method="post">
                    <div class="add-food-form">
                        <div class="food-modal-field">
                            <h6 class="modal-title mb-0" id="supplyModalLabel">Editare Intrebare</h6>
                            <div class="form-group">
                                <input type="text" class="form-control" id="questionName" placeholder="Introduceti intrebare" value="<?php echo $row['question']; ?>" autofocus="" name="question" required>
                            </div>
                            <div class="form-group">
                                <label for="ans1"><b>Editare raspuns 1:</b></label>
                                <input type="text" class="form-control" id="questionTitle" placeholder="Raspuns" autofocus="" value="<?php echo $row['ans1']; ?>" name="ans1" required>
                            </div>
                            <div class="form-group">
                                <label for="ans2"><b>Editare raspuns 2:</b></label>
                                <input type="text" class="form-control" id="questionTitle" placeholder="Raspuns" autofocus="" value="<?php echo $row['ans2']; ?>" name="ans2" required>
                            </div>
                            <div class="form-group">
                                <label for="ans3"><b>Editare raspuns 3:</b></label>
                                <input type="text" class="form-control" id="questionTitle" placeholder="Raspuns" autofocus="" value="<?php echo $row['ans3']; ?>" name="ans3" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-edit">Salveaza modificarile</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>