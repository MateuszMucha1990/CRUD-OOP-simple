<?php
require_once('./templates/header.php');
include("./includes/class-autoload.inc.php");

$posts = new Posts();
$post = $posts->editPost($_GET['id']);
//print_r($post);
$id = $post['id'];
$title = $post['title'];
$body = $post['body'];
$author = $post['author'];
?>

<div class="text-center my-4">
    <h3>Edit Post</h3>
</div>
<div class="row">
    <div class="col-md-7 mx-auto">
        <!-- FORM -->
        <form action="post.process.php?id=<?= $id; ?>" method="POST">
            <div class="form-group">
                <label>Title:</label>
                <input type="text" class="form-control" name="post-title" value="<?= $title; ?>" required>
            </div>
            <div class="form-group">
                <label>Content:</label>
                <textarea type="text" class="form-control" name="post-content"  required><?= $body; ?></textarea>
            </div>
            <div class="form-group">
                <label>Author:</label>
                <input type="text" class="form-control" name="post-author" value="<?= $author; ?>" required>
            </div>

            <div class="modal-footer">
                <a href="index.php" type="button" class="btn btn-secondary" >Close</a>
                <button type="submit" name="update" class="btn btn-primary">update</button>
            </div>
        </form>



    </div>
</div>




<?php
require_once('./templates/footer.php');
?>