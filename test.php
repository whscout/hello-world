<?php
// 定义变量并设置为空值
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameErr = "姓名是必填的";
    } else {
        $name = test_input($_POST["name"]);
        // 检查姓名是否包含字母和空白字符
        if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
            $nameErr = "只允许字母和空格";
        }
    }

    if (empty($_POST["email"])) {
        $emailErr = "电邮是必填的";
    } else {
        $email = test_input($_POST["email"]);
        // 检查电子邮件地址语法是否有效
        if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email)) {
            $emailErr = "无效的 email 格式";
        }
    }

    if (empty($_POST["website"])) {
        $website = "";
    } else {
        $website = test_input($_POST["website"]);
        // 检查 URL 地址语法是否有效（正则表达式也允许 URL 中的斜杠）
        if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
            $websiteErr = "无效的 URL";
        }
    }

    if (empty($_POST["comment"])) {
        $comment = "";
    } else {
        $comment = test_input($_POST["comment"]);
    }

    if (empty($_POST["gender"])) {
        $genderErr = "性别是必选的";
    } else {
        $gender = test_input($_POST["gender"]);
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
echo "<h2>您的输入：</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $website;
echo "<br>";
echo $comment;
echo "<br>";
echo $gender;
?>