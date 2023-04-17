<?php
session_start();
require_once './classes/UserLogic.php';

$result = UserLogic::checkLogin();
if($result) {
  header('Location: mypage.php');
  return;
}

$err = $_SESSION;

$_SESSION = array();
session_destroy();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/login.css" />

  <title>ログイン画面</title>
</head>
  <body>
    <div class="form">
      <h2>ログインフォーム</h2>
        <?php if (isset($err['msg'])) : ?>
            <p><?php echo $err['msg']; ?></p>
        <?php endif; ?>
      <form action="login.php" method="POST">
        <p class="login_email">
            <label for="email" class="text_email">メールアドレス：</label>
          <input type="email" name="email" placeholder="メールアドレスを入力してください" required>
          <?php if (isset($err['email'])) : ?>
              <p><?php echo $err['email']; ?></p>
          <?php endif; ?>
        </p>
        <p class="login_password">
          <label for="password" class="text_password">パスワード：</label>
          <input type="password" name="password" placeholder="パスワードを入力してください" required>
          <?php if (isset($err['password'])) : ?>
              <p><?php echo $err['password']; ?></p>
          <?php endif; ?>
        </p>
        <p class="login_submit">
          <input id="login" type="submit" value="ログイン">
        </p>
      </form>
        <p class="login_entry">
          <a href="./entry_form.php">新規登録はこちら</a>
        </p>
    </div>
  </body>
</html>