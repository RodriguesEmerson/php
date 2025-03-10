<?php

// try {
    $pdo = new PDO('mysql:host=127.0.0.1;dbname=names;charset=utf8mb4','names','P0*Ra*PHPAholLXo', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
// }
// catch (PDOException $e) {
    // var_dump($e->getMessage());
    // echo 'A problem occured with the database connection...';
    // die();
// }

/*
$stmt = $pdo->prepare('SELECT * FROM `names`');
$stmt->execute();
var_dump($stmt->fetch(PDO::FETCH_ASSOC));
*/