<?php
session_start();
require_once 'conn.php';

if(!isset($_SESSION['user'])){
    header('location: index.php');
    exit();
}

$id = $_SESSION['user'];
$sql = $conn->prepare("SELECT * FROM `user` WHERE `id`=?");
$sql->execute(array($id));
$fetch = $sql->fetch();

$title = 'Greenwich Student Forum';
ob_start();
include 'templates/home.html.php';
$output = ob_get_clean();
include 'templates/layout.html.php';
?>