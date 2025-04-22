<?php
try {
    include 'includes/DatabaseConnection.php';
    
    if (isset($_POST['id'])) {
        // Handle form submission
        $sql = 'UPDATE module SET module_name = :module_name WHERE id = :id';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':module_name', $_POST['module_name']);
        $stmt->bindValue(':id', $_POST['id']);
        $stmt->execute();
        
        header('location: admin.php');
        exit();
    } else {
        // Display edit form
        if (!isset($_GET['id'])) {
            throw new Exception('ID parameter missing');
        }

        $sql = 'SELECT * FROM module WHERE id = :id';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', $_GET['id']);
        $stmt->execute();
        $module = $stmt->fetch();

        if ($module) {
            $title = 'Edit Module';
            ob_start();
            include 'templates/edit_modules.html.php';
            $output = ob_get_clean();
        } else {
            $title = 'Module not found';
            $output = 'No module found with the specified ID.';
        }
    }
} catch (PDOException $e) {
    $title = 'An error has occurred';
    $output = 'Database error: ' . $e->getMessage();
}

include 'templates/layout.html.php'; 