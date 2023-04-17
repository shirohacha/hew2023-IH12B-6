<?php
session_start();
session_regenerate_id(true);

require_once('../com_func.php');

$post = sanitize($_POST);

$max = $post['max'];
for($i = 0; $i < $max; $i++)
{
  if(preg_match("/^[0-9]+$/",$post['num'.$i]) == 0)
  {
    print '数量に誤りがあります。';
    print '<a href="item_cart.php">カートに戻る</a>';
    exit();
  }
  if($post['num'.$i] < 1 || 100 < $post['num'.$i])
  {
    print '数量は1個以上、100個までです。';
    print '<a href="item_cart.php">カートに戻る</a>';
    exit();
  }
  $num[] = $post['num'.$i];
}

$product_id = $_SESSION['product_id'];
$product_name = $_SESSION['product_name'];
$explanation = $_SESSION['explanation'];
$price = $_SESSION['price'];

for($i = $max; 0 <= $i; $i--)
{
  if(isset($post['del'.$i]) == true)
  {
    array_splice($product_id,$i,1);
    array_splice($product_name,$i,1);
    array_splice($explanation,$i,1);
    array_splice($price,$i,1);
    array_splice($num,$i,1);
  }
}

$_SESSION['product_id'] = $product_id;
$_SESSION['product_name'] = $product_name;
$_SESSION['explanation'] = $explanation;
$_SESSION['price'] = $price;
$_SESSION['num'] = $num;

if(isset($post['back']) == true)
{
  header('Location: item_list.php');
}
else if(isset($post['next']) == true)
{
  if(count($product_id) == 0){
    header('Location: item_cart.php');
  }else{
    header('Location: ../tofome/form.html');
  }
}
else
{
  header('Location: item_cart_main.php');
}
?>