<!DOCTYPE html>
<html>
<head>
    <title>Form Validation in PHP</title>
</head>
<body>
    <h2>PHP Form Validation</h2>
    <form method="post" action="">
        Name: <input type="text" name="name"><br><br>
        Email: <input type="text" name="email"><br><br>
        Age: <input type="text" name="age"><br><br>
        <input type="submit" name="submit" value="Validate">
    </form>

    <hr>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = trim($_POST['name']);
        $email = trim($_POST['email']);
        $age = trim($_POST['age']);
        $error = "";

        if (empty($name) || empty($email) || empty($age)) {
            $error .= "<p style='color:red;'>All fields are required.</p>";
        }

        if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error .= "<p style='color:red;'>Invalid email format.</p>";
        }

        if (!empty($age) && !is_numeric($age)) {
            $error .= "<p style='color:red;'>Age must be a number.</p>";
        }

        if (!empty($name)&&!preg_match("/^[a-zA-z\s]+$/",$name)){
            $error.="<p Style='color:red;'>Name must contain only alphabets";
        }

        if ($error == "") {
            echo "<p style='color:green;'>All inputs are valid.</p>";
            echo "<h3>Entered Details:</h3>";
            echo "Name: $name<br>";
            echo "Email: $email<br>";
            echo "Age: $age<br>";
        } else {
            echo $error;
        }
    }
    ?>
</body>
</html>
