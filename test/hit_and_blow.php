<?php

function checker($num) {
    $num100 = floor($num/100);
    $num10  = floor(($num - $num100*100)/10);
    $num1   = $num - $num100*100 - $num10*10;
    
    if ($num100 === $num10 || $num100 === $num1 || $num10 === $num1) {
        $TorF = true;
    } else {
        $TorF = false;
    }
    
    if ($num < 100 || $num > 999) {
        $TorF = true;
    };
    return $TorF;
}

function splitter($num) {
    $num100 = floor($num/100);
    $num10  = floor(($num - $num100*100)/10);
    $num1   = $num - $num100*100 - $num10*10;
    
    return array($num100, $num10, $num1);
}


$loop = true;
while ($loop){
    $random_num = rand(100,999);
    $loop = checker($random_num);
}

$ans_loop = true;
$ans_num = 1;
$random_num = splitter($random_num);

while ($ans_loop) {
    echo "■□■□■□■□■□■□■□■□■□■□■□■□■□■□■□■□■□■□■□■□■□■□■□\n";
    echo $ans_num . "回目のチャレンジ!\n3桁の半角数字を重複なしで入力してください:";
    $ans_num += 1;
    
    $input_num = fgets(STDIN);
    
    if (checker($input_num) === false) {
        $input_num  = splitter($input_num);

        $hit = 0;
        $blow = 0;

        for ($i = 0; $i < 3; $i++) {
            if ($input_num[$i] === $random_num[$i]) {
                $hit += 1;
            }
        }
    
        for ($j = 0; $j < 2; $j++) {
           if ($input_num[0] === $random_num[1 + $j] ){
               $blow += 1;
           }
        }

        for ($j = 0; $j < 2; $j++) {
            if ($input_num[2] === $random_num[$j] ){
                $blow += 1;
                }
        }

        if ($input_num[1] === $random_num[0] ){
           $blow += 1;
        }

        if ($input_num[1] === $random_num[2] ){
            $blow += 1;
        }

        if ($hit === 3) {
            echo "正解です!" . $ans_num . "回目でクリアです!!\n";
           $ans_loop = false;
        } else {
            echo "Hit:" . $hit . ", Blow" . $blow . "です。\n";
        }
        

    } else {
        echo "エラー:3桁の半角数字を重複なしで入力してください!\n";
    }
        
}
    
?>