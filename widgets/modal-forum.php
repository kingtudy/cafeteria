
<div class="modal fade" id="forumModal" tabindex="-1" role="dialog" aria-labelledby="forumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="add-forum-query.php" method="post">
                <div class="modal-header d-flex align-items-center bg-primary text-white"><h6
                        class="modal-title mb-0" id="forumModalLabel">Discutie noua</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                </div>
                <input type="hidden" value="<?php echo $_SESSION["user_id"]; ?>" name="userid">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="forumTitle">Titlu</label>
                        <input type="text" class="form-control" id="forumTitle" placeholder="Enter title" autofocus="" name="title" required>
                    </div>
                    <label for="forumTitle">Continut</label>
                    <textarea class="form-control summernote" style="display: block;" name="content" required></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Posteaza</button>
                </div>
            </form>
        </div>
    </div>
</div>