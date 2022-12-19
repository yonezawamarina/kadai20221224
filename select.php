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
$stmt = $pdo->prepare("SELECT * FROM gs_cm_table;");
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

  //  $view .="<p>";
  //  $view.='<a href="u_view.php?id='.$result["id"].'">';
  //  $view.=$result['feeling'] . ' / ' 
  //  . ($result['text']). ' / ' . ($result['img']) . ' / ' . ($result['date']);
  //  $view .="</a>";
  //  $view .=" ";
  //  $view.='<a href="delete.php?id='.$result["id"].'">';
  //  $view .="[削除]";
  //  $view .="</a>";
  //  $view .="</p>";



$feeling= $result['feeling'];
$text = $result['text'];
$img = $result['img'];
$date= $result['date'];
$id= $result['id'];
$link = '<a href="u_view.php?id='.$result["id"].'">'.'[更新]'."</a>";
$delete='<a href="delete.php?id='.$result["id"].'">'.'[削除]'."</a>";

// echo '<pre>';
// var_dump($delete);
// echo'</pre>';


$view.="
<tr>
<th>$date</th>
<th>$feeling</th> 
<th>$text</th>
<th>$img</th>
<th>$link</th>
<th>$delete</th>
</tr>
";

// $view.="<p>";


// $view.='<a hr// echo '<pre>';
// var_dump($id);
// echo'</pre>';
// ef="u_view.php?id='.$result["id"].'">';
// // $view.=




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
    <tr>
    <th>日付</th>
    <th>気持ち</th>
    <th>内容</th>
    <th>画像</th>
    <th>更新</th>
    <th>削除</th>
    </tr>
 

  
<?= $view ?></table>  <!-- 26行目のview -->    
<button class="btn-border"  onclick="location.href='top.php'">TOP</button>
<button class="btn-border"  onclick="location.href='index.php'">入力</button>
<button class="btn-border"  onclick="location.href='searchbox.php'">検索</button>

</body>
</html>