<?php
try {
    // Include the database connection file
    require 'includes/DatabaseConnection.php';

    // SQL query to fetch all user details
    $sql_users = 'SELECT id, username, email FROM user';
    $stmt_users = $pdo->query($sql_users);
    $users = $stmt_users->fetchAll();

    // SQL query to fetch all module details
    $sql_modules = 'SELECT id, module_name FROM module';
    $stmt_modules = $pdo->query($sql_modules);
    $modules = $stmt_modules->fetchAll();

    // Set the page title
    $title = 'Admin';

    // Start output buffering
    ob_start();

    // Include the template file, passing both variables
    include 'templates/admin.html.php';

    // Get the buffered content
    $output = ob_get_clean();

} catch (PDOException $e) {
    // Handle database errors
    $title = 'An error has occurred';
    $output = 'Database error: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine();
}

// Include the main layout template
include 'templates/layout.html.php';
?>
