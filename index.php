<?php

require 'config/DB.php';

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Simple native PHP TODO App</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <link rel="stylesheet" href="style.css">

</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>TODO</h1>
            <div class="card card-white">

                <div class="card-body">

                    <!-- Форма добавления новой задачи -->

                    <form action="addTodo.php" method="POST">
                        <div class="form-row">
                            <div class="col">
                                <input type="text" name="todo" class="form-control add-task" placeholder="New Task...">
                            </div>

                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </form>
                    <!--                    <ul class="nav nav-pillstodo-nav">
                                            <li role="presentation" class="nav-item all-task active"><a href="#" class="nav-link">All</a></li>
                                            <li role="presentation" class="nav-item active-task"><a href="#" class="nav-link">Active</a></li>
                                            <li role="presentation" class="nav-item completed-task"><a href="#" class="nav-link">Completed</a></li>
                                        </ul>-->

                    <!-- Вывод списка задач -->

                    <div class="todo-list">
                        <?php

                        $stmt = $pdo->prepare('SELECT * FROM `todo` ORDER BY id DESC');
                        $stmt->execute();

                        ?>

                        <?php while ($row = $stmt->fetch()): ?>


                            <div class="todo-item d-flex justify-content-between">
                                <div>
                                    <div class="checker"><span class=""><input type="checkbox"></span></div>
                                    <span class="text-wrap"><?php echo $row['title']; ?></span>
                                </div>
                                <a href="/delete.php?id=<?php echo $row['id']; ?>"><button type="button" class="btn btn-danger my-button">Delete</button></a>
                            </div>

                        <? endwhile; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>