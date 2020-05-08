<?php

$check = "38.1";
if ($check <= 37.0){
    echo "平熱です。";
} else if ($check < 37.5){
    echo "微熱です";
} else {
    echo "コロナの可能性あり";
}

?>