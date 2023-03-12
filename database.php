<?php
    $dsn = 'mysql:host=localhost;dbname=D00238368';
    $username = 'D00238368';
    $password = 'b5hxtcHJ';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('database_error.php');
        exit();
    }
?>