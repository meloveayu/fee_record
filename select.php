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

$sql = "SELECT place,money,others FROM eat_tb WHERE day='$day' AND time='$time'";
echo $sql . "<br>";

$retval = mysqli_query($conn,$sql);
if(! $retval)
{
    die("无法读取数据：" . mysqli_error($conn));
}
$row = mysqli_fetch_array($retval,MYSQLI_ASSOC);
//写一个能解析日期、时间和地点的方法，格式太不美观
$place = $row['place'];
$money = $row['money'];
$others = $row['others'];
$out = "在 $day 的 $time ，在 $place 消费 $money 元，吃的是 $others 。";
echo $out;

mysqli_close($conn);