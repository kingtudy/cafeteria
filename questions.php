<?php include "theme/header.php";

include "widgets/modal-questions.php";
include_once "sys.php";


$query_questions = "select id_question, question, ans1, ans2, ans3 from questions;";
$questions_data = mysqli_query($link, $query_questions);
?>
<!-- Dev 2 a modificat aici -->
<!-- Indexul este pagina principala => HOME -->
<div class="container-fluid background-img">
    <div class="container-fluid background-img">
        <div class="container">
            <?php if($_SESSION["role"] === 'admin') {
                include "widgets/navbar-client-area.php";
            } else {
                include "widgets/navbar-client.php";
            } ?>

            <div class="main-body p-0">
                <div class="inner-wrapper">
                    <div class="inner-sidebar">
                        <div class="inner-sidebar-header justify-content-center">
                            <button class="btn btn-primary button-forum btn-block" type="button" data-toggle="modal" data-target="#questionModal">
                                Intrebare noua
                            </button>
                        </div>
                    </div>
                </div>

                <div class="inner-main">
                    <div class="inner-main-body p-2 p-sm-3 collapse forum-content show">
                        <?php if(mysqli_num_rows($questions_data) > 0) {
                            $count=1;
                            while($row = mysqli_fetch_array($questions_data)) { ?>
                                <div class="card mb-2">
                                    <div class="card-body p-2 p-sm-3 question-body">
                                        <div class="media forum-item">
                                            <div class="media-body">
                                                <p class="text-secondary text-question"><?php echo $count . ". " . $row["question"]; ?></p>
                                            </div>
                                        </div>
                                        <div class="button-question">
                                            <a class="btn btn-primary btn-forum-delete btn-question" href="javascript:void(0)" data-toggle="modal" data-target="#viewQuestionEditList-<?php echo $row["id_question"]; ?>">
                                                <div class="icon-settings">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </div>
                                            </a>
                                            <?php include "widgets/modal-edit-question.php"; ?>
                                            <a class="btn btn-primary btn-forum-delete btn-question" href="delete-question-query.php?id=<?= $row["id_question"]; ?>" onclick="return deleteItemQuestion();">
                                                <div class="icon-settings">
                                                    <i style="float: right" class="fas fa-trash-alt"></i>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php $count++; }
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "theme/footer.php"; ?>