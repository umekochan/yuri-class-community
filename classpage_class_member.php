<?php require_once "functions.php";
$student_id = $_SESSION["id"];
//db接続情報
$db_name = "mysql:host=localhost; dbname=class_community;";
$db_username = "root";
$db_password = "";

//db接続
try {
    $db = new PDO($db_name, $db_username, $db_password);
} catch ( PDOException $e) {
    //エラー処理
    $msg = $e->getMessage();
    echo "DB接続エラー__Error";
    echo $msg;
    exit;
}
//SQL文の定義
$sql = "SELECT * FROM login WHERE id = :id";
//SQLステートメントの準備
$statement = $db->prepare($sql);
$statement->bindValue(':id', $student_id);
//SQL実行
$statement->execute();
//結果の取得
$result = $statement->fetch();
if( !$result ) {
    return;
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<?php include "parts/head.php"; ?>
    <link rel="stylesheet" href="<?= $url; ?>assets/css/classPage-class-member.css">
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
                    <button type="button" class="listMenu__button"><i class="fa-solid fa-magnifying-glass"></i><a href="" class="">探す</a></button>
                </div>
                <div class="listMenu__buttonLayout2">
                    <button type="button" class="listMenu__button listMenu__button--classStudent"><i class="fas fa-user"></i><a href="/find students.html" class="">生徒を探す</a></button>
                </div>
            </div>
            <div class="listMenu__item">
                <button type="button" class="listMenu__button listMenu__button--class"><i class="fas fa-user-pen"></i><a href="" class="">クラスページを編集</a></button>
            </div>
            <div class="listMenu__buttonLayout3">
                <button type="button" class="listMenu__button listMenu__button--community"><i class="fas fa-users"></i><a href="" class="">コミュニティ</a></button>
            </div>
        </div>
    </aside>
    <main class="main">
        <div class="classTitle">
            <h2 class="classTitleName">中等2年4組</h2>
            <h2 class="classTitleName2">@F棟302教室</h2>
        </div>
        <div class="classWraper">
        <div class="classMenu">
            <div class="listClass__button1 classMember">
                <button type="button" class="listClassMenu__button listClassMenu__button--classMember"><i class="fa-solid fa-user-group"></i><a href="" class="">クラスメンバー</a></button>
            </div>
            <div class="listClass__button1">
                <button type="button" class="listClassMenu__button listClassMenu__button--wacthPicture"><i class="fa-regular fa-images"></i><a href="" class="">最近のクラス写真</a></button>
            </div>
            <div class="listClass__button1">
                <button type="button" class="listClassMenu__button listClassMenu__button--learningRecords"><i class="fa-solid fa-clipboard"></i><a href="" class="">クラスの学習記録</a></button>
            </div>
        </div>
        <div class="class_member">
            <div class="class_member__message">
                <?= $result["profile"]; ?>
            </div>
        </div>
        </div>
    </main>
</div>
</body>
</html>