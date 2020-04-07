<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
}

try {
    $connect = new PDO("mysql:host=localhost;dbname=testing", "root", "");

    $query = "SELECT DISTINCT Country FROM tbl_customer ORDER BY Country ASC";

    $statement = $connect->prepare($query);

    $statement->execute();

    $result = $statement->fetchAll();
} catch (PDOException $e) {
    echo '<p>' . $e->getMessage() . '</p>';
}