<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <title>商品修正完了</title>
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

try
{

require("../dbconnect.php");

$sql = 'UPDATE products SET product_id=?,product_name=?,explanation=?,price=? WHERE product_id=?';
$stmt = $db->prepare($sql);
$data[] = $product_id;
$data[] = $product_name;
$data[] = $explanation;
$data[] = $price;
$data[] = $product_id;
$stmt->execute($data);

$db = null;

print '商品名：'.$product_name.' 商品説明：'.$explanation.' 価格：'.$price.'<br>';
print ' 修正しました。<br>';

}
catch(Exception $e)
{
  print ' 接続エラーが発生しました';
  exit();
}

?>
<br>
<button class="btn" onclick="location.href='products_ctl.php'">商品管理へ</button>

      </section>
    </main>
  </body>
</html>