<?php

function janken($finger_num){
    if ($finger_num === 0){
        return "ぐー";
    } else if ($finger_num === 2){
        return "ちょき";
    } else {
        return "ぱー";
    }
}

function judge($pc, $player){
    if ($player === 0){
        
        if ($pc === 0){
            return "あいこ！";
        } else if ($pc === 2){
            return  "勝ち！";
        } else {
            return "負け！";
        }
        
    } else if ($player === 2){
        
        if ($pc === 2){
            return "あいこ！";
        } else if ($pc === 5){
            return  "勝ち！";
        } else {
            return "負け！";
        }
        
    } else {
        
        if ($pc === 5){
            return "あいこ！";
        } else if ($pc === 0){
            return  "勝ち！";
        } else {
            return "負け！";
        }
    }
}

function crazy_hand(){
    
    $crazy = rand(0,2);
    
    if($crazy === 0){
        return 0;
    } else if ($crazy === 1){
        return 2;
    } else {
        return 5;
    }
}

$n_player = (int) $_POST["playerHand"];
$n_pc = crazy_hand();

$result = judge($n_pc, $n_player);
$player_hand = janken($n_player);
$pc_hand = janken($n_pc);

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
            <?php echo htmlspecialchars($result, ENT_QUOTES, 'UTF-8');?>
            <p class="result-word"></p>
            <!-- プレイヤーの手を表示しましょう -->
            あなた：<?php echo htmlspecialchars($player_hand, ENT_QUOTES, 'UTF-8');?><br>
            <!-- コンピュータの手を表示しましょう -->
            コンピューター：<?php echo htmlspecialchars($pc_hand, ENT_QUOTES, 'UTF-8');?><br>

            <p><a class="red" href="index.php">>>もう一回勝負する</a></p>
        </div>
    </body>
</html>