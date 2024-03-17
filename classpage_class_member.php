<?php require_once "functions.php";
$student_id = $_SESSION["id"];
$login_id = $_SESSION["id"];
$get_user_sql = "select * from login inner join class on class.id = class_id inner join grade on grade.id = grade_id where login.id = :login_id";
    // $statement = get_db()->query($get_user_sql);
    // $users_db = $statement->fetchAll(PDO::FETCH_ASSOC);
    $datas = [":login_id" => $login_id];
    $users_db = get_query($get_user_sql,$datas,true);
    $users = array_column($users_db,"name","id");
    $grades = $users_db[0]["grade_number"];
    $classes = $users_db[0]["class_number"];
$get_user_sql = "select * from login inner join class on class.id = class_id inner join grade on grade.id = grade_id where grade_number = :grades and class_number = :classes";
$datas = [":grades" => $grades,":classes" => $classes];
$users_db = get_query($get_user_sql,$datas,true);
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
        <div class="class_members">
            <?php foreach($users_db as $user): ?>
            <div class="class_member">
                <p class="class_member_name"><?php echo $user["name"]; ?></p>
                <div class="class_member__message">
                    <p class="class_member_introduce">自己紹介:</p><?php echo $user["profile"]; ?>
                </div>
                <div class="class_member2"></div>
            </div>
            <?php endforeach; ?>
        </div>
        </div>
    </main>
</div>
</body>
</html>