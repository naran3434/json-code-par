<?php
/**
 * Created by PhpStorm.
 * User: naran
 * Date: 30/11/18
 * Time: 8:40 AM
 */

require_once ('function.php');

$people = file_get_contents('people.json', FILE_USE_INCLUDE_PATH);

if(isset($people)){
    $data = json_decode($people);

    //  Task logic to create two variables
    taskLogic($data);
}

