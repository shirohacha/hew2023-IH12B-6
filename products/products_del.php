<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <title>商品削除</title>
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
  print ' 接続エラーが発生しました。';
  exit();
}

print '<h3>商品削除</h3>';
print '削除する商品を選択してください。<br>';
print '<table><tr>';
print '<td>削除</td><td>商品ID</td><td>商品名</td><td>商品説明</td><td>価格</td></tr>';

while(true)
{
  $rec = $stmt->fetch(PDO::FETCH_ASSOC);
  if($rec == false){break;}
  $product_id = $rec['product_id'];
  $product_name = $rec['product_name'];
  $explanation = $rec['explanation'];
  $price = $rec['price'];
  print '<tr><td>';
  print '<form method="post" action="products_del_chk.php">';
  print '<input type="submit" value="削除"></td>';
  print '<td class="right"><input type="hidden" name="product_id" value="'.$product_id.'">'.$product_id.'</td>';
  print '<td><input type="hidden" name="product_name" value="'.$product_name.'">'.$product_name.'</td>';
  print '<td><input type="hidden" name="explanation" value="'.$explanation.'">'.$explanation.'</td>';
  print '<td class="right"><input type="hidden" name="price" value="'.$price.'">'.number_format($price).'</form></td>';
}
print '</tr></table>';

?>
<button class="btn" onclick="location.href='products_ctl.php'">商品管理へ</button>

      </section>
    </main>
  </body>
</html>