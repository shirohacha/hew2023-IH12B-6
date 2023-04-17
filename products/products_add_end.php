<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <title>商品追加完了</title>
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


require("../dbconnect.php");

$sql = 'INSERT INTO products(product_name,explanation,date,price) VALUES (?,?,?,?)';
$stmt = $db->prepare($sql);
$data[] = $product_name;
$data[] = $explanation;
$data[] = date("Y/m/d");
$data[] = $price;
$stmt->execute($data);

$dbh = null;

print '商品名：'.$product_name.'  ';
print '商品説明：'.$explanation.'  ';
print '価格：'.$price.'を追加しました。<br>';

?>

<a href="products_list.php"> 戻る </a>

      </section>
    </main>
  </body>
</html>