<?php
try {
    include 'includes/DatabaseConnection.php';

    if (!isset($_GET['id'])) {
        throw new Exception('ID parameter missing');
    }

    $sql = 'DELETE FROM module WHERE id = :id';
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':id', $_GET['id']);
    $stmt->execute();

    header('location: admin.php');
    exit();
    
} catch (PDOException $e) {
    $title = 'An error has occurred';
    $output = 'Database error: ' . $e->getMessage();
    include 'templates/layout.html.php';
} 