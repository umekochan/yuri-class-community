<?php require_once "functions.php"; ?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <?php include "parts/head.php"; ?>
    <link rel="stylesheet" href="<?= $url; ?>assets/css/find-students.css">
    <title>Class Community--find students</title>
</head>
<body>
<?php include "parts/header.php"; ?>
<div class="container">
    <aside>
        <div class="mainMenu">
            <h2 class="listMenu__title1">桐蔭学園中等教育学校</h2>
            <p class="listMenu__title3">榎本悠里<br> 2年4組 ７番</p>
            <div class="listMenu__item">
                <h2 class="listMenu__title2">クラス名</h2>
                <select name="" id="" class="listMenu__classSelect">
                    <option value="">クラスを選択してください</option>
                    <option value="">1-1</option>
                    <option value="">1-2</option>
                    <option value="">1-3</option>
                    <option value="">1-4</option>
                    <option value="">1-5</option>
                    <option value="">1-6</option>
                    <option value="">1-7</option>
                    <option value="">1-8</option>
                    <option value="">2-1</option>
                    <option value="">2-2</option>
                    <option value="">2-3</option>
                    <option value="">2-4</option>
                    <option value="">2-5</option>
                    <option value="">2-6</option>
                    <option value="">2-7</option>
                    <option value="">3-1</option>
                    <option value="">3-2</option>
                    <option value="">3-3</option>
                    <option value="">3-4</option>
                    <option value="">3-5</option>
                    <option value="">3-6</option>
                    <option value="">3-7</option>
                    <option value="">4-1</option>
                    <option value="">4-2</option>
                    <option value="">4-3</option>
                    <option value="">4-4</option>
                    <option value="">4-5</option>
                    <option value="">4-6</option>
                    <option value="">4-7</option>
                    <option value="">5-1</option>
                    <option value="">5-2</option>
                    <option value="">5-3</option>
                    <option value="">5-4</option>
                    <option value="">5-5</option>
                    <option value="">5-5</option>
                    <option value="">5-6</option>
                    <option value="">5-7</option>
                    <option value="">6-1</option>
                    <option value="">6-2</option>
                    <option value="">6-3</option>
                    <option value="">6-4</option>
                    <option value="">6-5</option>
                    <option value="">6-6</option>
                    <option value="">6-7</option>
                </select>
                <div class="listMenu__buttonLayout">
                    <button type="submit" class="listMenu__button"><a href="" class=""><i class="fa-solid fa-magnifying-glass"></i>探す</a></input>
                </div>
                <div class="listMenu__buttonLayout2">
                    <button type="submit" class="listMenu__button listMenu__button--classStudent"><i class="fas fa-user"></i><a href="" class="">生徒を探す</a></input>
                </div>
            </div>
            <div class="listMenu__item">
                <button type="submit" class="listMenu__button listMenu__button--class"><i class="fas fa-user-pen"></i><a href="" class="">クラスページを編集</a></button>
            </div>
            <div class="listMenu__buttonLayout3">
                <button type="submit" class="listMenu__button listMenu__button--community"><i class="fas fa-users"></i><a href="community.php" class="">コミュニティ</a></button>
            </div>
        </div>
    </aside>
    <main class="main">
        <div class="find-student">
            <input type="text" class="searchBox" placeholder="キーワードを入力"></input>
            <button type="submit" class="listMenu__button listMenu__button--find-student"><i class="fa-solid fa-magnifying-glass"></i><a href="" class="">探す</a></button>
        </div>
    </main>
</div>
</body>
</html>