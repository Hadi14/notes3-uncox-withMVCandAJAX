<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="base.css">
</head>

<body>
    <div class="tac">
        <img style="width: 200px;" src="<?= getBaseUrl() ?>images/fail.png" alt="">
        <!-- <h4> شما با خطا روبرو شدید.</h4> -->
        <!-- <span>برای ورود به صفحه لوگین <a href="login.php"> اینجا </a>کلیک کنید</span> -->
        <h2>
            <?= $msg ?> </h2>
    </div>
</body>

</html>