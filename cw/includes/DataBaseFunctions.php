<?php
function totalQuestions($pdo){
    $query = $pdo->prepare('SELECT COUNT(*) FROM post');
    $query->execute();
    $row = $query->fetch();
    return $row[0];
}
?>