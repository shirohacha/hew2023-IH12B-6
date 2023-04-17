<?php
require("../dbconnect.php");
session_start();
 
if (!empty($_POST)) {
    /* 入力情報の不備を検知 */
    if ($_POST['email'] === "") {
        $error['email'] = "blank";
    }
    if ($_POST['phone_number'] === "") {
        $error['phone_number'] = "blank";
    }
    if ($_POST['password'] === "") {
        $error['password'] = "blank";
    }
    
    /* メールアドレスの重複を検知 */
    if (!isset($error)) {
        $member = $db->prepare('SELECT COUNT(*) as cnt FROM customer WHERE email=?');
        $member->execute(array(
            $_POST['email']
        ));
        $record = $member->fetch();
        if ($record['cnt'] > 0) {
            $error['email'] = 'duplicate';
        }
    }

    /* 電話番号の重複を検知 */

    if (!isset($error)) {
        $member = $db->prepare('SELECT COUNT(*) as cnt FROM customer WHERE phone_number=?');
        $member->execute(array(
            $_POST['phone_number']
        ));
        $record = $member->fetch();
        if ($record['cnt'] > 0) {
            $error['phone_number'] = 'duplicate';
        }
    }
 
    /* エラーがなければ次のページへ */
    if (!isset($error)) {
        $_SESSION['join'] = $_POST;   // フォームの内容をセッションで保存
        header('Location: check.php');   // check.phpへ移動
        exit();
    }
}
?>
