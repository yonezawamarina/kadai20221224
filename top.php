
<head>
  <title>Document</title>
  <link rel="stylesheet" href="./css/top.css">
</head>
<body>
  <div class="start">
      <p><img src="../img/gift2.jpg" alt=""></p>
  </div>
  <div class="btnwrapper">
      <button class="btn-border"  onclick="location.href='index.php'">入力</button>
      <button class="btn-border"  onclick="location.href='searchbox.php'">検索</button>
  </div>
  


 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script>
  $(function() {
    setTimeout(function(){
      $('.start p').fadeIn(2000);
    },800); //0.5秒後にロゴをフェードイン!
    setTimeout(function(){
      $('.start').fadeOut(500);
    },900); //2.5秒後にロゴ含め真っ白背景をフェードアウト！
  });
  
  </script>

</body>
</html>