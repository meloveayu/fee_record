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

//day,time,place,money,others
$day = "";
$time = "";
$group = array("place" => "","money" => "","others" => "");

//遍历_HOST，把出现的值依照键存到对应的变量中
foreach ($_POST as $key => $value)
{
    switch ($key)
    {
        case "day":
            $day = $value;
            break;
        case "time":
            $time = $value;
            break;
        case "place":
            $group['place'] = $value;
            break;
        case "money":
            $group['money'] = $value;
            break;
        case "others":
            $group['others'] = $value;
            break;
        default:
            break;
    }
}

foreach ($group as $key => $value)
{
    switch ($key)
    {
        case "place":
            if ($value == "") break;
            $sql = "UPDATE eat_tb SET place='$value' WHERE day='$day' AND time='$time'";
            mysqli_query($conn,$sql);
            break;
        case "money":
            if ($value == "") break;
            $sql = "UPDATE eat_tb SET money='$value' WHERE day='$day' AND time='$time'";
            mysqli_query($conn,$sql);
            break;
        case "others":
            if ($value == "") break;
            $sql = "UPDATE eat_tb SET others='$value' WHERE day='$day' AND time='$time'";
            mysqli_query($conn,$sql);
            break;
    }
}

echo "修改成功";
mysqli_close($conn);