<?php //セッションの開始
    session_start();
    ?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/class-community/assets/css/lib/reset.css">
    <link rel="stylesheet" href="/class-community/assets/css/common.css">
    <link rel="stylesheet" href="/class-community/assets/css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script></script>
    <title>Class Community--login</title>
</head>
<header>
<div class="subHeader">
    <h2 class="subHeader__heading">Class Community</h2>
    <nav>
        <button class="menu-toggle">
        <div></div>
        <div></div>
        <div></div>
        </button>
        </nav>
</div>
</header>
<div class="container">
    <aside>
        <div class="mainMenu">
            <div class="listMenu__item">
                <h2 class="listMenu__title">桐蔭学園中等教育学校</h2>
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
                    <button type="submit" class="listMenu__button"><a href="" class=""><i class="fa-solid fa-magnifying-glass"></i>探す</a></button>
                </div>
                <div class="listMenu__buttonLayout2">
                    <button type="submit" class="listMenu__button listMenu__button--classStudent"><i class="fas fa-user"></i><a href="" class="">生徒を探す</a></button>
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
    </main>
    <div class="sideMenu">
        <div class="login-form">
            <h2 class="login-formTitle">SIGN IN</h2>
            <form action="" method="post">
            <h2 class="passwordTitle"></h2>
            <input type="password" id="password" class="login-formPassword" rows="100" placeholder="パスワードを入力"></input>
            <h2 class="schoolIdTitle"></h2>
            <input type="email" id="email" class="login-formSchoolId" rows="100" placeholder="メールアドレスを入力"></input>
            <button type="submit" class="login-formButton">ログイン</button>
            </form>
            <p class=""><?php ?></p>
            <div class="forgotPassword"><a href="" class="">パスワードを忘れた場合</a></div>
            <div class="administratorLogin"><a href="" class="">管理者ログイン</a></div>
        </div>
</div>
</html>
<?php
var_dump($_POST);
if( !empty($_POST)) {
    $name = $_POST["name"];
    $email = $POST["email"];
    $password = $_POST["password"];
    //ユーザー名の入力チェック
    if ( empty($name)) {
        echo "ユーザー名が入力されていません";
        return;
    }
    //パスワードの入力チェック
    if( empty($password) ) {
        echo "パスワードが入力されていません";
        return;
    }
    if( empty($email) ) {
        echo "メールアドレスが入力されていません";
        return;
    }
    //db接続情報
    $db_name = "mysql:host=localhost; dbname=youri;";
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
    $sql = "SELECT * FROM login WHERE name = :name";
    //SQLステートメントの準備
    $statement = $db->prepare($sql);
    $statement->bindValue(':name', $_POST['name']);
    //SQL実行
    $statement->execute();
    //結果の取得
    $result = $statement->fetch();
    if( !$result ) {
        echo "無効なユーザーです";
        return;
    }

    //パスワードが一致するか
    if ( $_POST['password'] === $result['password'] ) {
        $_SESSION["id"] = $result["id"];
        $_SESSION["name"] = $result["name"];
        $_SESSION["email"] = $result["email"];
        echo '<p>ログインしました。</p>';
    } else {
        echo '<p>パスワードが間違っています。</p>';
    }
    echo "<a href='schoolPage.html'> TOPへ</a>";
}
?>