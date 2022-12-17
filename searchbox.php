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
                  
                <p>どういう時</p>
                <input type="text" name="feeling">
                <!-- <p>内容</p>
                <input type="text" name="text">
                <p>画像貼付</p>
                <input type="text" name="img"> -->

                <input type="submit" class="btnsb"  value"送信">
      </form>
    <!-- フォーム↑ここまで -->
      <div class="btn">
       <button class="btnall"  onclick="location.href='select.php'">view all</button>
       <button class="btnitem"  onclick="location.href='selectsyukei1.php'">view by item</button>
       </div>
</div>




<script src="<https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="js/main.js"></script>


</body>
</html> 