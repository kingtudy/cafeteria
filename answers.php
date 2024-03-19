<?php include "theme/header.php";

include "widgets/modal-questions.php";
include_once "sys.php";

$query_questions = "select id_question, question, ans1, ans2, ans3, ans1_cont, ans2_cont, ans3_cont from questions;";
$questions_data = mysqli_query($link, $query_questions);
?>

<?php echo "salut boss"; ?>
<?php echo "am modificat ceva"; ?>

<div class="container-fluid background-img">
    <div class="container-fluid background-img">
        <div class="container">
            <?php include "widgets/navbar-client-area.php"; ?>
            <div class="main-body p-0">
                <div class="inner-main">
                    <div class="inner-main-body p-2 p-sm-3 collapse forum-content show">
                        <?php if(mysqli_num_rows($questions_data) > 0) {
                            $count=1;
                            while($row = mysqli_fetch_array($questions_data)) { ?>
                                <div class="card mb-2">
                                    <div class="card-body p-2 p-sm-3 question-body">
                                        <div class="media answers-list">
                                            <div class="media-body">
                                                <p class="text-secondary text-question"><?php echo $count . ". " . $row["question"]; ?></p>
                                                <div class="progress">
                                                    <?php $total = $row["ans1_cont"] + $row["ans2_cont"] + $row["ans3_cont"];
                                                    $proce_ans1= ($row["ans1_cont"] * 100) / $total;
                                                    $proce_ans2= ($row["ans2_cont"] * 100) / $total;
                                                    $proce_ans3= ($row["ans3_cont"] * 100) / $total;
                                                    $proce_ans1= number_format((float)$proce_ans1, 2, '.', '');
                                                    $proce_ans2= number_format((float)$proce_ans2, 2, '.', '');
                                                    $proce_ans3= number_format((float)$proce_ans3, 2, '.', '');
                                                    ?>
                                                    <div class="progress-bar-animated progress-bar-striped progress-bar" role="progressbar" style="width: <?php echo $proce_ans1; ?>%" aria-valuenow="<?php echo $proce_ans1; ?>" aria-valuemin="0" aria-valuemax="100"><span class="text-chart"><?php echo $row["ans1"] . ': ' . $proce_ans1; ?>%</span></div>
                                                    <div class="progress-bar-animated progress-bar-striped progress-bar bg-success" role="progressbar" style="width: <?php echo $proce_ans2; ?>%" aria-valuenow="<?php echo $proce_ans2; ?>" aria-valuemin="0" aria-valuemax="100"><span class="text-chart"><?php echo $row["ans2"] . ': ' . $proce_ans2; ?>%</span></div>
                                                    <div class="progress-bar-animated progress-bar-striped progress-bar bg-warning" role="progressbar" style="width: <?php echo $proce_ans3; ?>%" aria-valuenow="<?php echo $proce_ans3; ?>" aria-valuemin="0" aria-valuemax="100"><span class="text-chart"><?php echo $row["ans3"] . ': ' . $proce_ans3; ?>%</span></div>
                                                </div>
                                            </div>
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
