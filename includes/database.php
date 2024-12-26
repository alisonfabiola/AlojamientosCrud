<?php
$host = 'bdhai6vihoylt4skgtxu-mysql.services.clever-cloud.com';
$dbname = 'bdhai6vihoylt4skgtxu';
$user = 'uf2tsl7fm6fnbepm';
$password = 'VUoe32z9QGUr2TfuDf39';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    die();
}
?>