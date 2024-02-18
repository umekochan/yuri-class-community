<?php require_once "functions.php"; ?>
<!DOCTYPE html>
<html lang="ja">
<head>
<?php include "parts/head.php"; ?>
    <link rel="stylesheet" href="<?= $url; ?>assets/css/self-introduction.css">
    <title>Class Community--Self-Introduction</title>
</head>
<body>
<?php include "parts/header.php"; ?>
    <div class="container">
        <aside>
            <?php include "parts/aside.php"; ?>
        </aside>
        <main class="main">
            <div class="mainTitle">
                <h1 class="mainName__h1">榎本悠里さん</h1>
                <br>
                <h2 class="mainName__h2">2年4組7番</h2>
                <p class="main__profile">プロフィール：<br>ここに自分の自己紹介を簡単に書いてください。<br>例えば、自分の趣味、SNSのアカウントなど<br>
＊このページはあなたのクラスページの中にあるクラスメンバーという項目に投稿されます。<br>
＊このページを投稿することによって学校内で新たなコミュニティを作ることができます。</p>
                    <form class="mainTitle__textrareaForm" method="post" action="">
                    <textarea class="mainTitle__textrarea"  id="" name="otoiawase" rows="12" cols="50" required>
                    </textarea>
                    <div class="listMenu__buttonLayout4">
                    <button type="submit" class="listMenu__button listMenu__button--class"><i class="fa-solid fa-plus"></i>クラスページに投稿</button>
                </div>
                    </form>
            </div>
        </main>
</body>
</html>