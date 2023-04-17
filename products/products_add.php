<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <title>商品新規追加</title>
  </head>
  <body>
    <main>
      <section>
<h4>商品追加</h4>
<form method="post" action="products_add_chk.php">
商品を新規登録します。<br>
商品名：<input type="text" name="product_name"><br>
商品説明：<input type="text" name="explanation"><br>
価格(半角数字)：<input type="text" name="price"><br>
<input type="button" onclick="history.back()" value="戻る">
<input type="submit" value="OK">
</form>
      </section>
    </main>
  </body>
</html>