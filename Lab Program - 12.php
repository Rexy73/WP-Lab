<?php

$students=[
    ["id" => 101, "name" => "Ravi", "course" => "BSc"],
    ["id" => 102, "name" => "Sneha", "course" => "BCA"],
    ["id" => 103, "name" => "Arjun", "course" => "Bcom"],
    ["id" => 104, "name" => "Meera", "course" => "MCA"],
    ["id" => 105, "name" => "Kiran", "course" => "BCA"], 
];

function searchData($students, $key, $value){
    $results=[];
    foreach($students as $student){
        if($student[$key] == $value){
            $results[] =$student; 
        }
    }
    return $results ? $results : null; 
}

$result1 = searchData($students, "id", 103);
$result2 = searchData($students, "name", "Meera");
$result3 = searchData($students, "course", "BCA");

echo "Search by ID(103):<br>";
print_r($result1);
echo "<br><br>";

echo "Search by Name(Meera):<br>";
print_r($result2);
echo "<br><br>";

echo "Search by Course(BCA):<br>";
print_r($result3);

?>