<?php require_once "functions.php"; ?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <?php include "parts/head.php"; ?>
    <link rel="stylesheet" href="<?= $url; ?>assets/css/schoolPage.css">
    <title>Class Community--School Page</title>
</head>
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
                    <button type="button" class="listMenu__button"><i class="fa-solid fa-magnifying-glass"></i><a href="" class="">探す</a></input>
                </div>
                <div class="listMenu__buttonLayout2">
                    <button type="button" class="listMenu__button listMenu__button--classStudent"><i class="fas fa-user"></i><a href="find_students.php" class="">生徒を探す</a></input>
                </div>
            </div>
            <div class="listMenu__item">
                <button type="button" class="listMenu__button listMenu__button--class"><i class="fas fa-user-pen"></i><a href="" class="">クラスページを編集</a></button>
            </div>
            <div class="listMenu__buttonLayout3">
                <button type="button" class="listMenu__button listMenu__button--community"><i class="fas fa-users"></i><a href="community.php" class="">コミュニティ</a></button>
            </div>
        </div>
    </aside>
    <main class="main">
        <div class="main__contents">
            <div class="mainTitle">
                <h1 class="mainTitle__h1">桐蔭学園中等教育学校</h1>
                <ul class="mainTitle__ul">
                    <li class="mainTitle__li">場所       〒225-8502神奈川県横浜市青葉区鉄町1614番地 </li>
                    <li class="mainTitle__li">電話番号       045-971-1411</li>
                </ul>
                <a href="https://toin.ac.jp/ses/" class="mainTitle__link" style="text-decoration: underline">桐蔭学園中等教育学校のホームページはこちら</a>
            </div>
            <div class="mainMap"><iframe class="mainMap__frame" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3245.4523853568967!2d139.52002462531647!3d35.56722443622909!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6018f9dde300b9a3%3A0x6010bd7537604bad!2z5qGQ6JSt5a2m5ZyS5Lit562J5pWZ6IKy5a2m5qCh!5e0!3m2!1sja!2sjp!4v1693137586102!5m2!1sja!2sjp" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>
        </div>
        <div class="main__image">
            <img class="mainVisual" src="<?= $url; ?>assets/img/shoolPage/toinlogo.jpg" alt="">
        </div>
    </main>
</div>
<body>
</body>
</html>