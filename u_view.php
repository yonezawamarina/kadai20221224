
<?php
$id = $_GET["id"];
echo $id;

// exit;


// DB接続
try {
  //ID:'root', Password: xamppは 空白 ''
  $pdo = new PDO('mysql:dbname=kadai_20221224;charset=utf8;host=localhost', 'root', '');
} catch (PDOException $e) {
  exit('DBConnectError:'.$e->getMessage());
}


// SQL文を用意
$stmt = $pdo->prepare("SELECT *  FROM  gs_cm_table  WHERE id=:id");
$stmt->bindValue(':id', $id, PDO::PARAM_STR);
$status = $stmt->execute();


//データ表示
$view="";
if ($status==false) {
    //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

}else{
//   //elseの中はSQL実行成功した場合
//   //Selectデータの数だけ自動でループしてくれる
//   //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
$row = $stmt->fetch();
  // while ($result = $stmt->fetch(PDO:?:FETCH_ASSOC)) {
  //   $view .= '<p>' . $result['id'] . ' : ' . h($result['food']) . ' / ' 
  //   . h($result['weight']). ' / ' . h($result['walk']) . ' / ' 
  //  . h($result['cdt']). ' / ' . h($result['cmt']) . ' / ' . h($result['date']).'</p>';
// // $a = $result['id'];
// $feeling= $result['feeling'];
// $text = $result['text'];
// $img = $result['img'];
// $date= $result['date'];
// $id= $result['id'];




// $view.="
// <tr>
// <th>$date</th>
// <th>$feeling</th> 
// <th>$text</th>
// <th>$img</th>
// </tr>
// ";

// $view.='<a href="u_view.php?id='.$result["id"].'">';

// echo '<pre>';
// var_dump($view);
// echo'</pre>';




// //消さない
}
// }
?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>表示</title>
<link rel="stylesheet" href="./css/select.css">
<style>div{padding: 10px;font-size:16px;}</style>
</head>


<form action="update.php" method="post">

<?php 
  $today = date('Y/m/d');
  echo $today;
 ?>     
          
        <p>どういう時</p>
        <input type="text" name="feeling" value="<?=$row["feeling"]?>">
        <p>内容</p>
        <input type="text" name="text" value="<?=$row["text"]?>">
        <p>画像貼付</p>
        <input type="text" name="img" value="<?=$row["img"]?>">

        <input type="hidden" name="id"  value="<?=$row["id"]?>">
        <input type="submit" class="btnsb"  value"送信">
</form>
</html>