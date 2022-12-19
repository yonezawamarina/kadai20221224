<html>
<head>
<link rel="stylesheet" href="./css/index.css">
</head>


<body>
<div id="whole">

    <h1>検索</h1>

     <!-- フォームここから -->
    <form action="search.php" method="post">

        <?php 
          $today = date('Y/m/d');
          echo $today;
         ?>     
                  
                <p>検索</p>
                <input type="text" name="search_feeling">
                <!-- <p>内容</p>
                <input type="text" name="text">
                <p>画像貼付</p>
                <input type="text" name="img"> -->

                <input type="submit" class="btnsb"  value"送信">
      </form>
    <!-- フォーム↑ここまで -->

      <div class="btn">
      <button class="btn-border"  onclick="location.href='top.php'">TOP</button>
      <button class="btn-border"  onclick="location.href='index.php'">入力</button>
      <button class="btn-border"  onclick="location.href='select.php'">一覧</button>
       </div>
</div>




<script src="<https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="js/main.js"></script>


</body>
</html> 