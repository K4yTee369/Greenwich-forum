<?php
try {
    include 'includes/DatabaseConnection.php';

    $sql = 'DELETE FROM user WHERE id = :id';
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':id', $_GET['id']);
    $stmt->execute();
    header('location: admin.php');
} catch (PDOException $e) {
    $title = 'An error has occurred';
    $output = 'Unable to delete user: ' . $e->getMessage();
}
include 'templates/layout.html.php';
?>
