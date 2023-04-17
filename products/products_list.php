<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <title>商品一覧</title>
  </head>
  <body>
    <main>
      <section>

<?php

require("../dbconnect.php");

$sql = 'SELECT product_id,product_name,explanation,price FROM products';
$stmt = $db->prepare($sql);
$stmt->execute();

$dbh = null;

print '<h3>商品一覧</h3>';
print '<table><tr>';
print '<td>商品ID</td><td>商品名</td><td>商品説明</td><td>価格</td></tr>';

while(true)
{
  $rec = $stmt->fetch(PDO::FETCH_ASSOC);
  if($rec == false){break;}
  $product_id = $rec['product_id'];
  $product_name=$rec['product_name'];
  $explanation=$rec['explanation'];
  $price=$rec['price'];
  print '<tr><td class="right">'.$product_id.'</td>';
  print '<td>'.$product_name.'</td>';
  print '<td class="right">'.$explanation.'</td>';
  print '<td>'.number_format($price).'</td>';
}
print '</tr></table>';


?>
<button class="btn" onclick="location.href='products_ctl.php'">商品管理へ</button>

      </section>
    </main>
  </body>
</html>