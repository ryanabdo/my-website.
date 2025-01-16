<?php
session_start(); 
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>عرض البيانات</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        p {
            font-size: 16px;
            color: #555;
        }
        .visitor-count {
            text-align: center;
            margin-top: 20px;
            font-weight: bold;
            font-size: 18px;
            color: #0275d8;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>تم تسجيل البيانات بنجاح!</h1>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username']; 
            $password = $_POST['password']; 
            $gender = $_POST['gender']; 

            echo "<p>اسم المستخدم: $username</p>";
            echo "<p>كلمة السر: $password</p>";
            echo "<p>نوع الجنس: $gender</p>";
        }
        ?>

        <?php

        $counter_file = "counter.txt"; 
        if (!file_exists($counter_file)) {
            file_put_contents($counter_file, "0");
        }

        $current_count = file_get_contents($counter_file);
        $current_count++; 

        file_put_contents($counter_file, $current_count);

        echo "<div class='visitor-count'>عدد الزوار الحاليين: $current_count</div>";
        ?>
    </div>

</body>
</html>
