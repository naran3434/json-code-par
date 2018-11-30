<?php
/**
 * Created by PhpStorm.
 * User: naran
 * Date: 30/11/18
 * Time: 8:20 AM
 */

require_once ('function.php');


if(isset($_POST)){

    // check file upload error and file uploaded
    if ($_FILES['jsonfile']['error'] == UPLOAD_ERR_OK && !empty($_FILES['jsonfile']['tmp_name'])) {

        // file extension
        $fileExt = strtolower(pathinfo($_FILES['jsonfile']['name'],PATHINFO_EXTENSION));
        if($fileExt !== 'json'){
            // when file ext not json kill process
            die("Not a valid json file");
        }

        $fp = fopen($_FILES['jsonfile']['tmp_name'], "r");

        // when error in reading
        if($fp === false){
            print_r(error_get_last()); die;
        }

        // read the json from tmp
        $people = fread($fp, filesize($_FILES['jsonfile']['tmp_name']));

        // decode json to objectArray
        $data = json_decode($people);

        //  Task logic to create two variables
        taskLogic($data);

        fclose($fp);

        exit();

    }
}
?>


<html>
<head>
    <title>Task with Import Json</title>
    <style>
        .padding-10 {
            padding: 10px;
        }
    </style>
</head>

<body>
<form action="formInput.php"
      enctype="multipart/form-data" method="post">
    <p class="padding-10">
        <label for="json_file">Please import json file : </label>
        <input type="file" name="jsonfile" id="json_file" size="40" accept=".json" >
    </p>
    <div class="padding-10">
        <input type="submit" name="submit" value="Send">
    </div>
</form>
</body>
</html>