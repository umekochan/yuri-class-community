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
if(!empty($_POST["profile"])) {
    $sql = "UPDATE login SET profile = :profile WHERE id = :id";
    //SQLステートメントの準備
    $statement = $db->prepare($sql);
    $statement->bindValue(':id', $student_id);
    $statement->bindValue(':profile', $_POST["profile"]);
    //SQL実行
    $statement->execute();
    header("Location:{$url}classPage_class_member.php");
    exit;
}
?>
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
                        <button type="submit" class="listMenu__button"><i class="fa-solid fa-magnifying-glass"></i><a href="" class="">探す</a></button>
                    </div>
                    <div class="listMenu__buttonLayout2">
                        <button type="submit" class="listMenu__button listMenu__button--classStudent" ><i class="fas fa-user"></i><a href="/find students.html" class="">生徒を探す</a></button>
                    </div>
                </div>
                <div class="listMenu__item">
                    <button type="submit" class="listMenu__button listMenu__button--class"><i class="fas fa-user-pen"></i><a href="" class="">クラスページを編集</a></button>
                </div>
                <div class="listMenu__buttonLayout3">
                    <button type="submit" class="listMenu__button listMenu__button--community"><i class="fas fa-users"></i><a href="" class="">コミュニティ</a></button>
                </div>
            </div>
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
                    <textarea class="mainTitle__textrarea"  id="" name="profile" rows="12" cols="50" required>
                    </textarea>
                    <div class="listMenu__buttonLayout4">
                    <button type="submit" class="listMenu__button listMenu__button--class"><i class="fa-solid fa-plus"></i>クラスページに投稿</button>
                </div>
                    </form>
            </div>
        </main>
</body>
</html>