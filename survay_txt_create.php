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

// データ1件を1行にまとめる（最後に改行を入れる）
$write_data = "{$eventName} {$preferredDateTime}{$nameKana}{$email}{$phone}{$attendees}
{$paymentMethod}{$comments}\n";

// $array2 = [
//     "日時" => "preferredDateTime",
//     "セミナー名" => "eventName",
//     "名前" => "nameKana",
//     "メール" => "email",
//     "支払い" => "paymentMethod",
//     "コメント"=> "comments",
// ];

// // キー名を指定して値を取り出す
// echo $array2['サーバ'];

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

// データ入力画面に移動する
header("Location:survay.php");
exit();
