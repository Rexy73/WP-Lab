<html>
    <head><title>Read & Write</title></head>
    <body>
        <form action="" method="post">
            <label>Enter Text To save in File</label>
            <textarea name="content" rows="5" cols="40"></textarea>
            <input type="submit" name="write" value="WRITE">
            <input type="submit" name="read" value="READ">
        </form>
        <?php 
        $fn="myfile.txt";
        if(isset($_POST["write"])){
        $d=trim($_POST["content"]);
        if(!empty($d)){
            $f=fopen($fn,"a") or die("Unable to Open the File");
            fwrite($f,$d."\n");
            fclose($f);
            echo"<p style='color: green;'>Data Successfully Written to $fn<p>";
        }
    } else {
        echo "<p style='color: red;'>Please Enter Some Text To Write<p>";
    }
    if(isset($_POST["read"])){
        if(file_exists($fn) && filesize($fn)> 0){
            $content=file_get_contents($fn);
            echo"<h3>Content of $fn </h3><pre>$content</pre>";
        } else {
            echo "<p style='color: red;'>File Does Not Exists Or No Data<p>";
        }
    }
        ?>
    </body>
</html>