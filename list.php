<?php
require_once('functions.php');

$pdo = conectDB();

echo '<pre>';
var_dump($pdo);
echo'</pre>';


if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    // 画像を取得

} else {
    // 画像を保存
    if (!empty($_FILES['image']['name'])) {
        $name = $_FILES['image']['name'];
        $type = $_FILES['image']['type'];
        $content = file_get_contents($_FILES['image']['tmp_name']);
        $size = $_FILES['image']['size'];

        $sql = 'INSERT INTO images(image_name, image_type, image_content, image_size, created_at)
                VALUES (:image_name, :image_type, :image_content, :image_size, now())';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':image_name', $name, PDO::PARAM_STR);
        $stmt->bindValue(':image_type', $type, PDO::PARAM_STR);
        $stmt->bindValue(':image_content', $content, PDO::PARAM_STR);
        $stmt->bindValue(':image_size', $size, PDO::PARAM_INT);
        $stmt->execute();
    }
    header('Location:list.php');
    exit();
}
?>















<html>
<head>
<link rel="stylesheet" href="./css/index.css">
</head>


<body>
<div id="whole">

    <h1>send message for future</h1>


     <!-- フォームここから -->
    <form action="insert.php" method="post">

        <?php 
          $today = date('Y/m/d');
          echo $today;
         ?>     
                  
                <p>どういう時</p>
                <input type="file" name="img">
                <!-- <p>内容</p>
                <input type="text" name="text">
                <p>画像貼付</p>
                <input type="text" name="img"> -->
         
                <input type="submit" class="btnsb"  value"送信">
      </form>
    <!-- フォーム↑ここまで -->
      <!-- <div class="btn">
       <button class="btnall"  onclick="location.href='select.php'">view all</button>
       <button class="btnitem"  onclick="location.href='selectsyukei1.php'">view by item</button>
       </div> -->
</div>




<script src="<https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="js/main.js"></script>


</body>
</html> 