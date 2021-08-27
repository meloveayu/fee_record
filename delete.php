<?php
$servername = "82.156.11.105";
$username = "root";
$password = "123456";
$dbname = "test";

$conn = new mysqli($servername,$username,$password,$dbname);

if($conn->connect_error)
{
    die("连接失败：" . $conn->connect_error . "<br>");
}
echo "连接成功<br>";

$day = $_POST["day"];
$time = $_POST["time"];

$sql = "DELETE FROM eat_tb WHERE day='$day' AND time='$time'";
echo $sql . "<br>";

if(mysqli_query($conn,$sql))
{
    echo "删除成功<br>";
}
else
{
    echo "Error：" . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
