<?php //セッションの開始
    session_start();
    $url = (empty($_SERVER["HTTPS"]) ? "http://" : "https://") . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
    $url = preg_replace("#\/[a-zA-Z0-9\-_.]+\.php$#u", "/" ,$url);
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
    if(isset($_SESSION["id"])) {
        //SQL文の定義
    $sql = "SELECT * FROM login WHERE id = :id";
    //SQLステートメントの準備
    $statement = $db->prepare($sql);
    $statement->bindValue(':id', $student_id);
    //SQL実行
    $statement->execute();
    //結果の取得
    $result = $statement->fetch();
    }
    if(empty($_SESSION["id"]) && !strpos($_SERVER["PHP_SELF"],"index.php")) {    
        header("Location:{$url}index.php");
        exit;
    }elseif(isset($_SESSION["id"]) && empty($result["profile"]) && !strpos($_SERVER["PHP_SELF"],"self_introduction_edit.php")) {
        header("Location:{$url}self_introduction_edit.php");
        exit;
    }

    function sc_is_login(){
        $login = !empty($_SESSON["id"]);
        return $login;
    }
    ?>