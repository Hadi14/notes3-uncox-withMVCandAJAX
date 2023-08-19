<?
class NotesController
{
    public function submit()
    {
        if (isset($_POST['id'])) {
            $this->submitNote();
        } else {
            Render::render('note/submit.php', array());
        }
    }
    /****************************************************************************************** */
    public  function submitNote()
    {
        $id = $_POST['id'];
        $title = $_POST['title'];
        $text = $_POST['text'];
        $time = $_POST['time'];
        NoteModel::insert($id, $title, $text, $time);
    }
    /******************************************************************************************/
    public  function edit($params)
    {
        // echo "<hr>" . $_POST['id'] . "<hr>";
        // echo "<hr>" . $_POST['title'] . "<hr>";
        // echo "<hr>" . $_POST['text'] . "<hr>";
        // echo "<hr>" . $_POST['time'] . "<hr>";
        if (!$_POST['id']) {
            // echo "Show Infoooooooooooooooooooooo:" . $_POST['id'];
            $nid = $params[0];
            // echo "<hr>this is noteID: $nid<hr>";
            $row = NoteModel::first($nid);
            $un = $_SESSION['uname'];
            Render::render('note/edit.php', $row);
        } else {
            // echo "Sended info for editttttttttttttttttttttttttttt";
            $rowAffect = NoteModel::edit($_POST['id'], $_POST['title'], $_POST['text'], $_POST['time'],);
            if ($rowAffect) {
                $msg = "<h4>رکورد مورد نظر با موفقیت ویرایش شد.</h4> <br> <span>برای ورود به صفحه اصلی<a href=" . getBaseUrl() . "page/home> اینجا </a>کلیک کنید</span>";
                showmsg("success", $msg, false);
            } else {
                $msg = "ویرایش رکورد با خطا روبرو شد لطفا مجددا سعی بفرمائید<br> <span>برای ورود به صفحه اصلی<a href=" . getBaseUrl() . "page/home> اینجا </a>کلیک کنید</span>";
                showmsg('fail', $msg, true);
            }
        }
    }
    /******************************************************************************************/
    public  function remove($params)
    {
        echo "Remove Method!!!";
        // dump($params);
        if (!$params[0]) {
            $msg = "رکوردی برای حذف پیدا نشد";
            showmsg('fail', $msg, true);
        }
        // $id = $_GET['id'];
        $id = $params[0];
        NoteModel::delete($id);
        // $msg = "<h4>رکورد مورد نظر با موفقیت حذف شد.</h4> <br> <span>برای ورود به صفحه اصلی<a href=" . getBaseUrl() . "page/home> اینجا </a>کلیک کنید</span>";
        // showmsg('success', $msg, true);
    }
}
