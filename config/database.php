<?php

try {
    $pdo = new PDO('mysql:host=localhost;dbname=lks_online_store', 'root', '');
} catch (PDOException $e) {
    echo $e->getMessage();
}
