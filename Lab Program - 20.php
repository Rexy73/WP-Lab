<!DOCTYPE html>
<html>
    <head>
        <title>Upload and display image</title>
    </head>
    <body>
        <h2>Upload Image to Database</h2>
        <form method="post" enctype="multipart/form-data">
            <input type="file" name="image"><br><br>
            <input type="submit" name="upload" value="Upload image"><br><br>
        </form>
        <hr>
        <h2>Stored Images</h2>
        <?php
        $conn = mysqli_connect("localhost", "root", "", "image_demo");
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        if (isset($_POST['upload'])) {
            if (!empty($_FILES['image']['tmp_name'])) {
                $imageName = $_FILES['image']['name'];
                $imageData = addslashes(file_get_contents($_FILES['image']['tmp_name']));
                $query = "INSERT INTO images (name, image) VALUES ('$imageName', '$imageData')";
                if (mysqli_query($conn, $query)) {
                    echo "<p><b>Image Uploaded successfully!</b></p>";
                } else {
                    echo "<p style='color:red;'>Error uploading image: " . mysqli_error($conn) . "</p>";
                }
            } else {
                echo "<p style='color:red;'>Please select an image file to upload</p>";
            }
        }

        $result = mysqli_query($conn, "SELECT * FROM images ORDER BY id DESC");
        echo "<table border='1' cellpadding='10'>
                <tr><th>ID</th><th>Image name</th><th>Preview</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>{$row['id']}</td>";
            echo "<td>{$row['name']}</td>";
            echo "<td><img src='data:image/jpeg;base64," . base64_encode($row['image']) . "' width='150' height='100'></td>";
            echo "</tr>";
        }
        echo "</table>";
        mysqli_close($conn);
        ?>
    </body>
</html>
