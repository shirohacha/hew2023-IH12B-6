<?php
session_start();
require_once './classes/UserLogic.php';
require_once './functions.php';

//　ログインしているか判定し、していなかったら新規登録画面へ返す
$result = UserLogic::checkLogin();

if (!$result) {
  $_SESSION['login_err'] = 'ユーザを登録してログインしてください！';
  header('Location: entry_form.php');
  return;
}

$login_user = $_SESSION['login_user'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/login.css" />
  <title>マイページ</title>
</head>
<body>
  <div class="form">
    <h2>マイページ</h2>
    <p class="mypage_p01">ログインユーザ：<?php echo h($login_user['name']) ?></p>
    <p class="mypage_p02">メールアドレス：<?php echo h($login_user['email']) ?></p>
    
    <div class="mypage_submit">
      <form action="logout.php" method="POST">
      <input type="submit" name="logout" value="ログアウト">
      </form>
      <a href="../index.html">トップページへ戻る</a>
    </div>

  </div>
</body>
</html>