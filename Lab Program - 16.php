<!DOCTYPE html>
<html>
<head>
    <title>Exception Handling</title>
</head>
<body>
    <h2>PHP Exception Handling</h2>
    <form method="post">
        <label>Enter First Number:</label>
        <input type="number" name="num1" required><br><br>

        <label>Enter Second Number:</label>
        <input type="number" name="num2" required><br><br>

        <label>Enter Date (dd-mm-yyyy):</label>
        <input type="text" name="date" required><br><br>

        <input type="submit" value="Check">
    </form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num1 = $_POST["num1"];
    $num2 = $_POST["num2"];
    $date = $_POST["date"];

    try {                     
       
        if ($num2 == 0) {
            throw new Exception("Cannot divide by 0!");
        } else {
            $result = $num1 / $num2;
            echo "<p>Division Result: $result</p>";
           
        }}

         catch (Exception $e) {
        echo "<p style='color:red;'>" . $e->getMessage() . "</p>";
    } 
    try { 

        if (!preg_match("/^\d{2}-\d{2}-\d{4}$/", $date)) {
            throw new Exception("Invalid date format! Please use dd-mm-yyyy.");
        } else {
            echo "<p>Valid Date format: $date</p>";
        }
    }

    catch (Exception $e) {
        echo "<p style='color:red;'>" . $e->getMessage() . "</p>";
    } 
    finally {
        echo "<p>Program execution completed.</p>";
    }
}

?>
</body>
</html>
