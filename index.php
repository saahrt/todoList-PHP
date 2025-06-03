<?php
$connection = new mysqli("localhost", "root", "", "todo_db");
if ($connection -> connect_errno) {
    die("Connection Failed: " . mysqli_connect_errno());
}

if (isset($_POST["addTarefa"])) {
    $task = $_POST["tarefa"];
    $descricao = $_POST["descricao"];
    if (!empty($task)) {
        $connection -> query("INSERT INTO tasks (title, description) VALUES ('$task', '$descricao')");
    }
    header("Location: index.php");
    exit;
}

if (isset($_GET["delete"])) {
    $id = $_GET["delete"];
    $connection -> query("DELETE FROM tasks WHERE id = '$id'");
    header("Location: index.php");
    exit;
}

if (isset($_GET["complete"])) {
    $id = $_GET["complete"];
    $connection -> query("UPDATE tasks SET is_completed = 1 WHERE id = '$id'");
    header("Location: index.php");
    exit;
}

$editTask = null;
if (isset($_GET["edit"])) {
    $id = $_GET["edit"];
    $resultEdit = $connection -> query("SELECT * FROM tasks WHERE id = '$id'");
    if ($resultEdit->num_rows > 0) {
        $editTask = $resultEdit -> fetch_assoc();
    }
}

if (isset($_POST["updateTarefa"])) {
    $id = $_POST["id"];
    $newTitle = $_POST["tarefa"];
    $newDescricao = $_POST["descricao"];
    if (!empty($newTitle)) {
        $connection -> query("UPDATE tasks SET title = '$newTitle', description = '$newDescricao' WHERE id = '$id'");
    }
    header("Location: index.php");
    exit;
}

$result = $connection -> query("SELECT * FROM tasks ORDER BY id DESC");

$filtro = isset($_GET['filter']) ? $_GET['filter'] : 'todas';

switch ($filtro) {
    case 'pendentes':
        $sql = "SELECT * FROM tasks WHERE is_completed = 0 ORDER BY id DESC";
        break;
    case 'concluidas':
        $sql = "SELECT * FROM tasks WHERE is_completed = 1 ORDER BY id DESC";
        break;
    default:
        $sql = "SELECT * FROM tasks ORDER BY id DESC";
        break;
}

$result = $connection -> query($sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Tarefas</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f5f5f5;
            padding: 0;
            margin: 0;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 4px;
            width: 400px;
        }
        h1 {
            text-align: center;
        }
        input {
            padding: 5px;
            width: 70%;
        }
        button {
            padding: 5px 10px;
            background-color: #28a745;
            color: white;
            border-radius: 4px;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #218838;
        }
        ul {
            list-style-type: none;
            padding: 20px 0;
            margin: 0;
        }
        ul li {
            padding: 10px;
            background-color: #f5f5f5;
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 10px;
        }
        ul li.is_completed {
            color: #777;
        }
        ul li a {
            text-decoration: none;
            margin-left: 8px;
            color: white;
        }
        ul li a:hover {
            text-decoration: underline;
        }
        .actions {
            display: flex;
        }
        button.opcoes {
            padding: 5px 10px;
            background-color:rgb(57, 191, 209);
            border-radius: 4px;
            border: none;
            cursor: pointer;
            margin-left: 10px;
        }
        select {
            padding: 5px;
            border-radius: 4px;
            border: 1px solid #ccc;
            margin-left: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Lista de Tarefas</h1>

        <!-- Formulário de add/edit -->
        <form action="index.php" method="post">
            <input type="text" name="tarefa" placeholder="Insira nova tarefa" value="<?php echo $editTask ? $editTask['title'] : ''; ?>" required>
            <input type="text" name="descricao" placeholder="Descrição da tarefa" value="<?php echo $editTask ? htmlspecialchars($editTask['description']) : ''; ?>">
            
            <?php if ($editTask): ?>
                <input type="hidden" name="id" value="<?php echo $editTask['id']; ?>">
                <button type="submit" name="updateTarefa">Atualizar</button>
                <a href="index.php" style="margin-left: 10px; color:red;">Cancelar</a>
            <?php else: ?>
                <button type="submit" name="addTarefa">Adicionar</button>
            <?php endif; ?>
        </form>

        <!-- Formulário de seleção -->
        <form method="GET" style="margin: 20px 0;">
            <label for="filter"><strong>Exibir:</strong></label>
            <select name="filter" id="filter" onchange="this.form.submit()">
                <option value="todas" <?= $filtro === 'todas' ? 'selected' : '' ?>>Todas</option>
                <option value="pendentes" <?= $filtro === 'pendentes' ? 'selected' : '' ?>>Pendentes</option>
                <option value="concluidas" <?= $filtro === 'concluidas' ? 'selected' : '' ?>>Concluídas</option>
            </select>
        </form>

        <!-- Tarefas-->
        <ul>
            <?php while ($row = $result->fetch_assoc()): ?>
                <li class="<?php echo $row["is_completed"] ? 'is_completed' : ''; ?>">
                    <div>
                        <strong><?php echo htmlspecialchars($row["title"]); ?></strong>
                        <p><?php echo htmlspecialchars($row["description"]); ?></p>
                    </div>
                    <div class="actions">
                        <button class="opcoes" type="submit" name="complete"><a href="index.php?complete=<?php echo $row['id'];?>&filter=<?php echo $filtro; ?>">Completar</a></button>
                        <button class="opcoes" type="submit" name="edit"><a href="index.php?edit=<?php echo $row['id'];?>&filter=<?php echo $filtro;  ?>">Editar</a></button>
                        <button class="opcoes" type="submit" name="delete"><a href="index.php?delete=<?php echo $row['id'];?>&filter=<?php echo $filtro;  ?>" onclick="return confirm('Tem certeza que deseja apagar?');">Apagar</a></button>
                    </div>
                </li>
            <?php endwhile; ?>
        </ul>
    </div>
</body>
</html>
