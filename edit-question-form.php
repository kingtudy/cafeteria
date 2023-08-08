<?php include "theme/header.php";
include "sys.php";
$query_question = 'select id_question, question, ans1, ans2, ans3 from questions where id_question=('.$_REQUEST["id"].');'; //Imi ia din link variabila ID
$question_data = mysqli_query($link, $query_question);
$row = mysqli_fetch_array($question_data); ?>

<div class="container-fluid background-img">
    <div class="container login-container">
        <form class="edit-form" action="edit-question-query.php?id=<?php echo $row[" method="post">
            <div class="row-question">
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
