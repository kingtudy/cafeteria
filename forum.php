<?php include "theme/header.php";

include "widgets/modal-forum.php";
include_once "sys.php";

if(isset($_REQUEST['page'])) {
    $page = $_REQUEST['page'];
} else {
    $page = 1;
}

$numberOfPostsPerPage = 10; ///Numarul de afisari pe pagina
$offset = ($page-1) * $numberOfPostsPerPage;

$total_pages = "SELECT COUNT(*) FROM forum";
$result = mysqli_query($link, $total_pages);
$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $numberOfPostsPerPage);

$query_forum = "select id_message, title, email_user, content from forum limit " . $offset . ", " . $numberOfPostsPerPage . ";";
$forum_data = mysqli_query($link, $query_forum);
?>

<!-- Indexul este pagina principala => HOME -->
    <?php if($_SESSION["role"] === 'admin') { ?>
        <div class="container-fluid background-img">
    <?php } else { ?>
        <div class="container-fluid background-img-stud">
    <?php } ?>
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
                        <button class="btn btn-primary button-forum btn-block" type="button" data-toggle="modal" data-target="#forumModal">
                            Discutie noua
                        </button>
                    </div>
                </div>
            </div>

            <div class="inner-main">
                <div class="inner-main-body p-2 p-sm-3 collapse forum-content show">
                    <?php if(mysqli_num_rows($forum_data) > 0) {
                        while($row = mysqli_fetch_array($forum_data)) { ?>
                            <div class="card mb-2">
                                <div class="card-body p-2 p-sm-3">
                                    <div class="media forum-item">
                                        <div class="media-body">
                                            <h6><?php echo $row["title"]; ?></h6>
                                            <p class="text-secondary"><?php echo $row["content"]; ?></p>
                                        </div>
                                    </div>
                                    <p class="posted-by">Postat de: <b><?php echo $row["email_user"]; ?></b></p>
                                    <?php if($_SESSION["role"] === 'admin') { ?>
                                        <a class="btn btn-primary btn-forum-delete" href="delete-forum-query.php?id=<?= $row['id']; ?>" onclick="return deleteItemForum();">
                                            <div class="icon-settings">
                                                <i style="float: right" class="fas fa-trash-alt"></i>
                                            </div>
                                        </a>
                                    <?php } ?>
                                </div>
                            </div>
                        <?php } ?>

                    <ul class="pagination pagination-sm pagination-circle justify-content-center mb-0">
                        <li class="page-item disabled">
                            <span class="page-link has-icon">
                                <a href="?page=1">
                                    <i class="fas fa-angle-double-left"></i>
                                </a>
                            </span>
                        </li>
                        <li class="page-item <?php if($page <= 1){ echo 'disabled'; } ?>">
                            <a class="page-link" href="<?php if($page <= 1){ echo '#'; } else { echo "?page=".($page - 1); } ?>">
                                <i class="fas fa-angle-left"></i>
                            </a>
                        </li>
                        <li class="page-item <?php if($page >= $total_pages){ echo 'disabled'; } ?>">
                            <a class="page-link" href="<?php if($page >= $total_pages){ echo '#'; } else { echo "?page=".($page + 1); } ?>">
                                <i class="fas fa-angle-right"></i>
                            </a>
                        </li>
                        <li class="page-item">
                            <span class="page-link has-icon">
                                <a href="?page=<?php echo $total_pages; ?>">
                                    <i class="fas fa-angle-double-right"></i>
                                </a>
                            </span>
                        </li>
                    </ul>

                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "theme/footer.php"; ?>
