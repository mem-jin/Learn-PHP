<?php

$player_hand = $_GET["playerHand"];
$pc_hand = 1;
/**
(1) 勝敗（勝ち・負け・あいこ）は$resultに代入してください
(2) プレイヤーの手は$player_handに代入してください
(3) コンピューターの手は$pc_handに代入してください
**/
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf8">
        <title>じゃんけん</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <h1>結果は・・・</h1>
        <div class="result-box">
            <!-- じゃんけんの結果を表示しましょう -->
            <p class="result-word"></p>
            <!-- プレイヤーの手を表示しましょう -->
            あなた：<?php echo $player_hand;?><br>
            <!-- コンピュータの手を表示しましょう -->
            コンピューター：<br>

            <p><a class="red" href="index.php">>>もう一回勝負する</a></p>
        </div>
    </body>
</html>