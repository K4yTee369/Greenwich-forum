<?php
try{
    include 'includes/DatabaseConnection.php';

    $sql = 'SELECT id, username, email FROM user';
    
    $users = $pdo->query($sql)->fetchAll();
    $title = 'User List';

    ob_start();
    include 'templates/admin_users.html.php';
    $output = ob_get_clean();
} catch (PDOException $e) {
    $title = 'An error has occured';
    $output = 'Database error: ' . $e->getMessage();
}
include 'templates/layout.html.php';
?>