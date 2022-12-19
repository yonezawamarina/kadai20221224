
<!-- 今回やりたいこと↓↓ -->
<!-- でけた！→（入力、読み込み、表示、検索、更新、削除） -->
<!-- 画像をMySQLに送りたい -->
<!-- そのものを検索した回数を表示させたい -->
<!-- 送信したら紙飛行機飛ばしたい -->
<!-- 受信する時 -->


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
                <input type="text" name="feeling">
                <p>内容</p>
                <input type="text" name="text">
                <p>画像貼付</p>
                <input type="text" name="img">
         
                <input type="submit" class="btnsb"  value"aaaa">
      </form>
    <!-- フォーム↑ここまで -->
      <!-- <div class="btn">
       <button class="btnall"  onclick="location.href='select.php'">view all</button>
       <button class="btnitem"  onclick="location.href='selectsyukei1.php'">view by item</button>
       </div> -->
  
       <button class="btn-border"  onclick="location.href='top.php'">TOP</button>
       <button class="btn-border"  onclick="location.href='searchbox.php'">検索</button>
       <button class="btn-border"  onclick="location.href='select.php'">一覧</button>
       </div>




<script src="<https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="js/main.js"></script>


</body>
</html> 