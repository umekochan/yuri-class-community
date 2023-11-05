<?php
//Titleタグの有効化
function setup_my_theme() {
    add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'setup_my_theme');
function add_files() {
    wp_enqueue_style("reset", get_theme_file_uri("/assets/css/lib/reset.css"));
    wp_enqueue_style("classPage-class-member", get_theme_file_uri("/assets/css/lib/classPage-class-member.css"));
    wp_enqueue_style("common", get_theme_file_uri("/assets/css/lib/common.css"));
    wp_enqueue_style("find-students", get_theme_file_uri("/assets/css/lib/find-students.css"));
    wp_enqueue_style("login", get_theme_file_uri("/assets/css/lib/login.css"));
    wp_enqueue_style("schoolPage", get_theme_file_uri("/assets/css/lib/schoolpage.css"));
    wp_enqueue_style("self-introduction", get_theme_file_uri("/assets/css/lib/self-introduction.css"));
}
add_action('wp_enqueue_scripts','add_files');

//ログインをしていなかったらログイン画面に移動させる
function go_to_login() {
    //新規登録ページだったら除外
    //ログイン画面だったら除外
    if(is_page("login")) {
        return;
    }
    //ログアウト画面だったら除外
    if(is_page("logout")) {
        return;
    }
    //ログイン状態を調べる
    if(is_user_logged_in()) {
        return;
    }
    else {
        wp_safe_redirect("/login");
    }
}
add_action('template_redirect', 'go_to_login');

function login_init() {
    //ログインページからのアクセスでなければ関数を終了する
    if ( !is_page( 'login' ) ) {
        return;
    }

    //変数$errorのグローバル宣言
    global $error;
    $error = "";
    $br ="<br/>";
    var_dump($_POST);

    //メールアドレスのチェック
    if ( !empty( $_POST['user_email'] ) ) {
        $email = $_POST['user_email'];
    } else {
        $error .= "メールアドレスを入力してください{$br}";
    }

    //パスワードのチェック
    if ( !empty( $_POST['user_pass'] ) ) {
        $password = $_POST['user_pass'];
    } else {
        $error .= "パスワードを入力してください{$br}";
    }

    //エラーが無ければログイン処理へ進む
    if ( !$error ) {
        //ユーザー情報の取得
        $user = get_user_by( 'email', $email );

        //存在しないメールアドレスの場合
        if ( false === $user ) {
            $error .= "メールアドレスが間違っています。{$br}";

        } else {
            //ユーザー情報を配列に定義
            $login = array();
            $login['user_login'] = $user->data->user_login;
            $login['user_password'] = $password;
            $login['remember'] = true;

            //ログインの実行
            $user = wp_signon( $login, false );
            
            //ログイン失敗時の処理
            if ( is_wp_error( $user ) ) {
                if ( array_key_exists( 'incorrect_password', $user->errors ) ) {
                    $error .= "パスワードが間違っています。{$br}";
                } else {
                    $error .= "ログインに失敗しました。{$br}";
                }
            
            //ログイン成功時の処理
            } else {
                //ホーム画面へリダイレクト
                echo "ログインしました。";
                wp_safe_redirect( home_url() );
            }
        }
    }
}
add_action( 'template_redirect', 'login_init' );
?>