<div class="tac">
    <img style="width: 200px;" src="<?= getBaseUrl() ?>images/register.jpg" alt=""><br>
    <form action="<?= getBaseUrl() ?>user/register" method="post">
        <label for="">UserName</label>
        <input name="uname" type="text"><br><br>
        <label for="">Password</label>
        <input name="pass" type="password"><br><br>
        <label for="">Confirm Password</label>
        <input name="cpass" type="password"><br><br>
        <input class="btnblue" type="submit" value="Register"><br><br>
</div>