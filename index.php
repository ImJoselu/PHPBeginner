<?php
    // Leer tareas del archivo y eliminar líneas vacías
    $tareas = file_exists("tareas.txt") ? array_filter(file("tareas.txt", FILE_IGNORE_NEW_LINES), 'strlen') : [];
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ToDoList</title>
</head>
<body>
<h2>Lista de Tareas</h2>

<form action="procesar.php" method="post">
    <input type="text" name="tarea" placeholder="Tarea Test" required>
    <button type="submit"> Agregar </button>
</form>

<ul>
    <?php if (!empty($tareas)): ?>
        <?php foreach ($tareas as $index => $tarea): ?>
            <li>
                <?php echo htmlspecialchars($tarea); ?>
                <a href="eliminar.php?index=<?php echo $index; ?>">❌</a>
            </li>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No hay tareas pendientes</p>
    <?php endif; ?>
</ul>
</body>
</html>
