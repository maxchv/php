<h2>Работа с формами</h2>
<form action="create_post.php" method="post">
    <div class="form-group">
        <label for="title">title</label>
        <input id="title" type="text" name="title" class="form-control"/>
    </div>
    <div class="form-group">
        <label for="description">description</label>
        <textarea id="description" name="description" class="form-control"></textarea>
    </div>
    <input type="submit" class="btn btn-default"/>
</form>