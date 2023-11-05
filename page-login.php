<?php get_header();global $error; ?>
<div class="container">
    <?php get_template_part("template-parts/side-menu/class","search"); ?>
    <main class="main">
        <div class="login-page">
            <div class="login-pageTitle">
                <h2 class="login-pageTitle-h2">WELCOME TO</h2>
                <br>
                <h1 class="login-pageTitle-h1">CLASS COMMUNITY</h1>
                <br>
                <h2 class="login-pageTitleExplanation">CLASS COMMUNITYを使うことによって<br>他クラスの授業記録が見れたり、<br>学校で新たなコミュニティを構築することができます。</h2>
            </div>
            <div class="login-pageTitle-email"></div>
        </div>
    </main>
    <div class="sideMenu">
        <div class="login-form">
        <form action="<?php the_permalink(); ?>" method="post">
            <h2 class="login-formTitle">SIGN IN</h2>
            <h2 class="passwordTitle">ユーザー</h2>
            <input type="password" name="user_pass" id="password" class="login-formPassword" rows="100" placeholder="パスワードを入力">
            <h2 class="schoolIdTitle">学校</h2>
            <input type="email" name="user_email" id="email" class="login-formSchoolId" rows="100" placeholder="メールアドレスを入力">
            <button type="submit" class="login-formButton"><a href="" class="">ログイン</a></button>
            <p class="errorMessage"><?php echo $error; ?></p>
            <div class="forgotPassword"><a href="" class="">パスワードを忘れた場合</a></div>
            <div class="administratorLogin"><a href="" class="">管理者ログイン</a></div>
        </form>
        </div>
</div>
<?php get_footer(); ?>
