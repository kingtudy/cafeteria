<?php include "theme/header.php";

include "widgets/modal-questions.php";
include_once "sys.php";


$query_questions = "select id_question, question, ans1, ans2, ans3 from questions;";
$questions_data = mysqli_query($link, $query_questions);
?>
<!-- Indexul este pagina principala => HOME -->
<div class="container-fluid background-img-stud">
    <div class="container">
        <?php include "widgets/navbar-client.php"; #imi afiseaza ce cod am inclus in widget(exact ca la includerea fisierelor de css si js)?>
        <form action="answer-query.php" method="post">
            <div class="inner-main">
                <div style="width: 100%;" class="inner-main-body p-2 p-sm-3 collapse forum-content show">
                    <?php if(mysqli_num_rows($questions_data) > 0) {
                        $count=1;
                        while($row = mysqli_fetch_array($questions_data)) { ?>
                            <div class="card mb-2">
                                <div class="card-body p-2 p-sm-3 question-body">
                                    <div class="media forum-item">
                                        <div class="media-body">
                                            <p class="text-secondary text-question"><?php echo $count . ". " . $row["question"]; ?></p>
                                            <input type="radio" name="<?php echo $row["id_question"]; ?>" id="ans1" value="ans1"><label class="chestionar-radio" for="ans1"><?php echo '&nbsp;'. $row["ans1"]; ?></label><br>
                                            <input type="radio" name="<?php echo $row["id_question"]; ?>" id="ans2" value="ans2"><label class="chestionar-radio" for="ans2"><?php echo '&nbsp;'. $row["ans2"]; ?></label><br>
                                            <input type="radio" name="<?php echo $row["id_question"]; ?>" id="ans3" value="ans3"><label class="chestionar-radio" for="ans3"><?php echo '&nbsp;'. $row["ans3"]; ?></label><br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php $count++; } ?>
                        <button style="margin: 25px auto 0 auto; display: flex; justify-content: center;" class="btn-login btn btn-warning" type="submit">TRIMITE</button>
                    <?php } else { ?>
                        <h1 class="add-shadow table-no-data">Nu exista chestionare</h1>
                    <?php } ?>
                </div>
            </div>
        </form>
    </div>
</div>

<?php include "theme/footer.php"; ?>
