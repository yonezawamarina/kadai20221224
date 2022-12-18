<?php
$id = $_GET["id"];

//2. DB接続のおまじない
try {
  //ID:'root', Password: xamppは 空白 ''
  $pdo = new PDO('mysql:dbname=kadai_20221224;charset=utf8;host=localhost', 'root', '');
} catch (PDOException $e) {
  exit('DBConnectError:'.$e->getMessage());
}

// SQL文を用意
$stmt = $pdo->prepare("DELETE FROM  gs_cm_table  WHERE id=:id");
$stmt->bindValue(':id', $id, PDO::PARAM_STR);
$status = $stmt->execute();


//４．データ登録処理後
if ($status === false) {
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit('ErrorMessage:'.$error[2]);
} else {
  //５．index.phpへリダイレクト
  header('Location: select.php');
}
