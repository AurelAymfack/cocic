<?php

try {

    $pdo = new PDO('mysql:host=localhost;dbname=cocic', 'aurel10', 'Aurel10Motdepasse;', [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
} catch (PDOException $e) {
    echo 'error : ' . $e;
}

return $pdo;