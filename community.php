<?php require_once "functions.php"; ?>
<?php 
    $db = get_db();
    global $login_user;
    if(!empty($_POST["subject"])) {
        $set_post_sql = "insert into community_posts(user_id, subject, text, create_date)
        values (:user_id, :subject, :text, now() )";
        $param = [":user_id"=> $_SESSION["id"], ":subject"=> $_POST["subject"], ":text"=> $_POST["text"]];
        $statement = $db->prepare($set_post_sql);
        $statement->execute($param);
    }elseif(!empty($_POST["replay_message"])){
        $set_replay_sql = "insert into community_replays(post_id,user_id,text,create_date) values (:post_id, :user_id, :text, now())";
        $param = [":post_id" => $_POST["post_id"], ":user_id" => $_SESSION["id"], ":text" => $_POST["replay_message"]];
        $statement = $db->prepare($set_replay_sql);
        $statement->execute($param);
    }
    if(!empty($_POST["search_keyword"])) {
        $keyword = $_POST["search_keyword"];
        $get_post_sql = "select * from community_posts where subject LIKE '%{$keyword}%' order by create_date desc";
    }else{
        $get_post_sql = "select * from community_posts order by create_date desc";
    }
    $statement = $db->query($get_post_sql);
    $posts = $statement->fetchAll(PDO::FETCH_ASSOC);
    
    $get_user_sql = "select login.id, name, class_number,grade_number from login inner join class on class.id = class_id inner join grade on grade.id = grade_id";
    $statement = $db->query($get_user_sql);
    $users_db = $statement->fetchAll(PDO::FETCH_ASSOC);
    $users = array_column($users_db,"name","id");
    $class_users = array_column($users_db,"class_number","id");
    $grade_users = array_column($users_db,"grade_number","id");
    function get_replay($post_id) {
        $db = get_db();
        $get_replay_sql = "select * from community_replays where post_id = :post_id order by create_date desc";
        $statement = $db->prepare($get_replay_sql);
        $statement->bindValue(":post_id",$post_id);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
?>
<?php
// リクエストを受け取り、必要な処理を行う
// $data = json_decode(file_get_contents('php://input'), true);

// if ($data && isset($data['postId'])) {
//     $postId = $data['postId'];
    
//     $goods = get_query("SELECT good FROM community_posts WHERE id = :id", [":id" => $postId], 0);
//     $currentLikes = $goods; // データベースから取得したいいねの数
//     $newLikes = $currentLikes + 1; // 新しいいいねの数
//     // ここでデータベースを更新するなどの処理を行う
//     // この例では単純化されていますが、実際のアプリケーションではデータベース接続やエラーハンドリングが必要です
//     // 以下はダミーのレスポンスです
//     echo json_encode(['success' => true, 'newLikes' => $newLikes]);
// } else {
//     // リクエストが正しくない場合のエラー処理
//     echo json_encode(['success' => false, 'message' => 'Invalid request']);
// }
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <?php include "parts/head.php"; ?>
    <link rel="stylesheet" href="<?= $url; ?>assets/css/community.css">
    <title>Class Community--community-page</title>
</head>
<body>
<?php include "parts/header.php"; ?>
<div class="container">
    <aside>
        <?php include "parts/aside.php"; ?>
    </aside>
    <main class="main">
        <div class="like">
            <button id="likeButton" type="button">いいね</button>

        </div>
        <form action="" method="post">
            <div class="contribtion-wrapper">
                <div class="contribtion">
                    <div class="contribtion-name"><?php echo $login_user["name"]; ?></div>
                    <div class="contribtion-class">22期4組</div>
                    <div class="contribtion-contents contribtion-contents_title">
                        <p class="contribtion-contents-message">＊題名を書いて下さい</p>
                        <textarea class="contribtion-contents-textrarea"  id="" name="subject" rows="2" cols="50" ></textarea>
                    </div>
                    <div class="contribtion-contents delate">
                        <p class="contribtion-contents-message">＊投稿内容を書いて下さい</p>
                        <textarea class="contribtion-contents-textrarea"  id="" name="text" rows="6" cols="50" ></textarea>
                    </div>
                    <div class="contribtion-button">
                        <button type="button" class="listMenu__button next_button"><i class="fa-solid fa-arrow-right"></i>進む</button>
                        <button type="submit" class="listMenu__button list-contribtion-button delate"><i class="fa-solid fa-pen-to-square"></i>投稿する</button>
                        <button type="submit" class="listMenu__button back-button delate"><i class="fa-solid fa-backward"></i>戻る</button>
                    </div>
                </div>
            </div>
        </form>
            <div class="main-lists">
                <div class="search-thread">
                    <form action="" method="post" class="">
                        <div class="search-input">
                            <div class="search-input-box">
                                <input type="text" name="search_keyword" size="40"class="search-box" placeholder="スレッドを検索する"></input>
                            </div>
                            <div class="search-button">
                                <button type="submit" class="listMenu__button list-search-button"><i class="fa-solid fa-magnifying-glass"></i><a href="" class="">探す</a>
                            </button>
                            </div>
                        </div>
                    </form>
                </div>
                <?php if(!empty($_POST["search_keyword"])): ?>
                    <p class="search_maessage"><?php echo "({$_POST['search_keyword']})を検索しました"; ?></p>
                <?php endif; ?>
                <div class="threads_wrapper">
                    <div class="threads">
                        <?php foreach($posts as $post): ?> 
                        <?php 
                            //ページアクセス時にいいねを取得
                            $post_good = !empty($post['good']) ? json_decode($post['good'], true) : ["user_id" => []];
                            $post_good_count = count($post_good['user_id']);
                        ?>
                        <div class="thread">
                            <div class="thread_user_name">
                                <a href="find_students.php" class="user" style="text-decoration: underline"><p class=""><?php echo $grade_users[$post["user_id"]]; ?>年<?php echo $class_users[$post["user_id"]]; ?>組<?php echo $users[$post["user_id"]]; ?></p></a>
                            </div>
                            <div class="thread_create_date">
                                <p class="date"><?php echo $post["create_date"]; ?></p>
                            </div>
                            <div class="thread_title">
                                <p class="title">題名:<?php echo $post["subject"]; ?></p>
                            </div>
                            <div class="thread_text">
                                <p class="text">質問内容:<?php echo $post["text"]; ?></p>
                            </div>
                            <div class="good_btn">
                                <button type="button" class="good_btn good_btn-<?= $post["id"]; ?>" data-pid="<?= $post["id"]; ?>" style="font-size:2rem">♥<span class="good_count"><?= $post_good_count; ?></span></button>
                            </div>
                            <div class="replay_wrapper">
                                <form action="" method="post" class="replay_form">
                                    <p class="comment_message">コメントを書く：</p>
                                    <textarea name="replay_message" class="replay_message" id="" cols="70" rows="2" required></textarea>
                                    <input type="hidden" class="" name="post_id" value="<?php echo $post["id"]; ?>">
                                    <button type="submit" class="listMenu__button send_message_button">コメントを送信</button>
                                </form>     
                                <div class="replay_comments">
                                    <div class="replay_comments_display_button">
                                        <button type="button" class="listMenu__button display_message_button"><i class="fa-solid fa-arrow-down"></i>コメントを表示</button>
                                    </div>
                                    <div class="replay_comments_delate_button">
                                        <button type="button" class="listMenu__button delate_message_button delate"><i class="fa-solid fa-arrow-down"></i>コメントを非表示にする</button>
                                    </div>
                                    <?php $replays = get_replay($post["id"]); ?>
                                    <div class="replay_comments_hide delate">
                                        <?php foreach($replays as $replay): ?>
                                            <div class="replay_comment">
                                                <p class="replay_comment_date"><?php echo $replay["create_date"]; ?></p>
                                                <a href="find_students.php" class="replay_comment_name" style="text-decoration: underline"><?php echo $users[$replay["user_id"]]; ?></a>
                                                <p class="replay_comment_text"><?php echo $replay["text"]; ?></p>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
    </main>
</body>
<script>
    let nextbutton = document.querySelector(".next_button");
    let replay_comments_delate = document.querySelectorAll(".replay_comments_delate_button");
    function next_button_click() {
        let contribtion_contents = document.querySelector(".contribtion-contents.delate");
        let contribtion_button = document.querySelector(".list-contribtion-button.delate");
        let contribtion_contents_title = document.querySelector(".contribtion-contents_title");
        let contribtion_button_back = document.querySelector(".back-button.delate")
        contribtion_contents.classList.remove("delate");
        contribtion_button.classList.remove("delate");
        contribtion_contents_title.classList.add("delate");
        contribtion_button_back.classList.remove("delate")
        this.classList.add("delate");
    }
    nextbutton.addEventListener("click",next_button_click);
    let replay_button = document.querySelectorAll(".display_message_button");
    function replay_button_click(event) {
        let replay_message_hide = event.target.closest(".replay_comments").querySelector(".replay_comments_hide");
        let replay_delate_button = event.target.closest(".replay_comments").querySelector(".delate_message_button.delate");
        replay_delate_button.classList.remove("delate");
        replay_delate_button.classList.add("open");
        event.target.classList.remove("open");
        event.target.classList.add("delate");
        replay_message_hide.classList.remove("delate");
        replay_message_hide.classList.add("open");
    }
    nextbutton.addEventListener("click",next_button_click);
    function replay_comments_delate_click(event) {
        let replay_comments_open = event.target.closest(".replay_comments").querySelector(".replay_comments_hide");
        let replay_open_button = event.target.closest(".replay_comments").querySelector(".display_message_button");
        replay_comments_open.classList.remove("open");
        replay_comments_open.classList.add("delate");
        event.target.classList.remove("open");
        event.target.classList.add("delate");
        replay_open_button.classList.remove("delate");
        replay_open_button.classList.add("open");
    }
    replay_button.forEach(function(element){
        element.addEventListener("click",replay_button_click);
    }); 
    replay_comments_delate.forEach(function(element){
        element.addEventListener("click",replay_comments_delate_click);
    }); 
    
</script>
<script>
    const good_send = function(e) {
        //いいねするpost_idを取得
        let btn = e.currentTarget;
        let post_id = e.currentTarget.getAttribute('data-pid');
        //ログインユーザーのidを取得
        let login_id = <?= $_SESSION['id']; ?>;

        fetch('async.php', {
            method: 'POST', // POSTリクエストを送信
            body: JSON.stringify({ // リクエストボディにいいね情報を含める
                good: 'update',
                good_data: {
                    author: login_id,
                    post_id: post_id,
                },
            }),
            headers: {
                'Content-type': 'application/json; charset=UTF-8',
            },
        })
        .then(response => {
            if (response.ok) {
                return response.json();
            }
            throw new Error('Network response was not ok.');
        })
        .then(data => {
            // ここで適切なレスポンスを処理する
            // console.log("=== respons! ===",data);
            let element_btn_count = btn.querySelector('.good_count');
            element_btn_count.textContent = data['post_good_count'];
        })
        .catch(error => {
            // エラーを処理する
            console.error('There was an error!', error);
        });
    }

    let good_btns = document.querySelectorAll(".good_btn");
    good_btns.forEach((good_btn)=>{
        //子孫要素にeventをハンドリングさせない
        if(good_btn.getAttribute('data-pid')) {
            good_btn.addEventListener('click',good_send);
        }
    });
</script>
</html>