<?php
try{
    include 'includes/DatabaseConnection.php';

    $sql = 'SELECT id, module_name FROM module';
    
    $modules = $pdo->query($sql)->fetchAll();
    $title = 'Module List';

    ob_start();
    include 'templates/admin_modules.html.php';
    $output = ob_get_clean();
} catch (PDOException $e) {
    $title = 'An error has occured';
    $output = 'Database error: ' . $e->getMessage();
}
include 'templates/layout.html.php';
?>