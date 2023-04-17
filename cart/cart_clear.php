<?php
$_SESSION=array();
if(isset($_COOKIE[session_name()])==true)
{
  setcookie(session_name(),'',time()-42000,'/');
}
@session_destroy();
?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <title>カートを空にする</title>
  </head>
  <body>
    <main>
      <section>
カートを空にしました。<br>
<button class="btn" onclick="location.href='item_list.php'">商品一覧に戻る</button>
      </section>
    </main>
  </body>
</html>