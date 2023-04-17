<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <title>商品修正</title>
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

<h3>商品修正</h3>
<br><br>

<form method="post" action="products_mod_end.php">
  <h3>商品修正</h3>
  商品名　：<input type="text" name="product_name" value="<?php print $product_name ?>"><br>
  商品説明：<input type="text" name="explanation" value="<?php print $explanation ?>"><br>
  価　格　：<input type="text" name="price" value="<?php print $price ?>"><br>
  <input type="hidden" name="product_id" value="<?php print $product_id ?>">
  <input type="submit" value="修正する" style="margin:10px 0 10px 40%;">
</form>
<br>
<button class="btn" onclick="location.href='products_ctl.php'">商品管理へ</button>

      </section>
    </main>
  </body>
</html>