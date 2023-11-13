<?php
try {
    // 第2,3引数にphpmyadminのユーザー名、パスワードを入力
    $db = new PDO('mysql:dbname=hew2023;host=127.0.0.1;charset=utf8mb4', 'root', '');
}   catch (PDOException $e) {
    echo "データベース接続エラー：".$e->getMessage();
}
?>