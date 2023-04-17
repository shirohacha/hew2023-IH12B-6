<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <title>商品追加確認</title>
  </head>
  <body>
    <main>
      <section>

<?php

$product_name = $_POST['product_name'];
$explanation = $_POST['explanation'];
$price = $_POST['price'];

$product_name = htmlspecialchars($product_name);
$explanation = htmlspecialchars($explanation);
$price = htmlspecialchars($price);

$flag1 = true;
if($product_name == '')
{
  print '商品名が入力されていません。<br>';
  $flag1 = false;
}
else
{
  print '商品名：'.$product_name.'<br>';
}

print '商品説明：'.$explanation.'<br>';

if(preg_match('/^[0-9]+$/',$price) == 0)
{
  print '価格を正確に入力してください。（半角数字）<br>';
  $flag1 = false;
}
else
{
  print ' 価格：'.$price.' 円 <br>';
}

if($flag1 == false)
{
  print '<form>';
  print '<input type="button" onclick="history.back()" value="戻る">';
  print '</form>';
}
else
{
  print ' 上記商品を新規追加します。<br>';
  print '<form method="post" action="products_add_end.php">';
  print '<input type="hidden" name="product_name" value="'.$product_name.'">';
  print '<input type="hidden" name="explanation" value="'.$explanation.'">';
  print '<input type="hidden" name="price" value="'.$price.'">';
  print '<br>';
  print '<input type="button" onclick="history.back()" value="戻る">';
  print '<input type="submit" value="OK">';
  print '</form>';
}

?>
      </section>
    </main>
  </body>
</html>