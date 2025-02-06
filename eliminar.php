<?php
if (isset($_GET["index"])) {
    $index = (int) $_GET["index"];
    $tareas = file_exists("tareas.txt") ? file("tareas.txt", FILE_IGNORE_NEW_LINES) : [];

    if (isset($tareas[$index])) {
        unset($tareas[$index]);
        file_put_contents("tareas.txt", implode(PHP_EOL, $tareas) . PHP_EOL);
    }
}

header("Location: index.php");
exit;