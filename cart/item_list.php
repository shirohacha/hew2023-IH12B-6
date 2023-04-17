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

try
{
require("../dbconnect.php");

$sql = 'SELECT product_id,product_name,explanation,price FROM products';
$stmt = $db->prepare($sql);
$stmt->execute();

$db = null;

}
catch(Exception $e)
{
  print ' エラーが発生しました。';
  exit();
}

print '<h3>商品一覧</h3>';
print 'カートに入れる商品を選択してください。<br>';
print '<table><tr>';
print '<td>商品名</td><td>価格</td><td>数量</td><td>カート</td></tr>';

while(true)
{
  $rec = $stmt->fetch(PDO::FETCH_ASSOC);
  if($rec == false){break;}
  $product_id = $rec['product_id'];
  $product_name = $rec['product_name'];
  $explanation = $rec['explanation'];
  $price = $rec['price'];
  print '<tr>';
  print '<form method="post" action="item_cart.php">';
  print '<input type="hidden" name="product_id" value="'.$product_id.'">';
  print '<td><input type="hidden" name="product_name" value="'.$product_name.'">'.$product_name.'</td>';
  print '<input type="hidden" name="explanation" value="'.$explanation.'">';
  print '<td class="right"><input type="hidden" name="price" value="'.$price.'">'.number_format($price).'</td>';
  print '<td><input type="text" name="num" value="1" style="width:30px;"></td>';
  print '<td><input type="submit" value="カート"></td></form>';

}
print '</tr></table>';
?>

<!-- ここにトップページのファイル名を入れる -->
<button class="btn" onclick="location.href='../index.html'">トップページへ</button> 

      </section>
    </main>
  </body>
</html>
