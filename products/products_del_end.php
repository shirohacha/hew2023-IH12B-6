<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <title>商品削除完了</title>
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

$sql='DELETE FROM products WHERE product_id=?';
$stmt=$db->prepare($sql);
$data[]=$product_id;
$stmt->execute($data);

$db=null;

}
catch(Exception $e)
{
  print ' 接続エラーが発生しました。';
  exit();
}

?>

商品ID：<?php print $product_id; ?><br>
商品名：<?php print $product_name; ?><br>
商品説明：<?php print $explanation; ?><br>
価格：<?php print $price; ?><br>
この商品を削除しました。<br>
<br>
<button class="btn" onclick="location.href='products_ctl.php'">商品管理へ</button>

      </section>
    </main>
  </body>
</html>