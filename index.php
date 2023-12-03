<?php require_once "functions.php"; 
if( !empty($_POST)) {
    $error_message = "";
    $email = $_POST["email"];
    $password = $_POST["password"];
    //パスワードの入力チェック
    if( empty($password) ) {
        $error_message .= "パスワードが入力されていません";
        return;
    }
    if( empty($email) ) {
        echo "メールアドレスが入力されていません";
        return;
    }
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
    $sql = "SELECT * FROM login WHERE email = :email";
    //SQLステートメントの準備
    $statement = $db->prepare($sql);
    $statement->bindValue(':email', $_POST['email']);
    //SQL実行
    $statement->execute();
    //結果の取得
    $result = $statement->fetch();
    if( !$result ) {
        $error_message .= "無効なユーザーです";
        return;
    }

    //パスワードが一致するか
    if ( $_POST['password'] === $result['password'] ) {
        $_SESSION["id"] = $result["id"];
        $_SESSION["email"] = $result["email"];
        echo '<p>ログインしました。</p>';
    } else {
        echo '<p>パスワードが間違っています。</p>';
    }
    echo "<a href='schoolpage.php'> TOPへ</a>";
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <?php include "parts/head.php"; ?>
    <link rel="stylesheet" href="<?= $url; ?>assets/css/login.css">
    <script></script>
    <title>Class Community--login</title>
</head>
<body>
<?php include "parts/header.php"; ?>
    <main class="main">
        <div class="login-page">
            <div class="login-pageTitle">
                <h2 class="login-pageTitle-h2">WELCOME TO</h2>
                <br>
                <h1 class="login-pageTitle-h1">CLASS COMMUNITY</h1>
                <br>
                <h2 class="login-pageTitleExplanation">CLASS COMMUNITYを使うことによって<br>他クラスの授業記録が見れたり、<br>学校内で新たなコミュニティを構築することができます。</h2>
            </div>
            <div class="login-pageTitle-email"></div>
        </div>
        <div class="sideMenu">
        <div class="login-form">
            <h2 class="login-formTitle">SIGN IN</h2>
            <form action="" method="post" class="login-formInputs">
            <h2 class="passwordTitle"></h2>
            <input name="password" type="password" id="password" class="login-formInput" rows="100" placeholder="パスワードを入力"></input>
            <input name="email" type="text" id="email" class="login-formInput" rows="100" placeholder="メールアドレスを入力"></input>
            <button type="submit" class="login-formButton">ログイン</button>
            </form>
            <?php if(!empty($error_message)): ?><p class="error_message"><?php echo "メールアドレスまたはパスワードが間違っています。" ?></p><?php endif; ?>
            <div class="login-form-subText"><a href="" class="">パスワードを忘れた場合</a></div>
            <div class="login-form-subText"><a href="" class="">管理者ログイン</a></div>
        </div>
</div>
    </main>
</body>
</html>
