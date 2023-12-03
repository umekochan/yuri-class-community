<?php //セッションの開始
    session_start();
    $url = (empty($_SERVER["HTTPS"]) ? "http://" : "https://") . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
    $url = preg_replace("#\/[a-zA-Z0-9\-_.]+\.php$#u", "/" ,$url);
    if(empty($_SESSION["id"]) && !strpos($_SERVER["PHP_SELF"],"index.php")) {
        header("Location:{$url}index.php");
        exit;
    }
    function sc_is_login(){
        $login = !empty($_SESSON["id"]);
        return $login;
    }
    ?>