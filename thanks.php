<?php
    // 不正な画面遷移を防ぐ
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    header('Location: idnex.html');
}
    require_once('function.php');
    
    $nickname = $_POST['nickname'];
    $email = $_POST['email'];
    $content = $_POST['content'];
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <title>送信完了</title>
    <meta charset="UTF-8">
</head>
<body>
    <h1>お問い合わせありがとうございました！</h1>
    <p><?php echo h($nickname); ?></p>
    <p><?php echo h($email); ?></p>
    <p><?php echo h($content); ?></p>
</body>
</html>