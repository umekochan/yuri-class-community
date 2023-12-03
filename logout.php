<?php require_once "functions.php"; ?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <?php include "parts/head.php"; ?>
    <link rel="stylesheet" href="<?= $url; ?>assets/css/logout.css">
    <title>Class Community--logout</title>
</head>
<body>
<?php include "parts/header.php"; ?>
<mainv class="main">
    <p class="logout_message">ログアウトしました。</p>
</main>
</body>
</html>
<?php 
$_SESSION = [];
session_destroy();
?>