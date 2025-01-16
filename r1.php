<?php

session_start();

if (isset($_COOKIE['user_logged'])) {
    $last_login_time = $_COOKIE['user_logged']; 
    $current_time = time(); 
    $cookie_expiration = 86400; 
    if ($current_time - $last_login_time < $cookie_expiration) {
        echo "<p>لقد قمت بالتسجيل مسبقًا. يمكنك المحاولة مجددًا بعد 24 ساعة.</p>";
        exit; 
      }
}
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل البيانات</title>
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
        label {
            font-size: 16px;
            color: #555;
        }
        input, select, button {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ddd;
        }
        button {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
            border: none;
        }
        button:hover {
            background-color: #45a049;
        }
        p {
            color: #d9534f;
            text-align: center;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>مرحبًا بك في الموقع</h1>
        <form method="POST" action="r2.php">
            <label for="username">اسم المستخدم:</label>
            <input type="text" name="username" required><br><br>

            <label for="password">كلمة السر:</label>
            <input type="password" name="password" required><br><br>

            <label for="gender">نوع الجنس:</label>
            <select name="gender" required>
                <option value="male">ذكر</option>
                <option value="female">أنثى</option>
            </select><br><br>

            <button type="submit">إرسال</button>
        </form>
    </div>

</body>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    setcookie('user_logged', time(), time() + 86400, '/'); // تعيين الكوكيز لمدة 24 ساعة
}
?>
