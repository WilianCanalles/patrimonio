<?php
if (!isset($_SESSION)) {
    session_start();
}

try {
    $connect = new PDO("mysql:host=localhost;dbname=testing", "root", "");

    $query = "SELECT data FROM tb_teste";

    $statement = $connect->prepare($query);

    $statement->execute();

    $result = $statement->fetchall(PDO::FETCH_NUM);
} catch (PDOException $e) {
    echo '<p>' . $e->getMessage() . '</p>';
}
