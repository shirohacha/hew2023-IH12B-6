<?php
require("../dbconnect.php");
session_start();
 
/* 会員登録の手続き以外のアクセスを飛ばす */
if (!isset($_SESSION['join'])) {
    header('Location: entry.php');
    exit();
}
 
if (!empty($_POST['check'])) {
    // パスワードを暗号化
    $hash = password_hash($_SESSION['join']['password'], PASSWORD_BCRYPT);
 
    // 入力情報をデータベースに登録
    $statement = $db->prepare("INSERT INTO customer SET name=?, email=?, phone_number=?, password=?");
    $statement->execute(array(
        $_SESSION['join']['name'],
        $_SESSION['join']['email'],
        $_SESSION['join']['phone_number'],
        $hash
    ));
 
    unset($_SESSION['join']);   // セッションを破棄
    header('Location: thank.php');   // thank.phpへ移動
    exit();
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
    <title>確認画面</title>
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <link href="https://unpkg.com/sanitize.css" rel="stylesheet"/>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="form">
        <form action="" method="POST">
            <input type="hidden" name="check" value="checked">
            <h2>入力情報の確認</h2>
            <p class="check_p01">ご入力情報に変更が必要な場合、下のボタンを押し、変更を行ってください。</p>
            <p class="check_p02">登録情報はあとから変更することもできます。</p>
            <?php if (!empty($error) && $error === "error"): ?>
                <p class="error">＊会員登録に失敗しました。</p>
            <?php endif ?>
 
            
            
            
            
            
            
            <div class="check_name">
                <div class="control">
                    <p class="check_name_text">氏名</p>
                    <p><span class="fas fa-angle-double-right"></span> <span class="check-info"><?php echo htmlspecialchars($_SESSION['join']['name'], ENT_QUOTES); ?></span></p>
                </div>
            </div>
            
            <div class="check_email">
                <div class="control">
                    <p class="check_email_text">メールアドレス</p>
                    <p><span class="fas fa-angle-double-right"></span> <span class="check-info"><?php echo htmlspecialchars($_SESSION['join']['email'], ENT_QUOTES); ?></span></p>
                </div>
            </div>
            
            <div class="check_phone_number">
                <div class="control">
                    <p class="check_phone_number_text">電話番号</p>
                    <p><span class="fas fa-angle-double-right"></span> <span class="check-info"><?php echo htmlspecialchars($_SESSION['join']['phone_number'], ENT_QUOTES); ?></span></p>
                </div>
            </div>

            <div class="check_submit">
                <a href="entry_form.php" class="back-btn">変更する</a>
                <button type="submit" class="btn next-btn">登録する</button>
            </div>
            
            <div class="clear"></div>
        </form>
    </div>
</body>
</html>