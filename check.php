<?php
    // 不正な画面遷移を防ぐ
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        header('Location: idnex.html');
    }
    // データの受け取り
    // $_POST がPOSTで送信されたデータを格納するスーパーグローバル変数
    // スーパーグローバル変数はPHPで定義されているため、自分で定義する必要はなし
    // $_ + 英字大文字 はスーパーグローバル変数の法則
    $nickname = $_POST['nickname'];
    $email = $_POST['email'];
    $content = $_POST['content'];

    // 入力内容のチェック
    if ($nickname == '') {
        $nickname_result = 'ニックネームが入力されていません。';
    } else {
        $nickname_result = 'ようこそ、' . $nickname . '様';
    }
    
    if ($email == '') {
        $email_result = 'メールアドレスが入力されていません。';
    } else {
        $email_result = 'メールアドレス：' . $email;
    }

    if ($content == '') {
        $content_result = 'お問い合わせ内容が入力されていません。';
    } else { 
        $content_result = 'お問い合わせ内容：' . $content;
    }
    // function.phpのファイルを読み込む
    // require_onceは他のファイルを読み込むための組み込み関数
    require_once('function.php');
?>

<!-- 問い合わせ内容確認画面の作成 -->
<!DOCTYPE html>
<html lang="ja">
<head>
    <title>入力内容確認</title>
    <meta charset="UTF-8">
</head>
<body>
    <h1>入力内容確認</h1>
    <!-- 入力内容のチェック　
         hという関数は引数に渡された値を、htmlspecialcharsでエスケープする関数-->
    <p><? echo h($nickname_result); ?></p>
    <p><? echo h($email_result); ?></p>
    <p><? echo h($content_result); ?></p>

    <!-- OKボタンをクリックしたらthanks.phpに飛ぶ
         入力ミスがある場合もOKボタンを押せてしまうため、
         「nickname, email, content全てがからでない場合にOKボタンを表示する」
         というif文を作成する
         hiddenとは
         HTMLのinputタグで、画面には表示されないが、データを送信したいときに選択する
         type属性のこと。 $nicknameに入っている値を、hiddenタグのvalue属性に設定することで
         フォームデータの受け渡しが可能になる -->
    <form method="POST" action="thanks.php">
        <input type="hidden" name="nickname" value="<?php echo h($nickname); ?>">
        <input type="hidden" name ="email" value="<?php echo h($email); ?>">
        <input type="hidden" name ="content" value="<?php echo h($content); ?>">
        <!-- OKボタンを表示する
             コロン構文はPHPとHTMLを混在して記述するときに見やすく書くことができるため使用 -->
        <?php if ($nickname != '' && $email != '' && $content != ''): ?>
            <button type="submit">OK</button>
        <?php endif; ?>
        
    </form>
</body>
</html>