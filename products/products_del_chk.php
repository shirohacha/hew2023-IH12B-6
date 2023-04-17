<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <title>商品削除チェック</title>
  </head>
  <body>
    <main>
      <section>

<?php
$product_id = $_POST['product_id'];
$product_name = $_POST['product_name'];
$explanation = $_POST['explanation'];
$price = $_POST['price'];

$product_id = htmlspecialchars($product_id);
$product_name = htmlspecialchars($product_name);
$explanation = htmlspecialchars($explanation);
$price = htmlspecialchars($price);
?>
<h3>商品削除チェック</h3>
商品ID：<?php print $product_id; ?><br>
商品名：<?php print $product_name; ?><br>
商品説明：<?php print $explanation; ?><br>
価格：<?php print $price; ?><br>

この商品を削除してよろしいでしょうか。<br>

<form method="post" action="products_del_end.php">
  <input type="hidden" name="product_name" value="<?php print $product_name ?>">
  <input type="hidden" name="explanation" value="<?php print $explanation ?>">
  <input type="hidden" name="price" value="<?php print $price ?>">
  <input type="hidden" name="product_id" value="<?php print $product_id ?>"><br>
  <input type="submit" class="del" value="削除する">
</form>
<br>
<button class="btn" onclick="location.href='products_ctl.php'">商品管理へ</button>

      </section>
    </main>
  </body>
</html>