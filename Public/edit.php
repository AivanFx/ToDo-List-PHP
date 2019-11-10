<?php require_once('../private/initialize.php'); ?>

<?php

$id = $_GET['id'] ?? '1';

$task = find_task_by_id($id);

if(is_post_request()){

    $task = [];
    $task['id'] = $id;
    $task['todoTitle'] = $_POST['todoTitle'] ?? '';
    $task['tasks'] = $_POST['tasks'] ?? '';

    $result = update_task($task);
    redirect_to('view.php?id=' . $id);
}

?>

<?php include ('header.php'); ?>
<body>
    <div class="body__container view__container"> 
        <form action="<?php echo ('edit.php?id=' . $id ); ?>" method="post">
            <div class="form__container">
                <p>Edit your Task  </p>
                <input name="todoTitle" type="text" value="<?php echo $task['todoTitle']; ?>">
                <p>Edit your description </p>
                <input name="tasks" type="text" value="<?php echo $task['tasks']?>"></p>
                <p>Is this task done?
                <?php echo $task['done'] == '1' ? 'Yes' : 'No'; ?></p>
                <input class="form__button" type="submit" name="submit" value="Edit Task">
                
            </div>
        </form>

        <p>
            <a href="<?php echo ('index.php'); ?>">Back to List </a>
        </p>
    </div>
</body>
</html>




