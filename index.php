<?php require_once "functions.php"; 
$error_password_message = "";
if( !empty($_POST["password"])&& !empty($_POST["email"])) {
    $error_message = "";
    $email = $_POST["email"];
    $password = $_POST["password"];
    get_db();
    //SQL文の定義
    $sql = "SELECT * FROM login WHERE email = :email";
    // //SQLステートメントの準備
    // $statement = get_db()->prepare($sql);
    // $statement->bindValue(':email', $_POST['email']);
    // //SQL実行
    // $statement->execute();
    $datas = [":email" => $_POST["email"]];
    $result = get_query($sql,$datas,false);
    if( !$result ) {
        $error_message .= "無効なユーザーです";
    }
    //パスワードが一致するか
    if ( $_POST['password'] === $result['password'] ) {
        $_SESSION["id"] = $result["id"];
        $_SESSION["email"] = $result["email"];
        header("Location:{$url}schoolpage.php");
        exit;
    } else {
        $error_password_message = "パスワードが一致しません";
    }
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
                <h2 class="login-pageTitleExplanation">CLASS COMMUNITYを使うことによって<br>他クラスの授業記録を見る、<br>学校内で新たなコミュニティを構築することが可能です。</h2>
            </div>
            <div class="login-pageTitle-email"></div>
        </div>
        <div class="sideMenu">
        <div class="login-form">
            <h2 class="login-formTitle">SIGN IN</h2>
            <form action="" method="post" class="login-formInputs">
            <h2 class="passwordTitle"></h2>
            <input name="password" type="password" id="password" class="login-formInput" rows="100" placeholder="パスワードを入力"></input>
            <p class="error_password_message delate">パスワードが間違っています</p>
            <p class=""><?php echo $error_password_message; ?></p>
            <input name="email" type="text" id="email" class="login-formInput" rows="100" placeholder="メールアドレスを入力"></input>
            <p class="error_email_message delate">メールアドレスが間違っています</p>
            <button type="button" class="login-form_false_Button">ログイン</button>
            </form>
            <div class="login-form-subText"><a href="" class="">パスワードを忘れた場合</a></div>
            <div class="login-form-subText"><a href="" class="">管理者ログイン</a></div>
        </div>
</div>
    </main>
</body>
<script>
let class_login_button = document.querySelector(".login-form_false_Button");
function class_login_button_click(event) {
    let password = document.querySelector("#password");
    let email = document.querySelector("#email");
    let password_message = document.querySelector(".error_password_message.delate");
    let email_message = document.querySelector(".error_email_message.delate");
    let validation_error = 0;
    if(password.value == ""){
        password_message.classList.remove("delate");
        validation_error ++;
    }
    if(email.value == ""){
        email_message.classList.remove("delate");
        validation_error ++;
    }
    if(validation_error == 0){
        document.querySelector(".login-formInputs").submit();
    }
}
class_login_button.addEventListener("click",class_login_button_click);
</script>
</html>
