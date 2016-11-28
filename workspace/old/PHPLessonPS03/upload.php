<h2>Upload files</h2>

<form action="index.php?q=upload" method="post" enctype="multipart/form-data" role="form" class="form-inline">
	<div class="form-group">
		<label for="file"> Files:</label>
		<input id="file" name="file" class="form-control" type="file" />
	</div>
	<input class="btn btn-default" type="submit" />
</form>

<?php 
	echo "<pre>";
	print_r($_FILES);
	if(isset($_FILES['file'])) {
		if($_FILES['file']['error'] == UPLOAD_ERR_OK) {
			if(preg_match("/image/", $_FILES['file']['type'])) {
				if(move_uploaded_file($_FILES['file']['tmp_name'], 
						'uploads\\'.$_FILES['file']['name'])) {
					echo "file uploaded successfully<br/>";
				}
			} else {
				echo "Allow only images <br />";
			}
		}
	}
	echo "</pre>";
?>

