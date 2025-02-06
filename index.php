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
    <link rel="icon" href="/images/icon.png" type="image/x-icon" />
    <link rel="stylesheet" href="styles.css" type="text/css" />

    <!-- Archivo CSS Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap JS desde CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>
    <main>
        <h2>Lista de Tareas</h2>

        <form action="procesar.php" method="post">
            <input type="text" name="tarea" placeholder="Tarea Test" required>
            <button class="btn btn-primary" type="submit"> Agregar </button>
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
    </main>
    <footer class="footer mt-auto py-3 bg-light">
        <div class="container">
            <span class="text-muted">Mi Proyecto © <script>document.write(new Date().getFullYear())</script> </span>
        </div>
    </footer>
</body>
</html>
