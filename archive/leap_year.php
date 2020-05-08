<?php

echo "西暦で年を入力してください\ncp";
$year = fgets(STDIN);
echo "入力された年は";

if ($year % 400 === 0) {
    echo "うるう年";
} else if($year % 4 === 0 && $year % 100 === 0) {
    echo "平年";
} else if($year % 4 === 0) {
    echo "うるう年";
} else {
    echo "平年";
}

echo "です"

?>