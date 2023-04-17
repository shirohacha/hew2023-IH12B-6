<?php
session_start();
// session_destroy();
?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <title>ショッピングカート</title>
	<link rel="stylesheet" href="./item_cart_main.css" />
  </head>
  <body>
    <main>
      <section>

<?php
require_once("../dbconnect.php");
require_once('../com_func.php');
if(isset($_POST['product_id'])){
	$post = sanitize($_POST);
	$p_product_id = $post['product_id'];
	$p_product_name = $post['product_name'];
	$p_explanation = $post['explanation'];
	$p_price = $post['price'];
	$p_num = $post['num'];
	$flag1 = false;

	if(isset($_SESSION['product_id']) == true){
		$product_id = $_SESSION['product_id'];
		$product_name = $_SESSION['product_name'];
		$explanation = $_SESSION['explanation'];
		$price = $_SESSION['price'];
		$num = $_SESSION['num'];
		if(in_array($p_product_id,$product_id) == true)
		{
			$alert = "<script type='text/javascript'>alert('その商品はすでにカートに入っています。');</script>";
			print $alert;
			$flag1 = true;
		}
	}

	if($flag1 == false){
		$product_id[] = $p_product_id;
		$product_name[] = $p_product_name;
		$explanation[] = $p_explanation;
		$price[] = $p_price;
		$num[] = $p_num;
		$_SESSION['product_id'] = $product_id;
		$_SESSION['product_name'] = $product_name;
		$_SESSION['explanation'] = $explanation;
		$_SESSION['price'] = $price;
		$_SESSION['num'] = $num;
	}
	
print '<h3>カート</h3>';
print '<form method="post" action="change_num.php">';
print '<table><tr>';
print '<td>No.</td><td>商品名</td><td>価格</td><td>数量</td>';
print '<td>小計</td></tr>';
$max = count($product_id);
if($max == 0){
  print '<tr><td colspan="6">カートに商品が入っていません。</td></tr></table>';
//   print '<a href="item_list.php">商品一覧へ戻る</a>';
  exit();
}
$sum = 0;
$sub = 0;
for($i = 0; $i < $max; $i++)
{
	$i1 = $i + 1;
  print '<tr><td>'.$i1.'</td><td>'.$product_name[$i].'</td>';
  print '<td>'.number_format($price[$i]).'</td>';
  print '<td><input type="text" name="num'.$i.'" style="width:30px;" value="'.$num[$i].'" class="right"></td>';
	$sub = $price[$i] * $num[$i];
  $sum += $sub;
  print '<td class="right">'.number_format($sub).'</td>';
	print '<td><input type="checkbox" name="del'.$i.'"></td></tr>';
}

print '<tr><td colspan="4" class="right">合　計</td>';
print '<td class="right">'.number_format($sum).'</td>';
print '<td></td></tr><tr>';
print '<td colspan="4" class="right">消費税</td>';
print '<td class="right">'.number_format($sum * 0.1).'</td>';
print '<td></td></tr><tr>';
print '<td colspan="4" class="right">合計金額</td>';
print '<td class="right">'.number_format($sum * 1.1).'</td>';
print '<td></td></tr></table>';
print '<input type="hidden" name="max" value="'.$max.'">';
print '<div class="btnright">';
print '<input type="submit" name="nchk" value="数量変更">';
print '<input type="submit" name="del" value="削除">';
print '</div>';
print '<div class="btnbox">';
// print '<input class="btn1" type="submit" name="back" value="商品一覧に戻る">';
// print '<input class="btn2" type="submit" name="next" value="ご購入手続きへ">';
print '</div></form>';
}
else{
	// print '<h3>ショッピングカート仮</h3>';
	// echo "カートは空です";
	// $post = sanitize($_POST);
	// $p_product_id = $post['product_id'];
	// $p_product_name = $post['product_name'];
	// $p_explanation = $post['explanation'];
	// $p_price = $post['price'];
	// $p_num = $post['num'];
	$flag1 = true;

	if(isset($_SESSION['product_id']) == true){
		$product_id = $_SESSION['product_id'];
		$product_name = $_SESSION['product_name'];
		$explanation = $_SESSION['explanation'];
		$price = $_SESSION['price'];
		$num = $_SESSION['num'];
		if(@in_array($p_product_id,$product_id) == true)
		{
			$alert = "<script type='text/javascript'>alert('その商品はすでにカートに入っています。');</script>";
			print $alert;
			$flag1 = true;
		}
	}

	if($flag1 == false){
		$product_id[] = $p_product_id;
		$product_name[] = $p_product_name;
		$explanation[] = $p_explanation;
		$price[] = $p_price;
		$num[] = $p_num;
		$_SESSION['product_id'] = $product_id;
		$_SESSION['product_name'] = $product_name;
		$_SESSION['explanation'] = $explanation;
		$_SESSION['price'] = $price;
		$_SESSION['num'] = $num;
	}
	
	print '<h3>カート</h3>';
	print '<form method="post" action="change_num.php">';
	print '<table><tr>';
	print '<td>No.</td><td>商品名</td><td>価格</td><td>数量</td>';
	print '<td>小計</td></tr>';
	// $max = count($product_id);
	if(isset($product_id)){
		$max = count($product_id);
	}else{
		$max = 0;
	}
	if($max == 0){
	print '<tr><td colspan="6">カートに商品が入っていません。</td></tr></table>';
	// print '<a href="item_list.php">商品一覧へ戻る</a>';
	exit();
	}
	$sum = 0;
	$sub = 0;
	for($i = 0; $i < $max; $i++)
	{
		$i1 = $i + 1;
	print '<tr><td>'.$i1.'</td><td>'.$product_name[$i].'</td>';
	print '<td>'.number_format($price[$i]).'</td>';
	print '<td><input type="text" name="num'.$i.'" style="width:30px;" value="'.$num[$i].'" class="right"></td>';
		$sub = $price[$i] * $num[$i];
	$sum += $sub;
	print '<td class="right">'.number_format($sub).'</td>';
		print '<td><input type="checkbox" name="del'.$i.'"></td></tr>';
	}

	print '<tr><td colspan="4" class="right">合　計</td>';
	print '<td class="right">'.number_format($sum).'</td>';
	print '<td></td></tr><tr>';
	print '<td colspan="4" class="right">消費税</td>';
	print '<td class="right">'.number_format($sum * 0.1).'</td>';
	print '<td></td></tr><tr>';
	print '<td colspan="4" class="right">合計金額</td>';
	print '<td class="right">'.number_format($sum * 1.1).'</td>';
	print '<td></td></tr></table>';
	print '<input type="hidden" name="max" value="'.$max.'">';
	print '<div class="btnright">';
	print '<input type="submit" name="nchk" value="数量変更">';
	print '<input type="submit" name="del" value="削除">';
	print '</div>';
	print '<div class="btnbox">';
	// print '<input class="btn1" type="submit" name="back" value="商品一覧に戻る">';
	// print '<input class="btn2" type="submit" name="next" value="ご購入手続きへ">';
	print '</div></form>';
}

// header('Location: ../index.html');
?>




      </section>
    </main>
	

	
  </body>
</html>