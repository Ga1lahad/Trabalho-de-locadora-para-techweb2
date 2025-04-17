<?php
spl_autoload_register(function ($class) {
    $class = str_replace('\\', '/', $class);
    // print_r('../' . $class . '<br>');
    if (file_exists('../' . $class . '.class.php')) {
        include '../' . $class . '.class.php';
    } elseif (file_exists('../' . $class . '.controller.php')) {
        include '../' . $class . '.controller.php';
    } elseif (file_exists('../' . $class . '.php')) {
        include '../' . $class . '.php';
    }
});
