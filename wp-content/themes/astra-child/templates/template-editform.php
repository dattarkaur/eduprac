
<?php
 /*  Template name: edit post */
 get_header();
?>
 <div id="edit-post-form" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Post</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="edit-post-form-content">
                    <input type="hidden" id="post_id">
                    <div class="mb-3">
                        <label for="post_title" class="form-label">Title</label>
                        <input type="text" id="post_title" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="post_content" class="form-label">Content</label>
                        <textarea id="post_content" class="form-control" rows="4"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="custom_meta" class="form-label">Custom Meta</label>
                        <input type="text" id="custom_meta" class="form-control">
                    </div>
                    <button type="button" id="update-post-btn" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php

get_footer();
?>