<?php 
require_once "functions.php";
$raw = file_get_contents("php://input");
$data = json_decode($raw,true);
if(!empty($data["good"])) {
    $user_id = (int)$data["good"]["user_id"];
    $post_id = (int)$data["good"]["post_id"];
    $sql = "select good from community_posts where id = :post_id";
    $datas = [":post_id" => $post_id]; 
    $result = get_query($sql,$datas,false);
    $post_good_users = json_decode($result["good"],true);
    print_r($result);
    if(in_array($user_id,$post_good_users["users"],0)) {
    }else{
        $post_good_users["users"][] = $user_id;
        $updata_sql = "UPDATE community_posts set good = :users_json where id = :post_id";
        $datas = [":users_json" => json_encode($post_good_users),":post_id" => $post_id];
        get_query($updata_sql,$datas,false);
    }
}
$sql = "select good from community_posts where id = 1";
$result = get_query($sql,null,false);
$data = json_encode($result);
echo $data;
?>
