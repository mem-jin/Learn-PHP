<?php

echo "身長を入力してください: ";
$height = fgets(STDIN);
echo "体重を入力してください: ";
$weight = fgets(STDIN);

$bmi = $weight / ($height^2);

if ($bmi < 18.5) {
    echo "あなたは、低体重です。";
} else if ($bmi >= 25) {
    echo "あなたは、肥満です。" ;
} else {
    echo "あなたは、普通体重です。";
}

?>