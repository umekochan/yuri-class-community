<?php
  require_once "functions.php";
  
  $raw = file_get_contents('php://input');
  $data = json_decode($raw, true);

  //UPDATEする
  if( !empty($data['good']) && $data['good'] == 'update' ){
    $good = $data['good_data'];
    
    //投稿を取得
    $good_sql = "SELECT id, good FROM community_posts WHERE id = :post_id";
    $post = get_query($good_sql, [':post_id' => $good['post_id']], 0);
    //取得結果
    //いいねが0件でなければ
    if( !empty($post['good']) ){
      $post_good_array = json_decode($post['good'],true);
    }else {
      $post_good_array = [
        "user_id" => []
      ];
    }
    $post_good_count = count($post_good_array["user_id"]);
    // print_r($post_good_array);

    //更新フラグ
    $just_now = 0;
    //配列内に投稿者IDが存在しないなら更新する
    if( !in_array($good['author'], $post_good_array["user_id"], false) ){
      //updateの作成
      $update_sql = "UPDATE community_posts SET good = :good_json WHERE id = :post_id";
      $post_good_array["user_id"][] = $good['author'];
      $datas = [
        ':good_json' => json_encode($post_good_array),
        ':post_id' => $post['id'],
      ];
      get_query($update_sql, $datas, false);
      $just_now = 1;
    }

    //レスポンスデータの作成
    $response = [
      'post_id' => $post['id'],
      'post_good_array' => $post_good_array['user_id'],
      'post_good_count' => $post_good_count,
      'just_now' => $just_now,
    ];

    echo json_encode($response);
    exit;
  }
?>