<?php
if (isset($_POST['id'])) {
    try {
        include 'includes/DatabaseConnection.php';

        $sql = 'UPDATE post SET
                content = :content,
                title = :title,
                userid = :userid,
                moduleid = :moduleid
                WHERE id = :id';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':content', $_POST['content']);
        $stmt->bindValue(':title', $_POST['title']);
        $stmt->bindValue(':userid', $_POST['author']);
        $stmt->bindValue(':moduleid', $_POST['module']);
        $stmt->bindValue(':id', $_POST['id']);
        $stmt->execute();
        header('location: questions.php');
    } catch (PDOException $e) {
        $title = 'An error has occurred';
        $output = 'Database error: ' . $e->getMessage();
    }
} else {
    try {
        include 'includes/DatabaseConnection.php';

        if (!isset($_GET['id'])) {
            throw new Exception('ID parameter missing');
        }

        $sql = 'SELECT * FROM post WHERE id = :id';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', $_GET['id']);
        $stmt->execute();
        $post = $stmt->fetch(PDO::FETCH_ASSOC);
        $authors = $pdo->query('SELECT id, username FROM user')->fetchAll(PDO::FETCH_ASSOC);
        $modules = $pdo->query('SELECT id, module_name FROM module')->fetchAll(PDO::FETCH_ASSOC);

        if ($post) {
            $title = 'Edit Post';
            ob_start();
            include 'templates/edit_questions.html.php';
            $output = ob_get_clean();
        } else {
            $title = 'Post not found';
            $output = 'No post found with the specified ID.';
        }
    } catch (PDOException $e) {
        $title = 'An error has occurred';
        $output = 'Database error: ' . $e->getMessage();
    }
}
include 'templates/layout.html.php';
?>