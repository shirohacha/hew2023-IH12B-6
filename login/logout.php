<?php
session_start();
require_once './classes/UserLogic.php';

// if (!$logout = filter_input(INPUT_POST, 'logout')) {
//   exit('不正なリクエストです。');
// }

//　ログインしているか判定し、セッションが切れていたらログインしてくださいとメッセージを出す。
$result = UserLogic::checkLogin();

// if (!$result) {
//   exit('セッションが切れましたので、ログインし直してください。');
// }

// ログアウトする
UserLogic::logout();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/login.css" />
  <title>ログアウト</title>
</head>
<body>
  <div class="form">
    <h2>ログアウト完了</h2>
    <p class="logout_p01">ログアウトしました！</p>
    <div class="logout_submit">
      <a href="login_form.php">ログイン画面へ</a>
    </div>
  </div>
</body>
</html>