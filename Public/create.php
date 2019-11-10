<?php

require_once('../private/initialize.php');

if(is_post_request()){

    $todoTitle = $_POST['todoTitle'] ?? '';
    $tasks = $_POST['tasks'] ?? '';
    $new_id = mysqli_insert_id($db);
    
    $result = insert_content($todoTitle, $tasks);
    redirect_to('index.php');
}

?>