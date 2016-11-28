<h2>Работа с формами</h2>

<?php if (empty($_POST)): ?>

<form action="index.php?q=form" method="post">
    <div class="form-group">
        <label for="title">Title</label>
        <input id="title" type="text" name="title" class="form-control"/>
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea id="description" name="description" class="form-control"></textarea>
    </div>
    <input type="submit" class="btn btn-default" value="Послать"/>
</form>

<?php else:
    if(array_key_exists('title', $_REQUEST)) {
        echo "<p>title: " . htmlspecialchars($_REQUEST['title']) . "</p>";
    }
    if(array_key_exists('description', $_REQUEST)) {
        echo "<p>description: " . htmlspecialchars($_REQUEST['description']) . "</p>";
    }
endif;