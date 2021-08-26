<?php
$servername = "82.156.11.105";
$username = "root";
$password = "123456";
$dbname = "test";

$conn = new mysqli($servername,$username,$password,$dbname);

if($conn->connect_error)
{
    die("连接失败：" . $conn->connect_error);
}
echo "连接成功";

$day = $_POST["day"];
$time = $_POST["time"];
$place = $_POST["place"];
$money = $_POST["money"];
$others = $_POST["others"];
foreach ($_POST as $key => $value)
{
    echo $key . ":" . $value . "<br>";
}

$sql = "INSERT INTO eat_tb (day,time,place,money,others) VALUES ('$day','$time','$place','$money','$others')";

echo $sql . "<br>";

if(mysqli_query($conn,$sql))
{
    echo "插入成功";
}
else
{
    echo "Error：" . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);