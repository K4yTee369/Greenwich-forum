<?php
if (isset($_POST['id'])) {
    try {
        include 'includes/DatabaseConnection.php';

        $sql = 'UPDATE user SET
                username = :username,
                email = :email
                WHERE id = :id';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':username', $_POST['username']);
        $stmt->bindValue(':email', $_POST['email']);
        $stmt->bindValue(':id', $_POST['id']);
        $stmt->execute();
        header('location: admin.php');
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

        $sql = 'SELECT * FROM user WHERE id = :id';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', $_GET['id']);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            $title = 'Edit User';
            ob_start();
            include 'templates/edit_users.html.php';
            $output = ob_get_clean();
        } else {
            $title = 'User not found';
            $output = 'No user found with the specified ID.';
        }
    } catch (PDOException $e) {
        $title = 'An error has occurred';
        $output = 'Database error: ' . $e->getMessage();
    }
}
include 'templates/layout.html.php';
