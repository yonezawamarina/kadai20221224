<?php
//1. POSTデータ取得
$feeling = $_POST['feeling'];
$text = $_POST['text'];
$img = $_POST['img'];



//2. DB接続のおまじない
try {
  //ID:'root', Password: xamppは 空白 ''
  $pdo = new PDO('mysql:dbname=kadai_20221224;charset=utf8;host=localhost', 'root', '');
} catch (PDOException $e) {
  exit('DBConnectError:'.$e->getMessage());
}


//３．データ登録SQL作成

// (1). SQL文を用意
$stmt = $pdo->prepare("INSERT INTO
                        gs_cm_table(id, feeling, text, img, date)
                        VALUES(NULL, :feeling, :text, :img, sysdate() )");


//(2). バインド変数を用意
// Integer 数値の場合 PDO::PARAM_INT
// String文字列の場合 PDO::PARAM_STR
$stmt->bindValue(':feeling', $feeling, PDO::PARAM_STR);
$stmt->bindValue(':text', $text, PDO::PARAM_STR);
$stmt->bindValue(':img', $img, PDO::PARAM_STR);

//  (3). 実行
$status = $stmt->execute();


//４．データ登録処理後
if ($status === false) {
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit('ErrorMessage:'.$error[2]);
} else {
  //５．index.phpへリダイレクト
  header('Location: index.php');
}

?>

