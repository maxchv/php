<h2>Работа с формами</h2>

<form action="create_post.php" method="post">
    <div class="form-group">
        <label for="title">Title</label>
        <input id="title" type="text" name="title" class="form-control"/>
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea id="description" name="description" class="form-control"></textarea>
    </div>
    <div class="form-group">
        <label for="cities">Cities</label>
        <select multiple id="cities" name="cities[]" class="form-control">
            <option>Dnepr</option>
            <option>Kiev</option>
            <option>Odessa</option>
        </select>
    </div>
    <div id="main">
        <div class="form-group">
            <label>Language
                <input type="text" name="language[]" class="form-control"/>
            </label>
        </div>
        <div class="form-group-inline">
            <input type="button" id="add_lang" value="Add Language"/>
            <input type="button" id="remove_lang" value="Remove Language"/>
        </div>
    </div>
    <input type="submit" class="btn btn-default" value="Послать"/>
</form>
<script>
    $("#add_lang").click(function () {
        $("#main>div:last").before('<div class="form-group">' +
            '<label>Language' +
            '<input type="text" name="language[]" class="form-control"/>' +
            '</label></div>');
    });

    $("#remove_lang").click(function () {
        $("#main>div.form-group:last").remove();
    });
</script>
