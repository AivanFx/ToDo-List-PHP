<?php require_once('../private/initialize.php'); ?>

<?php

$id = $_GET['id'] ?? '1';



$task = find_task_by_id($id);

?>

<?php include ('header.php'); ?>

<body>
    <div class="body__container view__container"> 
        <h2>Task: <?php echo $task['todoTitle']; ?></h1>
        <p><strong>Description:</strong> <?php echo $task['tasks']?></p>
        <p>Is this task done?
        <?php echo $task['done'] == '1' ? 'Yes' : 'No'; ?></p>
        <p><a href="<?php echo ('edit.php?id=' . $task['id']); ?>">Click here to edit</a></p>
        <p><a href="<?php echo ('index.php'); ?>">Back to List </a></p>
    </div>
</body>
</html>