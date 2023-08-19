<?
class PageController
{
    function home()
    {
        if (!isset($_SESSION['uname'])) {
            // Render::render('user/login', array());
            header("Location:" . getBaseUrl() . 'user/login/');
        } else {
            if ($_SESSION['uname']) {
                $un = $_SESSION['uname'];
                $data['records'] = NoteModel::allNotes($un);
            } else {
                $data['records']  = null;
            }
            Render::render('page/home.php', $data);
        }
    }
}
