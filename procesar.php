<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tarea = trim($_POST["tarea"]);

    if (!empty($tarea)) {
        file_put_contents("tareas.txt", $tarea . PHP_EOL, FILE_APPEND);
    }
}

header("Location: index.php");
exit;
