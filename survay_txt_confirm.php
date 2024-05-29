<?php
// POSTの場合も必ず最初にチェック！！
// var_dump($_POST);
// exit();

// キー名に送信元ファイルのname属性を指定する．
$eventName = $_POST['eventName'];
$preferredDateTime = $_POST['preferredDateTime'];
$nameKana = $_POST['nameKana'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$attendees = $_POST['attendees'];
$paymentMethod = $_POST['paymentMethod'];
$comments = $_POST['comments'];



?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>セミナー参加者一覧画面（POST）</title>
</head>

<body>
    <fieldset>
        <legend>フォーム送信内容（確認画面）</legend>
        <table>
            <thead>
                <tr>
                    <th><?= $eventName ?></th>
                    <th><?= $preferredDateTime ?></th>
                    <th><?= $nameKana ?></th>
                    <th><?= $email ?></th>
                    <th><?= $phone ?></th>
                    <th><?= $attendees ?></th>
                    <th><?= $paymentMethod ?></th>
                    <th><?= $comments ?></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </fieldset>
</body>

</html>