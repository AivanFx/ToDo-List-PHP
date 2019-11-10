<?php require_once('../private/initialize.php'); ?>

<?php

$task_created = find_all_tasks();

?>

<?php include ('header.php'); ?>
<body>

    <div class="body__container">
        <h1>To Do List</h1>
        <table>
            <tr>
                <th>Done?</th>
                <th>Title</th>
            </tr>

            <?php while($task = mysqli_fetch_assoc($task_created)){ ?>
            <tr>
                <td>
                    <input type="hidden" name="done" value="0" />
                    <input type="checkbox" name="done" value="1" <?php if($task['done'] == "checked") { echo "checked" ;}; ?> />
                </td>
                
                <td>
                    <a href="<?php echo ('view.php?id=' . $task['id']); ?>"><?php echo $task['todoTitle']; ?></a>
                </td>
                <td><a href="<?php echo ('edit.php?id=' . $task['id']); ?>">Edit</a></td>
                <td><a href="<?php echo ('delete.php?id=' . $task['id']); ?>">Delete</a></td>

            </tr>

            <?php } ?>

        </table>

        <form method="post" action="create.php">
            <div class="form__container">     
                <p>
                <input name="todoTitle" type="text" placeholder="Type here to add a task"></p>
                <p>
                <input name="tasks" type="text" placeholder="Write down what you need to do"></p>
                <input class="form__button" type="submit" name="submit" value="Add Task">
            </div>
        </form>
    </div>
    

    
</body>
</html>

