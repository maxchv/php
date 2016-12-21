
<?php

    echo "<pre>";
    print_r($_REQUEST);
    echo "</pre>";

    if(isset($_REQUEST['title'])) {
        $title = $_REQUEST['title'];

        $len = strlen($title);
        if($len < 2 || $len > 20) {
            echo "<span style='color: red'>Error. Try again.</span>";
        } else {
            echo htmlspecialchars($title);
        }

        if(preg_match("/^[a-zA-Z]{2,20}$/", $title)) {
            echo "<p style='color: green;'>title is valid</p>";
        } else {
            echo "<p style='color: red;'>title is not valid</p>";
        }
    }
?>
