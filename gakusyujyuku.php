<?php
// フォーム送信時の処理
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 入力データを取得
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);  // 修正：電話番号フィールドに対応
    $message = htmlspecialchars($_POST['message']); // 修正：messageにもhtmlspecialchars()を適用

    // メール送信設定
    $to = "duffletash@icloud.com";  // 受信先メールアドレス
    $subject = "新しい入塾のお問い合わせ";
    $message_content = "
    <html>
    <head>
    <title>新しいお問い合わせ</title>
    </head>
    <body>
    <p>以下のお問い合わせが送信されました。</p>
    <table>
    <tr>
        <th>お名前</th>
        <td>{$name}</td>
    </tr>
    <tr>
        <th>メールアドレス</th>
        <td>{$email}</td>
    </tr>
    <tr>
        <th>電話番号</th>
        <td>{$phone}</td>
    </tr>
    <tr>
        <th>メッセージ</th>
        <td>{$message}</td>
    </tr>
    </table>
    </body>
    </html>
    ";
    
    // メール送信ヘッダー
    $headers = "From: " . $email . "\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8\r\n";

    // メール送信
    if (mail($to, $subject, $message_content, $headers)) {
        echo "<p>お問い合わせありがとうございます。確認後、追ってご連絡させていただきます。</p>";
    } else {
        echo "<p>送信に失敗しました。もう一度お試しください。</p>";
    }
}
?>
