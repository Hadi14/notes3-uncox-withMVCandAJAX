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
    public  function getAllNote()
    {
        // if (!isset($_SESSION['uname'])) {
        // Render::render('user/login', array());
        // header("Location:" . getBaseUrl() . 'user/login/');
        // } else {
        // echo "-HOME --- Me";
        // if ($_SESSION['uname']) {
        $un = $_SESSION['uname'];
        $data['records'] = NoteModel::allNotes($un);
        echo json_encode($data['records']);
        // } else {
        // $data['records']  = null;
        // }
        // Render::render('page/home.php', $data);
        // }
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

        if (!isset($_POST['title'])) {
            $nid = $params[0];
            $row = NoteModel::first($nid);
            $un = $_SESSION['uname'];
            Render::render('note/edit.php', $row);
        } else {
            $rowAffect = NoteModel::edit($_POST['id'], $_POST['title'], $_POST['text'], $_POST['time']);
            if ($rowAffect) {
                $ar = array("id" => $_POST['id'], "title" => $_POST['title'], "text" => $_POST['text'], "time" => $_POST['time']);

                echo json_encode($ar);
            } else {
                $msg = "ویرایش رکورد با خطا روبرو شد لطفا مجددا سعی بفرمائید<br> <span>برای ورود به صفحه اصلی<a href=" . getBaseUrl() . "page/home> اینجا </a>کلیک کنید</span>";
                showmsg('fail', $msg, true);
            }
        }
    }

    /******************************************************************************************/
    public  function remove($params)
    {
        // در این متد هم مانند صفحه ایندکس نباید هیچ اکویی قرار داد شود ، چون عمل حذف درست کار نمیکند (رکورد در دیتابیس حذف میشود ولی المنت رکورد در صفحه اچ تی ام ال حذف نمیشود)
        // echo "oooooooooooooooooooooooo!!!";


        // dump($params);

        // if (!$params[0]) {
        //     $msg = "رکوردی برای حذف پیدا نشد";
        //     showmsg('fail', $msg, true);
        // }
        // ob_start();
        $id = $params[0];
        NoteModel::delete($id);

        // $ar["status"] = true;
        // echo $ar;
        // ob_end_clean();
        echo json_encode(array("status" => true));
    }
}
