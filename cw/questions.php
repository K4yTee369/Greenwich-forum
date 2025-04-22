<?php
try{
    include 'includes/DatabaseConnection.php';

    $sql = 'SELECT user.username, user.id, post.id, module_name, title, content, created_at, pic FROM post
            INNER JOIN module ON post.moduleid = module.id
            INNER JOIN user ON post.userid = user.id';
    
    $post= $pdo->query($sql);
    $title = 'Questions List';

    ob_start();
    include 'templates/questions.html.php';
    $output = ob_get_clean();
} catch (PDOException $e) {
    $title = 'An error has occured';
    $output = 'Database error: ' . $e->getMessage();
}
include 'templates/layout.html.php';
?>