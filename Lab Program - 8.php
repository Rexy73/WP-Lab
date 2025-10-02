<?php

$backgroundColor = array(
    "Monday" => "lightblue",
    "Tuesday"=> "lightgreen",
    "Wednesday"=> "purple",
    "Thursday"=> "lightpink",
    "Friday"=> "pink",
    "Saturday"=> "orange",
    "Sunday"=>"violet"

);
$dayofweek=date("l");
if($dayofweek=="Sunday") {
    $color=$backgroundColor["Sunday"];
}elseif($dayofweek=="Monday") {
    $color=$backgroundColor["Monday"];
}elseif($dayofweek=="Tuesday") {
    $color=$backgroundColor["Tuesday"];
}elseif($dayofweek=="Wednesday") {
    $color=$backgroundColor["Wednesday"];
}elseif($dayofweek=="Thursday") {
    $color=$backgroundColor["Thursday"];
}elseif($dayofweek=="Friday") {
    $color=$backgroundColor["Friday"];
}else{// Saturday
    $color=$backgroundColor["Saturday"];
}?>
<!Doctype html>
<html>
<head>
<style>
body{
background-color:<?php echo $color;?>;
}
</style>
</head>
<body>
<h1> Today is <?php echo $dayofweek;?>!</h1>
</body>
</html>