<?php require_once('../private/initialize.php'); ?>

<?php

$id = $_GET['id'] ?? '1';

if(is_post_request()){
    delete_task($id);
    redirect_to('index.php');
} else {
    $task = find_task_by_id($id);
}


?>


<?php include ('header.php'); ?>

<body>
    <div class="body__container view__container">
        <h2>Task: </h2>
        <h3><?php echo $task['todoTitle']; ?></h3>
        <p><strong>Description</strong>: <?php echo $task['tasks']?></p>
        <p>Is this task done?
        <?php echo $task['done'] == '1' ? 'Yes' : 'No'; ?></p>

        <p class="delete_warning">Are you sure you want to delete this task?</p>
        
        <div class="form__container">  
            <form action="<?php echo ('delete.php?id=' . $id ); ?>" method="post">
                <input class="form__button" type="submit" name="commit" value="Delete Task" />
            </form>
        </div>

        <p>
            <a href="<?php echo ('index.php'); ?>">Back to List </a>
        </p>
    </div>
</body>
</html>