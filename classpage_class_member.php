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

global $login_user;
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
        <?php include "parts/aside.php"; ?>
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
            <p class="class_member_name"><?php echo $login_user["name"]; ?></p>
            <div class="class_member__message">
                <p class="class_member_introduce">自己紹介:</p><?= $result["profile"]; ?>
            </div>
            <div class="class_member2"></div>
        </div>
        </div>
    </main>
</div>
</body>
</html>