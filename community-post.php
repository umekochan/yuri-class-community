<?php require_once "functions.php"; ?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <?php include "parts/head.php"; ?>
    <link rel="stylesheet" href="<?= $url; ?>assets/css/community.css">
    <link rel="stylesheet" href="<?= $url; ?>assets/css/community-post.css">
    <title>Class Community--community-page</title>
</head>
<body>
<?php include "parts/header.php"; ?>
<div class="container">
    <aside>
        <?php include "parts/aside.php"; ?>
    </aside>
    <main class="main">
        <form action="" method="post">
            <div class="contribtion-wrapper-write">
                <div class="contribtion-write">
                    <div class="contribtion-write-name-class">
                        <div class="contribtion-write-name">榎本悠里</div>
                        <div class="contribtion-write-class">22期4組</div>
                    </div>
                    <div class="contribtion-contents">
                        <p class="contribtion-contents-message">＊質問する内容をここに書いて下さい</p>
                        <textarea class="contribtion-contents-textrarea"  id="" name="" rows="21" cols="70"></textarea>
                    </div>
                    <div class="contribtion-write-button"><button type="button" class="listMenu__button contribtion-back-button"><i class="fa-solid fa-backward"></i><a href="community.php" class="">  戻る</a></button>
                    </div>
                </div>
            </div>
        </form>
    </main>
</body>
</html>
            