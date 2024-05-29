<?php
// var_dump($_GET);
// exit();
// 最初にデータをうけとれているか確認する。
// タイムゾーンを日本時間に設定
date_default_timezone_set('Asia/Tokyo');
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>PHP_セミナー申し込みフォーム</title>
    <link rel="stylesheet" href="form.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <!-- フォーム入力画面を作成する(TOP) -->
    <div>
        <form action="survay_txt_create.php" method="POST">
            <h2>イベント参加申し込みフォーム</h2>
            <label for="eventName">希望イベント名:</label>
            <select id="eventName" name="eventName" required>
                <option value="real525">5/XX リアル開催 ロボット導入・IoT活用セミナー</option>
                <option value="onlinewebinar">6/XX DX活用 オンラインウェビナー</option>
                <option value="real801">8/XX IT導入補助金 オンラインセミナー</option>
            </select>

            <label for="preferredDateTime">希望する日時:</label>
            <input type="datetime-local" id="preferredDateTime" name="preferredDateTime" required>

            <label for="nameKana">名前（フリガナ）:</label>
            <input type="text" id="nameKana" name="nameKana" required>

            <label for="email">メールアドレス:</label>
            <input type="email" id="email" name="email" required>

            <label for="phone">電話番号:</label>
            <input type="tel" id="phone" name="phone" required>

            <label for="attendees">参加人数:</label>
            <input type="number" id="attendees" name="attendees" min="1" required>

            <label for="paymentMethod">支払い方法:</label>
            <select id="paymentMethod" name="paymentMethod" required>
                <option value="creditCard">クレジットカード</option>
                <option value="bankTransfer">銀行振込</option>
                <option value="paypal">PayPal</option>
            </select>

            <label for="comments">意見または質問:</label>
            <textarea id="comments" name="comments" rows="4"></textarea>

            <button type="submit" id="submit">送信</button>
        </form>

        <a href="survay_txt_read.php">参加者一覧画面</a>
    </div>
    <!--/ コンテンツ表示画面 -->
    <script>
        $(document).ready(function() {
            $("#applicationForm").submit(function(event) {
                event.preventDefault(); // デフォルトの送信処理をキャンセル

                // 各項目に値が入力されているか確認
                const eventName = $("#eventName").val();
                const preferredDateTime = $("#preferredDateTime").val();
                const nameKana = $("#nameKana").val();
                const email = $("#email").val();
                const phone = $("#phone").val();
                const attendees = $("#attendees").val();
                const paymentMethod = $("#paymentMethod").val();
                const comments = $("#comments").val();

                // いずれかの項目が空の場合、エラーメッセージを表示して送信をキャンセル
                if (!eventName || !preferredDateTime || !nameKana || !email || !phone || !attendees || !paymentMethod) {
                    alert("すべての項目に入力してください。");
                    return;
                }

                // フォームに入力されたデータを配列に格納
                const postData = {
                    eventName: eventName,
                    preferredDateTime: preferredDateTime,
                    nameKana: nameKana,
                    email: email,
                    phone: phone,
                    attendees: attendees,
                    paymentMethod: paymentMethod,
                    comments: comments
                };

                // 送信前にデータをコンソールに出力
                console.log(postData);

                // データをCSVファイルに書き込む
                $.ajax({
                    url: "survay_txt_create_ajax.php",
                    type: "POST",
                    data: postData,
                    dataType: "json",
                    success: function(data) {
                        if (data.status === "success") {
                            alert("送信完了しました。");
                            // 入力画面をクリア
                            $("#applicationForm")[0].reset();
                        } else {
                            alert("送信に失敗しました。");
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert("送信に失敗しました。エラー内容：" + textStatus + " " + errorThrown);
                    }
                });
            });
        });
    </script>
</body>

</html>