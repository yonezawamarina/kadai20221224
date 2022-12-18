<?php
$id = $_POST["id"];
$feeling = $_POST["feeling"];
$text = $_POST["text"];
$img = $_POST["img"];
echo '<pre>';
var_dump($img);
echo'</pre>';

echo '<pre>';
var_dump($feeling);
echo'</pre>';

echo '<pre>';
var_dump($text);
echo'</pre>';


// DB接続
try {
  //ID:'root', Password: xamppは 空白 ''
  $pdo = new PDO('mysql:dbname=kadai_20221224;charset=utf8;host=localhost', 'root', '');
} catch (PDOException $e) {
  exit('DBConnectError:'.$e->getMessage());
}

echo '<pre>';
var_dump($text);
echo'</pre>';


// SQL文を用意
$stmt = $pdo->prepare("UPDATE gs_cm_table SET  feeling=:feeling , text=:text ,img=:img WHERE id=:id");
$stmt->bindValue(':feeling', $feeling, PDO::PARAM_STR);
$stmt->bindValue(':text', $text, PDO::PARAM_STR);
$stmt->bindValue(':img', $img, PDO::PARAM_STR);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

echo '<pre>';
var_dump($status);
echo'</pre>';


//４．データ登録処理後
if ($status === false) {
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit('ErrorMessage:'.$error[2]);
} else {
  //５．index.phpへリダイレクト
  header('Location: select.php');
}
