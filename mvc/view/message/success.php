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
        <img style="width: 200px;" src="<?= getBaseUrl() ?>images/success.png" alt="">
        <!-- <h4>تبریک شما به سیستم وارد شدید.</h4>
        <span>برای ورود به صفحه اصلی<a href="index.php"> اینجا </a>کلیک کنید</span> -->
        <h4><?= $msg ?></h4>
    </div>
</body>

</html>