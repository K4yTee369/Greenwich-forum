<?php
try {
    include 'includes/DatabaseConnection.php';
    
    if (isset($_POST['submit'])) {
        if (!empty($_POST['module_name'])) {
            // Prepare and execute the SQL query to insert the new module
            $sql = 'INSERT INTO module (module_name) VALUES (:module_name)';
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':module_name', $_POST['module_name']);
            $stmt->execute();
            
            header('location: questions.php');
            exit();
        } else {
            $title = 'Error';
            $output = 'Module name cannot be empty';
        }
    } else {
        $title = 'Add New Module';
        ob_start();
        include 'templates/add_modules.html.php';
        $output = ob_get_clean();
    }
} catch (PDOException $e) {
    $title = 'An error has occurred';
    $output = 'Database error: ' . $e->getMessage();
}

include 'templates/layout.html.php';
