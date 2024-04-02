<?php 
require_once "functions.php";
$raw = file_get_contents("php://input");
$data = json_decode($raw,true);

//今のgood数を取得する
function get_good_count($post_id) {
  $sql = "select good from community_posts where id = :post_id";
  $datas = [":post_id" => $post_id]; 
  $result = get_query($sql, $datas, false);
  $result_good = json_decode($result["good"], true);
  $count_good = count($result_good['user_id']);

  return $count_good;
}

$res = [];
if(!empty($data["good"])) {
  $user_id = (int)$data["good"]["user_id"];
  $post_id = (int)$data["good"]["post_id"];
  $sql = "select good from community_posts where id = :post_id";
  $datas = [":post_id" => $post_id]; 
  $result = get_query($sql,$datas,false);
  $post_good_users = json_decode($result["good"],true);
  // print_r($result);
  if(!empty($post_good_users) && in_array($user_id,$post_good_users["user_id"], 0)) {
    $user_count = count($post_good_users['user_id']);

  }else{
    $post_good_users["user_id"][] = $user_id;
    $updata_sql = "UPDATE community_posts set good = :users_json where id = :post_id";
    $datas = [":users_json" => json_encode($post_good_users),":post_id" => $post_id];
    //書き込み実行
    get_query($updata_sql,$datas,false);
    //結果を取得
    $user_count = get_good_count($post_id);
  }
  $res = ['count' => $user_count];
  echo json_encode($res);
}
?>
