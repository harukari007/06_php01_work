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

                <button type="submit" id="submit" >送信</button>
            </form>

            <a href="survay_txt_read.php">参加者一覧画面</a>
        </div>
    <!--/ コンテンツ表示画面 -->


    <!-- JQuery -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
    <!-- JQuery -->


    <!-- ** 以下Firebase **
    <script type="module">
        import {
            initializeApp
        } from "https://www.gstatic.com/firebasejs/10.11.1/firebase-app.js";
        import {
            getFirestore,
            collection,
            addDoc,
            serverTimestamp,
            query,
            orderBy,
            onSnapshot,
        } from "https://www.gstatic.com/firebasejs/10.11.1/firebase-firestore.js";
        const firebaseConfig = {
            apiKey: ",
            authDomain: "lp-work.firebaseapp.com",
            projectId: "lp-work",
            storageBucket: "lp-work.appspot.com",
            messagingSenderId: "7327799903",
            appId: "1:7327799903:web:0a9c4c1ff4bb814b0bd9ea"
        };
        const app = initializeApp(firebaseConfig);
        const db = getFirestore(app); //Firestoreに接続
        const q = query(collection(db, "lp"), orderBy("time", "desc"));


        $("#submit").on("click", function() {
            const postData = {
                eventName: $("#eventName").val(),
                preferredDateTime: $("#preferredDateTime").val(),
                nameKana: $("#nameKana").val(),
                email: $("#email").val(),
                phone: $("#phone").val(),
                attendees: $("#attendees").val(),
                paymentMethod: $("#paymentMethod").val(),
                comments: $("#comments").val(),
                time: serverTimestamp(),
            }
            console.log(postData);
            addDoc(collection(db, "lp"), postData);
        }); -->

    </script>

</body>

</html>