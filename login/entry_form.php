<?php
require_once("./entry.php")
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
    <link rel="stylesheet" href="./css/login.css" />
    <title>アカウント作成</title>

</head>
<body>
    <div class="form">
        <form action="" method="POST">
            <h2>アカウント作成</h2>
            <p class="entry_p01">当サービスをご利用するために、次のフォームに必要事項をご記入ください。</p>
            <br>

            <div class="entry_name">
                <div class="control">
                    <label for="name">氏名</label>
                    <input id="name" type="text" name="name" placeholder="氏名を入力してください" required>
                </div>
            </div>

            <div class="entry_email">
                <div class="control">
                    <label for="email">メールアドレス<span class="required">必須</span></label>
                    <input id="email" type="email" name="email" placeholder="メールアドレスを入力してください" required>
                    <?php if (!empty($error["email"]) && $error['email'] === 'blank'): ?>
                        <p class="error">＊メールアドレスを入力してください</p>
                    <?php elseif (!empty($error["email"]) && $error['email'] === 'duplicate'): ?>
                        <p class="error">＊このメールアドレスはすでに登録済みです</p>
                    <?php endif ?>
                </div>
            </div>

            <div class="entry_phone_number">
                <div class="control">
                    <label for="phone_number">電話番号<span class="required">必須</span></label>
                    <input id="phone_number" type="phone_number" name="phone_number" placeholder="電話番号を入力してください" required>
                    <?php if (!empty($error["phone_number"]) && $error['phone_number'] === 'blank'): ?>
                        <p class="error">＊電話番号を入力してください</p>
                    <?php elseif (!empty($error["phone_number"]) && $error['phone_number'] === 'duplicate'): ?>
                        <p class="error">＊この電話番号はすでに登録済みです</p>
                    <?php endif ?>
                </div>
            </div>

            <div class="entry_password">
                <div class="control">
                    <label for="password">パスワード<span class="required">必須</span></label>
                    <input id="password" type="password" name="password" placeholder="パスワードを入力してください" required>
                    <?php if (!empty($error["password"]) && $error['password'] === 'blank'): ?>
                        <p class="error">＊パスワードを入力してください</p>
                    <?php endif ?>
                </div>
            </div>

            <div class="entry_submit">
                <div class="control">
                    <button type="submit" class="btn">確認する</button>
                </div>
            </div>

        </form>
    </div>
</body>
</html>