<?php
    require 'db_connect.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarefas</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="main-section">
            <div class="add-section">
                    <form action="App/add.php" method="POST" autocomplete="off">
                        <input type="text" 
                                name="title" 
                                placeholder="Nova Tarefa">
                        <button type="submit">Adicionar &nbsp; <span>&#43;</span></button>
                    </form>
            </div>
            <?php 
                $todos = $conn->query("SELECT * FROM todos ORDER BY id DESC");
            ?>
            <div class="show-todo-section">
                    <?php if($todos->rowCount() <= 0){ ?>
                        <div class="todo-item">
                            <div class="empty">
                                <img src="img/f.png" width="100%">
                                <img src="img/Ellipsis.gif" width="80px">
                            </div>
                        </div>
                    <?php } ?>


                    <?php while ($todo = $todos->fetch(PDO::FETCH_ASSOC)) { ?>
                        <div class="todo-item">
                            <span id="<?php echo $todo['id']; ?>"
                                    class="remove-to-do">X</span>
                            <?php if($todo['checked']) { ?>
                                <input type="checkbox"
                                    class="check-box"
                                    checked/>
                                <h2 class="checked"><?php echo $todo['title'] ?></h2>
                            <?php }else { ?>
                                <input type="checkbox"
                                        class="check-box"/>
                                <h2><?php echo $todo['title'] ?></h2>
                            <?php } ?>
                            <br>
                            <small>Criada: <?php echo $todo['date_time'] ?> </small>
                        </div>
                    <?php } ?>
            </div>
    </div>
</body>
</html>