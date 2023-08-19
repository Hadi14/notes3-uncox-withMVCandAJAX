<?
class UserController
{
    public function __construct()
    {
        // echo "<hr>Contructor<hr>";
    }
    /************************  Profile  ******************************* */
    public function profile($p1)
    {
        echo "Profile Method <br>";
        echo "Parameter is: $p1<hr>";
    }
    /************************  Login  ******************************* */
    function login()
    {
        if (isset($_POST['uname'])) {

            $this->LoginCheck();
        } else {
            $this->LoginForm();
        }
    }
    /*-----------------------------*/
    private function LoginCheck()
    {
        // require('main.php');
        // $db = Db::getInstance();
        $u = $_POST['uname'];
        $p = $_POST['pass'];

        // $sql = "select * from users where username='$u' and password='$p'";
        // echo "<hr> $u <br> $p <hr>";
        $record = UserModel::getFirst($u, $p);
        // dump($record);
        // $record = $db->query($sql);
        if ($record == null) {
            // header("Location: fail.php");
            $msg = "<h4>نام کاربری یا رمز اشتباه وارد شده است.</h4> <br> <span>برای ورود مجدد <a href='" . getBaseUrl() . "user/login'> اینجا </a>کلیک کنید</span>";
            showmsg("fail", $msg, true);
        } else {
            $msg = "<h4>تبریک شما به سیستم وارد شدید.</h4> <br> <span>برای ورود به صفحه اصلی<a href=" . getBaseUrl() . "page/home> اینجا </a>کلیک کنید</span>";
            // require_once('success.php');
            showmsg("success", $msg, false);
            $_SESSION['uname'] = $u;
        }
    }
    /*-----------------------------*/
    private function LoginForm()
    {
        // echo "Login Form";
        // $content = "HelloWord";
        echo "Loginform";
        $ar['abc'] = "Loginform-Parameter";
        Render::render('user/login.php', $ar);
    }
    /************************  Register  ******************************* */
    public function register()
    {
        if (isset($_POST['uname'])) {

            $this->registerCheck();
        } else {
            $this->registerForm();
        }
    }
    /*-----------------------------*/
    private function registerCheck()
    {
        echo "Register Check .####";
        // $db = Db::getInstance();

        $u = $_POST['uname'];
        $p = $_POST['pass'];
        $cp = $_POST['cpass'];
        $record = UserModel::getFirst($u, $p);
        // $sql = "select * from users where username='$u' and password='$p' ";
        // $record = $db->query($sql);

        if ($u == "" || $p == "" || $cp == "") {
            $msg = "Plase Fill All Boxes.!!!";
            // require_once('mvc/view/message/fail.php');
            showmsg("fail", $msg, true);
        } else if ($p != $cp) {
            $msg = "Plase type the same Password and Confirm Password.!!!";
            // require_once('mvc/view/message/fail.php');
            showmsg("fail", $msg, true);
        } else if ($record != null) {
            $msg = "You Already Registerd.!!!";
            // require_once('mvc/view/message/fail.php');
            showmsg("fail", $msg, true);
        } else {
            $res = UserModel::insert($u, $p, '2');

            if ($res) {
                $msg = "Thankyou You Registeded.!!! <br>";
                $msg .= "برای ورود  "  . "<a href='" . getBaseUrl() . "user/login'>اینجا</a>" . " کلیک کنید ";
                require_once('mvc/view/message/success.php');
            } else {
                $msg = "Register in Error.!!!";
                // require_once('mvc/view/message/fail.php');
                showmsg("fail", $msg, true);
            }
        }
    }
    /*-----------------------------*/
    private function registerForm()
    {
        echo "Register Form";
        $ar['abc'] = "RegisterForm-Parameter";
        Render::render('user/register.php', $ar);
    }
    public function loguot()
    {
        session_destroy();
        header("Location:" . getBaseUrl() . "user/login/");
    }
}
