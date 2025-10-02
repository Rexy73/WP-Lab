<?php
$rows=5; // total rows
for($i=$rows;$i>=1;$i--){
    for($s=0;$s<$rows-$i;$s++){
        echo "&nbsp;"; // single space
    }
    for($j=1;$j<=$i;$j++){
        echo "* ";
    }
    echo "<br>"; // new line
}
?>