<?php

// データまとめ用の空文字変数
$str = '';
$array = [];

// ファイルを開く（読み取り専用）
$file = fopen('data/listofpart.csv', 'r');
// ファイルをロック
flock($file, LOCK_EX);

// fgets()で1行ずつ取得→$lineに格納
if ($file) {
    while ($line = fgets($file)) {
        // カンマ区切りでデータを取得
        $data = explode(',', $line);


        // データを整形して配列に追加
        $array[] = [
            "preferredDateTime" => isset($data[0]) ? $data[0] : '',
            "eventName" => isset($data[1]) ? $data[1] : '',
            "nameKana" => isset($data[2]) ? $data[2] : '',
            "email" => isset($data[3]) ? $data[3] : '',
            "phone" => isset($data[4]) ? $data[4] : '',
            "attendees" => isset($data[5]) ? $data[5] : '',
            "comments" => isset($data[6]) ? $data[6] : ''
        ];
        // 一覧画面用のHTMLを生成
        $str .= "<tr>
        <td>" . htmlspecialchars($data[0], ENT_QUOTES, 'UTF-8') . "</td>
        <td>" . htmlspecialchars($data[1], ENT_QUOTES, 'UTF-8') . "</td>
        <td>" . htmlspecialchars($data[2], ENT_QUOTES, 'UTF-8') . "</td>
        <td>" . htmlspecialchars($data[3], ENT_QUOTES, 'UTF-8') . "</td>
        <td>" . htmlspecialchars($data[4], ENT_QUOTES, 'UTF-8') . "</td>
        <td>" . htmlspecialchars($data[5], ENT_QUOTES, 'UTF-8') . "</td>
        <td>" . htmlspecialchars($data[6], ENT_QUOTES, 'UTF-8') . "</td>
        </tr>";
    }
}

// ロックを解除する
flock($file, LOCK_UN);
// ファイルを閉じる
fclose($file);

// 配列をJSON形式に変換
$arrayString = json_encode($array);

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
                    <th>日付</th>
                    <th>セミナー名</th>
                    <th>名前</th>
                    <th>メール</th>
                    <th>電話番号</th>
                    <th>参加人数</th>
                    <th>コメント</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($array as $data) : ?>
                    <tr>
                        <td><?= htmlspecialchars($data['preferredDateTime'], ENT_QUOTES, 'UTF-8') ?></td>
                        <td><?= htmlspecialchars($data['eventName'], ENT_QUOTES, 'UTF-8') ?></td>
                        <td><?= htmlspecialchars($data['nameKana'], ENT_QUOTES, 'UTF-8') ?></td>
                        <td><?= htmlspecialchars($data['email'], ENT_QUOTES, 'UTF-8') ?></td>
                        <td><?= htmlspecialchars($data['phone'], ENT_QUOTES, 'UTF-8') ?></td>
                        <td><?= htmlspecialchars($data['attendees'], ENT_QUOTES, 'UTF-8') ?></td>
                        <td><?= htmlspecialchars($data['comments'], ENT_QUOTES, 'UTF-8') ?></td>
                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
    </fieldset>
    <script>
        const data = <?= $arrayString ?>;
        console.log(data);
    </script>
</body>

</html>