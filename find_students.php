<?php require_once "functions.php"; ?>
<?php 
    $db = get_db();
    //!empty($_GET["grade"]) || !empty($_GET["class"]) || !empty($_GET["search_keyword"])
    if(!empty($_GET)) {
        //検索条件が指定されている
        $datas = [];
        $query_keyword = '';
        $query_grade = '';
        $query_class = '';
        
        if(!empty($_GET["search_keyword"])){
            $keyword = $_GET["search_keyword"];
            $datas[":name"] = "%{$keyword}%";
            $datas[":profile"] = "%{$keyword}%";
            $query_keyword = "WHERE name LIKE :name OR profile LIKE :profile";
        }
        if(!empty($_GET['grade'])){
            $grade = $_GET['grade'];
            $datas[":grade"] = $grade;
            $query_grade = "AND grade.id = :grade";
        }
        if(!empty($_GET['class'])){
            $class = $_GET['class'];
            $datas[":class"] = $class;
            $query_class = "AND class.id = :class";
        }
        
        $get_user_sql = "SELECT login.*, grade.grade_number, class.class_number 
        FROM login 
        INNER JOIN class ON class.id = class_id {$query_class} 
        INNER JOIN grade ON grade.id = grade_id {$query_grade} 
         {$query_keyword}";
        print_r($get_user_sql);
        $users_db = get_query($get_user_sql,$datas,true);
    }else{
        $get_user_sql = "select login.*, login.name, grade.grade_number, class.class_number from login inner join class on class.id = class_id inner join grade on grade.id = grade_id";
        $users_db = get_query($get_user_sql,null,true);
    }

    $grade_sql = "SELECT * FROM grade";
    $grade_lists = get_query($grade_sql, null, true);

    $class_sql = "SELECT * FROM class";
    $class_lists = get_query($class_sql, null, true);
    // $student_id = $_SESSION["id"];
    // //db接続情報
    // $db_name = "mysql:host=localhost; dbname=class_community;";
    // $db_username = "root";
    // $db_password = "";
    
    // //db接続
    // try {
    //     $db = new PDO($db_name, $db_username, $db_password);
    // } catch ( PDOException $e) {
    //     //エラー処理
    //     $msg = $e->getMessage();
    //     echo "DB接続エラー__Error";
    //     echo $msg;
    //     exit;
    // }
    // //SQL文の定義
    // $sql = "SELECT * FROM login WHERE id = :id";
    // //SQLステートメントの準備
    // $statement = $db->prepare($sql);
    // $statement->bindValue(':id', $student_id);
    // //SQL実行
    // $statement->execute();
    // //結果の取得
    // $result = $statement->fetch();
    // if( !$result ) {
    //     return;
    // }

    // $get_user_sql = "select * from login inner join class on class.id = class_id inner join grade on grade.id = grade_id";
    // $statement = $db->query($get_user_sql);
    // $users_db = $statement->fetchAll(PDO::FETCH_ASSOC);
    // $users = array_column($users_db,"name","id");
    // $class_users = array_column($users_db,"class_number","id");
    // $grade_users = array_column($users_db,"grade_number","id");
    
    global $login_user;
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <?php include "parts/head.php"; ?>
    <link rel="stylesheet" href="<?= $url; ?>assets/css/find-students.css">
    <title>Class Community--find students</title>
    <style>
        .find-student select {
            border: 1px solid #ccc;
            padding: .6rem 2rem;
            font-size: 1.5rem;
            border-radius: 5px;
            background-color: white;
            min-width: 5rem;
            margin-right: 1rem;
            text-align: center;
        }
    </style>
</head>
<body>
<?php include "parts/header.php"; ?>
<div class="container">
    <aside>
        <?php include "parts/aside.php"; ?>
    </aside>
    <main class="main">
        <form method="GET">
            <div class="find-student">
                <div class="find-student-input">
                    <select name="grade" id="search_grade">
                        <option selected disabled value>学年</option>
                        <?php foreach($grade_lists as $grade): ?>
                            <option value="<?= $grade['id']; ?>"><?= $grade['grade_number']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <select name="class" id="search_class">
                        <option selected disabled value>クラス</option>
                        <?php foreach($class_lists as $class): ?>
                            <option value="<?= $class['id']; ?>"><?= $class['class_number']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <input name="search_keyword" type="text" size="85" class="searchBox" placeholder="キーワードを入力"></input>
                </div>
                <div class="find-student-box">
                    <button type="submit" class="listMenu__button listMenu__button--find-student"><i class="fa-solid fa-magnifying-glass"></i>探す</button>
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
            <?php foreach($users_db as $user): ?>
            <div class="student">
                <div class="s_grade">
                    <div class="student_grade"><?php echo $user["grade_number"]; ?>年</div>
                </div>
                <div class="s_class">
                    <div class="student_class"><?php echo $user["class_number"]; ?>組</div>
                </div>
                <div class="s_name">
                    <a href="classpage_class_member.php" class="student_name" style="text-decoration: underline"><?php echo $user["name"]; ?></a>
                </div>
                <div class="s_introduce">
                    <div class="student_introduce"><?php echo $user["profile"]; ?></div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </main>
</div>
</body>
</html>