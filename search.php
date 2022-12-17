<?php

function h($str)
{
  return htmlspecialchars($str, ENT_QUOTES);//dbの中に入ることは問題なくHTMLで表示されるのを防ぐためにやる
}

//2. DB接続のおまじない
try {
  //ID:'root', Password: xamppは 空白 ''
  $pdo = new PDO('mysql:dbname=kadai_20221224;charset=utf8;host=localhost', 'root', '');
} catch (PDOException $e) {
  exit('DBConnectError:'.$e->getMessage());
}


//２．データ取得SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_cm_table WHERE feeling '悲しい';");
$status = $stmt->execute();

//３．データ表示
$view="";
if ($status==false) {
    //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

}else{
  //elseの中はSQL実行成功した場合
  //Selectデータの数だけ自動でループしてくれる
  //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php

  while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
  //   $view .= '<p>' . $result['id'] . ' : ' . h($result['food']) . ' / ' 
  //   . h($result['weight']). ' / ' . h($result['walk']) . ' / ' 
   
  //  . h($result['cdt']). ' / ' . h($result['cmt']) . ' / ' . h($result['date']).'</p>';
// $a = $result['id'];
$feeling= $result['feeling'];
$text = $result['text'];
$img = $result['img'];
$date= $result['date'];



$view.="
<tr>
<th>$date</th>
<th>$feeling</th> 
<th>$text</th>
<th>$img</th>
</tr>
";

//消さない
}
}
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
<body id="main">
<!-- Head[Start] -->
<header>
  <!-- <a class="navbar-brand" href="index.php">データ登録</a> -->
</header>

<table border="1" class="table">
    <!-- <th>id</th> -->
    <th>日付</th>
    <th>気持ち</th>
    <th>内容</th>
    <th>画像</th>
  
<?= $view ?></table>  <!-- 26行目のview -->    
<button class="btnall"  onclick="location.href='index.php'">top</button>

</body>
</html>



















    //DBに接続
    // $dsn = 'mysql:dbname=test_bbs2; host=localhost';
    // $username= 'root';
    // $password= 'root';
    // $pdo = new PDO($dsn, $username, $password);

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


 //3.SQL文を実行して、結果を$stmtに代入する。
 //(1)SQL文を用意
    // $stmt = $pdo->prepare(" SELECT * FROM gs_cm_table WHERE  feeling  LIKE '%" . $_POST["search_name"] . "%' "); 
    // $stmt = $pdo->prepare(" SELECT * FROM gs_cm_table WHERE  text  LIKE '%" . $_POST["feeling"] . "%' "); 
    $stmt = $pdo->prepare(" SELECT * FROM gs_cm_table WHERE  id = 1 "); 

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