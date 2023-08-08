<div class="modal fade" id="viewMore-<?php echo $num_modal; ?>" tabindex="-1" role="dialog" aria-labelledby="viewMoreLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="notesModalLabel">Notite</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="desc-content">
                    <?php echo $row["notes"]; ?>
                </div>
            </div>
        </div>
    </div>
</div>