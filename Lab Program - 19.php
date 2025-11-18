<!DOCTYPE html>
<html>
<head>
  <title>STUDENT DATABASE OPERATIONS</title>
</head>
<body>
 <h2>Student database-ADD,UPDATE,DELETE</h2>

<form method="post">
 ID(for update/delete):<input type="text" name="id"><br><br>
 Name:<input type="text" name="name"><br><br>
 Course:<input type="text" name="course"><br><br>
 Marks:<input type="text" name="marks"><br><br>
<input type="submit" name="add" value="Add Student">
<input type="submit" name="update" value="Update Student">
<input type="submit" name="delete" value="Delete Student">
</form>

<hr>

<?php

$conn=mysqli_connect("localhost","root","","student_db");

if(!$conn){
   die("Connection Failed:".mqsqli_connect_error());
}

if(isset($_POST['add'])){
  $id=$_POST['id'];
  $name=$_POST['name'];
  $course=$_POST['course'];
  $marks=$_POST['marks'];

if($id==" "||$name==""||$course==""||$marks==""){
   echo "All Fields are required to a add a student</p>";
}else{
$query="INSERT INTO students(id,name,course,marks)VALUES('$id','$name','$course','$marks')";
if(mysqli_query($conn,$query)){
  echo "<p>Student added successfully!</p>";
}else{
  echo "<p>Error adding student:".mysqli_error($conn)."</p>";
}
}
}

if(isset($_POST['update'])){
   $id=$_POST['id'];
   $name=$_POST['name'];
   $course=$_POST['course'];
   $marks=$_POST['marks'];

if($id==" "||$name==""||$course==""||$marks==""){
   echo "All Fields are required to a update a student</p>";
}else{
$query="UPDATE students set name='$name',course='$course',marks='$marks' where id='$id' ";
if(mysqli_query($conn,$query)){
  echo "<p>Student updated successfully!</p>";
}else{
  echo "<p>Error updating students:".mysqli_error($conn)."</p>";
}
}
}

if(isset($_POST['delete'])){
   $id=$_POST['id'];
   if($id==""){
      echo "ID are required to delete a student</p>";
}else{
$query="DELETE FROM students where id='$id' ";
if(mysqli_query($conn,$query)){
  echo "<p>Student deleted successfully!</p>";
}else{
  echo "<p>Error deleting students:".mysqli_error($conn)."</p>";
}
}
}

echo "<h3>All Students:</h3>";
$result=mysqli_query($conn,"SELECT *FROM students");

echo "<table border='1' cellpadding='5'><tr><th>ID</th><th>NAME</th><th>COURSE</th><th>MARKS</th></tr>";
while($row=mysqli_fetch_assoc($result)){
  echo "<tr>
        <td>{$row['id']}</td>
        <td>{$row['name']}</td>
        <td>{$row['course']}</td>
        <td>{$row['marks']}</td>
        </tr>";
}
echo "</table>";

mysqli_close($conn);
?>
</body>
</html>