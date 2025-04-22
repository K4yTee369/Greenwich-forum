<?php
if (isset($_POST['content'])) {
    try {
        include 'includes/DatabaseConnection.php';

        $content = $_POST['content'];
        $image = null;

        if (isset($_FILES['pic']) && $_FILES['pic']['size'] > 0) {
            $image = file_get_contents($_FILES['pic']['tmp_name']);
        }

        $sql = 'INSERT INTO post SET
        content = :content,
        title = :title,
        created_at = CURDATE(),
        moduleid = :moduleid,
        userid = :userid,
        pic = :pic';
        
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':content', $content);
        $stmt->bindValue(':title', $_POST['title']);
        $stmt->bindValue(':moduleid', $_POST['module_name']);
        $stmt->bindValue(':userid', $_POST['user']);
        $stmt->bindValue(':pic', $image, PDO::PARAM_LOB);
        $stmt->execute();
        header('location: questions.php');
    } catch (PDOException $e) {
        $title = 'An error has occurred';
        $output = 'Database error: ' . $e->getMessage();
    }
} else {
    include 'includes/DatabaseConnection.php';
    $title = 'Add a new post';
    $sql_a = 'SELECT * FROM user';
    $users = $pdo->query($sql_a)->fetchAll(PDO::FETCH_ASSOC);
    $sql_b = 'SELECT * FROM module';
    $modules = $pdo->query($sql_b)->fetchAll(PDO::FETCH_ASSOC);
    ob_start();
    include 'templates/add_questions.html.php';
    $output = ob_get_clean();
}
include 'templates/layout.html.php';
?>