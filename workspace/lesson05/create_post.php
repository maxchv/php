
<?php
    $title = $_REQUEST['title'];
    $descr = $_REQUEST['description'];
?>

<form action="create_post.php" method="post">
    <div class="form-group">
        <label for="title">Title</label>
        <input id="title" type="text" name="title" class="form-control"
               value="<?php echo $_REQUEST['title'] ?>"
        />
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea id="description" name="description"
                  class="form-control"><?php echo $_REQUEST['description'] ?></textarea>
    </div>
    <input type="submit" class="btn btn-default" value="Послать"/>
</form>