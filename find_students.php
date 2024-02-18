<?php require_once "functions.php"; ?>
<?php 
    $db = get_db();

    if(!empty($_POST["subject"])) {
        $set_post_sql = "insert into community_posts(user_id, subject, text, create_date)
        values (:user_id, :subject, :text, now() )";
        $param = [":user_id"=> $_SESSION["id"], ":subject"=> $_POST["subject"], ":text"=> $_POST["text"],":create_date"=> $_SESSION["create_date"]];
        $statement = $db->prepare($set_post_sql);
        $statement->execute($param);
    }
    $get_post_sql = "select * from community_posts order by create_date desc";
    $statement = $db->query($get_post_sql);
    $posts = $statement->fetchAll(PDO::FETCH_ASSOC);
    
    $get_user_sql = "select id, name from login";
    $statement = $db->query($get_user_sql);
    $users_db = $statement->fetchAll(PDO::FETCH_ASSOC);
    $users = array_column($users_db,"name","id");

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
    <meta charset="UTF-8">
    <?php include "parts/head.php"; ?>
    <link rel="stylesheet" href="<?= $url; ?>assets/css/find-students.css">
    <title>Class Community--find students</title>
</head>
<body>
<?php include "parts/header.php"; ?>
<div class="container">
    <aside>
        <?php include "parts/aside.php"; ?>
    </aside>
    <main class="main">
        <form action="" method="post">
            <div class="find-student">
                <div class="find-student-input">
                    <input type="text" size="85" class="searchBox" placeholder="キーワードを入力"></input>
                </div>
                <div class="find-student-box">
                    <button type="submit" class="listMenu__button listMenu__button--find-student"><i class="fa-solid fa-magnifying-glass"></i><a href="" class="">探す</a></button>
            </div>
        </div>
        </form>
        <div class="menu_wraper">
            <div class="menu">
                <div class="grade">
                    <div class="top menu_grade">学年</div>
                </div>
                <div class="class">
                    <div class="top menu_class">クラス</div>
                </div>
                <div class="name">
                    <div class="top menu_name">名前</div>
                </div>
                <div class="introduce">
                    <div class="top menu_introduce">自己紹介</div>
                </div>
            </div>
            <div class="student">
                <div class="s_grade">
                    <div class="student_grade">２年</div>
                </div>
                <div class="s_class">
                    <div class="student_class">４組</div>
                </div>
                <div class="s_name">
                    <a href="classpage_class_member.php" class="student_name" style="text-decoration: underline"><?php echo $login_user["name"]; ?></a>
                </div>
                <div class="s_introduce">
                    <div class="student_introduce"><?= $result["profile"]; ?></div>
                </div>
            </div>
        </div>
    </main>
</div>
</body>
</html>