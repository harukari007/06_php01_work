<?php

// var_dump($_POST);
// exit();

/// データの受け取り
$eventName = $_POST['eventName'];
$preferredDateTime = $_POST['preferredDateTime'];
$nameKana = $_POST['nameKana'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$attendees = $_POST['attendees'];
$paymentMethod = $_POST['paymentMethod'];
$comments = $_POST['comments'];

// データ1件を1行にまとめる(カンマで区切る）
$write_data = "{$preferredDateTime},{$eventName},{$nameKana},{$email},{$phone},{$attendees},
{$comments}\n";

// ファイルを開く．引数が`a`である部分に注目！
$file = fopen('data/listofpart.csv', 'a');
// ファイルをロックする
flock($file, LOCK_EX);

// 指定したファイルに指定したデータを書き込む
fwrite($file, $write_data);

// ファイルのロックを解除する
flock($file, LOCK_UN);
// ファイルを閉じる
fclose($file);

// 送信結果をJSONで返す
$response = [
    'status' => 'success',
];
echo json_encode($response);

// データ入力画面に移動する
header("Location:survay.php");
exit();
