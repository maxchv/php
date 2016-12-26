<!doctype html>
<html>
<head>
    <title>Create</title>
    <meta charset="utf-8"/>
</head>
<body>
    <h1>Create</h1>
    <div>
        <label>
            Title
            <br/>
            <input type="text" name="title"/>
        </label>
        <br/>
        <label>
            Content
            <br/>
            <textarea name="content" rows="5" cols="20"></textarea>
        </label>
        <br/>
        <label>
            Draft <input type="checkbox" name="draft" />
        </label>
        <br/>
        <button id="save">Save</button>
    </div>
    <script>
        var btn_save = document.getElementById('save');
        btn_save.addEventListener('click', function () {

        });
    </script>
</body>
</html>
