
<form action="upload.php" method="post" enctype="multipart/form-data">
    <input name="file[]" type="file" multiple/>
    <input type="hidden" id="action" name="action"/>
    <button type="button" onclick="send()"><i>Send</i></button>
</form>

<script>
    function send() {
        var action = document.getElementById('action');
        action.value = 'create';
        document.forms[0].submit();
    }
</script>

<?php
echo "<pre>";
print_r($_REQUEST);
echo "</pre>";
echo "<pre>";
print_r($_FILES);
echo "</pre>";
if(!is_dir("upload")) {
    mkdir("upload");
}
if(isset($_FILES['file']['name']) &&
   $_FILES['file']['error'] == UPLOAD_ERR_OK) {
    if(substr($_FILES['file']['type'], 0, 5) == 'image') {
        $filename = $_FILES['file']['name'];
        $path = $_FILES['file']['tmp_name'];
        move_uploaded_file($path, "upload/$filename");
        echo "success<br/>";
    } else {
        echo "it is <mark>not</mark> image!<br/>";
    }
} else {
    echo "fault<br/>";
}

foreach(scandir('upload') as $file){
    echo "<a href='upload/$file'>$file</a><br/>";
}