<?php

//Snipet for dynamic urls
function url_for($script_path) {
    // add the leading '/' if not present
    if($script_path[0] != '/') {
      $script_path = "/" . $script_path;
    }
    return WWW_ROOT . $script_path;
}


function is_post_request() {
    return $_SERVER['REQUEST_METHOD'] == 'POST';
}

function is_get_request() {
    return $_SERVER['REQUEST_METHOD'] == 'GET';
}

function redirect_to($location){
    header("Location: " . $location);
    exit;
}


//Insert content into our mySQL database
function insert_content($todoTitle, $tasks){
    global $db;
    $todoTitle = $_POST['todoTitle'] ?? '';
    $tasks = $_POST['tasks'] ?? '';

    $sql ="INSERT INTO things_todo ";
    $sql .= "(todoTitle, tasks) ";
    $sql .= "VALUES (";
    $sql .= "'" . $todoTitle . "',";
    $sql .= "'" . $tasks . "'";
    $sql .= ")";
    $result = mysqli_query($db, $sql);

}

//This function allows us to print our database into html
function find_all_tasks(){
    global $db;
    $sql = "SELECT * FROM things_todo ";
    $sql .= "ORDER BY id ASC";
    $result = mysqli_query($db, $sql);
    return $result;
}

//This function allows us to print the desired item into html
function find_task_by_id($id){
    global $db;
    $sql = "SELECT * FROM things_todo ";
    $sql .= "WHERE id='" . $id . "'";
    $result = mysqli_query($db, $sql);
    $task = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $task;
}

//This function allows us to update the desired item
function update_task($task){
    global $db;
    $sql = "UPDATE things_todo SET ";
    $sql .= "todoTitle='" . $task['todoTitle'] . "', ";
    $sql .= "tasks='" . $task['tasks'] . "' ";
    $sql .= "WHERE id='" . $task['id'] . "' "; 

    $result = mysqli_query($db, $sql);
    //Result will be true or false
        if($result){
            return true;
        } else {
            
        }
}

function delete_task($id){
    global $db;
    $sql = "DELETE FROM things_todo ";
    $sql .= "WHERE id='" . $id . "' ";
    $sql .= "LIMIT 1";

    $result = mysqli_query ($db, $sql);
    //DELETE results always end up TRUE OR FALSE
        if ($result){
            return true;
        } else {
            
        }
}

?>