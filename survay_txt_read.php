<?php

// データまとめ用の空文字変数
$str = '';
// $array = [];

// ファイルを開く（読み取り専用）
$file = fopen('data/listofpart.csv', 'r');
// ファイルをロック
flock($file, LOCK_EX);

// fgets()で1行ずつ取得→$lineに格納
if ($file) {
    while ($line = fgets($file)) {
        // 取得したデータを`$str`に追加する
        $str .= "<tr><td>{$line}</td></tr>";
        // 配列に追加
        $array[] = "<tr><td>{$line}</td></tr>";
    }
}

// ロックを解除する
flock($file, LOCK_UN);
// ファイルを閉じる
fclose($file);

// `$str`に全てのデータ（タグに入った状態）がまとまるので，HTML内の任意の場所に表示する．

$arrayString = implode("", $array);
// if ($file) {
//     while ($line = fgets($file)) {
//         // いい感じの形にして配列に追加
//         $array[] = [
//             "todo" => str_replace("\n", "", implode(" ", array_slice(explode(" ", $line), 1))),
//             "deadline" => explode(" ", $line)[0],
//         ];
//     }
// }
// 配列の要素を空文字で連結して文字列にする

// var_dump($str);
// exit();
// データがとんでるか確認する。

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>セミナー参加者リスト（一覧画面）</title>
</head>

<body>
    <fieldset>
        <legend>セミナー参加者リスト（一覧画面）</legend>
        <a href="survay.php">入力画面</a>
        <table>
            <thead>
                <tr>
                    <th><?= $str ?>参加者一覧</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </fieldset>
    <script>
        const data = <?= json_encode($array) ?>;
        console.log(data);
    </script>
</body>

</html>